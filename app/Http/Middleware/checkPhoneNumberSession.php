<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class checkPhoneNumberSession
{
    /**
     * Preventing access to route('phoneNumber.confirm') without entering the phone_number
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse) $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $session_phone_number = session()->get('phone_number');
        if (!$session_phone_number) {
            return redirect()->route('register');
        }
        return $next($request);
    }
}
