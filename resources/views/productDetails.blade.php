<x-all.navbar />
<!-- component -->
<section class="text-gray-300 body-font overflow-hidden bg-gray-700">
    <x-all.alertdelete />
    <x-all.alertsuc />

    <div class="container px-5 py-24 mx-auto">
        <div class="lg:w-4/5 mx-auto flex flex-wrap">
            <img alt="ecommerce" class="lg:w-1/2 w-full  object-cover rounded border border-gray-200"
                src="{{ asset('storage/ProductImage/1691261413.jpg') }}">
            <div class="lg:w-1/2 w-full lg:pl-10 lg:py-6 mt-6 lg:mt-0">
                <?php
                $count = 1; ?>
                @foreach ($details->brands as $brand)
                    @if ($count++ < 2)
                        <h2 class="text-sm title-font text-gray-200 tracking-widest capitalize font-bold">
                            {{ $brand->brand }}</h2>
                    @endif
                @endforeach
                <h1 class="text-gray-100 text-3xl title-font font-medium mb-1">{{ $details->title }}</h1>

                <p class="leading-relaxed">{{ $details->description }}</p>
                <div class="flex mt-6 items-center pb-5 border-b-2 border-gray-200 mb-5">
                    <div class="flex">
                        @foreach ($details->categories as $category)
                            <p class="bg-gray-800 rounded-2xl px-4 py-2 text-sm text-gray-100  ml-2">
                                {{ $category->categories }}
                            </p>
                        @endforeach
                    </div>

                </div>
                <div class="flex justify-between border-b-2 border-gray-200 ">
                    <div class="">

                        <span class="title-font font-medium text-2xl text-gray-100">{{ $details->price }} $</span>
                    </div>
                    <div class="flex mb-7">

                        <form action="{{ route('addtocard', ['product_id' => $details->id]) }}" method="post">
                            @csrf
                            <button
                                class="flex ml-auto text-white bg-red-500 border-0 py-2 px-6 focus:outline-none hover:bg-red-600 rounded">Add
                                To Card</button>
                        </form>
                        <form action="{{ route('addtofav', ['product_id' => $details->id]) }}" method="post">
                            @csrf
                            <button type="submit">
                                <i class="fa-regular fa-heart text-red-500  ml-4 text-4xl"></i>
                            </button>
                        </form>
                        <hr>
                    </div>
                </div>
                <div class="">

                    <form action="{{ route('comment', ['product_id' => $details->id]) }}" method="post"
                        class="max-w-2xl bg-gray-600 shadow-2xl rounded-lg p-2 mx-auto mt-20">
                        @csrf
                        <div class="px-3 mb-2 mt-2 ">
                            <textarea placeholder="comment" name="comment"
                                class="w-full bg-gray-900 rounded placeholder:text-gray-100  leading-normal resize-none h-20 py-2 px-3 font-medium focus:bg-gray-800"></textarea>
                        </div>
                        <div class="flex justify-end px-4">
                            <input type="submit"
                                class="px-2.5 cursor-pointer  transition-all hover:scale-110 py-1.5 rounded-md text-gray-800 text-sm bg-gray-200"
                                value="Comment">
                        </div>
                    </form>
                </div>
            </div>
        </div>
        {{-- comments display --}}
        <div class="grid grid-cols-12  relative mt-4 gap-3">
            @foreach ($comments as $comment)

            <div class="relative col-span-4 gap-4 p-4  mb-8 border rounded-lg bg-white shadow-lg">
                <div class="relative flex  ">

                    <div class="flex flex-col w-full">
                        <div class="flex flex-row justify-between">
                            <p class="relative text-xl whitespace-nowrap text-gray-800 truncate overflow-hidden">{{ $comment->user->name }}</p>
                           @if ($comment->user_id === auth()->id())

                           <a class="text-red-500 text-xl" href="{{ route('destroy.comment' , ['comment_id' => $comment->id ]) }}"><i class="fa-solid fa-trash"></i></a>
                           @endif
                        </div>
                        <p class="text-gray-700 text-sm">{{ $comment->created_at->diffForHumans() }}</p>
                    </div>
                </div>
                <p class="mt-3 text-gray-900 font-bold">{{ $comment->comment }}
                </p>
            </div>
            @endforeach
        </div>
        {{-- end comments --}}
    </div>
</section>
