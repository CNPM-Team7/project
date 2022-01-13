@extends('layouts.master')
@section('header')
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Khai báo thông tin dịch tễ') }}
    </h2>
@endsection

@section('content')
    <div class="flex flex-col space-y-6">
        <div class="w-auto overflow-hidden sm:rounded-lg px-10 py-5 bg-gray-100 shadow-lg">
            <div class="w-full inline-grid grid-cols-2 gap-x-14 gap-y-4">

                <div class="flex flex-row w-full items-center justify-between pr-7">
                    <span>Họ và tên</span>
                    <span
                        class="w-7/12 bg-gray-300 border border-gray-300 text-gray-900 sm:text-xs rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2">{{ $person->name }}</span>
                </div>

                <div class="flex flex-row w-full items-center justify-between pr-7">
                    <span>Số CMND/CCCD</span>
                    <span
                        class="w-7/12 bg-gray-300 border border-gray-300 text-gray-900 sm:text-xs rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2">{{ $person->id_number }}</span>
                </div>

                <div class="flex flex-row w-full items-center justify-between pr-7">
                    <span>Giới tính</span>
                    <span
                        class="w-7/12 bg-gray-300 border border-gray-300 text-gray-900 sm:text-xs rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2">{{ $person->sex }}</span>
                </div>

                <div class="flex flex-row w-full items-center justify-between pr-7">
                    <span>Ngày, tháng, năm sinh</span>
                    <span
                        class="w-7/12 bg-gray-300 border border-gray-300 text-gray-900 sm:text-xs rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2">{{ date('d/m/Y', strtotime($person->birthday)) }}</span>
                </div>

                <div class="flex flex-row w-full items-center justify-between pr-7">
                    <span>Số điện thoại</span>
                    <span
                        class="w-7/12 bg-gray-300 border border-gray-300 text-gray-900 sm:text-xs rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2 h-8">{{ $person->phone_number ?? '' }}</span>
                </div>

                <div class="flex flex-row w-full items-center justify-between pr-7">
                    <span>Địa chỉ thường trú</span>
                    <span
                        class="w-7/12 bg-gray-300 border border-gray-300 text-gray-900 sm:text-xs rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2 h-8">{{ $person->family->address ?? '' }}</span>
                </div>
            </div>
        </div>

        <div class="w-auto overflow-hidden sm:rounded-lg px-10 py-5 bg-gray-100 shadow-lg">
            <form action="{{ route('declarations.store') }}" method="POST" class="flex flex-col gap-y-10 select-none">
                @csrf
                <div class="inline-grid grid-cols-2 gap-x-14 gap-y-4">
                    <div class="w-full flex flex-row items-center gap-x-2 pt-5"
                        x-data="{
                            iso_level: -1,
                            check_iso_level(){
                                if (this.iso_level != -1){
                                    return ()=>{
                                        document.getElementsByName('iso_inf').forEach((el) => {
                                            el.classList.remove('hidden');
                                            el.classList.add('visible');
                                        });
                                    }
                                }
                                document.getElementsByName('iso_inf').forEach((el) => {
                                    el.classList.remove('visible');
                                    el.classList.add('hidden');
                                });
                            }
                        }" ,
                    >
                        <div class="flex w-full items-center justify-between items-center">
                            <label for="isolation_level"
                                   class="text-sm font-medium text-gray-900 block dark:text-gray-400">Mức độ các
                                ly</label>
                            <select id="status" name="status" style="height: 34px;" x-model="iso_level"
                                    @change="check_iso_level()"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-7/12 p-1.5">
                                <option value="-1" selected>Không cách ly</option>
                                <option value="0">F0</option>
                                <option value="1">F1</option>
                                <option value="2">F2</option>
                                <option value="3">F3+</option>
                            </select>
                        </div>
                        <span class="text-red-500 {{$mandatory ?? 'opacity-0'}}">(*)</span>
                    </div>

                    <div name="iso_inf" class="w-full flex flex-row items-center gap-x-2 hidden">
                        <div class="flex w-full items-center justify-between gap-x-2 pt-5" style="height: 34px;">
                            <label for="isolation_date">Ngày cách ly</label>
                            <div class="relative w-7/12 flex flex-row gap-x-2 items-center">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none"
                                     style="height: 34px">
                                    <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor"
                                         viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                              d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                                              clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                                <input name="isolation_date" datepicker="" datepicker-format="dd/mm/yyyy" value="{{ old('isolation_date') }}"
                                       type="text"
                                       style="height: 34px;"
                                       class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5 datepicker-input"
                                >
                            </div>
                        </div>
                        <span class="text-red-500 invisible">(*)</span>
                    </div>

                    <div>
                        <x-input-text name="iso_add" class="w-7/12 bg-gray-50" value="{{ old('iso_add') }}">
                            Nơi cách ly
                        </x-input-text>
                    </div>


                    <div class="w-full flex flex-row items-center gap-x-2 pt-5"
                        x-data="{
                            test_level: -1,
                            check_test_level(){
                                if (this.test_level != -1){
                                    return ()=>{
                                        document.getElementsByName('test_inf').forEach((el) => {
                                            el.classList.remove('hidden');
                                            el.classList.add('visible');
                                        });
                                    }
                                }
                                document.getElementsByName('test_inf').forEach((el) => {
                                    el.classList.remove('visible');
                                    el.classList.add('hidden');
                                });
                            }
                        }",
                    >
                        <div class="flex w-full items-center justify-between items-center">
                            <label for="test_result"
                                   class="text-sm font-medium text-gray-900 block dark:text-gray-400">
                                Kết quả xét nghiệm Covid-19
                            </label>
                            <select id="test_result" name="test_result" style="height: 34px;" x-model="test_level" @change="check_test_level()" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-7/12 p-1.5">
                                <option value="-1" selected>Chưa xét nghiệm</option>
                                <option value="0">Âm tính</option>
                                <option value="1">Dương tính</option>
                            </select>
                        </div>
                        <span class="text-red-500 {{$mandatory ?? 'opacity-0'}}">(*)</span>
                    </div>

                    <div name="test_inf" class="w-full flex flex-row items-center gap-x-2 hidden">
                        <div class="flex w-full items-center justify-between gap-x-2 pt-5" style="height: 34px;">
                            <label for="test_date">Ngày xét nghiệm</label>
                            <div class="relative w-7/12 flex flex-row gap-x-2 items-center">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none"
                                     style="height: 34px">
                                    <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor"
                                         viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                              d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                                              clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                                <input name="test_date" datepicker="" datepicker-format="dd/mm/yyyy" value="{{ old('test_date') }}"
                                       type="text"
                                       style="height: 34px;"
                                       class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5 datepicker-input"
                                >
                            </div>
                        </div>
                        <span class="text-red-500 invisible">(*)</span>
                    </div>

                    <div name="test_inf" class="w-full flex flex-row items-center gap-x-2 hidden">
                        <div class="flex w-full items-center justify-between gap-x-2 pt-5" style="height: 34px;">
                            <label for="test_date">Ngày xét nghiệm</label>
                            <div class="relative w-7/12 flex flex-row gap-x-2 items-center">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none"
                                     style="height: 34px">
                                    <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor"
                                         viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                              d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                                              clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                                <input name="test_date" datepicker="" datepicker-format="dd/mm/yyyy" value="{{ old('test_date') }}"
                                       type="text"
                                       style="height: 34px;"
                                       class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5 datepicker-input"
                                >
                            </div>
                        </div>
                        <span class="text-red-500 invisible">(*)</span>
                    </div>

                </div>

                <input name="person_id" value="{{ $person->id }}" style="display: none;"/>
                <input id="health_state" name="health_state" value="{}" style="display: none;"/>

                <div>
                    <p class="text-base font-medium text-gray-900 inline mb-2 dark:text-gray-400">
                        Theo vòng 14 ngày qua, Anh/Chị có đến khu vực, tỉnh, thành phố, quốc gia/vùng lãnh thổ nào có
                        dịch?
                    </p>
                    <span class="text-red-500">(*)</span><br>
                    <input type="radio" name="move" value="No" onchange="change('move', 0)">
                    <label for="No" class="text-sm font-medium text-gray-900 mb-2 mr-2 dark:text-gray-400">Không</label>
                    <input type="radio" name="move" value="Yes" onchange="change('move', 1)">
                    <label for="Yes" class="text-sm font-medium text-gray-900 mb-2 mr-2 dark:text-gray-400">Có</label>
                </div>

                <div>
                    <p for="cough_status" class="text-base font-medium text-gray-900 inline mb-2 dark:text-gray-400">
                        Trong vòng 14 ngày qua, Anh/Chị có thấy xuất hiện ít nhất 1 trong các dấu hiệu: sốt, ho, khó
                        thở, viêm
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
                    <input type="radio" name="symptomatic_patient" value="No"
                           onchange="change('symptomatic_patient', 0)">
                    <label for="No" class="text-sm font-medium text-gray-900 mb-2 mr-2 dark:text-gray-400">Không</label>
                    <input type="radio" name="symptomatic_patient" value="Yes"
                           onchange="change('symptomatic_patient', 1)">
                    <label for="Yes" class="text-sm font-medium text-gray-900 mb-2 mr-2 dark:text-gray-400">Có</label>
                </div>

                <div class="self-center">
                    <button class="w-32 border rounded bg-green-500 mr-3 px-4 py-2 inline-block">Hoàn thành</button>
                </div>

            </form>

            <script>
                function change(key, value) {
                    let health = JSON.parse(document.getElementById('health_state').value)
                    health[key] = value
                    document.getElementById('health_state').value = JSON.stringify(health)
                }
            </script>
        </div>
    </div>
@endsection
