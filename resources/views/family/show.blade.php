@extends('layouts.master')
@section('header')
    <div class="flex flex-col gap-y-4">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Chi tiết hộ khẩu') }}
        </h2>
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
                        <a href="{{ route('families.index') }}"
                           class="inline-flex items-center font-medium text-sm text-gray-700 hover:text-gray-900">Hộ khẩu</a>
                    </div>
                </li>
                <li aria-current="page">
                    <div class="flex items-center">
                        <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20"
                             xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                  d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                  clip-rule="evenodd"></path>
                        </svg>
                        <span
                            class="inline-flex items-center font-medium text-sm text-gray-400">Chi tiết hộ khẩu</span>
                    </div>
                </li>
            </ol>
        </nav>
    </div>
@endsection

@section('content')
    <div class="w-auto overflow-hidden sm:rounded-lg px-10 py-5 bg-gray-100 shadow-lg">

        <div x-data="{ show: false }" class="w-full select-none flex flex-row justify-end space-x-4 mb-4">
            <a href="{{ route('families.edit', $family->id) }}">
                <button class="w-44 border rounded bg-yellow-500 px-4 py-2">
                    Chỉnh sửa
                </button>
            </a>

            <button @click="show = true" type="button" class="w-44 border rounded bg-red-500 px-4 py-2">Xóa hộ khẩu</button>

            {{--Modal--}}
            <div x-show="show"
                 @keydown.esc.prevent.stop="show = false"
                 class="fixed z-10 inset-0 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">


                <div x-show="show" class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">

                    <div x-show="show"
                         @click="show = false"
                         class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>

                    <!-- This element is to trick the browser into centering the modal contents. -->
                    <span x-show="show" class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

                    <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                        <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                            <div class="sm:flex sm:items-start">
                                <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                                    <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">
                                        XÓA HỘ KHẨU
                                    </h3>
                                    <div class="mt-2">
                                        <p class="text-sm text-gray-500">
                                            Chắc chắn muốn xóa hộ khẩu này? Hành động này không thể hoàn tác.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">

                            <form method="POST"
                                  action="{{ route('families.destroy', $family->id) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-red-600 text-base font-medium text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:ml-3 sm:w-auto sm:text-sm">
                                    Xóa
                                </button>
                            </form>

                            <button @click="show = false" type="button" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                                Hủy
                            </button>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="w-auto flex flex-row items-center gap-x-2 pt-5">
            <div class="flex w-full items-center justify-between">
                <span>Mã hộ khẩu</span>
                <p>{{ $family->house_id }}</p>
            </div>
        </div>

        <div class="w-auto flex flex-row items-center gap-x-2 pt-5">
            <div class="flex w-full items-center justify-between">
                <span>Địa chỉ</span>
                <p>{{ $family->address }}</p>
            </div>
        </div>

        <div class="w-auto flex flex-row items-center gap-x-2 pt-5">
            <div class="flex w-full items-center justify-between">
                <span>Chủ hộ</span>
                <p><a href="{{ route('person.show', $family->owner_id) }}"><u>{{ $family->owner->name ?? '' }}</u></a></p>
            </div>
        </div>

        <div class="w-auto flex flex-row items-center gap-x-2 pt-5">
            <div class="flex w-full items-center justify-between">
                <span>Thành viên</span>
            </div>
        </div>

        @php
            $genderColors = ['blue', 'red', 'green']
        @endphp
        <table class="min-w-full divide-y divide-gray-200 mt-4">
            <thead class="bg-gray-200">
            <tr>
                <th scope="col"
                    class="px-6 py-3 text-left text-xs font-medium text-gray-900 uppercase tracking-wider">
                    ID nhân khẩu
                </th>
                <th scope="col"
                    class="px-6 py-3 text-left text-xs font-medium text-gray-900 uppercase tracking-wider">
                    Họ tên
                </th>
                <th scope="col"
                    class="px-6 py-3 text-left text-xs font-medium text-gray-900 uppercase tracking-wider">
                    Số CMND/CCCD
                </th>
                <th scope="col"
                    class="px-6 py-3 text-left text-xs font-medium text-gray-900 uppercase tracking-wider">
                    Ngày sinh
                </th>
                <th scope="col"
                    class="px-6 py-3 text-left text-xs font-medium text-gray-900 uppercase tracking-wider">
                    Giới tính
                </th>
                <th scope="col"
                    class="px-6 py-3 text-left text-xs font-medium text-gray-900 uppercase tracking-wider">
                    Trạng thái
                </th>
                <th scope="col"
                    class="px-6 py-3 text-left text-xs font-medium text-gray-900 uppercase tracking-wider">
                    Quan hệ với chủ hộ
                </th>
                <th scope="col" class="relative px-6 py-3">
                    <span class="sr-only"></span>
                </th>
            </tr>
            </thead>

            <tbody class="bg-white divide-y divide-gray-200">

            @foreach ($family->members as $person)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div
                            class="text-sm text-gray-500">{{ $person->id }}</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap select-text">
                        <div class="flex items-center">
                        <span class="text-sm font-medium text-gray-900">
                            <a href="{{ route('person.show', $person->id) }}"><u>{{ $person->name }}</u></a>
                        </span>
                        </div>
                    </td>
                    <td data-tooltip-target="tooltip-id_number {{ $person->id_number }}"
                        class="px-6 py-4 whitespace-nowrap select-text">
                        <div class="flex items-center">
                            <span class="text-sm font-medium text-gray-500">
                                {{ $person->id_number }}
                            </span>
                        </div>
                    </td>
                    <div id="tooltip-id_number {{ $person->id_number }}" role="tooltip"
                         class="tooltip absolute z-10 inline-block bg-gray-900 font-medium shadow-sm text-white py-2 px-3 text-sm rounded-lg opacity-0 duration-300 transition-opacity invisible dark:bg-gray-700">
                        <div class="flex flex-col">
                            <span>
                                Ngày đăng ký: <u>{{ date('d/m/Y', strtotime($person->register_date)) }}</u>
                            </span>
                            <span>
                                Nơi đăng ký: <u>{{ $person->register_place }}</u>
                            </span>
                            <span>
                                Ngày nhận: <u>{{ date('d/m/Y', strtotime($person->idn_receive_date)) }}</u>
                            </span>
                            <span>
                                Nơi nhận: <u>{{ $person->idn_receive_place }}</u>
                            </span>
                        </div>
                        <div class="tooltip-arrow" data-popper-arrow></div>
                    </div>


                    <td data-tooltip-target="tooltip-birthday {{ $person->id_number }}"
                        class="px-6 py-4 whitespace-nowrap">
                        <div
                            class="text-sm text-gray-500">{{ date('d/m/Y', strtotime($person->birthday)) }}</div>
                    </td>
                    <div id="tooltip-birthday {{ $person->id_number }}" role="tooltip"
                         class="tooltip absolute z-10 inline-block bg-gray-900 font-medium shadow-sm text-white py-2 px-3 text-sm rounded-lg opacity-0 duration-300 transition-opacity invisible dark:bg-gray-700">
                        <span>
                            Nơi sinh: <u>{{ $person->birth_place }}</u>
                        </span>
                        <div class="tooltip-arrow" data-popper-arrow></div>
                    </div>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div
                            class="flex flex-row py-0.5 justify-center rounded-full bg-{{ $genderColors[$person->sex] }}-100">
                            <span
                                class="text-xs leading-5 font-semibold text-{{ $genderColors[$person->sex] }}-500">
                                {{ $genders[$person->sex] }}
                            </span>
                        </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm text-gray-500">{{ $statuses[$person->status] }}</div>
                    </td>

                    <td class="px-6 py-4 whitespace-nowrap">
                        <div
                            class="text-sm text-gray-500">{{ $person->family ? $person->owner_relation : 'Chưa điền' }}</div>
                    </td>

                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                        <a href="{{ route('person.show', $person->id) }}"
                           class="text-green-600 hover:text-green-500">
                            <div class="flex flex-row space-x-2">
                                <i class="material-icons-outlined text-base">visibility</i>
                                <span class="pt-0.5">Show</span>
                            </div>

                        </a>
                        <a href="{{ route('person.edit', $person->id) }}"
                           class="text-indigo-600 hover:text-indigo-500">
                            <div class="flex flex-row space-x-2">
                                <i class="material-icons-outlined text-base">edit</i>
                                <span class="pt-0.5">Edit</span>
                            </div>

                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
