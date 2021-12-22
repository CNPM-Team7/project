@extends('layouts.master')
@section('header')
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Chi tiet ho khẩu') }} {{-- TODO check tung trang xem tieu de da dung chua, da chuyen het text ve tieng viet chua, the <title> cung phai co noi dung giong tieu de --}}
    </h2>
@endsection

@section('content')
<button><a href="{{ route('families.edit', $family->id) }}">Edit</a></button>
<form method="POST" action="{{ route('families.destroy', $family->id) }}"> {{-- TODO should have a warning? and a toast message when done delete? --}}
    {{ csrf_field() }}
    <input name="_method" value="DELETE" style="display: none;" />
    <button type="submit">Delete</button>
</form>
    <div>House Id: {{ $family->house_id }}</div>
    <div>Address: {{ $family->address }}</div>
    <div>Chu ho: <a href="{{ route('families.show', $family->owner->id) }}">{{ $family->owner->name }}</a></div>
    <div>Thanh vien</div>
        @php
            $genderColors = ['blue', 'red', 'green']
        @endphp
        <table class="min-w-full divide-y divide-gray-200">
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


            @foreach ($family->members as $person)
                <tr>
                    <td data-tooltip-target="tooltip-id_number {{ $person->id_number }}"
                        class="px-6 py-4 whitespace-nowrap select-text">
                        <div class="flex items-center">
                        <span class="text-sm font-medium text-gray-500">
                            {{ $person->id_number }}
                        </span>
                        </div>
                    </td>
                    <div id="tooltip-id_number {{ $person->id_number }}" role="tooltip"
                         class="tooltip absolute z-10 inline-block bg-gray-900 font-medium shadow-sm text-white py-2 px-3 text-sm rounded-lg opacity-0 duration-300 transition-opacity invisible dark:bg-gray-700">
                        <div class="flex flex-col">
                            <span>
                                Register Date: <u>{{ date('d/m/Y', strtotime($person->register_date)) }}</u>
                            </span>
                            <span>
                                Register Place: <u>{{ $person->register_place }}</u>
                            </span>
                            <span>
                                Receive Date: <u>{{ date('d/m/Y', strtotime($person->idn_receive_date)) }}</u>
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
                    <td data-tooltip-target="tooltip-birthday {{ $person->id_number }}"
                        class="px-6 py-4 whitespace-nowrap">
                        <div
                            class="text-sm text-gray-500">{{ date('d/m/Y', strtotime($person->birthday)) }}</div>
                    </td>
                    <div id="tooltip-birthday {{ $person->id_number }}" role="tooltip"
                         class="tooltip absolute z-10 inline-block bg-gray-900 font-medium shadow-sm text-white py-2 px-3 text-sm rounded-lg opacity-0 duration-300 transition-opacity invisible dark:bg-gray-700">
                        <span>
                            Birthday Place: <u>{{ $person->birth_place }}</u>
                        </span>
                        <div class="tooltip-arrow" data-popper-arrow></div>
                    </div>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div
                            class="flex flex-row py-0.5 justify-center rounded-full bg-{{ $genderColors[$person->sex] }}-100">
                            <span
                                class="text-xs leading-5 font-semibold text-{{ $genderColors[$person->sex] }}-500">
                                {{ $genders[$person->sex] }}
                            </span>
                        </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm text-gray-500">{{ $person->race }}</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm text-gray-500">{{ $statuses[$person->status] }}</div>
                    </td>
                    <td data-tooltip-target="tooltip-job {{ $person->id_number }}"
                        class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm text-gray-500">
                            <p class="truncate w-20">
                                {{ $person->job }}
                            </p>
                        </div>

                    </td>
                    <div id="tooltip-job {{ $person->id_number }}" role="tooltip"
                         class="tooltip absolute z-10 inline-block bg-gray-900 font-medium shadow-sm text-white py-2 px-3 text-sm rounded-lg opacity-0 duration-300 transition-opacity invisible dark:bg-gray-700">

                        <div class="flex flex-col">
                            <span>
                                Job: <u>{{ $person->job }}</u>
                            </span>
                            <span>
                                Work Place: <u>{{ $person->work_place }}</u>
                            </span>
                        </div>

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
                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                        <a href="{{ route('person.show', $person->id) }}"
                           class="text-green-600 hover:text-green-500">
                            <div class="flex flex-row space-x-2">
                                <i class="material-icons-outlined text-base">visibility</i>
                                <span class="pt-0.5">Show</span>
                            </div>

                        </a>
                        <a href="{{ route('person.edit', $person->id) }}"
                           class="text-indigo-600 hover:text-indigo-500">
                            <div class="flex flex-row space-x-2">
                                <i class="material-icons-outlined text-base">edit</i>
                                <span class="pt-0.5">Edit</span>
                            </div>

                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
@endsection