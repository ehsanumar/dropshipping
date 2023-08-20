<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;



class BrandController extends Controller
{

    public function index()
    {

        return view('brand', ['brands' => Brand::latest()->paginate(7)]);
    }
    public function store(Request $request)
    {
        $new = $request->validate([
            'brand' => 'required|alpha|max:25',
        ]);
        brand::create(['brand' => $new['brand']]);
        return back()->with('msg', 'Brand Created seccessfully');
    }
    public function destroy($id)
    {
        Brand::findOrFail($id)->delete();
        return back()->with('msgdan', 'Brand Deleted Seccessfuly');
    }
}
