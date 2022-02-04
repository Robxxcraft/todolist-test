@extends('main')

@section('title')
    Register
@endsection
@section('content')
    <div class="bg-blue-500 md:h-screen md:py-8">
    <main class="bg-white max-w-2xl mx-auto px-8 py-auto md:rounded md:shadow-2xl h-screen md:h-full relative">
        <section class="pt-8">
            <header class="mx-8 flex justify-center items-center text-blue-500">
                {{-- <svg version="1.0" xmlns="http://www.w3.org/2000/svg" width="28px" height="28px" viewBox="0 0 655.000000 748.000000" preserveAspectRatio="xMidYMid meet"><g transform="translate(0.000000,748.000000) scale(0.100000,-0.100000)" fill="currentColor" stroke="none"> <path d="M5361 6758 c-253 -381 -671 -1012 -930 -1403 -258 -390 -894 -1351 -1413 -2134 -519 -783 -946 -1429 -950 -1436 -5 -9 90 -77 310 -223 175 -116 323 -212 330 -214 6 -2 176 245 376 547 200 303 466 703 589 890 124 187 413 624 643 970 229 347 481 727 559 845 78 118 261 395 407 615 896 1353 1188 1796 1187 1803 0 5 -399 272 -620 415 l-29 19 -459 -694z"/><path d="M4057 6772 c-8 -9 -48 -69 -89 -132 -41 -63 -362 -547 -713 -1075 -351 -528 -693 -1043 -760 -1145 -67 -102 -395 -597 -730 -1100 -334 -503 -609 -920 -612 -926 -4 -11 793 -547 807 -542 7 3 181 263 1078 1616 704 1061 1070 1611 1449 2182 210 316 384 582 387 590 4 10 -19 32 -77 69 -756 500-725 480 -740 463z"/><path d="M1317 4360 c-532 -798 -967 -1452 -967 -1455 0 -3 155 -108 345 -235 l345 -230 961 1442 c529 793 964 1449 966 1458 2 10 -95 80 -313 225 -174 116 -329 218 -343 227 l-28 18 -966 -1450z"/><path d="M206 2688 c-7 -37 -99 -2659 -93 -2665 6 -5 119 43 1502 641 528 228 961 419 962 423 1 4 -51 44 -115 87 -64 44 -592 404 -1172 801 -580 396 -1060 724 -1067 728 -8 5 -14 0 -17 -15z"/></g></svg> --}}
                <div class="ml-2 text-2xl font-bold  text-center">Register</div>
            </header>
            <p class="text-gray-500 pt-4 text-center">Login to your an account.</p>
        </section>
        <section class="mt-10">
            <form action="/register" method="POST">
                @csrf
                <div class="grid grid-cols-2 gap-8">
                <div>
                    <label class="block text-gray-700 transition duration-500 text-sm font-bold mb-2 ml-3">Username</label>
                    <input type="text" name="username" autocomplete="true" class="bg-gray-100 py-2 mb-2 rounded w-full text-gray-700 focus:outline-none border-2 focus:border-blue-300 transition duration-300 px-3 pb-3">
                    @error('username')
                        <div class="p-1 absolute text-red-500 hover:text-red-600 text-sm italic">{{$message}}</div>
                    @enderror
                </div>
                <div>
                    <label class="block text-gray-700 transition duration-500 text-sm font-bold mb-2 ml-3">Email</label>
                    <input type="email" name="email" class="bg-gray-100 py-2 mb-2 rounded w-full text-gray-700 focus:outline-none border-2 focus:border-blue-300 transition duration-300 px-3 pb-3">
                    @error('email')
                        <div class="p-1 absolute text-red-500 hover:text-red-600 text-sm italic">{{$message}}</div>
                    @enderror   
                </div>
                <div>
                    <label class="block text-gray-700 transition duration-500 text-sm font-bold mb-2 ml-3">Password</label>
                    <input type="password" name="password" class="bg-gray-100 py-2 mb-2 rounded w-full text-gray-700 focus:outline-none border-2 focus:border-blue-300 transition duration-300 px-3 pb-3">
                    @error('password')
                        <div class="p-1 absolute text-red-500 hover:text-red-600 text-sm italic">{{$message}}</div>
                    @enderror   
                </div>
                <div>
                    <label class="block text-gray-700 transition duration-500 text-sm font-bold mb-2 ml-3">Password Confirmation</label>
                    <input type="password" name="password_confirmation" class="bg-gray-100 py-2 mb-2 rounded w-full text-gray-700 focus:outline-none border-2 focus:border-blue-300 transition duration-300 px-3 pb-3">
                    @error('password_confirmation')
                        <div class="p-1 absolute text-red-500 hover:text-red-600 text-sm italic">{{$message}}</div>
                    @enderror   
                </div>
                </div>
                <div class="flex flex-col items-end mt-8">
                    {{-- <router-link to="/forgot" class="text-sm hover:text-green-700 hover:underline mb-6">Forgot your password?</router-link> --}}
                    <button class="bg-blue-500 hover:bg-blue-600 text-white font-bold px-3 py-2 focus:outline-none rounded shadow-lg hover:shadow-xl transition duration-200" type="submit">
                        Register
                    </button>
                </div>
            </form>
        </section>
        <div class="text-center mt-10 mb-6 pt-2">
        <p class="text-gray-500">Already have an account? <a href="/login" class="cursor-pointer font-bold text-blue-500 hover:underline">Login</a>.</p>
    </div>

    <footer class="flex justify-center text-sm space-x-3 text-blue-500">
        <a href="#" class="hover:underline">Contact</a>
        <a href="#" class="hover:underline">Privacy</a>
    </footer>
    </main>
    </div>
@endsection