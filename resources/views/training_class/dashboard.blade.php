<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="{{ asset('tema/assets/tes.css') }}">
    <link rel="stylesheet" href="{{ asset('tema/assets/style.css') }}">
</head>
<body>
<div id="bg-loader" class="h-screen flex">
    <div id="loader" class="m-auto"></div>
    </div>

    <div id="app" class="hidden">
    <div id="popupContainer">
            <div class=" bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md"
                role="alert">
                <div class="flex">
                    <div class="py-1">
                        <svg class="fill-current h-6 w-6 text-teal-500 mr-4" xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 20 20">
                            <path
                                d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z" />
                        </svg>
                    </div>
                    <div>
                        <p class="font-bold">Sorry this class doesn't exist</p>
                        <p class="text-sm">Please choose a class that is available</p>
                    </div>
                </div>
            </div>
        </div>
        {{-- Navbar --}}
        <nav class="bg-dark">
            <div class="mx-auto px-10 xl:px-24 2xl:px-32">
                <div class="w-full flex h-[70px] justify-between items-center ">
                    <a class="items-center flex" href="{{ url('/') }}">
                        <img width="90px" height="90px" src='{{asset("tema/assets/images/Logos.webp")}}' loading="lazy"
                            alt="logo">
                    </a>
                    <h1 class="text-2xl font-semibold text-white uppercase">{{ $user->username }}</h1>

                    <a href="{{ route('logout') }}" class="flex gap-3 items-center" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <path
                                d="M9 4.49999H8C5.643 4.49999 4.464 4.49999 3.732 5.23199C3 5.96399 3 7.14299 3 9.49999V9.99999M9 19.5H8C5.643 19.5 4.464 19.5 3.732 18.768C3 18.035 3 16.857 3 14.5V14M13.658 2.34699C11.496 1.96999 10.415 1.78199 9.708 2.40899C9 3.03599 9 4.18299 9 6.47599V17.524C9 19.817 9 20.964 9.707 21.591C10.414 22.218 11.495 22.03 13.657 21.653L15.987 21.247C18.381 20.829 19.578 20.62 20.289 19.742C21 18.863 21 17.593 21 15.052V8.94799C21 6.40799 21 5.13799 20.29 4.25899C19.814 3.67199 19.122 3.38399 18 3.13299M12 11V13"
                                stroke="white" stroke-width="1.5" stroke-linecap="round" />
                        </svg>
                        <span class="text-white font-normal text-base">Log Out</span>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                @csrf
                            </form>
                    </a>
                </div>
            </div>
        </nav>

        {{-- Menu List --}}
        <div class="w-full gap-5 flex-wrap space-y-5 md:space-y-0 md:inline-flex p-10 2xl:py-44 justify-center items-start">

            {{-- Website --}}
            <a href="{{ ($user->akses_materi1 !== null) ? url('/dashboard/class/ . $user->akses_materi1') : '#'}}" id="card-1" class="items w-full h-80 md:h-60 md:w-80 2xl:h-96 p-5 rounded-2xl hover:shadow-custom flex-col justify-between items-start inline-flex hover:scale-105 duration-300 ease-in-out">
                <h1 class="z-50 self-stretch text-white text-3xl 2xl:text-4xl font-bold">Website</h1>
                <button id="button" class="z-50 w-[170px] justify-between px-7 py-2.5 bg-white rounded-3xl items-center inline-flex">
                    <p class="text-neutral-900 text-base font-bold leading-normal">Start Class</p>
                    <img src="{{ asset('tema/assets/images/arrow.webp')}}" class="w-6 h-6 relative" />
                </button>
            </a>
               
              

            {{-- Desktop Software --}}
            <a href="{{ ($user->akses_materi1 !== null) ? url('/dashboard/class/'  . $user->akses_materi1) : '#'}}" id="card-2" class="items w-full h-80 md:h-60 md:w-80 2xl:h-96 p-5 rounded-2xl hover:shadow-custom flex-col justify-between items-start inline-flex hover:scale-105 duration-300 ease-in-out">
                <h1 class="z-50 self-stretch text-white text-3xl 2xl:text-4xl font-bold ">Desktop Software</h1>
                <button id="button" class="z-50 w-[170px] justify-between px-7 py-2.5 bg-dark rounded-3xl items-center inline-flex">
                    <p class="text-white text-base font-bold leading-normal">Start Class</p>
                    <img src="{{ asset('tema/assets/images/arrow-white.webp')}}" class="w-6 h-6 relative" />
                </button>
            </a>

            {{-- Mobile App --}}
            <a href="{{ ($user->akses_materi3 !== null) ? url('/dashboard/class/'  . $user->akses_materi3) : '#'}}" id="card-3" class="items w-full h-80 md:h-60 md:w-80 2xl:h-96 p-5 rounded-2xl hover:shadow-custom flex-col justify-between items-start inline-flex hover:scale-105 duration-300 ease-in-out">
                <h1 class="z-50 self-stretch text-white text-3xl 2xl:text-4xl font-bold ">Mobile App</h1>
                <button id="button" class="z-50 w-[170px] justify-between px-7 py-2.5 bg-white rounded-3xl items-center inline-flex">
                    <p class="text-neutral-900 text-base font-bold leading-normal">Start Class</p>
                    <img src="{{ asset('tema/assets/images/arrow.webp')}}" class="w-6 h-6 relative" />
                </button>
            </a>

            {{-- A.I Software --}}
            <a href="{{ ($user->akses_materi5 !== null) ? url('/dashboard/class/' . $user->akses_materi5): '#'}}" id="card-4" class="items w-full h-80 md:h-60 md:w-80 2xl:h-96 p-5 rounded-2xl hover:shadow-custom flex-col justify-between items-start inline-flex hover:scale-105 duration-300 ease-in-out">
                <h1 class="z-50 self-stretch text-white text-3xl 2xl:text-4xl font-bold ">A.I Software</h1>
                <button id="button" class="z-50 w-[170px] justify-between px-7 py-2.5 bg-white rounded-3xl items-center inline-flex">
                    <p class="text-neutral-900 text-base font-bold leading-normal">Start Class</p>
                    <img src="{{ asset('tema/assets/images/arrow.webp')}}" class="w-6 h-6 relative" />
                </button>
            </a>

            {{-- UI/UX with Figma --}}
            <a href="{{ ($user->akses_materi4 !== null) ? url('/dashboard/class/' . $user->akses_materi4) : '#'}}" id="card-5" class="items w-full h-80 md:h-60 md:w-80 2xl:h-96 p-5 rounded-2xl hover:shadow-custom flex-col justify-between items-start inline-flex hover:scale-105 duration-300 ease-in-out">
                <h1 class="z-50 self-stretch text-white text-3xl 2xl:text-4xl font-bold ">UI/UX with Figma</h1>
                <button id="button" class="z-50 w-[170px] justify-between px-7 py-2.5 bg-white rounded-3xl items-center inline-flex">
                    <p class="text-neutral-900 text-base font-bold leading-normal">Start Class</p>
                    <img src="{{ asset('tema/assets/images/arrow.webp')}}" class="w-6 h-6 relative" />
                </button>
            </a>

            {{-- Codekidz --}}
            <a href="{{ ($user->akses_materi2 !== null) ?  url('/dashboard/class/'.  $user->akses_materi2) : '#'}}" id="card-6" class="items w-full h-80 md:h-60 md:w-80 2xl:h-96 p-5 rounded-2xl ring-2 hover:ring-0 hover:shadow-custom flex-col justify-between items-start inline-flex hover:scale-105 duration-300 ease-in-out">
                <h1 class="z-50 self-stretch text-[#38B6FF] text-3xl 2xl:text-4xl font-bold ">Codekidz</h1>
                <button id="button" class="z-50 w-[170px] justify-between px-7 py-2.5 bg-neutral-900 rounded-3xl items-center inline-flex">
                    <p class="text-white text-base font-bold leading-normal">Start Class</p>
                    <img src="{{ asset('tema/assets/images/arrow-white.webp')}}" class="w-6 h-6 relative" />
                </button>
            </a>
        </div>
        <script src="{{ asset("tema/assets/home.js") }}"></script>
</body>
</html>