<?php

namespace App\Http\Controllers\Client;

use App\Enum\AccessLoginEnum;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Traits\VerifyAuthentication;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ClientLoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers, VerifyAuthentication;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    // protected $redirectTo;

    /**
     * Show the application's login form.
     *
     * @return \Illuminate\View\View
     */
    public function showLoginForm()
    {
        return view('client.login');
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    // protected function redirectTo()
    // {
    //     if (Auth()->user()->isAdmin == 0) {
    //         return route('admin.home');
    //     } else {
    //         Auth()->logout();
    //         return route('admin.login');
    //     }
    // }

    /**
     * Handle a login request to the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Http\JsonResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function login(Request $request)
    {
        $input = $request->all();
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required'
        ]);
        // $this->validateLogin($requestư);

        // If the class is using the ThrottlesLogins trait, we can automatically throttle
        // the login attempts for this application. We'll key this by the username and
        // the IP address of the client making these requests into this application.
        if (
            method_exists($this, 'hasTooManyLoginAttempts') &&
            $this->hasTooManyLoginAttempts($request)
        ) {
            $this->fireLockoutEvent($request);

            return $this->sendLockoutResponse($request);
        }

        if (auth()->attempt(array('email' => $input['email'], 'password' => $input['password']))) {
            if ($this->canAccessClient(
                auth()->user()->isAdmin,
                [
                    AccessLoginEnum::fromString('ADMIN'),
                    AccessLoginEnum::fromString('CLIENT')
                ]
            )) {
                return redirect()->route('client.home');
            }
        } else {
            return redirect()
                ->route('client.login')
                ->with('error', 'Email and password are wrong');
        }



        // If the login attempt was unsuccessful we will increment the number of attempts
        // to login and redirect the user back to the login form. Of course, when this
        // user surpasses their maximum number of attempts they will get locked out.
        $this->incrementLoginAttempts($request);

        return $this->sendFailedLoginResponse($request);
    }
}