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

        if(strcasecmp(auth()->user()->scope,"all")!=0) {
            $enrols->whereIn('program', User::scope()[auth()->user()->scope]);
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
