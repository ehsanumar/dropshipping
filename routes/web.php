<?php

use App\Models\Product;
use App\Models\AddToCadfav;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{AddToCadfavController, AdminController, BrandController, CategoryController, CommentsController, ProductController, ProfileController};


Route::get('/', function () {
    $favID=[];
    if (Auth::user()) {
        $array=AddToCadfav::where('user_id' , auth()->id())->where('status' , 0)->get('product_id');
        foreach ($array as  $value) {
            $favID[]=$value->product_id;
        }
    }
    return view('home',['products' => Product::latest()->paginate(8) , 'favs' => $favID]);
});
Route::view('/aboutus', 'AboutUS')->name('aboutUs');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    //Add comments
Route::post('/comment/{product_id}' , [CommentsController::class , 'store'])->name('comment');
Route::get('/comment/{comment_id}/destroy' , [CommentsController::class , 'destroy'])->name('destroy.comment');
    //Add Product
    Route::resource('product', ProductController::class)->only('store','index');
    Route::get('/products' ,[ProductController::class , 'displayProducts'])->name('products');
    Route::get('/product/{product_id}/detail' ,[ProductController::class , 'productDetails'])->name('productDetails');
    //admin controller
    Route::get('/users' ,[AdminController::class,'showUser'])->name('showUser');
    Route::get('/users/{id}' ,[AdminController::class,'deleteUser'])->name('deleteUser');
    Route::post('/search/user', [AdminController::class, 'searchToUser'])->name('searchToUser');

    //categories Controller
    Route::resource('category', CategoryController::class)->only('index','store','destroy');
    //Brand Controller
    Route::resource('brand', BrandController::class)->only('index','store','destroy');
    //search
    Route::post('/search' , [ProductController::class , 'search'])->name('search');
    Route::post('/filter' , [ProductController::class , 'filter'])->name('filter');
    //add to card And Favurait
    Route::post("/addtocard/{product_id}", [AddToCadfavController::class,'addToCard'])->name('addtocard');
    Route::post("/addtofav/{product_id}", [AddToCadfavController::class,'addToFav'])->name('addtofav');
    Route::get("/Shopping"   , [AddToCadfavController::class,'showCards'])->name('showcards');
    Route::get("removefromcart/{product_id}"   , [AddToCadfavController::class,'destroy'])->name('destroyCard');
    Route::get("/favorite"   , [AddToCadfavController::class, 'showFavorite'])->name('showfavorite');
    Route::get("removefromfavorite/{product_id}"   , [AddToCadfavController::class, 'destroyFavorite'])->name('destroyfavorite');
});

require __DIR__.'/auth.php';
