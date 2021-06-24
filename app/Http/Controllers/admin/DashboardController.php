<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public function registered(){
        $users = User::all();
        return view('admin.register', [
            'users' => $users
        ]);
    }

    public function registeredEdit(Request $request, $id ){
        $users = User::findOrFail($id);
        return view('admin.register-edit' , [
            'users' => $users
        ]);
    }
}
