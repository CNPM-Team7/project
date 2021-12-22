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
            <li>
                <div class="flex items-center">
                    <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20"
                         xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                              d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                              clip-rule="evenodd"></path>
                    </svg>
                    <a href="{{ route('families.index') }}"
                       class="ml-1 text-sm  text-gray-700 hover:text-gray-900 md:ml-2 dark:text-gray-400 dark:hover:text-white">Hộ khẩu</a>
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
                    <span class="ml-1 text-sm font-medium text-gray-400 md:ml-2 dark:text-gray-500">Chi tiet hộ khẩu</span>
                </div>
            </li>
        </ol>
    </nav>
</div>
        {{-- TODO check tung trang xem tieu de da dung chua, da chuyen het text ve tieng viet chua, the <title> cung phai co noi dung giong tieu de --}}
@endsection

@section('content')
    <div class="w-full select-none flex flex-row justify-end space-x-4 mb-4">
        <a href="{{ route('families.edit', $family->id) }}">
            <button class="w-44 border rounded bg-yellow-500 px-4 py-2">
                Edit
            </button>
        </a>

        <form method="POST" action="{{ route('families.destroy', $family->id) }}"> {{-- TODO should have a warning? and a toast message when done delete? --}}
            @csrf
            @method('DELETE')
            <button type="submit" class="w-44 border rounded bg-red-500 px-4 py-2">Delete</button>
        </form>
    </div>

    <div class="w-auto flex flex-row items-center gap-x-2 pt-5">
        <div class="flex w-full items-center justify-between">
            <span>House Id:</span>
            <p>{{ $family->house_id }}</p>
        </div>
    </div>

    <div class="w-auto flex flex-row items-center gap-x-2 pt-5">
        <div class="flex w-full items-center justify-between">
            <span>Address:</span>
            <p>{{ $family->address }}</p>
        </div>
    </div>

    <div class="w-auto flex flex-row items-center gap-x-2 pt-5">
        <div class="flex w-full items-center justify-between">
            <span>Chu ho:</span>
            <p><a href="{{ route('families.show', $family->owner->id) }}"><u>{{ $family->owner->name }}</u></a></p>
        </div>
    </div>

    <div class="w-auto flex flex-row items-center gap-x-2 pt-5">
        <div class="flex w-full items-center justify-between">
            <span>Thanh vien</span>
        </div>
    </div>

        @php
            $genderColors = ['blue', 'red', 'green']
        @endphp
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
                <th scope="col" class="relative px-6 py-3">
                    <span class="sr-only">Edit</span>
                </th>
            </tr>
            </thead>

            <tbody class="bg-white divide-y divide-gray-200">


            @foreach ($family->members as $person)
                <tr>
                    <td data-tooltip-target="tooltip-id_number {{ $person->id_number }}"
                        class="px-6 py-4 whitespace-nowrap select-text">
                        <div class="flex items-center">
                        <span class="text-sm font-medium text-gray-500"> {{-- TODO mark the hoverable field some how --}}
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
                        <span class="text-sm font-medium text-gray-500">
                            <a href="{{ route('person.show', $person->id) }}"><u>{{ $person->name }}</u></a>
                        </span>
                        </div>
                    </td>
                    <td data-tooltip-target="tooltip-birthday {{ $person->id_number }}"
                        class="px-6 py-4 whitespace-nowrap">
                        <div
                            class="text-sm text-gray-500">{{ date('d/m/Y', strtotime($person->birthday)) }}</div>
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
                                class="text-xs leading-5 font-semibold text-{{ $genderColors[$person->sex] }}-500">
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
                            <p class="truncate w-20">
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

                    <td class="px-6 py-4 whitespace-nowrap">
                        <div
                            class="text-sm text-gray-500">{{ $person->family ? $person->owner_relation : 'Chưa điền' }}</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div
                            class="text-sm text-gray-500">{{ $person->family->owner->name ?? 'Chưa điền' }}</div>
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
@endsection