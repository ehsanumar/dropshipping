<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function showUser(){
        $users=User::where('role','0')->paginate(10);
        $admins=User::where('role','1')->paginate(5);
        return view('adminuser',compact('users','admins'));
    }
    public function deleteUser($id){
        Product::findOrFail($id)->delete();
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
