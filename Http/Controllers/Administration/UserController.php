<?php

namespace Modules\Backend\Http\Controllers\Administration;

use App\Http\Controllers\Controller;
use Modules\Backend\Services\Authentication\AuthenticatedSessionService;
use Modules\Backend\Services\Authorization\RoleService;
use Modules\Backend\Services\Authorization\UserService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Rbac\Http\Requests\UserRequest;

class UserController extends Controller
{
    /**
     * @var UserService
     */
    private $userService;

    /**
     * @var RoleService
     */
    private $roleService;
    /**
     * @var AuthenticatedSessionService
     */
    private $authenticatedSessionService;

    /**
     * PermissionController constructor.
     *
     * @param AuthenticatedSessionService $authenticatedSessionService
     * @param UserService $userService
     * @param RoleService $roleService
     */
    public function __construct(AuthenticatedSessionService $authenticatedSessionService,
                                UserService                 $userService,
                                RoleService                 $roleService)
    {
        $this->userService = $userService;
        $this->roleService = $roleService;
        $this->authenticatedSessionService = $authenticatedSessionService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     * @throws \Exception
     */
    public function index(Request $request)
    {
        $filters = $request->except('page');
        $users = $this->userService->userPaginate($filters);

        return view('backend.preference.user.index', [
            'users' => $users
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        $roles = $this->roleService->roleDropdown();

        return view('backend.preference.user.create', [
            'roles' => $roles
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param UserRequest $request
     * @return RedirectResponse
     * @throws \Throwable
     */
    public function store(UserRequest $request): RedirectResponse
    {
        if ($this->userService->storeUser($request)) {
            toastr('New User Created', 'success', 'Notification');
            return redirect()->route('users.index');
        }

        toastr('User Creation Failed', 'error', 'Alert');
        return redirect()->back()->withInput();
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Application|Factory|View
     * @throws \Exception
     */
    public function show(int $id)
    {
        $withTrashed = false;

        if (\request()->has('with') && \request()->get('with') == \Constant::PURGE_MODEL_QSA) {
            $withTrashed = true;
        }

        if ($user = $this->userService->getUserById($id, $withTrashed)) {
            return view('backend.preference.user.show', [
                'user' => $user
            ]);
        }

        abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Application|Factory|View
     * @throws \Exception
     */
    public function edit(int $id)
    {

        $withTrashed = false;

        if (\request()->has('with') && \request()->get('with') == \Constant::PURGE_MODEL_QSA) {
            $withTrashed = true;
        }

        if ($user = $this->userService->getUserById($id, $withTrashed)) {
            $roles = $this->roleService->roleDropdown();
            $user_roles = $user->roles()->pluck('id')->toArray() ?? [];
            return view('backend.preference.user.edit', [
                'user' => $user,
                'roles' => $roles,
                'user_roles' => $user_roles
            ]);
        }

        abort(404);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param UserRequest $request
     * @param  $id
     * @return RedirectResponse
     * @throws \Throwable
     */
    public function update(UserRequest $request, $id): RedirectResponse
    {
        if ($this->userService->updateUser($request, $id)) {
            toastr('User Information Updated', 'success', 'Notification');
            return redirect()->route('users.index');
        }

        toastr('User Information Update Failed', 'error', 'Alert');
        return redirect()->back()->withInput();
    }

    /**
     * Remove the specified resource from storage.
     * @param $id
     * @param Request $request
     * @return RedirectResponse|void
     * @throws \Throwable
     */
    public function destroy($id, Request $request)
    {
        if ($this->authenticatedSessionService->verifyUser($request)) {

            if ($this->userService->destroyRole($id)) {
                toastr('User Deleted', 'success', 'Notification');
            } else {
                toastr('User Removal Failed', 'error', 'Alert');
            }
            return redirect()->route('users.index');
        }

        abort(403, 'Wrong user credentials');
    }
}
