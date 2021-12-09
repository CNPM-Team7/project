@extends('layouts.master')
@section('header')
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Thêm mới nhân khẩu') }}
    </h2>
@endsection

@section('content')
    <form action="#" method="POST" class="flex flex-col gap-y-10 select-none">
        @csrf
        <div class="grid grid-cols-2 gap-x-14 gap-y-4">
            <x-input-text name="name" placeholder="Nguyễn Văn A" mandatory>
                Họ và tên
            </x-input-text>

            <x-input-text name="name_tag">
                Họ và tên gọi khác
            </x-input-text>

            <div class="w-full flex flex-row items-center gap-x-2">
                <div class="flex w-full items-center justify-between gap-x-2">
                    <label for="birthday">Ngày, tháng, năm sinh</label>
                    <div class="relative w-7/12 flex flex-row gap-x-2">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path></svg>
                        </div>
                        <input name="birthday" datepicker="" datepicker-format="dd/mm/yyyy" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 datepicker-input" placeholder="{{ \Carbon\Carbon::now()->format('d/m/Y') }}">
                    </div>
                </div>

                <span class="text-red-500">(*)</span>

            </div>

            <div class="w-full flex flex-row items-center gap-x-2">
                <div class="flex w-full items-center justify-between">
                    <label for="gender" class="text-sm font-medium text-gray-900 block mb-2 dark:text-gray-400">Giới tính</label>
                    <select id="gender" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-7/12 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option>Nam</option>
                        <option>Nữ</option>
                        <option>Khác</option>
                    </select>
                </div>
                <span class="text-red-500">(*)</span>
            </div>

            <x-input-text name="native_land" mandatory>
                Quê quán
            </x-input-text>

            <x-input-text name="ethnicion" mandatory>
                Dân tộc
            </x-input-text>


            <x-input-text name="nation" mandatory>
                Quốc tịch
            </x-input-text>

            <x-input-text name="region" >
                Tôn giáo
            </x-input-text>

            <x-input-text name="job" mandatory>
                Nghề nghiệp
            </x-input-text>

            <x-input-text name="job_place">
                Nơi làm việc
            </x-input-text>

            <div class="w-full flex flex-row items-center gap-x-2">
                <div class="flex w-full items-center justify-between">
                    <label for="" class="w-4/12">
                        Địa chỉ thường trú trước khi chuyển đến
                    </label>
                    <input name="" id="" type="text"
                           class="w-7/12 bg-gray-50 border border-gray-300 text-gray-900 sm:text-xs rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                </div>
                <span class="text-red-500 opacity-0">(*)</span>
            </div>


            <x-input-text name="role" mandatory>
                Vai trò với chủ hộ
            </x-input-text>
        </div>
        <button class="w-32 border rounded bg-green-500 px-4 py-2 self-center">Hoàn thành</button>
    </form>
@endsection
