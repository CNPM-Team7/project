@extends('layouts.master')
@section('header')

    <div class="flex flex-col gap-y-4">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Thêm mới nhân khẩu') }}
        </h2>


        <nav class="flex" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-3">
                <li class="inline-flex items-center">
                    <a href="{{ route('dashboard') }}" class="inline-flex items-center font-medium text-sm text-gray-700 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">
                        <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path></svg>
                        Trang chủ
                    </a>
                </li>
                <li>
                    <div class="flex items-center">
                        <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                        <a href="{{ route('person.index') }}" class="ml-1 text-sm  text-gray-700 hover:text-gray-900 md:ml-2 dark:text-gray-400 dark:hover:text-white">Nhân khẩu</a>
                    </div>
                </li>
                <li aria-current="page">
                    <div class="flex items-center">
                        <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                        <span class="ml-1 text-sm font-medium text-gray-400 md:ml-2 dark:text-gray-500">Chi tiet nhân khẩu</span>
                    </div>
                </li>
            </ol>
        </nav>
    </div>


@endsection

@section('content')
<button><a href="{{ route('person.edit', $person->id) }}">Edit</a></button>
<form method="POST" action="{{ route('person.destroy', $person->id) }}"> {{-- TODO should have a warning? and a toast message when done delete? --}}
    {{ csrf_field() }}
    <input name="_method" value="DELETE" style="display: none;" />
    <button type="submit">Delete</button>
