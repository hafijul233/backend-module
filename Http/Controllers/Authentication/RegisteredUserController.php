<?php

namespace Modules\Backend\Http\Controllers\Authentication;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;
use App\Providers\RouteServiceProvider;
use App\Services\Auth\RegisteredUserService;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

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
     * @return View
     */
    public function create(): View
    {
        return view('auth.register');
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
