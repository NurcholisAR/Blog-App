<nav class=" bg-slate-300 border-gray-200 px-5 py-5 dark:bg-gray-800 shadow-md fixed inset-x-0 top-0 z-10"
    role="navigation" id="navbar">
    <div class="container flex flex-wrap justify-between content-center items-center mx-auto">
        <a href="/" class="flex">
            <span class="self-center text-lg whitespace-nowrap text-black dark:text-white" id="logo">Logo</span>
        </a>
        {{-- button mobile --}}
        <button type="button" id="BAR_BTN"
            class="inline-flex items-center p-2 ml-3 text-sm text-black rounded-lg md:hidden hover:bg-slate-500 focus:outline-none  dark:text-gray-400 dark:hover:bg-gray-700 transition-all ease-out duration-500 md:transition-none"
            aria-controls="mobileMenu" aria-expanded="false">
            <span class="sr-only">Open main menu</span>
            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                    d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z">
                </path>
            </svg>
            <svg class="hidden w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                    clip-rule="evenodd"></path>
            </svg>
        </button>
        {{-- end btn mobile --}}
        <div class="hidden w-full md:block md:w-auto" id="mobileMenu">
            <ul class="flex flex-col mt-4 md:flex-row md:space-x-8 md:mt-0 md:text-sm md:font-medium md:place-items-center transition duration-150 ease-in-out origin-top-left"
                id="item-nav">
                <li>
                    <a href="/"
                        class="block py-2 pr-4 pl-3 text-black border-b border-gray-100 md:border-0 hover:bg-gray-50 md:hover:bg-transparent md:bg-transparent md:p-0 dark:text-white md:dark:hover:text-white dark:hover:bg-gray-700 md:dark:hover:bg-transparent dark:border-gray-700 {{ (Request::is('/*') ? 'active' : Request::is('posts*')) ? 'active' : '' }}"
                        aria-current="page">Home</a>
                </li>
                <li>
                    <a href="/categories"
                        class="block py-2 pr-4 pl-3 text-black border-b border-gray-100 hover:bg-gray-50 md:hover:bg-transparent md:border-0 md:p-0 dark:text-white md:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700 {{ Request::is('categories*') ? 'active' : '' }}">Category</a>
                </li>
                <li>
                    <a href="#"
                        class="block py-2 pr-4 pl-3 text-black border-b border-gray-100 hover:bg-gray-50 md:hover:bg-transparent md:border-0 md:p-0 dark:text-white md:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Services</a>
                </li>

                <li>
                    <button id="theme-toggle" type="button"
                        class="text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 focus:outline-none  rounded-full text-sm py-2 mt-5 md:mt-0 pr-4 w-full bg-slate-300 md:bg-transparent justify-center">
                        <svg id="theme-toggle-dark-icon" class="hidden w-5 h-5 mx-auto md:translate-x-2"
                            fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path>
                        </svg>
                        <svg id="theme-toggle-light-icon" class="hidden w-5 h-5  mx-auto md:translate-x-2"
                            fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z"
                                fill-rule="evenodd" clip-rule="evenodd"></path>
                        </svg>
                    </button>
                </li>
                <li>
                    <button id="login" data-dropdown-toggle="user-dropdown"
                        class="w-full outline-none focus:outline-none inline-flex items-center text-sm rounded-full text-violet-50 bg-sky-400 py-2 pr-4 mt-5 md:mt-0 ">
                        <svg class="w-5 h-5 mx-auto md:translate-x-2" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24 " xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                    </button>

                    <!-- Dropdown menu -->
                    <div id="user-dropdown"
                        class="hidden z-10 md:w-44 w-full text-base list-none border bg-white rounded divide-y divide-gray-100 shadow-xl dark:bg-gray-700 ">
                        @auth
                            <div class="py-3 px-4 text-gray-900 dark:text-white">
                                <span class="block text-sm">Wellcome back</span>
                                <span class="block text-sm font-medium truncat">{{ auth()->user()->name }}</span>
                            </div>
                            <ul class="py-1" aria-labelledby="dropdownButton">
                                <li>
                                    <a href="/dashboard"
                                        class="flex py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">
                                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                                            </path>
                                        </svg> My Dasboard
                                    </a>
                                </li>
                                <li>
                                    <form action="/logout" method="POST">
                                        @csrf
                                        <button
                                            class="flex py-2 w-full px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">
                                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1">
                                                </path>
                                            </svg> Sign out
                                        </button>
                                    </form>
                                </li>
                            </ul>
                        @endauth
                        @auth
                        @else
                            <ul class="py-1" aria-labelledby="dropdownButton">
                                <li>
                                    <a href="/signin"
                                        class="flex py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">
                                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1">
                                            </path>
                                        </svg>Sign in
                                    </a>
                                </li>
                            </ul>
                        @endauth
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>
