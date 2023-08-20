<x-app-layout>
    <div class="grid grid-cols-12 mt-1  shadow-lg">
        <x-admin.sidebar />

        <div class="col-span-10 ">
            <form action="{{ route('searchToUser') }}" method="post" class="w-6/12 mx-auto">
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
            <h1 class="text-center text-4xl">Users</h1>

            @if (session()->has('result'))

                    <div class="overflow-hidden my-3 ">
                        @if (session()->has('result'))
                            <table class="w-8/12 text-left text-sm font-light mx-auto">
                                <thead class="border-b border-gray-900 font-medium bg-gray-900 text-white">
                                    <tr>
                                        <th scope="col" class="px-6 py-4">No</th>
                                        <th scope="col" class="px-6 py-4">Name</th>
                                        <th scope="col" class="px-6 py-4">Email</th>
                                        <th scope="col" class="px-6 py-4">Phone</th>
                                        <th scope="col" class="px-6 py-4">Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach (session('result') as $user)
                                        <tr
                                            class="border-b border-gray-900 duration-300 ease-in-out hover:bg-gray-700 hover:text-white transition-all">
                                            <td class="whitespace-nowrap px-6 py-4 font-medium">{{ $loop->iteration }}</td>
                                            <td class="whitespace-nowrap px-6 py-4 font-medium">{{ $user->name }}</td>
                                            <td class="whitespace-nowrap px-6 py-4 font-medium">{{ $user->email }}</td>
                                            <td class="whitespace-nowrap px-6 py-4 font-medium">{{ $user->phone }}</td>
                                            <td class="whitespace-nowrap px-6 py-4 font-medium">
                                                <a href="{{ route('deleteUser', ['id' => $user->id]) }}">
                                                    <i class="fa-solid fa-trash-can text-red-500"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @else
                            <x-norecorded>
                                <h1 class="text-center text-red-500 text-2xl">No Result Found...!</h1>
                            </x-norecorded>
                        @endif
                    </div>
                @else
                    <div class="overflow-hidden my-3 ">
                        <table class="w-8/12 text-left text-sm font-light mx-auto">
                            <thead class="border-b border-gray-900 font-medium bg-gray-900  text-white ">
                                <tr>
                                    <th scope="col" class="px-6 py-4">No</th>
                                    <th scope="col" class="px-6 py-4">Name</th>
                                    <th scope="col" class="px-6 py-4">Email</th>
                                    <th scope="col" class="px-6 py-4">Phone</th>
                                    <th scope="col" class="px-6 py-4">Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr
                                        class="border-b border-gray-900    duration-300 ease-in-out hover:bg-gray-700 hover:text-white transition-all">
                                        <td class="whitespace-nowrap px-6 py-4 font-medium ">{{ $loop->iteration }}
                                        </td>
                                        <td class="whitespace-nowrap px-6 py-4 font-medium ">{{ $user->name }}
                                        </td>
                                        <td class="whitespace-nowrap px-6 py-4 font-medium ">{{ $user->email }}
                                        </td>
                                        <td class="whitespace-nowrap px-6 py-4 font-medium ">{{ $user->phone }}
                                        </td>
                                        <td class="whitespace-nowrap px-6 py-4 font-medium "><a
                                                href="{{ route('deleteUser', ['id' => $user->id]) }}">
                                                <i class="fa-solid fa-trash-can text-red-500"></i>
                                            </a>

                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $users->links() }}
                    </div>
                    <hr class=" h-px my-8 bg-gray-800 border-0 dark:bg-gray-700">
                    {{-- -------------------------------------------------------------------------
                Admin Print  --}}
                    <h1 class="text-center text-4xl">Admins</h1>
                    <div class="overflow-hidden my-3 ">
                        <table class="w-8/12 text-left text-sm font-light mx-auto">
                            <thead class="border-b border-gray-900 font-medium bg-gray-900  text-white ">
                                <tr>
                                    <th scope="col" class="px-6 py-4">No</th>
                                    <th scope="col" class="px-6 py-4">Name</th>
                                    <th scope="col" class="px-6 py-4">Email</th>
                                    <th scope="col" class="px-6 py-4">Phone</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($admins as $admin)
                                    <tr
                                        class="border-b border-gray-900    duration-300 ease-in-out hover:bg-gray-700 hover:text-white transition-all">
                                        <td class="whitespace-nowrap px-6 py-4 font-medium ">{{ $loop->iteration }}</td>
                                        <td class="whitespace-nowrap px-6 py-4 font-medium ">{{ $admin->name }}
                                        </td>
                                        <td class="whitespace-nowrap px-6 py-4 font-medium ">{{ $admin->email }}
                                        </td>
                                        <td class="whitespace-nowrap px-6 py-4 font-medium ">{{ $admin->phone }}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $admins->links() }}
                    </div>
                @endif

        </div>
</x-app-layout>
<x-all.alertdelete />
