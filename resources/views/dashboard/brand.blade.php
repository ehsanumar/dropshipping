<x-app-layout>
    <div class="grid grid-cols-12 mt-1  shadow-lg">
        <x-admin.sidebar />
        <div class="col-span-10 ">
            <div class="grid grid-cols-12">
                <div class="col-span-4 m-3">
                    <form action="{{ route('brand.store') }}" method="post">
                        @csrf
                        <div>
                            <x-input-label for="brand" :value="__('Brand')" />
                            <x-text-input id="brand" class="block mt-1 w-full" type="text" name="brand"
                                :value="old('brand')" required autofocus autocomplete="brand" />
                            <x-input-error :messages="$errors->get('brand')" class="mt-2" />
                        </div>
                        <x-primary-button class="mt-4">
                            {{ __('Add') }}
                        </x-primary-button>
                    </form>
                    <x-all.alertsuc />
                    <x-all.alertdelete />

                </div>
                <div class="col-span-8 my-3 mx-6">
                    @if (count($brands) > 0)
                        <div class="overflow-hidden my-3 ">
                            <table class="w-8/12 text-left text-sm font-light mx-auto">
                                <thead class="border-b border-gray-900 font-medium bg-gray-900  text-white ">
                                    <tr>
                                        <th scope="col" class="px-6 py-4">No</th>
                                        <th scope="col" class="px-6 py-4">Brands</th>
                                        <th scope="col" class="px-6 py-4">Delete</th>

                                    </tr>
                                <tbody>
                                    <?php $no = 1; ?>
                                    @foreach ($brands as $brand)
                                        <tr
                                            class="border-b border-gray-900    duration-300 ease-in-out hover:bg-gray-700 hover:text-white transition-all">
                                            <td class="whitespace-nowrap px-6 py-4 font-medium ">{{ $no++ }}
                                            </td>
                                            <td class="whitespace-nowrap px-6 py-4 font-medium ">{{ $brand->brand }}
                                            </td>
                                            <td class="whitespace-nowrap px-6 py-4 font-medium ">
                                                <form action="{{ route('brand.destroy', ['brand' => $brand->id]) }}"
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
                            {{ $brands->links() }}
                        </div>
                    @else
                        <x-norecorded>
                            <h1 class="text-center text-red-500 text-2xl">No Categories Found. Create one to get
                                started!</h1>
                        </x-norecorded>
                    @endif
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
