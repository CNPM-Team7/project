@extends('layouts.master')
@section('header')

    <div class="flex flex-col gap-y-4">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Khai báo tạm trú') }}
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
                        <a href="{{ route('person.index') }}"
                           class="ml-1 text-sm  text-gray-700 hover:text-gray-900 md:ml-2 dark:text-gray-400 dark:hover:text-white">Nhân
                            khẩu</a>
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
                        <span class="ml-1 text-sm font-medium text-gray-400 md:ml-2 dark:text-gray-500">Khai báo tạm trú</span>
                    </div>
                </li>
            </ol>
        </nav>
    </div>


@endsection

@section('content')

    <form action="{{ route('staying.store') }}" method="POST" class="flex flex-col gap-y-10 select-none"
          style="width: 900px">
        @csrf
        <div class="grid grid-cols-1 gap-y-5 divide-gray-300 divide-y divide-solid">
            <x-input-text name="name" class="w-5/12" placeholder="Nguyễn Văn A" mandatory>
                Họ và tên
            </x-input-text>

            <div class="w-full flex flex-row items-center gap-x-2 pt-5">
                <div class="flex w-full items-center justify-between gap-x-1">
                    <label for="birthday">Ngày, tháng, năm sinh</label>
                    <div class="relative w-5/12 flex flex-row gap-x-2">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor"
                                 viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                      d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                                      clip-rule="evenodd"></path>
                            </svg>
                        </div>
                        <input id="birthday" name="birthday" datepicker=""
                               datepicker-orientation="top" datepicker-format="dd/mm/yyyy" type="text"
                               required
                               class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 datepicker-input"
                               placeholder="{{ \Carbon\Carbon::now()->format('d/m/Y') }}">
                    </div>
                </div>

                <span class="text-red-500">(*)</span>

            </div>

            <div class="w-full flex flex-row items-center gap-x-2 pt-5">
                <div class="flex w-full items-center justify-between">
                    <label for="gender" class="text-sm font-medium text-gray-900 block mb-2 dark:text-gray-400">Giới
                        tính</label>
                    @php
                        $genders = ['Nam', 'Nữ', 'Khác'];
                    @endphp
                    <select id="gender" name="sex"
                            class="required bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-5/12 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        @foreach ($genders as $index => $gender)
                            <option value="{{ $index }}">{{ $gender }}</option>
                        @endforeach
                    </select>
                </div>
                <span class="text-red-500">(*)</span>
            </div>

            <x-input-text name="id_number" class="w-5/12" mandatory>
                Số CMND/CCCD
            </x-input-text>

            <x-input-text name="idn_receive_place" class="w-5/12" mandatory>
                Nơi cấp
            </x-input-text>

            <div class="w-full flex flex-row items-center gap-x-2 pt-5">
                <div class="flex w-full items-center justify-between gap-x-1">
                    <label for="idn_receive_date">Ngày cấp</label>
                    <div class="relative w-5/12 flex flex-row gap-x-2">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor"
                                 viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                      d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                                      clip-rule="evenodd"></path>
                            </svg>
                        </div>
                        <input id="idn_receive_date" name="idn_receive_date" datepicker=""
                               datepicker-orientation="top" datepicker-format="dd/mm/yyyy" type="text"
                               required
                               class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 datepicker-input"
                               placeholder="{{ \Carbon\Carbon::now()->format('d/m/Y') }}">
                    </div>
                </div>
                <span class="text-red-500">(*)</span>
            </div>

            <x-input-text name="move_to" class="w-5/12" mandatory>
                Địa chỉ thường trú
            </x-input-text>

            <div class="w-full flex flex-row items-center gap-x-2 pt-5">
                <div class="flex w-full items-center justify-between">
                    <label for="period">Khoảng thời gian</label>

                    <div class="flex flex-row w-5/12 gap-x-2">
                        <div class="flex flex-row items-center gap-x-2">
                            <label for="start">Từ</label>
                            <div class="relative flex flex-row gap-x-2">

                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor"
                                         viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                              d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                                              clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                                <input id="start" name="start" datepicker=""
                                       datepicker-orientation="top" datepicker-format="dd/mm/yyyy" type="text"
                                       required
                                       class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 datepicker-input"
                                       placeholder="{{ \Carbon\Carbon::now()->format('d/m/Y') }}">
                            </div>
                        </div>

                        <div class="flex flex-row items-center gap-x-2">
                            <label for="end">đến</label>
                            <div class="relative flex flex-row gap-x-2">

                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor"
                                         viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                              d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                                              clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                                <input id="end" name="end" datepicker=""
                                       datepicker-orientation="top" datepicker-format="dd/mm/yyyy" type="text"
                                       required
                                       class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 datepicker-input"
                                       placeholder="{{ \Carbon\Carbon::now()->format('d/m/Y') }}">
                            </div>
                        </div>
                    </div>


                </div>
                <span class="text-red-500">(*)</span>
            </div>

            <div class="w-full flex flex-row items-center gap-x-2 pt-5">
                <div class="flex w-full justify-between">
                    <label for="reason">
                        Lý do
                    </label>
                    <textarea name="reason" id="reason" type="text"
                              class="w-5/12 required h-20 bg-gray-50 border border-gray-300 text-gray-900 sm:text-xs rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"></textarea>
                </div>
                <span class="text-red-500">(*)</span>
            </div>
        </div>
        <button class="w-32 border rounded bg-green-500 px-4 py-2 self-center">Hoàn thành</button>
    </form>

@endsection