</form>
    {{-- TODO show moi thong tin trong DB --}}
    @if($person->family_id)
        <div> {{-- TODO pretify these --}}
            ID Ho Khau: <a href="{{ route('families.show', $person->family_id) }}">{{ $person->family_id }}</a>
        </div>
        <div>
            Chu Ho Khau: <a href="{{ route('person.show', $person->family->owner->id) }}">{{ $person->family->owner->name }}</a>
        </div>
        <div>
            Quan he voi Chu Ho Khau: {{ $person->owner_relation }}
        </div>
        <div>Cac thanh vien trong Ho Khau:</div>
        @php
            $genderColors = ['blue', 'red', 'green']
        @endphp
        <table class="min-w-full divide-y divide-gray-200"> {{-- TODO overflow x --}}
            <thead class="bg-gray-200">
            <tr>
                <th scope="col"
                    class="px-6 py-3 text-left text-xs font-medium text-gray-900 uppercase tracking-wider">
                    ID Number
                </th>
                <th scope="col"
                    class="px-6 py-3 text-left text-xs font-medium text-gray-900 uppercase tracking-wider">
                    Name
                </th>
                <th scope="col"
                    class="px-6 py-3 text-left text-xs font-medium text-gray-900 uppercase tracking-wider">
                    Birthday
                </th>
                <th scope="col"
                    class="px-6 py-3 text-left text-xs font-medium text-gray-900 uppercase tracking-wider">
                    Gender
                </th>
                <th scope="col"
                    class="px-6 py-3 text-left text-xs font-medium text-gray-900 uppercase tracking-wider">
                    Race
                </th>
                <th scope="col"
                    class="px-6 py-3 text-left text-xs font-medium text-gray-900 uppercase tracking-wider">
                    Status
                </th>
                <th scope="col"
                    class="px-6 py-3 text-left text-xs font-medium text-gray-900 uppercase tracking-wider">
                    Job
                </th>
                <th scope="col"
                    class="px-6 py-3 text-left text-xs font-medium text-gray-900 uppercase tracking-wider">
                    Owner Relation
                </th>
                <th scope="col"
                    class="px-6 py-3 text-left text-xs font-medium text-gray-900 uppercase tracking-wider">
                    Family Owner
                </th>
                <th scope="col"
                    class="px-6 py-3 text-left text-xs font-medium text-gray-900 uppercase tracking-wider">
                    Note
                </th>
                <th scope="col"
                    class="px-6 py-3 text-left text-xs font-medium text-gray-900 uppercase tracking-wider">
                    Move to
                </th>
                <th scope="col" class="relative px-6 py-3">
                    <span class="sr-only">Edit</span>
                </th>
            </tr>
            </thead>

            <tbody class="bg-white divide-y divide-gray-200">


            @foreach ($person->family->members as $person)
                <tr>
                    <td data-tooltip-target="tooltip-id_number" class="px-6 py-4 whitespace-nowrap select-text">
                        <div class="flex items-center">
                        <span class="text-sm font-medium text-gray-500">
                            {{ $person->id_number }}
                        </span>
                        </div>
                    </td>
                    <div id="tooltip-id_number" role="tooltip" class="tooltip absolute z-10 inline-block bg-gray-900 font-medium shadow-sm text-white py-2 px-3 text-sm rounded-lg opacity-0 duration-300 transition-opacity invisible dark:bg-gray-700">
                        <div class="flex flex-col">
                            <span>
                                Register Date: <u>{{ $person->register_date }}</u>
                            </span>
                            <span>
                                Register Place: <u>{{ $person->register_place }}</u>
                            </span>
                            <span>
                                Receive Date: <u>{{ $person->idn_receive_date }}</u>
                            </span>
                            <span>
                                Receive Place: <u>{{ $person->idn_receive_place }}</u>
                            </span>
                        </div>
                        <div class="tooltip-arrow" data-popper-arrow></div>
                    </div>

                    <td class="px-6 py-4 whitespace-nowrap select-text">
                        <div class="flex items-center">
                        <span class="text-sm font-medium text-gray-500">
                            <a href="{{ route('person.show', $person->id) }}">{{ $person->name }}</a>
                        </span>
                        </div>
                    </td>
                    <td data-tooltip-target="tooltip-birthday" class="px-6 py-4 whitespace-nowrap">
                        <div
                            class="text-sm text-gray-500">{{ date('d/m/Y', strtotime($person->birthday)) }}</div>
                    </td>
                    <div id="tooltip-birthday" role="tooltip" class="tooltip absolute z-10 inline-block bg-gray-900 font-medium shadow-sm text-white py-2 px-3 text-sm rounded-lg opacity-0 duration-300 transition-opacity invisible dark:bg-gray-700">
                        <span>
                            Birthday Place: <u>{{ $person->birth_place }}</u>
                        </span>
                        <div class="tooltip-arrow" data-popper-arrow></div>
                    </div>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full
                            bg-{{ $genderColors[$person->sex] }}-100 text-{{ $genderColors[$person->sex] }}-500">
                            {{ $genders[$person->sex] }} {{-- TODO set fixed length --}}
                        </span>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm text-gray-500">{{ $person->race }}</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm text-gray-500">{{ $statuses[$person->status] }}</div>
                    </td>
                    <td data-tooltip-target="tooltip-job" class="px-6 py-4 whitespace-nowrap">
                        <div
                            class="text-sm text-gray-500">{{ $person->job }}</div> {{-- TODO qua dai, rut gon bang '...' --}}
                    </td>
                    <div id="tooltip-job" role="tooltip" class="tooltip absolute z-10 inline-block bg-gray-900 font-medium shadow-sm text-white py-2 px-3 text-sm rounded-lg opacity-0 duration-300 transition-opacity invisible dark:bg-gray-700">
                        <span>
                            Work Place: <u>{{ $person->work_place }}</u>
                        </span>
                        <div class="tooltip-arrow" data-popper-arrow></div>
                    </div>

                    <td class="px-6 py-4 whitespace-nowrap">
                        <div
                            class="text-sm text-gray-500">{{ $person->family ? $person->owner_relation : 'No Info' }}</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div
                            class="text-sm text-gray-500">{{ $person->family->owner->name ?? 'No Info' }}</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm text-gray-500">{{ $person->note ?? 'Empty' }}</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm text-gray-500">{{ $person->move_to ?? 'Here' }}</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium"> {{-- TODO pretify these :>> --}}
                        <a href="{{ route('person.show', $person->id) }}"
                            class="text-green-600 hover:text-green-500">Show</a>
                        <a href="{{ route('person.edit', $person->id) }}"
                            class="text-indigo-600 hover:text-indigo-500">Edit</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @endif

@endsection
