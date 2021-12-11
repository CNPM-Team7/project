@extends('layouts.master')
@section('header')
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Nhân khẩu') }}
    </h2>
@endsection

@section('content')
    <div class="w-full flex flex-col select-none">

        <div class="w-full flex flex-row justify-between my-4">
            <div class="h-auto justify-self-end flex flex-row self-end">
                <label for="search" class="w-28 self-center">Tìm kiếm</label>{{--more search input--}}
                <input class="shadow appearance-none border rounded w-full h-auto py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="search" type="text" placeholder="Nguyễn Văn A">
            </div>

            <div class="flex flex-row space-x-8">
                <div class="w-44 space-y-2">
                    <button class="w-full border rounded bg-yellow-500 px-4 py-2">
                        Khai báo tạm trú
                    </button>

                    <button class="w-full border rounded bg-blue-500 px-4 py-2">
                        Khai báo tạm vắng
                    </button>
                </div>

                <div class="w-28 space-y-2">
                    <a href="{{ route('person.create') }}">
                        <button class="w-full border rounded bg-green-500 px-4 py-2">
                            Thêm mới
                        </button>
                    </a>
                    <button class="w-full border rounded bg-red-500 px-4 py-2">
                        Khai tử
                    </button>
                </div>
            </div>


        </div>

        <hr>

        <div class="flex flex-col my-4">
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-200">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-900 uppercase tracking-wider">
                                    ID Number {{--hover will show register date, place, recieve date, place--}}
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-900 uppercase tracking-wider">
                                    Name
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-900 uppercase tracking-wider">
                                    Birthday {{--hover will show birth place--}}
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-900 uppercase tracking-wider">
                                    Gender
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-900 uppercase tracking-wider">
                                    Race
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-900 uppercase tracking-wider">
                                    Status
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-900 uppercase tracking-wider">
                                    Job {{--hover will show work place--}}
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-900 uppercase tracking-wider">
                                    Owner Relation
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-900 uppercase tracking-wider">
                                    Family Owner
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-900 uppercase tracking-wider">
                                    Note
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-900 uppercase tracking-wider">
                                    Move to
                                </th>
                                <th scope="col" class="relative px-6 py-3">
                                    <span class="sr-only">Edit</span>
                                </th>
                            </tr>
                            </thead>

                            <tbody class="bg-white divide-y divide-gray-200">
                            @php
                                $genderColors = ['blue', 'red', 'green'];
                            @endphp

                            @foreach ($people as $person)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap select-text">
                                    <div class="flex items-center">
                                        <span class="text-sm font-medium text-gray-500">
                                            {{ $person->id_number }}
                                        </span>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap select-text">
                                    <div class="flex items-center">
                                        <span class="text-sm font-medium text-gray-500">
                                            {{ $person->name }}
                                        </span>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-500">{{ $person->birthday }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                                            bg-{{ $genderColors[$person->sex] }}-100 text-{{ $genderColors[$person->sex] }}-500">
                                            {{ $genders[$person->sex] }} {{--set length--}}
                                        </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-500">{{ $person->race }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-500">{{ $statuses[$person->status] }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-500">{{ $person->job }}</div> {{--qua dai, rut gon bang '...'--}}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-500">{{ $person->family ? $person->owner_relation : 'No Info' }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-500">{{ $person->family->owner->name ?? 'No Info' }}</div> {{--nhan vao se ra trang info famliy--}}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-500">{{ $person->note ?? 'Empty' }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-500">{{ $person->move_to ?? 'Here' }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">{{--show, edit and delete--}}
                                    <a href="{{ route('person.edit', $person->id) }}" class="text-indigo-600 hover:text-indigo-500">Edit</a>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <br>
            <div>{{ $people->links() }}</div>
        </div>
    </div>
@endsection
