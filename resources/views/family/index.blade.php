@extends('layouts.master')

@section('header')
    <div class="flex flex-col gap-y-4">
        <div class="flex flex-col gap-y-4">
            <nav class="flex" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-3">
                    <li class="inline-flex items-center">
                        <a href="{{ route('dashboard') }}"
                           class="inline-flex items-center font-medium text-sm text-gray-700 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">
                            <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path>
                            </svg>
                            Trang chủ
                        </a>
                    </li>
                    <li>
                        <div class="flex items-center">
                            <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                      d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                      clip-rule="evenodd"></path>
                            </svg>
                            <span
                                class="ml-1 text-sm  text-gray-700 hover:text-gray-900 md:ml-2 dark:text-gray-400 dark:hover:text-white">Hộ khẩu</span>
                        </div>
                    </li>
                </ol>
            </nav>
        </div>
    </div>
@endsection

@section('content')
    <div class="w-auto overflow-hidden sm:rounded-lg px-10 py-5 bg-gray-100 shadow-lg">

    <div class="w-full flex flex-col">

        <div class="w-full flex flex-row justify-between my-4">
            <div class="justify-self-end flex flex-row">
                <label for="search" class="w-28 self-center">Tìm kiếm</label>
                <input
                    class="shadow appearance-none border rounded-lg w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    id="search" type="text" placeholder="Nguyễn Văn A">
            </div>

            <div class="flex justify-around gap-2">
                <a href="{{ route('families.create') }}">
                    <x-button-default class="bg-green-400 hover:bg-green-500 focus:ring-green-300">
                        Thêm mới
                    </x-button-default>
                </a>


                <a href="{{ route('families.splitView') }}">
                    <x-button-default class="bg-yellow-400 hover:bg-yellow-500 focus:ring-yellow-300">
                        Tách hộ khẩu
                    </x-button-default>
                </a>

                <a>
                    <x-button-default class="bg-red-500 hover:bg-red-600 focus:ring-red-300">
                        Chuyển đi
                    </x-button-default>
                </a>
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
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Mã hộ khẩu
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Họ tên chủ hộ
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Số nhà
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Địa chỉ
                                </th>
                                <th scope="col" class="relative px-6 py-3">

                                </th>
                            </tr>
                            </thead>

                            <tbody class="bg-white divide-y divide-gray-200">
                            @foreach($families as $family)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="text-sm font-medium text-gray-900">
                                                <a href="{{ route('families.show', $family->id) }}"><u>{{ $family->id }}</u></a>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="text-sm font-medium text-gray-900">
                                                {{ $family->owner->name ?? '' }}
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="text-sm font-medium text-gray-900">
                                                {{ $family->house_id }}</u>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        {{ $family->address }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">

                                        <a href="{{ route('families.show', $family->id) }}"
                                           class="text-green-600 hover:text-green-500">
                                            <div class="flex flex-row space-x-2">
                                                <i class="material-icons-outlined text-base">visibility</i>
                                                <span class="pt-0.5">Thông tin chi tiết</span>
                                            </div>

                                        </a>
                                        <a href="{{ route('families.edit', $family->id) }}"
                                           class="text-indigo-600 hover:text-indigo-500">
                                            <div class="flex flex-row space-x-2">
                                                <i class="material-icons-outlined text-base">edit</i>
                                                <span class="pt-0.5">Chỉnh sửa</span>
                                            </div>

                                        </a>

                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <br>
            <div>{{ $families->links() }}</div>
        </div>
    </div>
    </div>
@endsection
