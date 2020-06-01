<?php

namespace App\Http\Controllers;

use App\Enrol;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function loginForm() {
        return view('users.login');
    }

    public function login(Request $request) {
        $this->validate($request, [
            'username' => 'required',
            'password' => 'required'
        ]);

        $login = auth()->attempt([
            'username' => $request['username'],
            'password' => $request['password']
        ]);

        if($login) {
            return redirect('/dashboard');
        }else {
            return redirect()->back()->with('Error','Invalid username or password.');
        }
    }

    public function dashboard() {
        $status = isset($_GET['status']) ? $_GET['status'] : 'pending';
        $enrols = Enrol::where('status', $status)->with('student');

        if(!in_array(auth()->user()->scope, ['all','finance','registrar'])) {
            $enrols->whereIn('program', User::scopes()[auth()->user()->scope])
                ->whereNotNull('payment_verified_by')
                ->whereNotNull('records_verified_by');
        }

        $enrols->orderBy('created_at');

        return view('users.dashboard', [
            'status' => $status,
            'enrols' => $enrols->get(),
            'counts' => Enrol::status()
        ]);
    }

    public function logout() {
        auth()->logout();
        return redirect('/');
    }
}
