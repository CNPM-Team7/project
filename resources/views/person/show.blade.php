@extends('layouts.master')
@section('header')
    <div class="flex flex-col gap-y-4">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Thông tin chi tiết nhân khẩu') }}
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
                        <span class="ml-1 text-sm font-medium text-gray-400 md:ml-2 dark:text-gray-500">Chi tiết nhân khẩu</span>
                    </div>
                </li>
            </ol>
        </nav>
    </div>
@endsection

@section('content')
    <div class="flex flex-col space-y-8">
        <div class="w-auto overflow-hidden sm:rounded-lg px-10 py-5 bg-gray-100 shadow-lg">
            <div class="grid grid-cols-1 gap-y-5 divide-gray-300 divide-y divide-solid" style="width: 900px">
                <div class="w-full select-none flex flex-row justify-end space-x-4 mb-4"
                     x-data="{show: false}"
                >
                    <a href="{{ route('person.edit', $person->id) }}">
                        <button class="w-44 border rounded bg-yellow-500 px-4 py-2">
                            Chỉnh sửa
                        </button>
                    </a>

                    @if(!$person->family || $person->id != $person->family->owner_id)
                        <button @click="show = true" type="button" class="w-44 border rounded bg-red-500 px-4 py-2">Xóa
                        </button>
                    @endif

                    {{--Modal--}}
                    <div x-show="show"
                         @keydown.esc.prevent.stop="show = false"
                         class="fixed z-10 inset-0 overflow-y-auto" aria-labelledby="modal-title" role="dialog"
                         aria-modal="true">


                        <div x-show="show"
                             class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">

                            <div x-show="show"
                                 @click="show = false"
                                 class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"
                                 aria-hidden="true"></div>

                            <!-- This element is to trick the browser into centering the modal contents. -->
                            <span x-show="show" class="hidden sm:inline-block sm:align-middle sm:h-screen"
                                  aria-hidden="true">&#8203;</span>

                            <div
                                class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                                    <div class="sm:flex sm:items-start">
                                        <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                                            <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">
                                                Xóa nhân khẩu
                                            </h3>
                                            <div class="mt-2">
                                                <p class="text-sm text-gray-500">
                                                    Chắc chắn muốn xóa nhân khẩu này? Hành động sẽ không thể hoàn tác.
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">

                                    <form method="POST"
                                          action="{{ route('person.destroy', $person->id) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                                class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-red-600 text-base font-medium text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:ml-3 sm:w-auto sm:text-sm">
                                            Xóa
                                        </button>
                                    </form>

                                    <button @click="show = false" type="button"
                                            class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                                        Hủy
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="w-auto flex flex-row items-center gap-x-2 pt-5">
                    <div class="flex w-full items-center justify-between">
                        <span>Họ và tên</span>
                        <span>{{ $person->name }}</span>
                    </div>
                </div>

                <div class="w-auto flex flex-row items-center gap-x-2 pt-5">
                    <div class="flex w-full items-center justify-between">
                        <span>Ngày, tháng, năm sinh</span>
                        <span>{{ date('d/m/Y',strtotime($person->birthday)) }}</span>
                    </div>
                </div>

                <div class="w-auto flex flex-row items-center gap-x-2 pt-5">
                    <div class="flex w-full items-center justify-between">
                        <span>Nơi sinh</span>
                        <span>{{ $person->birth_place }}</span>
                    </div>
                </div>

                <div class="w-auto flex flex-row items-center gap-x-2 pt-5">
                    <div class="flex w-full items-center justify-between">
                        <span>Giới tính</span>
                        <span>{{ $person->name }}</span>
                    </div>
                </div>

                <div class="w-auto flex flex-row items-center gap-x-2 pt-5">
                    <div class="flex w-full items-center justify-between">
                        <span>Dân tộc</span>
                        <span>{{ $person->race }}</span>
                    </div>
                </div>

                <div class="w-auto flex flex-row items-center gap-x-2 pt-5">
                    <div class="flex w-full items-center justify-between">
                        <span>Trạng thái</span>
                        <span>{{ $statuses[$person->status] }}</span>
                    </div>
                </div>

                <div class="w-auto flex flex-row items-center gap-x-2 pt-5">
                    <div class="flex w-full items-center justify-between">
                        <span>Vai trò với chủ hộ</span>
                        <span>{{ $person->owner_relation }}</span>
                    </div>
                </div>

                <div class="w-auto flex flex-row items-center gap-x-2 pt-5">
                    <div class="flex w-full items-center justify-between">
                        <span>ID Hộ khẩu</span>
                        <span>{{ $person->family_id ?? 'Chưa điền' }}</span>
                    </div>
                </div>

                <div class="w-auto flex flex-row items-center gap-x-2 pt-5">
                    <div class="flex w-full items-center justify-between">
                        <span>Nghề nghiệp</span>
                        <span>{{ $person->job ?? 'Chưa điền' }}</span>
                    </div>
                </div>

                <div class="w-auto flex flex-row items-center gap-x-2 pt-5">
                    <div class="flex w-full items-center justify-between">
                        <span>Nơi làm việc</span>
                        <span>{{ $person->work_place ?? 'Chưa điền' }}</span>
                    </div>
                </div>
                <div class="w-auto flex flex-row items-center gap-x-2 pt-5">
                    <div class="flex w-full items-center justify-between">
                        <span>Số CMND/CCCD</span>
                        <span>{{ $person->id_number ?? 'Chưa điền' }}</span>
                    </div>
                </div>

                <div class="w-auto flex flex-row items-center gap-x-2 pt-5">
                    <div class="flex w-full items-center justify-between">
                        <span>Nơi cấp</span>
                        <span>{{ $person->idn_receive_place ?? 'Chưa điền' }}</span>
                    </div>
                </div>
                <div class="w-auto flex flex-row items-center gap-x-2 pt-5">
                    <div class="flex w-full items-center justify-between">
                        <span>Ngày cấp</span>
                        <span>{{ date('d/m/Y', strtotime($person->idn_receive_date)) ?? 'Chưa điền' }}</span>
                    </div>
                </div>
                <div class="w-auto flex flex-row items-center gap-x-2 pt-5">
                    <div class="flex w-full items-center justify-between">
                        <span>Nơi đăng ký</span>
                        <span>{{ $person->register_place ?? 'Chưa điền' }}</span>
                    </div>
                </div>
                <div class="w-auto flex flex-row items-center gap-x-2 pt-5">
                    <div class="flex w-full items-center justify-between">
                        <span>Ngày đăng kí</span>
                        <span>{{ date('d/m/Y', strtotime($person->register_date)) ?? 'Chưa điền' }}</span>
                    </div>
                </div>

                @if($person->move_to)
                    <div class="w-auto flex flex-row items-center gap-x-2 pt-5">
                        <div class="flex w-full items-center justify-between">
                            <span>Địa chỉ sắp chuyển đến</span>
                            <span>{{ $person->move_to }}</span>
                        </div>
                    </div>
                @endif

                @if($person->note)
                    <div class="w-auto flex flex-row items-center gap-x-2 pt-5">
                        <div class="flex w-full items-center justify-between">
                            <span>Ghi chú</span>
                            <p>{{ $person->note }}</p>
                        </div>
                    </div>
                @endif
            </div>


            @if($person->family_id)
                <br><br>
                <div class="grid grid-cols-1 gap-y-5 divide-gray-300 divide-y divide-solid" style="width: 900px">
                    <div class="w-auto flex flex-row items-center gap-x-2 pt-5">
                        <div class="flex w-full items-center justify-between">
                            <span>ID Hộ khẩu</span>
                            <p>
                                <a href="{{ route('families.show', $person->family_id) }}"><u>{{ $person->family_id }}</u></a>
                            </p>
                        </div>
                    </div>

                    <div class="w-auto flex flex-row items-center gap-x-2 pt-5">
                        <div class="flex w-full items-center justify-between">
                            <span>Chủ hộ</span>
                            <p>
                                <a href="{{ route('person.show', $person->family->owner_id) }}"><u>{{ $person->family->owner->name ?? '' }}</u></a>
                            </p>
                        </div>
                    </div>

                    <div class="w-auto flex flex-row items-center gap-x-2 pt-5">
                        <div class="flex w-full items-center justify-between">
                            <span>Quan hệ với chủ hộ</span>
                            <p>{{ $person->owner_relation }}</p>
                        </div>
                    </div>
                </div>
            @endif
        </div>
        <div class="w-auto overflow-hidden sm:rounded-lg px-10 py-5 bg-gray-100 shadow-lg mt-8">

            <h1 class="text-black font-bold">Thống kê tạm trú/tạm vắng</h1>
            <br>
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-200">
                <tr>
                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-900 uppercase tracking-wider">
                        Loại
                    </th>
                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-900 uppercase tracking-wider">
                        Ngày đăng kí
                    </th>
                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-900 uppercase tracking-wider">
                        Ngày bắt đầu
                    </th>
                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-900 uppercase tracking-wider">
                        Ngày kết thúc
                    </th>
                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-900 uppercase tracking-wider">
                        ID Hộ khẩu
                    </th>
                </tr>
                </thead>

                <tbody class="bg-white divide-y divide-gray-200">
                @empty($person->temporaryDeclarations)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap row-span-full" colspan="5">
                            <div class="flex justify-center">
                                <div class="text-sm font-medium text-gray-900">
                                    <span class="font-medium py-8 text-gray-400">Không có thông tin</span>
                                </div>
                            </div>
                        </td>
                    </tr>
                @else
                    @foreach ($person->temporaryDeclarations as $tempo)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap select-text">
                                <div class="flex items-center">
                        <span class="text-sm font-medium text-gray-500">
                            {{ $tempo->type ? 'Tạm vắng' : 'Tạm trú' }}
                        </span>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap select-text">
                                <div class="flex items-center">
                        <span class="text-sm font-medium text-gray-500">
                            {{ $tempo->register_date }}
                        </span>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap select-text">
                                <div class="flex items-center">
                        <span class="text-sm font-medium text-gray-500">
                            {{ $tempo->start_date }}
                        </span>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap select-text">
                                <div class="flex items-center">
                        <span class="text-sm font-medium text-gray-500">
                            {{ $tempo->end_date }}
                        </span>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap select-text">
                                <div class="flex items-center">
                        <span class="text-sm font-medium text-gray-500">
                            <a href="{{ route('families.show', $tempo->family_id) }}"><u>{{ $tempo->family_id }}</u></a>
                        </span>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
        </div>
    </div>
@endsection
