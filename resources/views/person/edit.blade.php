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
                        <a href="{{ route('person.index') }}"
                           class="ml-1 text-sm  text-gray-700 hover:text-gray-900 md:ml-2 dark:text-gray-400 dark:hover:text-white">Nhân
                            khẩu</a>
                    </div>
                </li>
                <li aria-current="page">
                    <div class="flex items-center">
                        <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                        <span class="ml-1 text-sm font-medium text-gray-400 md:ml-2 dark:text-gray-500">Chỉnh sửa nhân khẩu</span>
                    </div>
                </li>
            </ol>
        </nav>
    </div>
@endsection

@section('content')
        <div class="w-full select-none flex flex-row justify-end space-x-4 mb-4">
            <a href="{{ route('person.show', $person->id) }}">
                <x-button-default class="bg-green-400 hover:bg-green-500 focus:ring-green-300">
                    Show
                </x-button-default>
            </a>

            <form method="POST" action="{{ route('person.destroy', $person->id) }}"> {{-- TODO FE should have a warning? and a toast message when done delete? --}}
                @csrf
                @method('DELETE')
                <x-button-default class="bg-red-500 hover:bg-red-600 focus:ring-red-300">
                    Delete
                </x-button-default>
            </form>
        </div>

    <form action="{{ route('person.update', $person->id) }}" method="POST" class="flex flex-col gap-y-10 select-none"
          style="width: 900px">
        @csrf
        @method('PUT')

        <div class="grid grid-cols-1 gap-y-5 divide-gray-300 divide-y divide-solid">
            <x-input-text name="name" class="w-5/12" value="{{ $person->name }}" mandatory>
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
                        <input id="birthday" name="birthday" value="{{ date('d/m/Y',strtotime($person->birthday)) }}"
                               datepicker="" datepicker-orientation="top" datepicker-format="dd/mm/yyyy" type="text"
                               class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 datepicker-input"
                               placeholder="{{ \Carbon\Carbon::now()->format('d/m/Y') }}">
                    </div>
                </div>

                <span class="text-red-500">(*)</span>

            </div>

            <div class="w-full flex flex-row items-center gap-x-2 pt-5">
                <div class="flex w-full justify-between items-center">
                    <label for="birth_place">
                        Nơi cư trú
                    </label>
                    <textarea name="birth_place" id="address" type="tex" oninput="auto_grow(this)"
                              class="w-5/12 h-auto break-normal overflow-hidden resize-none bg-gray-50 border border-gray-300 text-gray-900 sm:text-xs rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2">{{ $person->birth_place }}</textarea>
                </div>
                <span class="text-red-500">(*)</span>
            </div>

            <div class="w-full flex flex-row items-center gap-x-2 pt-5">
                <div class="flex w-full items-center justify-between">
                    <label for="gender" class="text-sm font-medium text-gray-900 block mb-2 dark:text-gray-400">Giới
                        tính</label>
                    <select id="gender" name="sex" value="{{ $person->sex }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-5/12 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        @foreach ($genders as $index => $gender)
                            <option value="{{ $index }}">{{ $gender }}</option>
                        @endforeach
                    </select>
                </div>
                <span class="text-red-500">(*)</span>
            </div>

            <x-input-text name="race" class="w-5/12" value="{{ $person->race }}" mandatory>
                Dân tộc
            </x-input-text>

            <div class="w-full flex flex-row items-center gap-x-2 pt-5">
                <div class="flex w-full items-center justify-between">
                    <label for="status" class="text-sm font-medium text-gray-900 block mb-2 dark:text-gray-400">Trạng
                        thái</label>
                    <select id="status" name="status" value="{{ $person->status }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-5/12 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        @foreach ($statuses as $index => $status)
                            <option value="{{ $index }}">{{ $status }}</option>
                        @endforeach
                    </select>
                </div>
                <span class="text-red-500">(*)</span>
            </div>

            <x-input-text name="owner_relation" class="w-5/12" value="{{ $person->owner_relation }}" mandatory>
                Vai trò với chủ hộ
            </x-input-text>

            <x-input-text name="family_id" class="w-5/12"
                          value="{{ $person->family_id }}"> {{--lam 1 cai seach hay gi do--}}
                ID Ho Khau
            </x-input-text>

            <x-input-text name="job" class="w-5/12" value="{{ $person->job }}">
                Nghề nghiệp
            </x-input-text>

            <x-input-text name="work_place" class="w-5/12" value="{{ $person->work_place }}">
                Nơi làm việc
            </x-input-text>

            <x-input-text name="id_number" class="w-5/12" value="{{ $person->id_number }}">
                Số CMND/CCCD
            </x-input-text>

            <div class="w-full flex flex-row items-center gap-x-2 pt-5">
                <div class="flex w-full justify-between items-center">
                    <label for="idn_receive_place">
                        Nơi cấp
                    </label>
                    <textarea name="idn_receive_place" id="address" type="tex" oninput="auto_grow(this)"
                              class="w-5/12 h-auto break-normal overflow-hidden resize-none bg-gray-50 border border-gray-300 text-gray-900 sm:text-xs rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2">{{ $person->idn_receive_place }}</textarea>
                </div>
                <span class="text-red-500 invisible">(*)</span>
            </div>

            <div class="w-full flex flex-row items-center gap-x-2 pt-5">
                <div class="flex w-full items-center justify-between gap-x-1">
                    <label for="idn_receive_date">Ngày cap</label>
                    <div class="relative w-5/12 flex flex-row gap-x-2">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor"
                                 viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                      d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                                      clip-rule="evenodd"></path>
                            </svg>
                        </div>
                        <input id="idn_receive_date" name="idn_receive_date"
                               value="{{ date('d/m/Y', strtotime($person->idn_receive_date)) }}" datepicker=""
                               datepicker-orientation="top" datepicker-format="dd/mm/yyyy" type="text"
                               class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 datepicker-input"
                               placeholder="{{ \Carbon\Carbon::now()->format('d/m/Y') }}">
                    </div>
                </div>
                <span class="text-red-500 {{$mandatory ?? 'opacity-0'}}">(*)</span>
            </div>

            <div class="w-full flex flex-row items-center gap-x-2 pt-5">
                <div class="flex w-full justify-between items-center">
                    <label for="register_place">
                        Nơi đăng ký
                    </label>
                    <textarea name="register_place" id="address" type="tex" oninput="auto_grow(this)"
                              class="w-5/12 h-auto break-normal overflow-hidden resize-none bg-gray-50 border border-gray-300 text-gray-900 sm:text-xs rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2">{{ $person->register_place }}</textarea>
                </div>
                <span class="text-red-500 invisible">(*)</span>
            </div>

            <div class="w-full flex flex-row items-center gap-x-2 pt-5">
                <div class="flex w-full items-center justify-between gap-x-1">
                    <label for="register_date">Ngày dang ki</label>
                    <div class="relative w-5/12 flex flex-row gap-x-2">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor"
                                 viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                      d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                                      clip-rule="evenodd"></path>
                            </svg>
                        </div>
                        <input id="register_date" name="register_date"
                               value="{{ date('d/m/Y', strtotime($person->register_date)) }}" datepicker=""
                               datepicker-orientation="top" datepicker-format="dd/mm/yyyy" type="text"
                               class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 datepicker-input"
                               placeholder="{{ \Carbon\Carbon::now()->format('d/m/Y') }}">
                    </div>
                </div>
                <span class="text-red-500 {{$mandatory ?? 'opacity-0'}}">(*)</span>
            </div>

            <x-input-text name="move_to" class="w-5/12" value="{{ $person->move_to }}">
                Địa chỉ sap chuyển đến
            </x-input-text>

            <div class="w-full flex flex-row items-center gap-x-2 pt-5">
                <div class="flex w-full justify-between items-center">
                    <label for="note">
                        Ghi chú
                    </label>
                    <textarea name="note" id="note" type="tex" oninput="auto_grow(this)"
                              class="w-5/12 h-auto break-normal overflow-hidden resize-none bg-gray-50 border border-gray-300 text-gray-900 sm:text-xs rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2">{{ $person->note }}</textarea>
                </div>
                <span class="text-red-500 invisible">(*)</span>
            </div>
        </div>
        <button class="w-32 border rounded bg-green-500 px-4 py-2 self-center">Hoàn thành</button>
    </form>

@endsection
<script>
    function auto_grow(element) {
        element.style.height = "5px";
        element.style.height = (element.scrollHeight)+"px";
    }
</script>
