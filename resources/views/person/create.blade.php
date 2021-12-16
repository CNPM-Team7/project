@extends('layouts.master')
@section('header')
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Thêm mới nhân khẩu') }}
    </h2>
@endsection

@section('content')
    <form action="{{ route('person.store') }}" method="POST">
        @csrf

        <label for="name">Họ và tên</label>
        <input name="name" type="text" placeholder="Nguyễn Văn A" class="shadow appearance-none border rounded w-1/3 my-2 h-auto py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        <br>
        <label for="birthday">Ngày sinh</label>
        <input name="birthday" type="date" class="shadow appearance-none border rounded w-1/3 my-2 h-auto py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        <br>
        <label for="birth_place">Quê quán</label>
        <input name="birth_place" type="text" placeholder="Văn Quán, Hà Đông, Hà Nội" class="shadow appearance-none border rounded w-1/3 my-2 h-auto py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        <br>
        <label for="sex">Giới tính</label>
        <select name="sex" id="">
            <option value="0" class="shadow appearance-none border rounded w-1/3 my-2 h-auto py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">Nam</option>
            
        </select>
        <input name="name" type="text" placeholder="Nguyễn Văn A" class="shadow appearance-none border rounded w-1/3 my-2 h-auto py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        <br>
        <label for="name">Họ và tên</label>
        <input name="name" type="text" placeholder="Nguyễn Văn A" class="shadow appearance-none border rounded w-1/3 my-2 h-auto py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        <br>
        <label for="name">Họ và tên</label>
        <input name="name" type="text" placeholder="Nguyễn Văn A" class="shadow appearance-none border rounded w-1/3 my-2 h-auto py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        <br>
        <label for="name">Họ và tên</label>
        <input name="name" type="text" placeholder="Nguyễn Văn A" class="shadow appearance-none border rounded w-1/3 my-2 h-auto py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        <br>
        <label for="name">Họ và tên</label>
        <input name="name" type="text" placeholder="Nguyễn Văn A" class="shadow appearance-none border rounded w-1/3 my-2 h-auto py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        <br>
        <label for="name">Họ và tên</label>
        <input name="name" type="text" placeholder="Nguyễn Văn A" class="shadow appearance-none border rounded w-1/3 my-2 h-auto py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        <br>
        <label for="name">Họ và tên</label>
        <input name="name" type="text" placeholder="Nguyễn Văn A" class="shadow appearance-none border rounded w-1/3 my-2 h-auto py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        <br>
        <label for="name">Họ và tên</label>
        <input name="name" type="text" placeholder="Nguyễn Văn A" class="shadow appearance-none border rounded w-1/3 my-2 h-auto py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        <br>
        <label for="name">Họ và tên</label>
        <input name="name" type="text" placeholder="Nguyễn Văn A" class="shadow appearance-none border rounded w-1/3 my-2 h-auto py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        <br>

        <button class="border rounded bg-green-500 px-4 py-2">Hoàn thành</button>
    </form>
@endsection
