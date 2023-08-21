<x-app-layout>
    <div class="grid grid-cols-12 mt-1  shadow-lg">
        <x-admin.sidebar />
        <div class="col-span-10 ">
            <div class="grid grid-cols-12">
                <div class="col-span-4 m-3">
                    <form action="{{ route('category.store') }}" method="post">
                        @csrf
                        <div>
                            <x-input-label for="categories" :value="__('Categories')" />
                            <x-text-input id="categories" class="block mt-1 w-full" type="text" name="categories"
                                :value="old('categories')" required autofocus autocomplete="categories" />
                            <x-input-error :messages="$errors->get('categories')" class="mt-2" />
                        </div>
                        <x-primary-button class="mt-4">
                            {{ __('Add') }}
                        </x-primary-button>
                    </form>
                    <x-all.alertsuc />
                    <x-all.alertdelete />

                </div>
                <div class="col-span-8 my-3 mx-6">
                    @if (count($categories) > 0)

                        <div class="overflow-hidden my-3 ">
                            <table class="w-8/12 text-left text-sm font-light mx-auto">
                                <thead class="border-b border-gray-900 font-medium bg-gray-900  text-white ">
                                    <tr>
                                        <th scope="col" class="px-6 py-4">No</th>
                                        <th scope="col" class="px-6 py-4">Categories</th>
                                        <th scope="col" class="px-6 py-4">Delete</th>

                                    </tr>
                                <tbody>
                                    <?php $no = 1; ?>
                                    @foreach ($categories as $cate)
                                        <tr
                                            class="border-b border-gray-900    duration-300 ease-in-out hover:bg-gray-700 hover:text-white transition-all">
                                            <td class="whitespace-nowrap px-6 py-4 font-medium ">{{ $no++ }}
                                            </td>
                                            <td class="whitespace-nowrap px-6 py-4 font-medium ">{{ $cate->categories }}
                                            </td>
                                            <td class="whitespace-nowrap px-6 py-4 font-medium ">
                                                <form
                                                    action="{{ route('category.destroy', ['category' => $cate->id]) }}"
                                                    method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <button>
                                                        <i class="fa-solid fa-trash-can text-red-500"></i>
                                                    </button>
                                                </form>

                                            </td>
                                        <tr>
                                    @endforeach
                                </tbody>
                                </thead>
                            </table>
                            {{ $categories->links() }}
                        </div>
                    @else
                        <x-norecorded>
                            <h1 class="text-center text-red-500 text-2xl">No Categories Found. Create one to get started!</h1>
                        </x-norecorded>
                    @endif
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
