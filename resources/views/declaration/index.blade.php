@extends('layouts.master')
@section('header')
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Declaration') }}
    </h2>
@endsection

@section('content')


    <div class="w-full flex flex-col select-none">

        <div class="flex flex-col mb-4 pt-2">
            <div class="overflow-x-auto w-full">
                <div class="py-2 align-middle inline-block min-w-full">
                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-200">
                            <tr>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-900 uppercase tracking-wider">
                                    Person ID
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-900 uppercase tracking-wider">
                                    Status
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-900 uppercase tracking-wider">
                                    Test Result
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-900 uppercase tracking-wider">
                                    Test Date
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-900 uppercase tracking-wider">
                                    Isolation Date
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-900 uppercase tracking-wider">
                                    Action
                                </th>
                            </tr>
                            </thead>

                            <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($declarations as $declaration)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="text-sm font-medium text-gray-900">
                                            <u><a href="{{ route('person.show', $declaration->declarant->id) }}">
                                            {{ $declaration->declarant->name }}
                                            </a></u>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="text-sm font-medium text-gray-900"> {{-- TODO F-1? --}}
                                            {{ $declaration->status == 3 ? '> F2' : 'F' . $declaration->status }}
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="text-sm font-medium text-gray-900">
                                            {{ $declaration->test_result }}
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">{{ $declaration->test_date }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">{{ $declaration->isolation_date }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <a href="{{ route('declarations.show', $declaration->id) }}"
                                       class="text-green-600 hover:text-green-500">
                                        <div class="flex flex-row space-x-2">
                                            <i class="material-icons-outlined text-base">visibility</i>
                                            <span class="pt-0.5">Show</span>
                                        </div>

                                    </a>
                                    <a href="{{ route('declarations.edit', $declaration->id) }}"
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
                    </div>
                </div>
            </div>
            <br>
            {{ $declarations->links() }}
        </div>
    </div>
@endsection
