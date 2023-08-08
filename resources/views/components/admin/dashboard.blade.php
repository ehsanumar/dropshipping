  <div class="grid grid-cols-4 gap-3 m-3 ">

      <div class="px-8 py-4 flex-grow hover:scale-105 transition-all text-white text-center bg-gray-800 rounded ">
          <h1 class="text-xl"><i class="fa-solid fa-user-plus"></i> Users </h1>
          <h1>{{ App\Models\User::where('role' ,0)->count() }} +</h1>
      </div>
      <div class="px-8 py-4 flex-grow hover:scale-105 transition-all text-white text-center bg-red-600 rounded ">
          <h1 class="text-xl"><i class="fa-solid fa-user-gear"></i> Admins </h1>
          <h1>{{ App\Models\User::where('role' ,1)->count() }} </h1>
      </div>
      <div class="px-8 py-4 flex-grow hover:scale-105 transition-all text-white text-center bg-orange-500 rounded ">
          <h1 class="text-xl"><i class="fa-solid fa-folder-open"></i> Products </h1>
          <h1>{{ App\Models\Product::count() }} + </h1>
      </div>
      <div class="px-8 py-4 flex-grow hover:scale-105 transition-all text-white text-center bg-violet-500 rounded ">
          <h1 class="text-xl"><i class="fa-solid fa-truck-fast"></i> Orders </h1>
          <h1>123+ </h1>
      </div>



  </div>
  {{-- form dashboard --}}
  <div class="m-3 w-full max-w-3xl py-5  ">
      <form action="{{ route('product.store') }}" enctype="multipart/form-data" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" method="post">
          @csrf

          <div class="grid grid-cols-2 gap-2">

              <div class="mb-4">
                  <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
                      Title
                  </label>
                  <input value="{{ old('title') }}" name="title"
                      class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                      id="username" type="text" placeholder="Title ">
                  @error('title')
                      <p class=" text-red-600 mt-1 text-sm">
                          {{ $message }}
                      </p>
                  @enderror
              </div>
              <div class="mb-3">
                  <label class="block text-gray-700 text-sm font-bold mb-2" >
                      Image
                  </label>
                  <input name="image"
                      class="shadow appearance-none  rounded w-full py-2 px-3 border-2 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                      id="image" type="file" placeholder="image ">
                  @error('image')
                      <p class=" text-red-600 mt-1 text-sm">
                          {{ $message }}
                      </p>
                  @enderror
              </div>
          </div>
          <div class="mb-3">
              <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
                  Description
              </label>
              <textarea rows="3" cols="7" name="description"
                  class="shadow appearance-none  rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline"
                  placeholder="description">
      </textarea>
              @error('description')
                  <p class=" text-red-600 mt-1 text-sm">
                      {{ $message }}
                  </p>
              @enderror
          </div>

          <div class="grid grid-cols-2 gap-2">

              <div class="mb-3">
                  <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
                      Price
                  </label>
                  <input value="{{ old('price') }}" name="price"
                      class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                      id="username" type="text" placeholder="price ">
                  @error('price')
                      <p class=" text-red-600 mt-1 text-sm">
                          {{ $message }}
                      </p>
                  @enderror
              </div>
              <div class="mb-3">
                  <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
                      Quantity
                  </label>
                  <input value="{{ old('quantity') }}" name="quantity"
                      class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                      id="username" type="text" placeholder="quantity ">
                  @error('quantity')
                      <p class=" text-red-600 mt-1 text-sm">
                          {{ $message }}
                      </p>
                  @enderror
              </div>

          </div>
          <div class="grid grid-cols-2 gap-2">

              <div class="mb-6">
                  <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
                      categories
                  </label>

                  <select name="category_id[]" multiple id="status"
                  class="shadow appearance-none  rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline">
                  @foreach ( $categories = App\Models\Category::select(array('id' , 'categories'))->get() as $category )
                  <option  value="{{ $category->id }}">{{ $category->categories }}</option>
                  @endforeach
                </select>
              </div>

              <div class="mb-6">
                  <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
                      Brands
                  </label>
                  <select  name="brand_id" id="status"
                      class="shadow appearance-none  rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline">
                  @foreach ( $brands = App\Models\Brand::select(array('id' , 'brand'))->get() as $brand )
                      <option value="{{ $brand->id }}">{{ $brand->brand }}</option>
                      @endforeach
                  </select>
              </div>
          </div>
          <button class="px-6 py-2 bg-gray-800 text-white  rounded hover:bg-gray-600 hover:scale-105 transition-all "
          type="submit">Add Post</button>
        </form>
    </div>
