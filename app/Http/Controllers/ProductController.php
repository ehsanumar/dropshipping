<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Product;
use App\Models\AddToCadfav;
use Illuminate\Http\Request;
use App\Models\Product_category;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Models\Comments;
use Egulias\EmailValidator\Parser\Comment;

class ProductController extends Controller
{

    public function index()
    {
        return view('ProductsAdmin', ['products' => Product::with(['categories', 'brands'])->paginate(10)]);
    }

    public function displayProducts()
    {
        $favID = [];
        if (Auth::user()) {
            $array = AddToCadfav::where('user_id', auth()->id())->where('status', 0)->get('product_id');
            foreach ($array as  $value) {
                $favID[] = $value->product_id;
            }
        }
        return view('productsUsers', ['products' => Product::latest()->paginate(8), 'favs' => $favID , 'catrgories' => Category::latest()->get()]);
    }
    public function productDetails($id)
    {

        $product = Product::with(['categories', 'brands'])->findOrFail($id);
        $comments=Comments::where('product_id' ,$id)->with('user')->get();
        return view('productDetails', ['details' => $product , 'comments' => $comments]);
    }

    public function create()
    {
        //
    }


    public function store(ProductRequest $request)
    {
        $validated = $request->validated();
        $imageName = time() . '.' . $request->image->extension();
        $request->image->StoreAs('public/ProductImage', $imageName);
        $validated['image'] = $imageName;
        $validated['user_id'] = auth()->id();
        $id = Product::insertGetId([
            "title" =>       $validated["title"],
            "price" =>         $validated["price"],
            "description" =>          $validated["description"],
            "quantity" =>           $validated["quantity"],
            "image" =>               $imageName,
            "user_id" => auth()->id(),
            "created_at" => now(),
            "updated_at" => now(),
        ]);
        if (count($request->category_id) > 0) {
            foreach ($variable = $request->category_id as  $value) {
                Product_category::create([
                    "product_id"   =>    $id,
                    "category_id"     =>      $value,
                    "brand_id" =>   $validated["brand_id"],
                ]);
            }
        }
        return redirect('/dashboard')->with('msg', 'Product Created .....');
    }




    public function search(Request $request)
    {
        if($request['search'] === null){
            abort(403, "You can't search for nothing");
        }
        $result = Product::query()->where('description', 'like', '%' . $request['search'] . '%')
            ->orWhere('title', 'like', '%' . $request['search'] . '%')
            ->orWhere('price', 'like', '%' . $request['search'] . '%')->get();
        return back()->with('result', $result)->with('searchFor' , $request['search']);
    }
    public function filter(Request $request)
    {
        if ($request['categories'] === null) {
            abort(403, "You can't filter for nothing");
        }
        $selectedCategories = $request->input('categories', []);

        $products = Product::whereHas('categories', function ($query) use ($selectedCategories) {
            $query->whereIn('categories.id', $selectedCategories); // Specify the table alias 'categories'
        })->get();

        return back()->with(['filter' => $products ,'selectedCategories' => $selectedCategories]) ;
    }
}
