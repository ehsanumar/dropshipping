<x-app-layout>
    <div class="grid grid-cols-12 mt-1  shadow-lg ">

        <div class="col-span-12 ">
            <form action="{{ route('search') }}" method="post" class="w-6/12 mx-auto">
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
            @if (session()->has('result'))
            <div class="overflow-hidden my-3 ">
                    @if (count(session('result')) > 0)
                        <table class="text-left text-sm font-light ">
                            <thead class="border-b border-gray-900 font-medium bg-gray-900  text-white ">
                                <tr>
                                    <th scope="col" class="px-6 py-4">No</th>
                                    <th scope="col" class="px-6 py-4">Title</th>
                                    <th scope="col" class="px-6 py-4">Description</th>
                                    <th scope="col" class="px-6 py-4">Price</th>
                                    <th scope="col" class="px-6 py-4">Quantity</th>
                                    <th scope="col" class="px-6 py-4">Catagory</th>
                                    <th scope="col" class="px-6 py-4">Brand</th>
                                    <th scope="col" class="px-6 py-4">Admin name</th>
                                    <th scope="col" class="px-6 py-4">Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                @foreach (session('result') as $product)
                                    <a href="/">

                                        <tr
                                            class="border-b border-gray-900 cursor-pointer   duration-300 ease-in-out hover:bg-gray-700 hover:text-white transition-all">
                                            <td class="whitespace-nowrap px-6 py-4 font-medium ">{{ $no++ }}
                                            </td>
                                            <td class="whitespace-nowrap px-6 py-4 font-medium ">{{ $product->title }}
                                            </td>
                                            <td class="whitespace-nowrap px-6 py-4 font-medium">
                                                {{ implode(' ', array_slice(str_word_count($product->description, 1), 0, 2)) }}
                                            </td>

                                            </td>
                                            <td class="whitespace-nowrap px-6 py-4 font-medium ">{{ $product->price }} $
                                            </td>
                                            <td class="whitespace-nowrap px-6 py-4 font-medium ">
                                                {{ $product->quantity }}
                                            </td>

                                            <td class="whitespace-nowrap  px-6 py-4 font-medium ">
                                                @foreach ($product->categories as $category)
                                                    <div class="flex-grow">
                                                        {{ $category->categories }}
                                                    </div>
                                                @endforeach
                                            </td>
                                            <td class="whitespace-nowrap  px-6 py-4 font-medium ">
                                                @foreach ($product->brands as $brand)
                                                    <div class="flex-grow">
                                                        {{ $brand->brand }}
                                                    </div>
                                                @endforeach
                                            </td>
                                            <td class="whitespace-nowrap px-6 py-4 font-medium ">
                                                {{ $product->user->name }}
                                            </td>
                                            <td class="whitespace-nowrap px-6 py-4 font-medium "><a
                                                    href="{{ route('deleteUser', ['id' => $product->id]) }}">
                                                    <i class="fa-solid fa-trash-can text-red-500"></i>
                                                </a>

                                            </td>
                                        </tr>
                                    </a>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <x-norecorded>
                            <h1 class="text-center text-red-500 text-2xl">No have any Product yet...!</h1>
                        </x-norecorded>
                    @endif

                </div>

            @else
                <div class="overflow-hidden my-3 ">
                    @if (count($products) > 0)
                        <table class="text-left text-sm font-light ">
                            <thead class="border-b border-gray-900 font-medium bg-gray-900  text-white ">
                                <tr>
                                    <th scope="col" class="px-6 py-4">No</th>
                                    <th scope="col" class="px-6 py-4">Title</th>
                                    <th scope="col" class="px-6 py-4">Description</th>
                                    <th scope="col" class="px-6 py-4">Price</th>
                                    <th scope="col" class="px-6 py-4">Quantity</th>
                                    <th scope="col" class="px-6 py-4">Catagory</th>
                                    <th scope="col" class="px-6 py-4">Brand</th>
                                    <th scope="col" class="px-6 py-4">Admin name</th>
                                    <th scope="col" class="px-6 py-4">Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                @foreach ($products as $product)
                                    <a href="/">

                                        <tr
                                            class="border-b border-gray-900 cursor-pointer   duration-300 ease-in-out hover:bg-gray-700 hover:text-white transition-all">
                                            <td class="whitespace-nowrap px-6 py-4 font-medium ">{{ $no++ }}
                                            </td>
                                            <td class="whitespace-nowrap px-6 py-4 font-medium ">{{ $product->title }}
                                            </td>
                                            <td class="whitespace-nowrap px-6 py-4 font-medium">
                                                {{ implode(' ', array_slice(str_word_count($product->description, 1), 0, 2)) }}
                                            </td>

                                            </td>
                                            <td class="whitespace-nowrap px-6 py-4 font-medium ">{{ $product->price }} $
                                            </td>
                                            <td class="whitespace-nowrap px-6 py-4 font-medium ">
                                                {{ $product->quantity }}
                                            </td>

                                            <td class="whitespace-nowrap  px-6 py-4 font-medium ">
                                                @foreach ($product->categories as $category)
                                                    <div class="flex-grow">
                                                        {{ $category->categories }}
                                                    </div>
                                                @endforeach
                                            </td>
                                            <td class="whitespace-nowrap  px-6 py-4 font-medium ">
                                                @foreach ($product->brands as $brand)
                                                    <div class="flex-grow">
                                                        {{ $brand->brand }}
                                                    </div>
                                                @endforeach
                                            </td>
                                            <td class="whitespace-nowrap px-6 py-4 font-medium ">
                                                {{ $product->user->name }}
                                            </td>
                                            <td class="whitespace-nowrap px-6 py-4 font-medium "><a
                                                    href="{{ route('deleteUser', ['id' => $product->id]) }}">
                                                    <i class="fa-solid fa-trash-can text-red-500"></i>
                                                </a>

                                            </td>
                                        </tr>
                                    </a>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $products->links() }}
                    @else
                        <x-norecorded>
                            <h1 class="text-center text-red-500 text-2xl">No have any Product yet...!</h1>
                        </x-norecorded>
                    @endif

                </div>
            @endif

        </div>
    </div>
    <x-all.alertdelete />
</x-app-layout>
