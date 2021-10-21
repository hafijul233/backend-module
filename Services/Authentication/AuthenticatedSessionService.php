<?php

namespace App\Services\Auth;


use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Auth\Events\Lockout;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;

/**
 * Class AuthenticatedSessionService
 * @package App\Services\Auth
 */
class AuthenticatedSessionService
{
    /**
     * Handle an incoming authentication request.
     *
     * @param LoginRequest $request
     * @return array
     */
    public function attemptLogin(LoginRequest $request): array
    {
        $authConfirmation = $this->authenticate($request);

        if ($authConfirmation['status'] == true) {
            $request->session()->regenerate();
        }

        return $authConfirmation;
    }


    /**
     * Attempt to authenticate the request's credentials.
     *
     * @param LoginRequest $request
     * @return array
     *
     */
    private function authenticate(LoginRequest $request): array
    {
        $this->ensureIsNotRateLimited($request);

        if (Auth::attempt($request->only('email', 'password'), $request->boolean('remember'))) {
            RateLimiter::clear($this->throttleKey($request));

            return ['status' => true, 'message' => __('auth.success'), 'level' => \Constant::MSG_TOASTR_SUCCESS, 'title' => 'Authentication'];
        }

        RateLimiter::hit($this->throttleKey($request));
        return ['status' => false, 'message' => __('auth.failed'), 'level' => \Constant::MSG_TOASTR_ERROR, 'title' => 'Alert!'];

    }

    /**
     * Ensure the login request is not rate limited.
     *
     * @param LoginRequest $request
     * @return void
     *
     */
    private function ensureIsNotRateLimited(LoginRequest $request)
    {
        if (!RateLimiter::tooManyAttempts($this->throttleKey($request), 5)) {
            return;
        }

        event(new Lockout($request));

        $seconds = RateLimiter::availableIn($this->throttleKey($request));

        toastr(trans('auth.throttle', [
            'seconds' => $seconds,
            'minutes' => ceil($seconds / 60),
        ]), \Constant::MSG_TOASTR_WARNING, 'Warning');
    }

    /**
     * Get the rate limiting throttle key for the request.
     *
     * @param LoginRequest $request
     * @return string
     */
    private function throttleKey(LoginRequest $request): string
    {
        return Str::lower($request->input('email')) . '|' . $request->ip();
    }

    /**
     * Destroy an authenticated session.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function attemptLogout(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

    /**
     * Verify that current request user is who he claim to be
     *
     * @param Request $request
     * @return bool
     */
    public function verifyUser(Request $request): bool
    {
        return Auth::guard('web')->validate([
            'email' => $request->user()->email,
            'password' => $request->password,
        ]);
    }
}
