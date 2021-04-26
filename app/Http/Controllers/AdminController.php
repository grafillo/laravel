<?php

namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index(){

            $user= User::where('role','admin')->first();
            Auth::login($user);

            return back();

    }

    public function getUsers(){

        $users = User::all();
        $admin = Auth::user();

        $this->authorize("view",$admin);

        return view('tableusers',['users'=>$users]);

    }
}
