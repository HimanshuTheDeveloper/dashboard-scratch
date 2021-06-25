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

    public function registeredUpdate(Request $request, $id){
        $users = User::find($id);
        $users->name = $request->input('name');
        $users->usertype = $request->input('usertype');
        $users->phone = $request->input('phone');

        $users->update();

        return redirect('/role-register')->with('status' , ' Your Data will be Updated Successfully');
    }

    public function registeredDelete($id){
        $users = User::findOrFail($id);
        $users->delete();
        return redirect('/role-register')->with('status', 'User Deleted Successfully !');
    }
}
