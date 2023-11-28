<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alsav Edutech | Login</title>
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Expires" content="0">
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="{{ asset('tema/assets/style.css') }}">
</head>

<body>
    <div class="w-full sm:bg-none md:bg-none bg-login bg-cover bg-blend-overlay bg-no-repeat bg-center">
        <div class="grid lg:grid-cols-3 backdrop-brightness-50">
            <div
                class="sm:bg-none md:bg-none logo-icon bg-cover bg-center lg:col-span-2 lg:h-screen w-full bg-no-repeat">
            </div>
            <div class="flex h-screen bg-[#FFFFFF] rounded-l-[20px]">
                <div class="m-auto text-center">
                    <div class="mb-[40px]">
                        <h1 class="text-[36px] font-bold mb-[10px]">Welcome back!</h1>
                        <p class="text-sm text-gray-600">Please enter your account</p>
                    </div>
                    <form action="{{ route('authenticate') }}" method="post">
                    @csrf
                    <div class="relative mb-[40px] border-b border-black">
                        <input type="text"
                            class="appearance-none bg-none border-none py-3 focus:outline-none peer w-full placeholder:text-transparent"
                            placeholder="Username" name="username" required />
                        <label for="email"
                            class="absolute left-0 ml-[-4px] -translate-y-3 px-1 text-sm duration-100 ease-linear peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-500 peer-focus:-translate-y-3 peer-focus:px-1 peer-focus:text-sm">Username</label>
                            @if ($errors->has('username'))
                                <p style="position: absolute; color: rgb(228, 46, 46); font-size: 14px; margin-top:5px">{{ $errors->first('username')}}</p>
                            @endif
                        </div>
                    <div data-input-password class="relative mb-[40px] border-b border-black">
                        <input type="password"
                            class="appearance-none bg-none border-none py-3 pr-10 focus:outline-none peer w-full placeholder:text-transparent"
                            placeholder="Password" required name="password" id="password" />
                        <label for="password"
                            class="absolute ml-[-4px] left-0 -translate-y-3 px-1 text-sm duration-100 ease-linear peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-500 peer-focus:-translate-y-3 peer-focus:px-1 peer-focus:text-sm">
                            Password
                        </label>
                        <div class="absolute inset-y-0 right-0 pr-3 flex items-center">
                            <button id="show" type="button" class="text-gray-400 focus:outline-none">
                                <img id="iconShow" src="{{asset("tema/assets/images/show.png")}}" alt="show">
                            </button>
                        </div>
                        @if ($errors->has('password'))
                                <p style="position: absolute; color: rgb(228, 46, 46); font-size: 14px; margin-top:5px">{{ $errors->first('password')}}</p>
                            @endif
                    </div>
                    <button
                        class="w-full bg-neutral-950 hover:bg-neutral-800 text-white font-semibold text-base p-2.5 rounded-full">
                        Login
                    </button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        const passwordInput = document.getElementById("password");
        const showBtn = document.getElementById("show")
        const iconImg = document.getElementById("iconShow")

        showBtn.addEventListener("click", (e) => {
            if (passwordInput.type === "password") {
                passwordInput.type = "text";
                iconImg.src = '{{ asset("tema/assets/images/hide.png")}}';
            } else {
                passwordInput.type = "password";
                iconImg.src = '{{ asset("tema/assets/images/show.png")}}';
            }
        })
    </script>
</body>

</html>
