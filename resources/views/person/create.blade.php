@extends('layouts.master')
@section('header')

    <div class="flex flex-col gap-y-4">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Thêm mới nhân khẩu') }}
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
                        <span class="ml-1 text-sm font-medium text-gray-400 md:ml-2 dark:text-gray-500">Thêm mới nhân khẩu</span>
                    </div>
                </li>
            </ol>
        </nav>
    </div>


@endsection

@section('content')
    <div class="w-auto overflow-hidden sm:rounded-lg px-10 py-5 bg-gray-100 shadow-lg">

    <form action="{{ route('person.store') }}" method="POST" class="flex flex-col gap-y-10 select-none"
          style="width: 900px">
        @csrf
        <div class="grid grid-cols-1 gap-y-5 divide-gray-300 divide-y divide-solid">
            <x-input-text name="name" class="w-5/12" placeholder="Nguyễn Văn A" mandatory>
                Họ và tên
            </x-input-text>

            {{--TODO FE check ngay sinh, gia su chon ngay sinh nam 2040??--}}
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
                        <input id="birthday" name="birthday" datepicker="" datepicker-buttons
                               datepicker-orientation="top" datepicker-format="dd/mm/yyyy" type="text"
                               class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 datepicker-input"
                               placeholder="{{ \Carbon\Carbon::now()->format('d/m/Y') }}">
                    </div>
                </div>

                <span class="text-red-500">(*)</span>

            </div>

            <x-input-text name="birth_place" class="w-5/12" mandatory>
                Nơi sinh
            </x-input-text>

            <div class="w-full flex flex-row items-center gap-x-2 pt-5">
                <div class="flex w-full items-center justify-between">
                    <label for="gender" class="text-sm font-medium text-gray-900 block mb-2 dark:text-gray-400">Giới
                        tính</label>
                    <select id="gender" name="sex"
                            class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-5/12 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        @foreach ($genders as $index => $gender)
                            <option value="{{ $index }}">{{ $gender }}</option>
                        @endforeach
                    </select>
                </div>
                <span class="text-red-500">(*)</span>
            </div>

            <x-input-text name="race" class="w-5/12" mandatory>
                Dân tộc
            </x-input-text>

            <div class="w-full flex flex-row items-center gap-x-2 pt-5">
                <div class="flex w-full items-center justify-between">
                    <label for="status" class="text-sm font-medium text-gray-900 block mb-2 dark:text-gray-400">Trạng
                        thái</label>
                    <select id="status" name="status"
                            class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-5/12 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        @foreach ($statuses as $index => $status)
                            <option value="{{ $index }}">{{ $status }}</option>
                        @endforeach
                    </select>
                </div>
                <span class="text-red-500">(*)</span>
            </div>

            <x-input-text name="owner_relation" class="w-5/12" mandatory>
                Quan hệ với chủ hộ
            </x-input-text>

            <x-input-text name="family_id" class="w-5/12"> {{--lam 1 cai seach hay gi do--}}
                Mã hộ khẩu
            </x-input-text>

            {{-- <x-input-text name="native_land">
                Quê quán
            </x-input-text> --}}

            {{-- <x-input-text name="nation">
                Quốc tịch
            </x-input-text> --}}

            {{-- <x-input-text name="region" >
                Tôn giáo
            </x-input-text> --}}

            <x-input-text name="job" class="w-5/12">
                Nghề nghiệp
            </x-input-text>

            <x-input-text name="work_place" class="w-5/12">
                Nơi làm việc
            </x-input-text>

            <x-input-text name="phone_number" class="w-5/12">
                Số điện thoại
            </x-input-text>

            <x-input-text name="id_number" class="w-5/12">
                Số CMND/CCCD
            </x-input-text>

            <x-input-text name="idn_receive_place" class="w-5/12">
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
                        <input id="idn_receive_date" name="idn_receive_date" datepicker="" datepicker-buttons
                               datepicker-orientation="top" datepicker-format="dd/mm/yyyy" type="text"
                               class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 datepicker-input"
                               placeholder="{{ \Carbon\Carbon::now()->format('d/m/Y') }}">
                    </div>
                </div>
                <span class="text-red-500 {{$mandatory ?? 'opacity-0'}}">(*)</span>
            </div>

            <x-input-text name="register_place" class="w-5/12">
                Nơi đăng ký
            </x-input-text>

            <div class="w-full flex flex-row items-center gap-x-2 pt-5">
                <div class="flex w-full items-center justify-between gap-x-1">
                    <label for="register_date">Ngày đăng ký</label>
                    <div class="relative w-5/12 flex flex-row gap-x-2">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor"
                                 viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                      d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                                      clip-rule="evenodd"></path>
                            </svg>
                        </div>
                        <input id="register_date" name="register_date" datepicker="" datepicker-buttons
                               datepicker-orientation="top" datepicker-format="dd/mm/yyyy" type="text"
                               class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 datepicker-input"
                               placeholder="{{ \Carbon\Carbon::now()->format('d/m/Y') }}">
                    </div>
                </div>
                <span class="text-red-500 {{$mandatory ?? 'opacity-0'}}">(*)</span>
            </div>

            <div class="w-full flex flex-row items-center gap-x-2 pt-5">
                <div class="flex w-full justify-between">
                    <label for="note">
                        Ghi chú
                    </label>
                    <textarea name="note" id="note" type="tex"
                              class="w-5/12 h-20 bg-gray-50 border border-gray-300 text-gray-900 sm:text-xs rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"></textarea>
                </div>
                <span class="text-red-500 {{$mandatory ?? 'opacity-0'}}">(*)</span>
            </div>
        </div>
        <x-button-outline class="text-teal-500 w-32 hover:text-white border-teal-500 hover:bg-teal-500 focus:ring-yellow-300 w-28 self-center">
            Hoàn thành
        </x-button-outline>
    </form>
    </div>
@endsection
