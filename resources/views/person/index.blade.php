@extends('layouts.master')
@section('header')
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

                <li aria-current="page">
                    <div class="flex items-center">
                        <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20"
                             xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                  d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                  clip-rule="evenodd"></path>
                        </svg>
                        <span class="ml-1 text-sm text-gray-400 md:ml-2 dark:text-gray-500">Nhân khẩu</span>
                    </div>
                </li>
            </ol>
        </nav>
    </div>
@endsection

@section('content')
    @php
        $genderColors = ['blue', 'red', 'green']
    @endphp
    <div class="w-full flex flex-col select-none">

        <div class="w-full items-center divide-gray-300 divide-y divide-solid">

            <div class="w-full select-none flex flex-row justify-between mb-4">

                <a href="{{ route('staying.create') }}">
                    <x-button-default class="bg-yellow-400 hover:bg-yellow-500 focus:ring-yellow-300">
                        Khai báo tạm trú
                    </x-button-default>
                </a>

                <a href="{{ route('absent') }}">
                    <x-button-default class="bg-blue-400 hover:bg-blue-500 focus:ring-blue-300">
                        Khai báo tạm vắng
                    </x-button-default>
                </a>

                <a href="{{ route('person.create') }}">
                    <x-button-default class="bg-green-400 hover:bg-green-500 focus:ring-green-300">
                        Thêm mới
                    </x-button-default>
                </a>

                <a>
                    <x-button-default class="bg-red-500 hover:bg-red-600 focus:ring-red-300">
                        Khai tử
                    </x-button-default>
                </a>
            </div>


            <div class="h-auto w-full flex flex-row items-center pt-4 space-x-8">
                <div class="flex w-full items-center justify-between">
                    <label for="name">
                        Họ và tên
                    </label>
                    <input name="name" id="name" type="text"
                           class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-xs rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                </div>

                <div class="flex w-full items-center space-x-3 justify-between">
                    <label for="id_number">
                        CMND/CCCD
                    </label>
                    <input name="id_number" id="id_number" type="text"
                           class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-xs rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                </div>

                <div class="w-full flex flex-row space-x-4 items-center">
                    <label for="status" class="w-auto">Trạng thái</label>
                    <select id="status"
                            class="flex-grow bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option value="">All</option>
                        @foreach ($statuses as $index => $status)
                            <option value="{{ $index }}">{{ $status }}</option>
                        @endforeach
                    </select>

                </div>
                <div class="flex flex-row items-center">
                    <x-button-outline class="text-teal-500 hover:text-white border-teal-500 hover:bg-teal-500 focus:ring-yellow-300 w-28" onclick="search()">
                        Tìm kiếm
                    </x-button-outline>
                </div>
            </div>

        </div>

        <div class="flex flex-col mb-4 pt-2">
            <div class="overflow-x-auto w-full">
                <div class="py-2 align-middle inline-block min-w-full">
                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                        <div class="w-full pl-3 flex flex-col">
                            <span class="text-red-500">
                                *
                                <span class="italic">
                                    Đưa con trỏ chuột vào trường in nghiêng để hiện thông tin chi tiết
                                </span>
                            </span>

                            <span class="text-red-500">
                                *
                                <span class="underline underline-offset-4">
                                    Bấm vào họ tên của một người để chỉnh sửa thông tin của người đó
                                </span>
                            </span>
                        </div>

                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-200">
                            <tr>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-900 uppercase tracking-wider">
                                    SỐ ID
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-900 uppercase tracking-wider">
                                    Họ và tên
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
                                    Dân tộc
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-900 uppercase tracking-wider">
                                    Trạng thái
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-900 uppercase tracking-wider">
                                    Công việc
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-900 uppercase tracking-wider">
                                    Mã Hộ khẩu
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-900 uppercase tracking-wider">
                                    Ghi chú
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-900 uppercase tracking-wider">
                                    Chuyển đến từ
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-900 uppercase tracking-wider">
                                    Hành động
                                </th>
                            </tr>
                            </thead>

                            <tbody class="bg-white divide-y divide-gray-200">


                            @foreach ($people as $person)
                                <tr>
                                    <td data-tooltip-target="tooltip-id_number {{ $person->id_number }}"
                                        class="px-6 py-4 whitespace-nowrap select-text">
                                        <div class="flex items-center">
                                        <span class="text-sm font-medium text-gray-900 italic">
                                            {{ $person->id_number }}
                                        </span>
                                        </div>
                                    </td>
                                    <div id="tooltip-id_number {{ $person->id_number }}" role="tooltip"
                                         class="tooltip absolute z-10 inline-block bg-gray-900 font-medium shadow-sm text-white py-2 px-3 text-sm rounded-lg opacity-0 duration-300 transition-opacity invisible dark:bg-gray-700">
                                        <div class="flex flex-col">
                                            <span>
                                                Register Date: <u>{{ date('d/m/Y', strtotime($person->register_date)) }}</u>
                                            </span>
                                            <span>
                                                Register Place: <u>{{ $person->register_place }}</u>
                                            </span>
                                            <span>
                                                Receive Date: <u>{{ date('d/m/Y', strtotime($person->idn_receive_date)) }}</u>
                                            </span>
                                            <span>
                                                Receive Place: <u>{{ $person->idn_receive_place }}</u>
                                            </span>
                                        </div>
                                        <div class="tooltip-arrow" data-popper-arrow></div>
                                    </div>

                                    <td class="px-6 py-4 whitespace-nowrap select-text">
                                        <div class="flex items-center">
                                            <a href="{{ route('person.show', $person->id) }}">
                                                <span class="text-sm font-medium text-gray-900 underline">
                                                    {{ $person->name }}
                                                </span>
                                            </a>
                                        </div>
                                    </td>
                                    <td data-tooltip-target="tooltip-birthday {{ $person->id_number }}"
                                        class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900 italic">{{ date('d/m/Y', strtotime($person->birthday)) }}</div>
                                    </td>
                                    <div id="tooltip-birthday {{ $person->id_number }}" role="tooltip"
                                         class="tooltip absolute z-10 inline-block bg-gray-900 font-medium shadow-sm text-white py-2 px-3 text-sm rounded-lg opacity-0 duration-300 transition-opacity invisible dark:bg-gray-700">
                                        <span>
                                            Birthday Place: <u>{{ $person->birth_place }}</u>
                                        </span>
                                        <div class="tooltip-arrow" data-popper-arrow></div>
                                    </div>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div
                                            class="flex flex-row py-0.5 justify-center rounded-full bg-{{ $genderColors[$person->sex] }}-100">
                                            <span
                                                class="text-xs leading-5 font-semibold text-{{ $genderColors[$person->sex] }}-500 px-3 py-0.5">
                                                {{ $genders[$person->sex] }}
                                            </span>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-500">{{ $person->race }}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-500">{{ $statuses[$person->status] }}</div>
                                    </td>
                                    <td data-tooltip-target="tooltip-job {{ $person->id_number }}"
                                        class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-500">
                                            <p class="truncate w-20 text-gray-900 italic">
                                                {{ $person->job }}
                                            </p>
                                        </div>

                                    </td>
                                    <div id="tooltip-job {{ $person->id_number }}" role="tooltip"
                                         class="tooltip absolute z-10 inline-block bg-gray-900 font-medium shadow-sm text-white py-2 px-3 text-sm rounded-lg opacity-0 duration-300 transition-opacity invisible dark:bg-gray-700">

                                        <div class="flex flex-col">
                                            <span>
                                                Job: <u>{{ $person->job }}</u>
                                            </span>
                                            <span>
                                                Work Place: <u>{{ $person->work_place }}</u>
                                            </span>
                                        </div>

                                        <div class="tooltip-arrow" data-popper-arrow></div>
                                    </div>

                                    <td @if($person->family_id) data-tooltip-target="tooltip-family {{ $person->id_number }}" @endif
                                        class="px-6 py-4 whitespace-nowrap select-text">
                                        <div class="flex items-center">
                                        <span class="text-sm font-medium text-gray-900 italic"> {{-- TODO fix italic --}}
                                            {{ $person->family_id ?? 'No inf' }}
                                        </span>
                                        </div>
                                    </td>
                                    <div id="tooltip-family {{ $person->id_number }}" role="tooltip"
                                         class="tooltip absolute z-10 inline-block bg-gray-900 font-medium shadow-sm text-white py-2 px-3 text-sm rounded-lg opacity-0 duration-300 transition-opacity invisible dark:bg-gray-700">
                                        <div class="flex flex-col">
                                            <span>
                                                Họ tên chủ hộ: {{ $person->family->owner->name ?? 'No Info' }}
                                            </span>
                                            <span>
                                                Quan hệ với chủ hộ: {{ $person->family ? $person->owner_relation : 'No Info' }}
                                            </span>
                                            <span>
                                                Địa chỉ hộ khẩu: {{ $person->family ? $person->family->address : 'No Info' }}
                                            </span>
                                        </div>
                                        <div class="tooltip-arrow" data-popper-arrow></div>
                                    </div>

                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-500">{{ $person->note ?? 'Empty' }}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-500">{{ $person->move_to ?? 'Here' }}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium"> {{-- TODO FE them button khai bao tam vang --}}
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

                                        <a href="{{ route('declarations.create', $person->id) }}"
                                           class="text-yellow-600 hover:text-yellow-500">
                                            <div class="flex flex-row space-x-2">
                                                <i class="material-icons-outlined text-base">edit</i>
                                                <span class="pt-0.5">Declaration</span>
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
            <div>{{ $people->links() }}</div>
        </div>
    </div>


    <script>
        function search() {
            const urlSearchParams = new URLSearchParams(window.location.search);
            if(urlSearchParams.has('page')) urlSearchParams.delete('page')
            let queryParams = ['name', 'id_number', 'status']
            for (let param of queryParams) {
                let val = document.getElementById(param).value
                if (val) urlSearchParams.set(param, val)
                else urlSearchParams.delete(param)
            }
            const params = Object.fromEntries(urlSearchParams.entries());
            window.location.search = urlSearchParams.toString()
        }

        function setSearchParams() {
            const urlSearchParams = new URLSearchParams(window.location.search);
            const params = Object.fromEntries(urlSearchParams.entries());
            for (let i in params) {
                if(i == 'page') continue;
                document.getElementById(i).value = params[i]
            }
        }

        setSearchParams()
    </script>

@endsection
