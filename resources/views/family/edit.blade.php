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
                        <a href="{{ route('families.index') }}"
                           class="ml-1 text-sm  text-gray-700 hover:text-gray-900 md:ml-2 dark:text-gray-400 dark:hover:text-white">Hộ
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
                        <span class="ml-1 text-sm font-medium text-gray-400 md:ml-2 dark:text-gray-500">Chinh sua hộ khẩu</span>
                    </div>
                </li>
            </ol>
        </nav>
    </div>
@endsection

@section('content')
    <div class="w-full select-none flex flex-row justify-end space-x-4 mb-4">
        <a href="{{ route('families.show', $family->id) }}">
            <button class="w-44 border rounded bg-blue-500 px-4 py-2">
                Show
            </button>
        </a>

        <form method="POST"
              action="{{ route('families.destroy', $family->id) }}"> {{-- TODO FE should have a warning, and a toast message when done delete --}}
            @csrf
            @method('DELETE')
            <button type="submit" class="w-44 border rounded bg-red-500 px-4 py-2">Delete</button>
        </form>
    </div>

    <form action="{{ route('families.update', $family->id) }}" method="POST" class="flex flex-col gap-y-10 select-none">
        @csrf
        <input name="_method" value="PUT" style="display: none;"/>
        <div class="grid grid-cols-1 gap-y-5 divide-gray-300 divide-y divide-solid">
            <x-input-text name="owner_id" value="{{ $family->owner_id }}" mandatory>
                Owner ID
            </x-input-text>

            <x-input-text name="house_id" value="{{ $family->house_id }}" mandatory>
                House ID
            </x-input-text>

            <x-input-text name="address" value="{{ $family->address }}" mandatory>
                Address
            </x-input-text>

            <div class="w-full flex flex-row items-center gap-x-2 pt-5">
                <div class="flex w-full justify-between items-center">
                    <label for="address">
                        Địa chỉ hộ khẩu
                    </label>
                    <textarea name="address" id="address" type="tex" oninput="auto_grow(this)"
                              class="w-7/12 overflow-hidden resize-none bg-gray-50 border border-gray-300 text-gray-900 sm:text-xs rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">{{ $family->address }}</textarea>
                </div>
                <span class="text-red-500 {{$mandatory ?? 'opacity-0'}}">(*)</span>
            </div>
        </div>
        <button class="w-32 border rounded bg-green-500 px-4 py-2 self-center">Hoàn thành</button>
    </form>
@endsection

<script>
    function auto_grow(element) {
        element.style.height = "5px";
        element.style.height = (element.scrollHeight) + "px";
    }
</script>
