@extends('layouts.guest')
@section('content')

    <form action="{{ route('auth.login') }}" method="POST" class="w-full px-7 py-5 flex items-center flex-col">
        @csrf
        <div class="mb-6 flex flex-row w-full">
            <label for="username" class="w-1/3 text-center align-middle text-sm font-medium text-gray-900 block mb-2 dark:text-gray-300">Tài
                khoản</label>
            <input type="text" id="username" name="username"
                   class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                   required="">
        </div>
        <div class="mb-6 flex flex-row w-full">
            <label for="password" class="w-1/3 text-center align-middle text-sm font-medium text-gray-900 block mb-2 dark:text-gray-300">Mật
                khẩu</label>
            <input type="password" id="password" name="password"
                   class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                   required="">
        </div>

        <button type="submit"
                class="w-3/6 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
            Đăng nhập
        </button>
    </form>

@endsection
