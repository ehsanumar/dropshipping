<x-all.navbar />
<style>
    @layer utilities {

        input[type="number"]::-webkit-inner-spin-button,
        input[type="number"]::-webkit-outer-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }
    }
</style>
<x-all.alertdelete />

<body>
    <div class="h-auto bg-gray-300 pt-20">
        <h1 class="mb-10 text-center text-2xl font-bold">Cart Items</h1>
        <div class="mx-auto max-w-5xl justify-center px-6 md:flex md:space-x-6 xl:px-0">
            <div class="rounded-lg md:w-2/3">
                @foreach ($adds as $add)
                    <div class="justify-between mb-6 rounded-lg bg-white p-6 shadow-md sm:flex sm:justify-start">
                        <img src="{{ asset('storage/ProductImage/1691261413.jpg') }}" alt="product-image"
                            class="w-full rounded-lg sm:w-40" />
                        <div class="sm:ml-4 sm:flex sm:w-full sm:justify-between">
                            <div class="mt-5 sm:mt-0">
                                <h2 class="text-lg font-bold text-gray-900">{{ $add->title }}</h2>
                                <p class="mt-1 w-[300px] text-xs text-gray-700">{{ $add->description }}</p>
                            </div>
                            <div class="mt-4 flex justify-between im sm:space-y-6 sm:mt-0 sm:block sm:space-x-6">
                                <div class="flex items-center border-gray-100">
                                    <span
                                        class="cursor-pointer rounded-l bg-gray-100 py-1 px-3.5 duration-100 hover:bg-blue-500 hover:text-blue-50">
                                        - </span>
                                    <input class="h-8 w-8 border bg-white text-center text-xs outline-none"
                                        type="number" value="2" min="1" />
                                    <span
                                        class="cursor-pointer rounded-r bg-gray-100 py-1 px-3 duration-100 hover:bg-blue-500 hover:text-blue-50">
                                        + </span>
                                </div>
                                <div class="flex items-center space-x-3">
                                    <p class="text-sm">{{ $add->price }} $</p>
                                    <a href="{{ route('destroyCard', ['product_id' => $add->id]) }}"
                                        class="flex  hover:text-red-600 hover:scale-125 transition-all cursor-pointer">
                                        <i class="fa-solid fa-x"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <!-- Sub total -->
            <div class="mt-6 h-full rounded-lg border bg-white p-6 shadow-md md:mt-0 md:w-1/3">
                <div class="mb-2 flex justify-between">
                    <?php $totalPrice = 0;
                    foreach ($adds as $add) {
                        $totalPrice = $totalPrice + $add->price;
                    }
                    ?>
                    <p class="text-gray-700">Subtotal</p>
                    <p class="text-gray-700">{{ $totalPrice }} $</p>
                </div>+
                <div class="flex justify-between">
                    <p class="text-gray-700">Shipping</p>
                    <p class="text-gray-700">$4.99</p>
                </div>
                <hr class="my-4" />
                <div class="flex justify-between">
                    <p class="text-lg font-bold">Total</p>
                    <div class="">
                        <p class="mb-1 text-lg font-bold">{{ $totalPrice + 4.99 }}</p>
                        <p class="text-sm text-gray-700">including VAT</p>
                    </div>
                </div>
                <button
                    class="mt-6 w-full rounded-md bg-blue-500 py-1.5 font-medium text-blue-50 hover:bg-blue-600">Check
                    out</button>
            </div>
        </div>
    </div>
</body>
