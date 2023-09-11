<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use TCG\Voyager\Http\Controllers\Controller;



class LoginController extends Controller
{
    use AuthenticatesUsers;
    use ThrottlesLogins; // Добавляем трейт ThrottlesLogins

    protected $maxAttempts = 5; // Количество попыток
    protected $decayMinutes = 1; // Время в минутах

    protected $redirectTo = '/home';

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    // Переопределяем метод credentials
    protected function credentials(Request $request)
    {
        return $request->only($this->username(), 'password');
    }

    public function showLoginForm()
    {
        return view('auth.login'); // Отображение формы входа
    }

    public function logout(Request $request)
    {
        Auth::logout();

        return redirect('/');
    }
}
