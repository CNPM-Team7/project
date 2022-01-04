@extends('layouts.master')
@section('header')
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Khai báo thông tin dịch tễ') }}
    </h2>
@endsection

@section('content')
    <form action="{{ route('declarations.store') }}" method="POST" class="flex flex-col gap-y-10 select-none">
        @csrf
        <div class="inline-grid grid-cols-2 gap-x-14 gap-y-4">
            <x-input-text name="name" class="w-7/12 bg-gray-300" value="{{ $person->name }}" disabled>
                Họ và tên
            </x-input-text>

            <div class="w-full flex flex-row items-center gap-x-2">
                <div class="flex w-full items-center justify-between">
                    <label for="gender" class="text-sm font-medium text-gray-900 block mb-2 dark:text-gray-400">Giới
                        tính</label>
                    <select id="gender" value="{{ $person->sex }}" disabled
                            class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-7/12 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option value="0">Nam</option>
                        <option value="1">Nữ</option>
                    </select>
                </div>
                <span class="text-red-500 {{$mandatory ?? 'opacity-0'}}">(*)</span>
            </div>

            <x-input-text name="id_number" class="w-7/12 bg-gray-300" value="{{ $person->id_number }}" disabled>
                CMND/CCCD
            </x-input-text>

            <x-input-text name="birthday" class="w-7/12 bg-gray-300" value="{{ $person->birthday }}">
                Ngày, tháng, năm sinh
            </x-input-text>

            <x-input-text name="phone_number" class="w-7/12 bg-gray-300" value="{{ $person->phone_number }}" disabled>
                Điện thoại
            </x-input-text>

            <div class="w-full flex flex-row items-center gap-x-2">
                <div class="flex w-full items-center justify-between">
                    <label for="isolation_level"
                           class="text-sm font-medium text-gray-900 block mb-2 dark:text-gray-400">Mức độ các ly</label>
                    <select id="status" name="status"
                            class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-7/12 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option value="0">F0</option>
                        <option value="1">F1</option>
                        <option value="2">F2</option>
                        <option value="3">> F2</option>
                    </select>
                </div>
                <span class="text-red-500 {{$mandatory ?? 'opacity-0'}}">(*)</span>
            </div>

            <div class="h-auto">
                <div class="w-auto h-auto flex flex-row items-center gap-x-2 pt-5">
                    <div class="h-auto flex w-full items-center justify-between">
                        <label for="birth_place">
                            Nơi cư trú
                        </label>

                        <span class="px-4 py-2 w-7/12 h-auto inline-flex items-baseline overflow-hidden resize-none rounded-lg text-xs bg-gray-300 border border-gray-300">
                            {{ $person->birth_place }} {{-- TODO nơi cư trú --}}
                        </span>
                    </div>
                    <span class="text-red-500 invisible">(*)</span>
                </div>
            </div>

            <div class="w-full flex flex-row items-center gap-x-2">
                <div class="flex w-full items-center justify-between gap-x-2">
                    <label for="isolation_date">Ngày cach ly</label>
                    <div class="relative w-7/12 flex flex-row gap-x-2">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor"
                                 viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                      d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                                      clip-rule="evenodd"></path>
                            </svg>
                        </div>
                        <input name="isolation_date" datepicker="" datepicker-format="dd/mm/yyyy" type="text"
                            class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 datepicker-input"
                        >
                    </div>
                </div>
                <span class="text-red-500 invisible">(*)</span>
            </div>

            <x-input-text name="test_result" class="w-7/12"> {{-- TODO DISCUSS select ket qua, nhung ket qua nao? --}}
                Kết quả test covid
            </x-input-text>

            <div class="w-full flex flex-row items-center gap-x-2">
                <div class="flex w-full items-center justify-between gap-x-2">
                    <label for="test_date">Ngày Test</label>
                    <div class="relative w-7/12 flex flex-row gap-x-2">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor"
                                 viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                      d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                                      clip-rule="evenodd"></path>
                            </svg>
                        </div>
                        <input name="test_date" datepicker="" datepicker-format="dd/mm/yyyy" type="text"
                            class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 datepicker-input"
                        >
                    </div>
                </div>
                <span class="text-red-500 invisible">(*)</span>
            </div>
        </div>

        <input name="person_id" value="{{ $person->id }}" style="display: none;" />
        <input id="health_state" name="health_state" value="{}" style="display: none;" />

        <div>
            <p class="text-base font-medium text-gray-900 inline mb-2 dark:text-gray-400">
                Theo vòng 14 ngày qua, Anh/Chị có đến khu vực, tỉnh, thành phố, quốc gia/vùng lãnh thổ nào có dịch?
            </p>
            <span class="text-red-500">(*)</span><br>
            <input type="radio" name="move" value="No" onchange="change('move', 0)">
            <label for="No" class="text-sm font-medium text-gray-900 mb-2 mr-2 dark:text-gray-400">Không</label>
            <input type="radio" name="move" value="Yes" onchange="change('move', 1)">
            <label for="Yes" class="text-sm font-medium text-gray-900 mb-2 mr-2 dark:text-gray-400">Có</label>
        </div>

        <div>
            <p for="cough_status" class="text-base font-medium text-gray-900 inline mb-2 dark:text-gray-400">
                Trong vòng 14 ngày qua, Anh/Chị có thấy xuất hiện ít nhất 1 trong các dấu hiệu: sốt, ho, khó thở, viêm
                phổi, đau họng, mệt mỏi, thay đổi vị giác không?
            </p>
            <span class="text-red-500">(*)</span><br>
            <input type="radio" name="cough_status" value="No" onchange="change('cough_status', 0)">
            <label for="No" class="text-sm font-medium text-gray-900 mb-2 mr-2 dark:text-gray-400">Không</label>
            <input type="radio" name="cough_status" value="Yes" onchange="change('cough_status', 1)">
            <label for="Yes" class="text-sm font-medium text-gray-900 mb-2 mr-2 dark:text-gray-400">Có</label>
        </div>

        <div>
            <p for="" class="text-base font-medium text-gray-900 inline mb-2 dark:text-gray-400">
                Trong vòng 14 ngày qua Anh/Chị có tiếp xúc với:
            </p>
            <span class="text-red-500">(*)</span><br>

            <p class="mb-4 pr-10 inline-block w-6/12 ">
                Người bệnh hoặc nghi ngờ mắc bệnh Covid-19
            </p>
            <input type="radio" name="patient_or_PUI" value="No" onchange="change('patient_or_PUI', 0)">
            <label for="No" class="text-sm font-medium text-gray-900 mb-2 mr-2 dark:text-gray-400">Không</label>
            <input type="radio" name="patient_or_PUI" value="Yes" onchange="change('patient_or_PUI', 1)">
            <label for="Yes" class="text-sm font-medium text-gray-900 mb-2 mr-2 dark:text-gray-400">Có</label>
            <br>

            <p class="mb-4 pr-10 inline-block w-6/12 ">
                Người từ nước có bệnh Covid-19
            </p>
            <input type="radio" name="foreigner" value="No" onchange="change('foreigner', 0)">
            <label for="No" class="text-sm font-medium text-gray-900 mb-2 mr-2 dark:text-gray-400">Không</label>
            <input type="radio" name="foreigner" value="Yes" onchange="change('foreigner', 1)">
            <label for="Yes" class="text-sm font-medium text-gray-900 mb-2 mr-2 dark:text-gray-400">Có</label>
            <br>

            <p class="mb-4 pr-10 inline-block w-6/12 ">
                Người bệnh có biểu hiện sốt, ho, khó thở, viêm phổi
            </p>
            <input type="radio" name="symptomatic_patient" value="No" onchange="change('symptomatic_patient', 0)">
            <label for="No" class="text-sm font-medium text-gray-900 mb-2 mr-2 dark:text-gray-400">Không</label>
            <input type="radio" name="symptomatic_patient" value="Yes" onchange="change('symptomatic_patient', 1)">
            <label for="Yes" class="text-sm font-medium text-gray-900 mb-2 mr-2 dark:text-gray-400">Có</label>
        </div>

        <div class="self-center">
            <button class="w-32 border rounded bg-green-500 mr-3 px-4 py-2 inline-block">Hoàn thành</button>
        </div>

    </form>

    <script>
        function change(key, value){
            let health = JSON.parse(document.getElementById('health_state').value)
            health[key] = value
            document.getElementById('health_state').value = JSON.stringify(health)
        }
    </script>
@endsection
