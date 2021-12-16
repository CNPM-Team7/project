@extends('layouts.master')
@section('header')
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Nhân khẩu') }}
    </h2>
@endsection

@section('content')
    <div class="w-full flex flex-col">

        <div class="w-full flex flex-row justify-between my-4">
            <div class="h-auto justify-self-end flex flex-row self-end">
                <label for="search" class="w-28 self-center">Tìm kiếm</label>
                <input class="shadow appearance-none border rounded w-full h-auto py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="search" type="text" placeholder="Nguyễn Văn A">
            </div>

            <div class="flex flex-row space-x-8">
                <div class="w-44 space-y-2">
                    <button class="w-full border rounded bg-yellow-500 px-4 py-2">
                        Khai báo tạm trú
                    </button>

                    <button class="w-full border rounded bg-blue-500 px-4 py-2">
                        Khai báo tạm vắng
                    </button>
                </div>

                <div class="w-28 space-y-2">
                    <button class="w-full border rounded bg-green-500 px-4 py-2">
                        <a href="{{route('person.create')}}">Thêm mới</a>
                    </button>

                    <button class="w-full border rounded bg-red-500 px-4 py-2">
                        Khai tử
                    </button>
                </div>
            </div>


        </div>

        <hr>

        <div class="flex flex-col my-4">
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-200">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    ID
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Name
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Birthday
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Gender
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Address
                                </th>
                                <th scope="col" class="relative px-6 py-3">
                                    <span class="sr-only">Edit</span>
                                </th>
                            </tr>
                            </thead>

                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach($people as $person)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="text-sm font-medium text-gray-900">
                                                {{ $person->id }}
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="text-sm font-medium text-gray-900">
                                                {{ $person->name }}
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">{{ date('d-m-Y', strtotime($person->birthday)) }}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-{{ $person->sex == 0?'red':'blue'}}-100 text-{{ $person->sex == 0?'red':'blue'}}-800">
                                              {{ $person->sex == 0? 'Male':'Female' }}
                                            </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        {{ $person->register_place }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        <a href="{{ route('person.edit', $person->id) }}" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                                        <form action="{{ route('person.destroy', $person->id) }}" method="POST">
                                            {{ method_field('DELETE') }}
                                            @csrf
                                            <button type="submit" class="text-indigo-600 hover:text-indigo-900">Xóa</a>
                                        </form>
                                    </td>
                                    
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
