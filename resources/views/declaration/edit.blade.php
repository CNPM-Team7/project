@extends('layouts.master')
@section('header')
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Thay đổi thông tin khai báo dịch tễ') }}
    </h2>
@endsection

@section('content')
    <form action="{{ route('declarations.store') }}" method="POST" class="flex flex-col gap-y-10 select-none">
        @csrf
        <div class="grid grid-cols-2 gap-x-14 gap-y-4">
            <x-input-text name="name" value="{{ $person->name }}" placeholder="Nguyễn Văn A" mandatory>
                Họ và tên
            </x-input-text>

            <div class="w-full flex flex-row items-center gap-x-2">
                <div class="flex w-full items-center justify-between">
                    <label for="gender" class="text-sm font-medium text-gray-900 block mb-2 dark:text-gray-400">Giới
                        tính</label>
                    <select id="gender"
                            class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-7/12 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option>Nam</option>
                        <option>Nữ</option>
                        <option>Khác</option>
                    </select>
                </div>
                <span class="text-red-500">(*)</span>
            </div>

            <div class="w-full flex flex-row items-center gap-x-2">
                <div class="flex w-full items-center justify-between gap-x-2">
                    <label for="birthday">Ngày, tháng, năm sinh</label>
                    <div class="relative w-7/12 flex flex-row gap-x-2">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor"
                                 viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                      d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                                      clip-rule="evenodd"></path>
                            </svg>
                        </div>
                        <input name="birthday" datepicker="" datepicker-format="dd/mm/yyyy" type="text"
                               class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 datepicker-input"
                               placeholder="{{ \Carbon\Carbon::now()->format('d/m/Y') }}">
                    </div>
                </div>
                <span class="text-red-500">(*)</span>
            </div>

            <x-input-text name="identification" value="{{ $declaration->identification }}" mandatory>
                CMND/CCCD
            </x-input-text>

            <x-input-text name="telephone_number" value="{{ $person->telephone_number }}" mandatory>
                Điện thoại
            </x-input-text>

            <x-input-text name="health_insurance" value="{{ $person->health_insurance }}">
                Số thẻ BHYT
            </x-input-text>

            <x-input-text name="email" value="{{ $person->email }}">
                Email
            </x-input-text>

            <x-input-text name="place" value="{{ $person->place }}" mandatory>
                Nơi cư trú
            </x-input-text>

            <div class="w-full flex flex-row items-center gap-x-2">
                <div class="flex w-full items-center justify-between gap-x-2">
                    <label for="isolation_time" class="w-4/12">Thời gian bắt đầu cách ly</label>
                    <div class="relative w-7/12 flex flex-row gap-x-2">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor"
                                 viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                      d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                                      clip-rule="evenodd"></path>
                            </svg>
                        </div>
                        <input name="isolation_time" datepicker="" datepicker-format="dd/mm/yyyy" type="text"
                               class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 datepicker-input"
                               placeholder="{{ \Carbon\Carbon::now()->format('d/m/Y') }}">
                    </div>
                </div>
                <span class="opacity-0">(*)</span>
            </div>

            <div class="w-full flex flex-row items-center gap-x-2">
                <div class="flex w-full items-center justify-between">
                    <label for="isolation_level"
                           class="text-sm font-medium text-gray-900 block mb-2 dark:text-gray-400">Mức độ cách
                        ly</label>
                    <select id="isolation_level"
                            class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-7/12 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option>F0</option>
                        <option>F1</option>
                        <option>F2</option>
                        <option>> F2</option>
                    </select>
                </div>
                <span class="opacity-0">(*)</span>
            </div>

            <x-input-text name="test_method" value="{{ $person->test_method }}">
                Hình thức test
            </x-input-text>

            <x-input-text name="test_result" value="{{ $person->test_result }}">
                Kết quả test covid
            </x-input-text>
        </div>

        <div>
            <p class="text-base font-medium text-gray-900 inline mb-2 dark:text-gray-400">
                Theo vòng 14 ngày qua, Anh/Chị có đến khu vực, tỉnh, thành phố, quốc gia/vùng lãnh thổ nào (Có thể đi
                qua nhiều nơi)
            </p>
            <span class="text-red-500">(*)</span><br>
            <input type="radio" name="move" value="No">
            <label for="No" class="text-sm font-medium text-gray-900 mb-2 mr-2 dark:text-gray-400">Không</label>
            <input type="radio" name="move" value="Yes">
            <label for="Yes" class="text-sm font-medium text-gray-900 mb-2 mr-2 dark:text-gray-400">Có</label>
        </div>

        <div>
            <p for="status" class="text-base font-medium text-gray-900 inline mb-2 dark:text-gray-400">
                Trong vòng 14 ngày qua, Anh/Chị có thấy xuất hiện ít nhất 1 trong các dấu hiệu: sốt, ho, khó thở, viêm
                phổi, đau họng, mệt mỏi, thay đổi vị giác không?
            </p>
            <span class="text-red-500">(*)</span><br>
            <input type="radio" name="status" value="No">
            <label for="No" class="text-sm font-medium text-gray-900 mb-2 mr-2 dark:text-gray-400">Không</label>
            <input type="radio" name="status" value="Yes">
            <label for="Yes" class="text-sm font-medium text-gray-900 mb-2 mr-2 dark:text-gray-400">Có</label>
        </div>

        <div>
            <p for="status" class="text-base font-medium text-gray-900 inline mb-2 dark:text-gray-400">
                Trong vòng 14 ngày qua Anh/Chị có tiếp xúc với:
            </p>
            <span class="text-red-500">(*)</span><br>

            <p class="mb-4 pr-10 inline-block w-6/12 ">
                Người bệnh hoặc nghi ngờ mắc bệnh Covid-19
            </p>
            <input type="radio" name="patient_or_PUI" value="No">
            <label for="No" class="text-sm font-medium text-gray-900 mb-2 mr-2 dark:text-gray-400">Không</label>
            <input type="radio" name="patient_or_PUI" value="Yes">
            <label for="Yes" class="text-sm font-medium text-gray-900 mb-2 mr-2 dark:text-gray-400">Có</label>
            <br>

            <p class="mb-4 pr-10 inline-block w-6/12 ">
                Người từ nước có bệnh Covid-19
            </p>
            <input type="radio" name="foreigner" value="No">
            <label for="No" class="text-sm font-medium text-gray-900 mb-2 mr-2 dark:text-gray-400">Không</label>
            <input type="radio" name="foreigner" value="Yes">
            <label for="Yes" class="text-sm font-medium text-gray-900 mb-2 mr-2 dark:text-gray-400">Có</label>
            <br>

            <p class="mb-4 pr-10 inline-block w-6/12 ">
                Người bệnh có biểu hiện sốt, ho, khó thở, viêm phổi
            </p>
            <input type="radio" name="symptomatic_patient" value="No">
            <label for="No" class="text-sm font-medium text-gray-900 mb-2 mr-2 dark:text-gray-400">Không</label>
            <input type="radio" name="symptomatic_patient" value="Yes">
            <label for="Yes" class="text-sm font-medium text-gray-900 mb-2 mr-2 dark:text-gray-400">Có</label>
        </div>

        <div class="self-center">
            <button class="w-32 border rounded bg-green-500 mr-3 px-4 py-2 inline-block">Hoàn thành</button>

            <a href="{{ route('person.index') }}" class="w-48 border rounded bg-green-500 px-5 py-2 inline-block">Thông
                tin nhân khẩu</a>
        </div>
    </form>
@endsection
