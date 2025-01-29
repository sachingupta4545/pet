<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function dashboard()
    {
        $allUsers=User::all();
        return view('admin.users.index',compact('allUsers'));
    }
    
}
