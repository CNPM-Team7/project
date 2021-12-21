@extends('layouts.master')
@section('header')
    <div class="flex flex-col gap-y-4">

        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Nhân khẩu') }}
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
                <a>
                    <button class="w-44 border rounded bg-yellow-500 px-4 py-2">
                        Khai báo tạm trú
                    </button>
                </a>

                <a>
                    <button class="w-44 border rounded bg-blue-500 px-4 py-2">
                        Khai báo tạm vắng
                    </button>
                </a>

                <a href="{{ route('person.create') }}">
                    <button class="w-44 border rounded bg-green-500 px-4 py-2">
                        Thêm mới
                    </button>
                </a>

                <a>
                    <button class="w-44 border rounded bg-red-500 px-4 py-2">
                        Khai tử
                    </button>
                </a>
            </div>


            <div class="h-auto w-full flex flex-row items-center pt-4 space-x-8">
                {{-- TODO each input on separate line, and make it not eyeball-hurting --}}
                <div class="flex w-full items-center justify-between">
                    <label for="name">
                        Ho va ten
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
                    <label for="status" class="w-auto">Trang thai</label>
                    <select id="status"
                            class="flex-grow bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option value="">All</option>
                        @foreach ($statuses as $index => $status)
                            <option value="{{ $index }}">{{ $status }}</option>
                        @endforeach
                    </select>

                </div>
                <div class="flex flex-row items-center">
                    <button class="w-28 border rounded bg-blue-500 px-4 py-2" onclick="search()">Tìm kiếm</button>
                </div>
            </div>

        </div>

        <div class="flex flex-col mb-4 pt-2">
            <div class="overflow-x-auto w-full">
                <div class="py-2 align-middle inline-block min-w-full">
                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-200">
                            <tr>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-900 uppercase tracking-wider">
                                    ID Number
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-900 uppercase tracking-wider">
                                    Name
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-900 uppercase tracking-wider">
                                    Birthday
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-900 uppercase tracking-wider">
                                    Gender
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-900 uppercase tracking-wider">
                                    Race
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-900 uppercase tracking-wider">
                                    Status
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-900 uppercase tracking-wider">
                                    Job
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-900 uppercase tracking-wider">
                                    Owner Relation
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-900 uppercase tracking-wider">
                                    Family Owner
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-900 uppercase tracking-wider">
                                    Note
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-900 uppercase tracking-wider">
                                    Move to
                                </th>
                                <th scope="col" class="relative px-6 py-3">
                                    <span class="sr-only">Edit</span>
                                </th>
                            </tr>
                            </thead>

                            <tbody class="bg-white divide-y divide-gray-200">


                            @foreach ($people as $person)
                                <tr>
                                    <td data-tooltip-target="tooltip-id_number"
                                        class="px-6 py-4 whitespace-nowrap select-text">
                                        <div class="flex items-center">
                                        <span class="text-sm font-medium text-gray-500">
                                            {{ $person->id_number }}
                                        </span>
                                        </div>
                                    </td>
                                    <div id="tooltip-id_number" role="tooltip"
                                         class="tooltip absolute z-10 inline-block bg-gray-900 font-medium shadow-sm text-white py-2 px-3 text-sm rounded-lg opacity-0 duration-300 transition-opacity invisible dark:bg-gray-700">
                                        <div class="flex flex-col">
                                            <span>
                                                Register Date: <u>{{ $person->register_date }}</u>
                                            </span>
                                            <span>
                                                Register Place: <u>{{ $person->register_place }}</u>
                                            </span>
                                            <span>
                                                Receive Date: <u>{{ $person->idn_receive_date }}</u>
                                            </span>
                                            <span>
                                                Receive Place: <u>{{ $person->idn_receive_place }}</u>
                                            </span>
                                        </div>
                                        <div class="tooltip-arrow" data-popper-arrow></div>
                                    </div>

                                    <td class="px-6 py-4 whitespace-nowrap select-text">
                                        <div class="flex items-center">
                                        <span class="text-sm font-medium text-gray-500">
                                            <a href="{{ route('person.show', $person->id) }}">{{ $person->name }}</a>
                                        </span>
                                        </div>
                                    </td>
                                    <td data-tooltip-target="tooltip-birthday" class="px-6 py-4 whitespace-nowrap">
                                        <div
                                            class="text-sm text-gray-500">{{ date('d/m/Y', strtotime($person->birthday)) }}</div>
                                    </td>
                                    <div id="tooltip-birthday" role="tooltip"
                                         class="tooltip absolute z-10 inline-block bg-gray-900 font-medium shadow-sm text-white py-2 px-3 text-sm rounded-lg opacity-0 duration-300 transition-opacity invisible dark:bg-gray-700">
                                        <span>
                                            Birthday Place: <u>{{ $person->birth_place }}</u>
                                        </span>
                                        <div class="tooltip-arrow" data-popper-arrow></div>
                                    </div>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full
                                            bg-{{ $genderColors[$person->sex] }}-100 text-{{ $genderColors[$person->sex] }}-500">
                                            {{ $genders[$person->sex] }} {{-- TODO set fixed length, lam tuong tu voi table cua person.show --}}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-500">{{ $person->race }}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-500">{{ $statuses[$person->status] }}</div>
                                    </td>
                                    <td data-tooltip-target="tooltip-job" class="px-6 py-4 whitespace-nowrap">
                                        <div
                                            class="text-sm text-gray-500">{{ $person->job }}</div> {{-- TODO qua dai, rut gon bang '...' --}}
                                    </td>
                                    <div id="tooltip-job" role="tooltip"
                                         class="tooltip absolute z-10 inline-block bg-gray-900 font-medium shadow-sm text-white py-2 px-3 text-sm rounded-lg opacity-0 duration-300 transition-opacity invisible dark:bg-gray-700">
                                        <span>
                                            Work Place: <u>{{ $person->work_place }}</u>
                                        </span>
                                        <div class="tooltip-arrow" data-popper-arrow></div>
                                    </div>

                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div
                                            class="text-sm text-gray-500">{{ $person->family ? $person->owner_relation : 'No Info' }}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div
                                            class="text-sm text-gray-500">{{ $person->family->owner->name ?? 'No Info' }}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-500">{{ $person->note ?? 'Empty' }}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-500">{{ $person->move_to ?? 'Here' }}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium"> {{-- TODO pretify these :>> --}}
                                        <a href="{{ route('person.show', $person->id) }}"
                                           class="text-green-600 hover:text-green-500">Show</a>
                                        <a href="{{ route('person.edit', $person->id) }}"
                                           class="text-indigo-600 hover:text-indigo-500">Edit</a>
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
                document.getElementById(i).value = params[i]
            }
        }

        setSearchParams()
    </script>

@endsection
