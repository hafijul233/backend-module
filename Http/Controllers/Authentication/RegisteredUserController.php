<?php

namespace Modules\Backend\Http\Controllers\Authentication;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Modules\Backend\Http\Requests\Authentication\RegisterRequest;
use Modules\Backend\Services\Authentication\RegisteredUserService;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class RegisteredUserController extends Controller
{
    /**
     * @var RegisteredUserService
     */
    private $registeredUserService;

    /**
     * RegisteredUserController constructor.
     * @param RegisteredUserService $registeredUserService
     */
    public function __construct(RegisteredUserService $registeredUserService)
    {
        $this->registeredUserService = $registeredUserService;
    }

    /**
     * Display the registration view.
     *
     * @return Application|Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('backend::auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param RegisterRequest $request
     * @return RedirectResponse
     * @throws \Throwable
     */
    public function store(RegisterRequest $request): RedirectResponse
    {
        try {
            $newRegisteredUser = $this->registeredUserService->attemptRegistration($request->except('_token'));
            event(new Registered($newRegisteredUser));
            Auth::login($newRegisteredUser);
            toastr('User Registration Successful', 'success');
            toastr('Please check your mailbox to verify Account', 'warning');
            return redirect(RouteServiceProvider::HOME);
        } catch (\Exception $exception) {
            \Log::error($exception->getMessage());
            toastr('User Registration Failed', 'error');
            return redirect()->back();
        }
    }
}
