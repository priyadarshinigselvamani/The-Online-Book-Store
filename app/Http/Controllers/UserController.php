<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use Auth;

class UserController extends Controller
{
    public function addUserForm()
    {
        if(Auth::user()->role == "admin"){
            return view("Users.adduser");
        }else{
            return redirect("/home");
        }
    }

    public function insertUSer(Request $request)
    {
        request()->validate([
            'name' => 'required|max:255',
            'email' => 'required|unique:users|max:255',
            'role' => 'required',
            'password' => 'required',
        ],
        [
            'email.required' => 'Enter valid email',
            'email.unique'=>'Email already taken!',
        ]);
        $employee = Users::create([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
            'password' => Hash::make($request->password),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        return redirect('/users_list');

    }

    public function usersList(Request $request)
    {
        $users = Users::withTrashed()
                        ->select('*')->paginate(10);
        $data = $request->all();

        return view('Users.userslist',compact('users','data'));
    }

    public function deleteUser($id)
    {
        if(Auth::user()->role == "admin"){
            Users::where('id', $id)->delete();
            return redirect('/users_list');
        }else{
            return redirect("/home");
        }
    }

    public function restoreUser($id)
    {
        if(Auth::user()->role == "admin"){
            Users::withTrashed()->find($id)->restore();
            return redirect('/users_list');
        }else{
            return redirect("/home");
        }
    }

    public function showUserEditForm($id)
    {
        $user = Users::where('id',$id)->first();
        return view('Users.edituser',compact('user'));
    }

    public function updateUser(Request $request,$id)
    {
        request()->validate([
            'name' => 'required|max:255',
            'email' => 'required|unique:users|max:255',
            'role' => 'required',
        ],
        [
            'email.required' => 'Enter valid email',
            'email.unique'=>'Email already taken!',
        ]);
        $update = Users::where('id',$id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
            'updated_at' => Carbon::now(),
        ]);

        return redirect('/users_list');
    }
}
