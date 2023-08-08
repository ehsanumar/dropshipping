   <?php
   use App\Models\AddToCadfav;
   ?>
   <!DOCTYPE html>
   <html lang="en">

   <head>
       <meta charset="UTF-8">
       <meta name="viewport" content="width=\, initial-scale=1.0">
       <meta http-equiv="X-UA-Compatible" content="ie=edge">
       <link rel="icon" href="image/logo.png">
       <title>Document</title>
       @vite('resources/css/app.css')
       <script src="https://kit.fontawesome.com/8ef4a8399d.js" crossorigin="anonymous"></script>
       <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

   </head>

   <body>
       <nav class="relative px-4 py-4 flex justify-between items-center bg-gray-800">
           <a class="text-3xl font-bold leading-none" href="/">
               <i class="fa-solid fa-chess-king text-white text-3xl"></i>

           </a>
           <div class="lg:hidden">
               <button class="navbar-burger flex items-center text-blue-600 p-3">
                   <svg class="block h-4 w-4 fill-current" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                       <title>Mobile menu</title>
                       <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"></path>
                   </svg>
               </button>
           </div>
           <ul
               class="hidden absolute top-1/2 left-1/2 transform -translate-y-1/2 -translate-x-1/2  lg:mx-auto lg:flex lg:items-center lg:w-auto lg:space-x-6">
               <li><a class="text-sm text-gray-400 hover:text-gray-500" href="/">Home</a></li>
               <li class="text-gray-300">
                   <i class="fa-solid fa-ellipsis-vertical"></i>
               </li>
               <li><a class="text-sm text-gray-400 font-bold" href="{{ route('aboutUs') }}">About Us</a></li>
               <li class="text-gray-300">
                   <i class="fa-solid fa-ellipsis-vertical"></i>
               </li>
               <li><a class="text-sm text-gray-400 hover:text-gray-500" href="{{ route('products') }}">Products</a></li>
               <li class="text-gray-300">
                   <i class="fa-solid fa-ellipsis-vertical"></i>
               </li>
               <li><a class="text-sm text-gray-400 hover:text-gray-500" href="#">Pricing</a></li>
               <li class="text-gray-300">
                   <i class="fa-solid fa-ellipsis-vertical"></i>
               </li>
               <li><a class="text-sm text-gray-400 hover:text-gray-500" href="#">Contact</a></li>
               <li class="text-gray-300">
                   <i class="fa-solid fa-ellipsis-vertical"></i>
               </li>
               @auth

                   <li><a class=" text-gray-100 hover:text-red-500 text-xl mr-2" href="{{ route('showfavorite') }}">
                           <i class="fa-solid fa-heart"></i></a>
                   </li>
                   <li>
                       <a class=" text-gray-100 relative   hover:text-yellow-400 text-xl" href="{{ route('showcards') }}">
                           <i class="fa-solid fa-cart-arrow-down fill-current">
                           </i>
                           <span
                               class="absolute right-[-9px] top-[-4px] rounded-full bg-red-600 w-4 h-4 top right p-0 m-0 text-white font-mono text-sm leading-tight text-center">
                               {{ count(AddToCadfav::where('user_id', auth()->id())->Where('status', 1)->get())}}
                           </span>
                       </a>
                   </li>
               @endauth

           </ul>
           @guest

               <a class="hidden lg:inline-block lg:ml-auto lg:mr-3 py-2 px-6 bg-gray-50 hover:bg-gray-100 text-sm text-gray-900 font-bold  rounded-xl transition duration-200"
                   href="{{ route('login') }}">Sign In</a>
               <a class="hidden lg:inline-block py-2 px-6 bg-blue-500 hover:bg-blue-600 text-sm text-white font-bold rounded-xl transition duration-200"
                   href="{{ route('register') }}">Sign up</a>
           @else
               <a class="hidden lg:inline-block lg:ml-auto lg:mr-3 py-2 px-6 bg-gray-50 hover:bg-gray-100 text-sm text-gray-900 font-bold  rounded-xl transition duration-200"
                   href="{{ auth()->user()->role == 1 ? route('dashboard') : route('profile.update') }}">Dashboard</a>
               <form action="{{ route('logout') }}" method="post">
                   @csrf
                   <button type="submit"
                       class="hidden lg:inline-block py-2 px-6 bg-red-500 hover:bg-red-600 text-sm text-white font-bold rounded-xl transition duration-200">Logout</button>
               </form>
           @endguest
       </nav>
       <div class="navbar-menu relative z-50 hidden">
           <div class="navbar-backdrop fixed inset-0 bg-gray-800 opacity-25"></div>
           <nav
               class="fixed top-0 left-0 bottom-0 flex flex-col w-5/6 max-w-sm py-6 px-6 bg-white border-r overflow-y-auto">
               <div class="flex items-center mb-8">
                   <a class="mr-auto text-3xl font-bold leading-none" href="#">
                       <i class="fa-solid fa-chess-king text-white text-3xl"></i>

                   </a>
                   <button class="navbar-close">
                       <svg class="h-6 w-6 text-gray-400 cursor-pointer hover:text-gray-500"
                           xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                           <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                               d="M6 18L18 6M6 6l12 12">
                           </path>
                       </svg>
                   </button>
               </div>
               <div>
                   <ul>
                       <li class="mb-1">
                           <a class="block p-4 text-sm font-semibold text-gray-400 hover:bg-blue-50 hover:text-blue-600 rounded"
                               href="#">Home</a>
                       </li>
                       <li class="mb-1">
                           <a class="block p-4 text-sm font-semibold text-gray-400 hover:bg-blue-50 hover:text-blue-600 rounded"
                               href="#">About Us</a>
                       </li>
                       <li class="mb-1">
                           <a class="block p-4 text-sm font-semibold text-gray-400 hover:bg-blue-50 hover:text-blue-600 rounded"
                               href="#">Services</a>
                       </li>
                       <li class="mb-1">
                           <a class="block p-4 text-sm font-semibold text-gray-400 hover:bg-blue-50 hover:text-blue-600 rounded"
                               href="#">Pricing</a>
                       </li>
                       <li class="mb-1">
                           <a class="block p-4 text-sm font-semibold text-gray-400 hover:bg-blue-50 hover:text-blue-600 rounded"
                               href="#">Contact</a>
                       </li>
                   </ul>
               </div>
               @guest

                   <div class="mt-auto">
                       <div class="pt-6">
                           <a class="block px-4 py-3 mb-3  text-xs text-center font-semibold leading-none bg-gray-50 hover:bg-gray-100 rounded-xl"
                               href="#">Sign in</a>
                           <a class="block px-4 py-3 mb-2 leading-loose text-xs text-center text-white font-semibold bg-blue-600 hover:bg-blue-700  rounded-xl"
                               href="#">Sign Up</a>
                       </div>
                   </div>
               @endguest
           </nav>
       </div>


   </body>

   <script>
       // Burger menus
       document.addEventListener('DOMContentLoaded', function() {
           // open
           const burger = document.querySelectorAll('.navbar-burger');
           const menu = document.querySelectorAll('.navbar-menu');

           if (burger.length && menu.length) {
               for (var i = 0; i < burger.length; i++) {
                   burger[i].addEventListener('click', function() {
                       for (var j = 0; j < menu.length; j++) {
                           menu[j].classList.toggle('hidden');
                       }
                   });
               }
           }

           // close
           const close = document.querySelectorAll('.navbar-close');
           const backdrop = document.querySelectorAll('.navbar-backdrop');

           if (close.length) {
               for (var i = 0; i < close.length; i++) {
                   close[i].addEventListener('click', function() {
                       for (var j = 0; j < menu.length; j++) {
                           menu[j].classList.toggle('hidden');
                       }
                   });
               }
           }

           if (backdrop.length) {
               for (var i = 0; i < backdrop.length; i++) {
                   backdrop[i].addEventListener('click', function() {
                       for (var j = 0; j < menu.length; j++) {
                           menu[j].classList.toggle('hidden');
                       }
                   });
               }
           }
       });
   </script>

   </body>

   </html>
