<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Alsav Edutech | MainPage</title>
    <meta name="description" content="This website for industrial materi">
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Expires" content="0">
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="{{ asset('tema/assets/style.css') }}">
</head>

<body>
    <div id="bg-loader" class="h-screen flex">
        <div id="loader" class="m-auto"></div>
    </div>

    <div id="app" class="hidden">

        <div id="popupContainer">
            <div class="popup bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md"
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

        <nav class="bg-dark">
            <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8">
                <div class="flex h-[70px] justify-between items-center ">
                    <a class="items-center flex" href="{{ url('/') }}">
                        <img width="90px" height="90px" src='{{asset("tema/assets/images/Logos.webp")}}' loading="lazy"
                            alt="logo">
                    </a>
                    <h1 class="text-2xl font-semibold text-white uppercase">Industrial Class</h1>

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

        <div class="mx-auto max-w-7xl my-auto px-2 sm:px-6 lg:px-8">
            <div
                class="flex bg-white flex-wrap flex-shrink-0 py-[104px] gap-[20px] justify-center items-center self-stretch">
                <a href="#" id="item-1" class="items delay-100 w-full hover:scale-110 transition-all duration-100 
                ease-out">
                    <h1 class="font-semibold z-50 text-white text-3xl">Website</h1>
                    <div class="flex z-50 py-[10px] px-[30px] bg-white rounded-[50px]">
                        <span class="font-semibold text-base">Start Class</span>
                        <img id="arrow" src="{{ asset('tema/assets/images/arrow.webp')}}" alt="arrow">
                    </div>
                </a>
                <a href="{{ route('siswa.desktop') }}" id="item-2" class="items delay-100 w-full hover:scale-110 transition-all duration-100 
                ease-out">
                    <h1 class="font-semibold z-50 text-white text-3xl">Desktop Software</h1>
                    <div class="flex z-50 py-[10px] px-[30px] bg-dark rounded-[50px]">
                        <span class="font-semibold text-white text-base">Start Class</span>
                        <img id="arrow" src="{{ asset('tema/assets/images/arrow-white.webp')}}" alt="arrow">
                    </div>
                </a>
                <a href="#" id="item-3" class="items delay-100 w-full hover:scale-110 transition-all duration-100 
                ease-out">
                    <h1 class="font-semibold z-50 text-white text-3xl">Mobile App</h1>
                    <div class="flex z-50 py-[10px] px-[30px] bg-white rounded-[50px]">
                        <span class="font-semibold text-base">Start Class</span>
                        <img id="arrow" src="{{ asset('tema/assets/images/arrow.webp')}}" alt="arrow">
                    </div>
                </a>
                <a href="#" id="item-4" class="items delay-100 w-full hover:scale-110 transition-all duration-100 
                ease-out">
                    <h1 class="font-semibold z-50 text-white text-3xl">A.I Software</h1>
                    <div class="flex z-50 py-[10px] px-[30px] bg-white rounded-[50px]">
                        <span class="font-semibold text-base">Start Class</span>
                        <img id="arrow" src="{{ asset('tema/assets/images/arrow.webp')}}" alt="arrow">
                    </div>
                </a>
            </div>
        </div>

    </div>

    <script src="{{ asset("tema/assets/home.js") }}"></script>
</body>

</html>