<x-all.navbar />
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tailwind Starter Template - Nordic Shop: Tailwind Toolbox</title>
    <meta name="description" content="Free open source Tailwind CSS Store template">
    <meta name="keywords"
        content="tailwind,tailwindcss,tailwind css,css,starter template,free template,store template, shop layout, minimal, monochrome, minimalistic, theme, nordic">

    <style>
        .work-sans {
            font-family: 'Work Sans', sans-serif;
        }

        #menu-toggle:checked+#menu {
            display: block;
        }

        .hover\:grow {
            transition: all 0.3s;
            transform: scale(1);
        }

        .hover\:grow:hover {
            transform: scale(1.02);
        }

        .carousel-open:checked+.carousel-item {
            position: static;
            opacity: 100;
        }

        .carousel-item {
            -webkit-transition: opacity 0.6s ease-out;
            transition: opacity 0.6s ease-out;
        }

        #carousel-1:checked~.control-1,
        #carousel-2:checked~.control-2,
        #carousel-3:checked~.control-3 {
            display: block;
        }

        .carousel-indicators {
            list-style: none;
            margin: 0;
            padding: 0;
            position: absolute;
            bottom: 2%;
            left: 0;
            right: 0;
            text-align: center;
            z-index: 10;
        }

        #carousel-1:checked~.control-1~.carousel-indicators li:nth-child(1) .carousel-bullet,
        #carousel-2:checked~.control-2~.carousel-indicators li:nth-child(2) .carousel-bullet,
        #carousel-3:checked~.control-3~.carousel-indicators li:nth-child(3) .carousel-bullet {
            color: #000;
            /*Set to match the Tailwind colour you want the active one to be */
        }
    </style>

</head>

<body class="bg-white text-gray-600 work-sans leading-normal text-base tracking-normal">

                <x-all.alertsuc />
                <x-all.alertdelete />


    <section class="w-full mx-auto bg-nordic-gray-light flex pt-12 md:pt-0 md:items-center bg-cover bg-right"
        style="max-width:1600px; height: 32rem; ">
        <img src="{{ asset('image/home.jpg') }}" class=" w-full h-[600px] mt-2 rounded">

        <div class="container mx-auto">

            <div class="flex flex-col w-full lg:w-1/2 justify-center items-start  px-6 tracking-wide">
                <h1 class="text-black text-2xl my-4">Welcome to Online shopping </h1>
                <a class="text-xl inline-block no-underline border-b border-gray-600 leading-relaxed hover:text-black hover:border-black"
                    href="{{ route('products') }}">products</a>

            </div>

        </div>

    </section>
<section class="w-8/12 mx-auto bg-nordic-gray-light flex pt-12 md:pt-0 md:items-center bg-cover bg-right"
        style="max-width:1600px; height: 32rem; ">

        <div class="container mx-auto">

            <div class="flex flex-col w-full lg:w-1/2 justify-center items-start px-6 tracking-wide">
                <h1 class="text-black text-2xl my-4">Welcome to Online shopping </h1>
                <a class="text-xl inline-block no-underline border-b border-gray-600 leading-relaxed hover:text-black hover:border-black"
                href="{{ route('products') }}">products</a>

            </div>

        </div>
        <img src="{{ asset('image/home.jpg') }}" class=" w-full h-[550px] mt-2 rounded">

    </section>


    <section class="bg-white py-8">

        <div class="container mx-auto flex items-center flex-wrap pt-4 pb-12">

            <nav id="store" class="w-full z-30 top-0 px-6 py-1">
                <div class="w-full container mx-auto flex flex-wrap items-center justify-between mt-0 px-2 py-3">

                    <a class="uppercase tracking-wide no-underline hover:no-underline font-bold text-gray-800 text-xl "
                        href="#">
                        Store
                    </a>

                </div>
            </nav>
            @foreach ($products as $product)
                <div class="w-full md:w-1/3 xl:w-1/4 p-6 flex flex-col border-b">
                    <a href="{{ route('productDetails', ['product_id' => $product->id]) }}">
                        <img class="hover:grow hover:shadow-lg"
                            src="{{ asset('storage/ProductImage/1691261413.jpg') }}">
                    </a>

                        <div class="block items-center w-full  min-w-0">

                            <div class="text-xl text-gray-800 font-semibold mt-1 ">
                                <p class="">{{ $product->title }}</p>
                            </div>
                            <div class=" flex space-x-2">
                                <form action="{{ route('addtofav',['product_id' => $product->id]) }}" method="post">
                                  @csrf
                                  <button type="submit">
                                      <i class="{{ in_array($product->id,$favs)? 'fa-solid':'fa-regular' }} fa-heart text-red-500   text-xl"></i>
                                </button>
                                </form>
                                <form action="{{ route('addtocard',['product_id' => $product->id]) }}" method="post">
                                    @csrf
                                    <button type="submit">
                                        <i class="fa-solid fa-cart-arrow-down text-xl"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                        <div class="flex items-center w-full justify-between min-w-0">

                            <div class="text-xl text-gray-800 font-semibold mt-1">{{ $product->price }} $</div>
                            <div class="text-gray-800">
                                {{ $product->created_at->diffForHumans() }}
                            </div>
                        </div>
                </div>
            @endforeach
        </div>

    </section>

</body>
<x-all.footer/>

</html>
