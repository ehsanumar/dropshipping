<x-all.navbar />
<x-all.alertsuc />
<x-all.alertdelete />
<div class="container p-6 mx-auto space-y-8">
    <div class="space-y-2 text-center flex justify-between">
        <h2 class="text-3xl font-bold">Products</h2>
        <div class="block">

            <form action="{{ route('search') }}" method="post">
                @csrf
                <div class="relative mb-4 flex w-full flex-wrap items-stretch">
                    <input type="search" name="search"
                        class="relative  m-0 -mr-0.5 block w-[300px] min-w-0 flex-auto rounded-l border border-solid border-neutral-300  bg-transparent bg-clip-padding px-3 py-[0.25rem] text-base font-normal leading-[1.6] text-neutral-700 outline-none transition duration-200 ease-in-out focus:z-[3] focus:border-gray-800 focus:text-neutral-700 focus:shadow-[inset_0_0_0_1px_rgb(59,113,202)] focus:outline-none"
                        placeholder="Search" aria-label="Search" aria-describedby="button-addon3" />

                    <!--Search button-->
                    <button
                        class="relative z-[2] rounded-r border-2 border-primary px-6 py-2 text-xs font-medium uppercase text-primary transition duration-150 ease-in-out hover:bg-black hover:bg-opacity-5 focus:outline-none focus:ring-0"
                        type="submit" id="button-addon3" data-te-ripple-init>
                        <i class="fa-solid fa-magnifying-glass"></i>
                        Search
                    </button><br>
                </div>
                @if (session()->has('searchFor'))
                    <p>Result Search For <span
                            class="text-white bg-red-400 rounded-full font-bold px-4 py-2">{{ session('searchFor') }}
                        </span></p>
                @endif

            </form>

            <div class="mr-8 ">
                <form action="{{ route('filter') }}" method="post">
                    @csrf

                    @foreach ($categories as $id=> $category)
                        <input type="checkbox" name="categories[]"
                            class=" relative h-5 w-5 mx-4 cursor-pointer appearance-none rounded-md border border-blue-gray-200 transition-all checked:border-pink-500 checked:bg-pink-500 checked:before:bg-pink-500 "
                            value="{{ $id }}" id="form"
                            {{ in_array($id, session('selectedCategories', [])) ? 'checked' : '' }} />
                        <span>{{ $category }}</span>
                    @endforeach
                    <button type="submit">
                        <i class="fa-solid fa-filter text-3xl ml-3"></i>
                    </button>
                </form>
            </div>
        </div>
    </div>

    @if (session()->has('result'))
        @if (session('result')->isEmpty())
            <x-norecorded>
                <h1 class="text-center text-red-500 text-2xl">No Result Founded...!</h1>
            </x-norecorded>
        @else
            <div class="grid grid-cols-3 gap-x-4 gap-y-8 md:grid-cols-2 lg:grid-cols-4">
                @foreach (session('result') as $product)
                    <div class="container">
                        <div class="max-w-md w-full bg-gray-900 shadow-lg rounded-xl aspect-square p-6">
                            <div class="flex flex-col ">
                                <div class="flex flex-col">
                                    <div class="relative h-62 w-full mb-3 ">
                                        <div class="absolute flex flex-col top-0 right-0 p-3">
                                            <form action="{{ route('addtofav', ['product_id' => $product->id]) }}"
                                                method="post">
                                                @csrf
                                                <button type="submit">
                                                    <i
                                                        class="{{ in_array($product->id, $favs) ? 'fa-solid' : 'fa-regular' }} fa-heart text-red-500   text-xl"></i>
                                                </button>
                                            </form>
                                        </div>
                                        <img src="{{ asset('storage/ProductImage/1691261413.jpg') }}"
                                            alt="Just a flower" class=" w-full  h-[40vh]  object-fill  rounded-2xl">
                                    </div>
                                    <div class="flex-auto justify-evenly">
                                        <div class="flex flex-wrap ">

                                            <div class="flex items-center w-full justify-between min-w-0 ">
                                                <h2
                                                    class="text-lg mr-auto cursor-pointer text-gray-200 hover:text-purple-500 truncate ">
                                                    {{ $product->title }}</h2>

                                            </div>
                                        </div>
                                        <div class="flex items-center w-full justify-between min-w-0">

                                            <div class="text-xl text-white font-semibold mt-1">{{ $product->price }}
                                            </div>
                                            <div class="text-white">
                                                {{ $product->created_at->diffForHumans() }}
                                            </div>
                                        </div>

                                        <div class="flex space-x-2 text-sm mt-4 font-medium justify-between">

                                            <form action="{{ route('addtocard', ['product_id' => $product->id]) }}"
                                                method="post">
                                                @csrf
                                                <button
                                                    class="transition ease-in duration-300 inline-flex items-center text-sm font-medium mb-2 md:mb-0 bg-purple-500 px-5 py-2 hover:shadow-lg tracking-wider text-white rounded-full hover:bg-purple-600 ">
                                                    <span>Add Cart</span>
                                                </button>
                                            </form>
                                            <a href="{{ route('productDetails', ['product_id' => $product->id]) }}"
                                                class="flex cursor-pointer items-center justify-center transition ease-in duration-300 bg-gray-700 hover:bg-gray-800 border hover:border-gray-500 border-gray-700 hover:text-white hover:shadow-lg text-gray-400 rounded-full w-9 h-9">
                                                <i class="fa-solid fa-eye text-gray-200 text-xl"></i>
                                            </a>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    @elseif (session()->has('filter'))
        @if (session('filter')->isEmpty())
            <x-norecorded>
                <h1 class="text-center text-red-500 text-2xl">No Result Founded...!</h1>
            </x-norecorded>
        @else
            <div class="grid grid-cols-3 gap-x-4 gap-y-8 md:grid-cols-2 lg:grid-cols-4">
                @foreach (session('filter') as $product)
                    <div class="container">
                        <div class="max-w-md w-full bg-gray-900 shadow-lg rounded-xl aspect-square p-6">
                            <div class="flex flex-col ">
                                <div class="flex flex-col">
                                    <div class="relative h-62 w-full mb-3 ">
                                        <div class="absolute flex flex-col top-0 right-0 p-3">
                                            <form action="{{ route('addtofav', ['product_id' => $product->id]) }}"
                                                method="post">
                                                @csrf
                                                <button type="submit">
                                                    <i
                                                        class="{{ in_array($product->id, $favs) ? 'fa-solid' : 'fa-regular' }} fa-heart text-red-500   text-xl"></i>
                                                </button>
                                            </form>
                                        </div>
                                        <img src="{{ asset('storage/ProductImage/1691261413.jpg') }}"
                                            alt="Just a flower" class=" w-full  h-[40vh]  object-fill  rounded-2xl">
                                    </div>
                                    <div class="flex-auto justify-evenly">
                                        <div class="flex flex-wrap ">

                                            <div class="flex items-center w-full justify-between min-w-0 ">
                                                <h2
                                                    class="text-lg mr-auto cursor-pointer text-gray-200 hover:text-purple-500 truncate ">
                                                    {{ $product->title }}</h2>

                                            </div>
                                        </div>
                                        <div class="flex items-center w-full justify-between min-w-0">

                                            <div class="text-xl text-white font-semibold mt-1">{{ $product->price }}
                                            </div>
                                            <div class="text-white">
                                                {{ $product->created_at->diffForHumans() }}
                                            </div>
                                        </div>

                                        <div class="flex space-x-2 text-sm mt-4 font-medium justify-between">

                                            <form action="{{ route('addtocard', ['product_id' => $product->id]) }}"
                                                method="post">
                                                @csrf
                                                <button
                                                    class="transition ease-in duration-300 inline-flex items-center text-sm font-medium mb-2 md:mb-0 bg-purple-500 px-5 py-2 hover:shadow-lg tracking-wider text-white rounded-full hover:bg-purple-600 ">
                                                    <span>Add Cart</span>
                                                </button>
                                            </form>
                                            <a href="{{ route('productDetails', ['product_id' => $product->id]) }}"
                                                class="flex cursor-pointer items-center justify-center transition ease-in duration-300 bg-gray-700 hover:bg-gray-800 border hover:border-gray-500 border-gray-700 hover:text-white hover:shadow-lg text-gray-400 rounded-full w-9 h-9">
                                                <i class="fa-solid fa-eye text-gray-200 text-xl"></i>
                                            </a>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    @else
        <div class="grid grid-cols-3 gap-x-4 gap-y-8 md:grid-cols-2 lg:grid-cols-4">
            @foreach ($products as $product)
                <div class="container">
                    <div class="max-w-md w-full bg-gray-900 shadow-lg rounded-xl aspect-square p-6">
                        <div class="flex flex-col ">
                            <div class="flex flex-col">
                                <div class="relative h-62 w-full mb-3 ">
                                    <div class="absolute flex flex-col top-0 right-0 p-3">
                                        <form action="{{ route('addtofav', ['product_id' => $product->id]) }}"
                                            method="post">
                                            @csrf
                                            <button type="submit">
                                                <i
                                                    class="{{ in_array($product->id, $favs) ? 'fa-solid' : 'fa-regular' }} fa-heart text-red-500   text-xl"></i>
                                            </button>
                                        </form>
                                    </div>
                                    <img src="{{ asset('storage/ProductImage/1691261413.jpg') }}" alt="Just a flower"
                                        class=" w-full  h-[40vh]  object-fill  rounded-2xl">
                                </div>
                                <div class="flex-auto justify-evenly">
                                    <div class="flex flex-wrap ">

                                        <div class="flex items-center w-full justify-between min-w-0 ">
                                            <h2
                                                class="text-lg mr-auto cursor-pointer text-gray-200 hover:text-purple-500 truncate ">
                                                {{ $product->title }}</h2>

                                        </div>
                                    </div>
                                    <div class="flex items-center w-full justify-between min-w-0">

                                        <div class="text-xl text-white font-semibold mt-1">{{ $product->price }}
                                        </div>
                                        <div class="text-white">
                                            {{ $product->created_at->diffForHumans() }}
                                        </div>
                                    </div>

                                    <div class="flex space-x-2 text-sm mt-4 font-medium justify-between">

                                        <form action="{{ route('addtocard', ['product_id' => $product->id]) }}"
                                            method="post">
                                            @csrf
                                            <button
                                                class="transition ease-in duration-300 inline-flex items-center text-sm font-medium mb-2 md:mb-0 bg-purple-500 px-5 py-2 hover:shadow-lg tracking-wider text-white rounded-full hover:bg-purple-600 ">
                                                <span>Add Cart</span>
                                            </button>
                                        </form>
                                        <a href="{{ route('productDetails', ['product_id' => $product->id]) }}"
                                            class="flex cursor-pointer items-center justify-center transition ease-in duration-300 bg-gray-700 hover:bg-gray-800 border hover:border-gray-500 border-gray-700 hover:text-white hover:shadow-lg text-gray-400 rounded-full w-9 h-9">
                                            <i class="fa-solid fa-eye text-gray-200 text-xl"></i>
                                        </a>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        {{ $products->links() }}
    @endif

    </section>
</div>
