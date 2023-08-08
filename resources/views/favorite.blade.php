<x-all.navbar />
<x-all.alertdelete/>
<div class="container p-6 mx-auto space-y-8">
    <div class="space-y-2 text-center">
        <h2 class="text-3xl font-bold">Favorites</h2>
    </div>
    <div class="grid grid-cols-3 gap-x-4 gap-y-8 md:grid-cols-2 lg:grid-cols-4">
        @foreach ($favs as $product)
            <div class="container">
                <div class="max-w-md w-full bg-gray-900 shadow-lg rounded-xl aspect-square p-6">
                    <div class="flex flex-col ">
                        <div class="flex flex-col">
                            <div class="relative h-62 w-full mb-3 ">

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

                                    <div class="text-xl text-white font-semibold mt-1">{{ $product->price }}</div>
                                    <div class="text-white">
                                        {{ $product->created_at->diffForHumans() }}
                                    </div>
                                </div>

                                <div class="flex space-x-2 text-sm mt-4 font-medium justify-between">
                                    <a href="{{ route('destroyfavorite' , ['product_id' => $product->id]) }}"
                                        class="transition ease-in duration-300 inline-flex items-center text-sm font-medium mb-2 md:mb-0 bg-red-500 px-5 py-2 hover:shadow-lg tracking-wider text-white rounded-full hover:bg-red-600 ">
                                        <span>Remove</span>
                                    </a>
                                    <a
                                        href="{{ route('productDetails',['product_id' => $product->id]) }}"
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
    </section>
