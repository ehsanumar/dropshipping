<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function showUser(){
        $usersId = DB::table('model_has_roles')->where('role_id', 3)->pluck('model_id');
        $users = User::whereIn('id', $usersId)->paginate(10);

        $adminsId = DB::table('model_has_roles')->where('role_id', 2)->pluck('model_id');
        $admins = User::whereIn('id', $adminsId)->paginate(6);
        return view('dashboard.adminuser',compact('users','admins'));
    }
    public function deleteUser($id){
        User::findOrFail($id)->delete();
        return back()->with('msgdan' , 'User Deleted Seccessfuly');
    }
    public function searchToUser(Request $request)
    {
        if ($request['search'] === null) {
            abort(403, "You can't search for nothing");
        }
        $result = User::query()->where('name', 'like', '%' . $request['search'] . '%')
            ->orWhere('email', 'like', '%' . $request['search'] . '%')
            ->orWhere('phone', 'like', '%' . $request['search'] . '%')
            ->get();
        return back()->with(['result'=> $result ,'searchFor'=> $request['search']]);
    }

}
