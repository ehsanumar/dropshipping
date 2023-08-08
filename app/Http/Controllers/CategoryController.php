<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;



class CategoryController extends Controller
{

    public function index()
    {

        return view('Categories',['categories' => Category::latest()->paginate(7)]);
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        $new=$request->validate([
            'categories' => 'required|alpha|max:25',
        ]);
        Category::create(['categories'=> $new['categories']]);
        return back()->with('msg' , 'Category Created seccessfully');
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        Category::findOrFail($id)->delete();
        return back()->with('msgdan', 'Category Deleted Seccessfuly');
    }
}
