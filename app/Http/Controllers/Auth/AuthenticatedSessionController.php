<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\Employee;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {

//        $request->authenticate();
//        $request->session()->regenerate();
//        return redirect()->intended(RouteServiceProvider::HOME);

        $validatedData = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        if (Auth::attempt(['email' => $validatedData['email'], 'password' => $validatedData['password']])) {

            $request->session()->regenerate();
            $user = Auth::user();
            $employee = Employee::where('userID', $user->id)->first();
            if ($employee) {
                return redirect()->route('employee.index'); //
            }
            return redirect()->route('admin.index');
        }
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);

    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
