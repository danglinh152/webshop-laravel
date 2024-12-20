<!doctype html>
<html :class="{ 'theme-dark': dark }" x-data="data()" lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>10PM Dashboard</title>
    <link rel="icon" type="image/png" href="{{ asset('public/frontend/client/img/favicon.png') }}">

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="{{ asset('public/frontend/admin/css/tailwind.output.css') }}" />
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <script src="{{ asset('public/frontend/admin/js/init-alpine.js') }}"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js" defer></script>
    <script src="{{ asset('public/frontend/admin/js/charts-lines.js') }}" defer></script>
    <script src="{{ asset('public/frontend/admin/js/add-products.js') }}" defer></script>
    <script src="{{ asset('public/frontend/admin/js/charts-pie.js') }}" defer></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>

<body>
    <div class="flex h-screen bg-gray-50" :class="{ 'overflow-hidden': isSideMenuOpen }">
        <!-- Desktop sidebar -->
        <aside class="z-20 hidden w-64 overflow-y-auto bg-white  md:block flex-shrink-0">
            <div class="py-1 px-1 text-gray-500 flex flex-col h-full justify-between">
                <div class="mb-6">

                    <a href="{{ URL::to('admin/dashboard') }}">
                        <img style="width: 80%; height: 55px; object-fit: cover; border-radius: 10px;"
                            src="{{ asset('public/frontend/admin/img/logo.png') }}" alt="">
                    </a>
                    <ul class="mt-6">
                        <li class="relative px-6 py-3 sidebar-item">
                            <span
                                class="absolute inset-y-0 left-0 w-1 bg-blue-600 rounded-tr-lg rounded-br-lg dashboard-active hidden"
                                aria-hidden="true"></span>
                            <a class="inline-flex items-center w-full text-sm font-semibold dashboard-text transition-colors duration-150 hover:text-gray-800"
                                href="{{ URL::to('admin/dashboard') }}">
                                <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round"
                                    stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                                    <path
                                        d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                                    </path>
                                </svg>
                                <span class="ml-4 text-base">Dashboard</span>
                            </a>
                        </li>
                    </ul>
                    <ul class="mt-2">
                        <li class="relative px-6 py-3 sidebar-item">
                            <span
                                class="absolute inset-y-0 left-0 w-1 bg-blue-600 rounded-tr-lg rounded-br-lg store-active hidden"
                                aria-hidden="true"></span>
                            <button
                                class="inline-flex items-center justify-between w-full text-sm font-semibold store-text transition-colors duration-150 hover:text-gray-800"
                                @click="toggleStoreMenu" aria-haspopup="true">
                                <span class="inline-flex items-center">
                                    <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round"
                                        stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24"
                                        stroke="currentColor">
                                        <path
                                            d="M4 5a1 1 0 011-1h14a1 1 0 011 1v2a1 1 0 01-1 1H5a1 1 0 01-1-1V5zM4 13a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H5a1 1 0 01-1-1v-6zM16 13a1 1 0 011-1h2a1 1 0 011 1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-6z">
                                        </path>
                                    </svg>
                                    <span class="ml-4 text-base">Store</span>
                                </span>
                                <svg class="w-4 h-4" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </button>
                            <template x-if="isStoreMenuOpen">
                                <ul x-transition:enter="transition-all ease-in-out duration-300"
                                    x-transition:enter-start="opacity-25 max-h-0"
                                    x-transition:enter-end="opacity-100 max-h-xl"
                                    x-transition:leave="transition-all ease-in-out duration-300"
                                    x-transition:leave-start="opacity-100 max-h-xl"
                                    x-transition:leave-end="opacity-0 max-h-0"
                                    class="p-2 mt-2 space-y-2 overflow-hidden text-sm font-medium text-gray-500 rounded-md shadow-inner bg-gray-50"
                                    aria-label="submenu">
                                    <li
                                        class="px-2 py-1 product-text transition-colors duration-150 hover:text-gray-800">
                                        <a class="w-full text-base" href="{{ URL::to('admin/product') }}">
                                            Product
                                        </a>
                                    </li>
                                    <li
                                        class="px-2 py-1 voucher-text transition-colors duration-150 hover:text-gray-800">
                                        <a class="w-full text-base" href="{{ URL::to('admin/voucher') }}">
                                            Voucher
                                        </a>
                                    </li>
                                </ul>
                            </template>
                        </li>
                    </ul>
                    <ul class="mt-2">
                        <li class="relative px-6 py-3 sidebar-item">
                            <span
                                class="absolute inset-y-0 left-0 w-1 bg-blue-600 rounded-tr-lg rounded-br-lg management-active hidden"
                                aria-hidden="true"></span>
                            <button
                                class="inline-flex items-center justify-between w-full text-sm font-semibold management-text transition-colors duration-150 hover:text-gray-800"
                                @click="toggleManagementMenu" aria-haspopup="true">
                                <span class="inline-flex items-center">
                                    <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round"
                                        stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24"
                                        stroke="currentColor">
                                        <path
                                            d="M4 5a1 1 0 011-1h14a1 1 0 011 1v2a1 1 0 01-1 1H5a1 1 0 01-1-1V5zM4 13a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H5a1 1 0 01-1-1v-6zM16 13a1 1 0 011-1h2a1 1 0 011 1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-6z">
                                        </path>
                                    </svg>
                                    <span class="ml-4 text-base">Management</span>
                                </span>
                                <svg class="w-4 h-4" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </button>
                            <template x-if="isManagementMenuOpen">

                                <ul x-transition:enter="transition-all ease-in-out duration-300"
                                    x-transition:enter-start="opacity-25 max-h-0"
                                    x-transition:enter-end="opacity-100 max-h-xl"
                                    x-transition:leave="transition-all ease-in-out duration-300"
                                    x-transition:leave-start="opacity-100 max-h-xl"
                                    x-transition:leave-end="opacity-0 max-h-0"
                                    class="p-2 mt-2 space-y-2 overflow-hidden text-sm font-medium text-gray-500 rounded-md shadow-inner bg-gray-50"
                                    aria-label="submenu">
                                    <li class="px-2 py-1 transition-colors duration-150 hover:text-gray-800">
                                        <a class="w-full text-base user-text" href="{{ URL::to('admin/user') }}">
                                            User
                                        </a>
                                    </li>
                                    <li
                                        class="px-2 py-1 order-text transition-colors duration-150 hover:text-gray-800">
                                        <a class="w-full text-base" href="{{ URL::to('admin/order') }}">
                                            Order
                                        </a>
                                    </li>
                                </ul>
                            </template>
                        </li>
                    </ul>
                </div>

                <div class="px-6 mb-3">
                    <a href="{{ URL::to('/logout') }}"
                        class="flex items-center justify-between w-full px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-slate-800 border border-transparent rounded-lg active:bg-slate-900 hover:bg-slate-900 focus:outline-none focus:shadow-outline-purple">
                        Đăng xuất
                        <svg class="w-4 h-4 mr-3" aria-hidden="true" fill="none" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                            <path
                                d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1">
                            </path>
                        </svg>
                    </a>
                </div>
            </div>
        </aside>

        <!-- Backdrop -->
        <div class="flex flex-col flex-1 w-full">
            <header class="z-10 py-4 bg-white shadow-md">
                <div class="container flex items-center justify-end h-full px-6 mx-auto text-purple-600">

                    <ul class="flex items-center space-x-6 ">
                        <!-- Theme toggler -->
                        <!-- <li class="flex ">
              <button class="rounded-md focus:outline-none focus:shadow-outline-purple" @click="toggleTheme"
                aria-label="Toggle color mode">
                <template x-if="!dark">
                  <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path>
                  </svg>
                </template>
                <template x-if="dark">
                  <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd"
                      d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z"
                      clip-rule="evenodd"></path>
                  </svg>
                </template>
              </button>
            </li> -->
                        <!-- Profile menu -->
                        <?php
                        $admin_name = session('admin_name');
                        $avatar = session('image');
                        ?>
                        <div class="profile-block flex items-center gap-2">
                            <p class="text-black font-bold"> Welcome back, <?php if ($admin_name) {
                                                                                echo $admin_name;
                                                                            } ?> </p>
                            <li class="relative">
                                <button
                                    class="align-middle rounded-full focus:shadow-outline-purple focus:outline-none"
                                    @click="toggleProfileMenu" @keydown.escape="closeProfileMenu"
                                    aria-label="Account" aria-haspopup="true">


                                    @if ($avatar)
                                    <img class="object-cover w-8 h-8 rounded-full" src="{{ $avatar }}"
                                        alt="" aria-hidden="true" />
                                    @else
                                    <img class="object-cover w-8 h-8 rounded-full"
                                        src="https://images.unsplash.com/photo-1502378735452-bc7d86632805?ixlib=rb-0.3.5&q=80&fm=jpg&crop=entropy&cs=tinysrgb&w=200&fit=max&s=aa3a807e1bbdfd4364d1f449eaa96d82"
                                        alt="" aria-hidden="true" />
                                    @endif



                                </button>


                                <template x-if="isProfileMenuOpen">
                                    <ul x-transition:leave="transition ease-in duration-150"
                                        x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
                                        @click.away="closeProfileMenu" @keydown.escape="closeProfileMenu"
                                        class="absolute right-0 w-56 p-2 mt-2 space-y-2 text-gray-600 bg-white border border-gray-100 rounded-md shadow-md"
                                        aria-label="submenu">
                                        <li class="flex">
                                            <a class="inline-flex items-center w-full px-2 py-1 text-sm font-semibold transition-colors duration-150 rounded-md hover:bg-gray-100 hover:text-gray-800"
                                                href="#">
                                                <svg class="w-4 h-4 mr-3" aria-hidden="true" fill="none"
                                                    stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    viewBox="0 0 24 24" stroke="currentColor">
                                                    <path
                                                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z">
                                                    </path>
                                                </svg>
                                                <span>Profile</span>
                                            </a>
                                        </li>
                                        <li class="flex">
                                            <a class="inline-flex items-center w-full px-2 py-1 text-sm font-semibold transition-colors duration-150 rounded-md hover:bg-gray-100 hover:text-gray-800"
                                                href="#">
                                                <svg class="w-4 h-4 mr-3" aria-hidden="true" fill="none"
                                                    stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    viewBox="0 0 24 24" stroke="currentColor">
                                                    <path
                                                        d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z">
                                                    </path>
                                                    <path d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                </svg>
                                                <span>Settings</span>
                                            </a>
                                        </li>
                                        <li class="flex">
                                            <a class="inline-flex items-center w-full px-2 py-1 text-sm font-semibold transition-colors duration-150 rounded-md hover:bg-gray-100 hover:text-gray-800"
                                                href="{{ URL::to('/login') }}">
                                                <svg class="w-4 h-4 mr-3" aria-hidden="true" fill="none"
                                                    stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    viewBox="0 0 24 24" stroke="currentColor">
                                                    <path
                                                        d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1">
                                                    </path>
                                                </svg>
                                                <span>Log out</span>
                                            </a>
                                        </li>
                                    </ul>
                                </template>
                            </li>
                        </div>
                    </ul>
                </div>
            </header>
            @yield('dashboard-main')
            @yield('show-product')
            @yield('add-product')
            @yield('view-product')
            @yield('update-product')
            @yield('show-voucher')
            @yield('add-voucher')
            @yield('update-voucher')
            @yield('show-user')
            @yield('add-user')
            @yield('update-user')
            @yield('show-order')
            @yield('update-order')
        </div>
    </div>
    <script src="{{ asset('public/frontend/admin/js/add-products.js') }}"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const currentRoute = window.location.pathname;
            const userRoute = "webshop-laravel/admin/user"
            const orderRoute = "webshop-laravel/admin/order"
            const productRoute = "webshop-laravel/admin/product"
            const voucherRoute = "webshop-laravel/admin/voucher"
            const dashboardRoute = "webshop-laravel/admin/dashboard"
            if (
                currentRoute.includes(userRoute) ||
                currentRoute.includes(orderRoute)
            ) {
                const sidebarMenu = document.querySelectorAll("[x-data]");
                sidebarMenu.forEach((menu) => {
                    if (menu.__x && menu.__x.$data)
                        menu.__x.$data.isManagementMenuOpen = true;
                })
                const activeNode = document.querySelector(".management-active");
                const activeText = document.querySelector(".management-text");

                activeNode.classList.remove("hidden");
                activeText.classList.add('text-gray-800');
                setTimeout(() => {
                    if (currentRoute.includes(userRoute)) {
                        const userText = document.querySelector('.user-text');

                        console.log(userText);
                        userText.classList.add('text-gray-800');
                    }
                    if (currentRoute.includes(orderRoute)) {
                        const orderText = document.querySelector('.order-text')
                        console.log(orderText);
                        orderText.classList.add('text-gray-800');
                    }
                }, 500);
            } else if (
                currentRoute.includes(productRoute) ||
                currentRoute.includes(voucherRoute)
            ) {
                const sidebarMenu = document.querySelectorAll("[x-data]");
                sidebarMenu.forEach((menu) => {
                    if (menu.__x && menu.__x.$data)
                        menu.__x.$data.isStoreMenuOpen = true;
                })
                const activeNode = document.querySelector(".store-active");
                const activeText = document.querySelector(".store-text");
                activeNode.classList.remove("hidden");
                activeNode.classList.add('text-gray-800');
                setTimeout(() => {
                    if (currentRoute.includes(productRoute)) {
                        const productText = document.querySelector('.product-text');
                        console.log(productText);
                        productText.classList.add('text-gray-800');
                    }
                    if (currentRoute.includes(voucherRoute)) {
                        const voucherText = document.querySelector('.voucher-text')
                        console.log(voucherText);
                        voucherText.classList.add('text-gray-800');
                    }
                }, 500);

            } else if (currentRoute.includes(dashboardRoute)) {
                const activeNode = document.querySelector(".dashboard-active");
                const activeText = document.querySelector(".dashboard-text");
                if (activeNode) {
                    activeNode.classList.remove("hidden");
                    activeText.classList.add('text-gray-800')
                }
            }

            //onClick
            const allSideMenu = document.querySelectorAll(".sidebar-item");
            allSideMenu.forEach((item) => {
                const childActive = item.children[0];

                item.addEventListener("click", function() {
                    allSideMenu.forEach((i) => {
                        i.children[0].classList.add("hidden");
                        console.log(i.children[0]);
                    });
                    childActive.classList.remove("hidden");
                });
            });
        });
    </script>
</body>

</html>