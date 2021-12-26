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
                        <span class="ml-1 text-sm text-gray-400 md:ml-2 dark:text-gray-500">Thon tin tai khoan</span>
                    </div>
                </li>
            </ol>
        </nav>
    </div>
@endsection

@section('content')
    <div class="grid grid-cols-1 gap-y-5 divide-gray-300 divide-y divide-solid" style="width: 900px">

        <div class="w-auto flex flex-row items-center gap-x-2 pt-5">
            <div class="flex w-full items-center justify-between">
                <span>Họ và tên</span>
                {{--                        <span>{{ Auth::user()->name }}</span>--}}
            </div>
        </div>

        <div class="w-auto flex flex-row items-center gap-x-2 pt-5">
            <div class="flex w-full items-center justify-between">
                <span>Ngày, tháng, năm sinh</span>
                {{--                        <span>{{ Auth::user()->name }}</span>--}}
            </div>
        </div>

    </div>

@endsection
