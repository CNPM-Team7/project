@extends('layouts.master')
@section('header')
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Thêm mới nhân khẩu') }}
    </h2>
@endsection

@section('content')
    <form action="{{ route('families.update', $family->id) }}" method="POST" class="flex flex-col gap-y-10 select-none">
        @csrf
        <input name="_method" value="PUT" style="display: none;"/>
        <div class="grid grid-cols-2 gap-x-14 gap-y-4">
            <x-input-text name="owner_id" value="{{ $family->owner_id }}" mandatory>
                Owner ID
            </x-input-text>

            <x-input-text name="house_id" value="{{ $family->house_id }}" mandatory>
                House ID
            </x-input-text>

            <x-input-text name="address" value="{{ $family->address }}"
                          mandatory> {{-- TODO input box too small -> dùng textbox? --}}
                Address
            </x-input-text>

            <div class="w-full flex flex-row items-center gap-x-2 pt-5">
                <div class="flex w-full justify-between">
                    <label for="address">
                        Địa chỉ hộ khâu
                    </label>
                    <textarea name="address" id="address" type="tex"
                              class="w-5/12 h-20 bg-gray-50 border border-gray-300 text-gray-900 sm:text-xs rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">{{ $family->address }}</textarea>
                </div>
                <span class="text-red-500 {{$mandatory ?? 'opacity-0'}}">(*)</span>
            </div>
        </div>
        <button class="w-32 border rounded bg-green-500 px-4 py-2 self-center">Hoàn thành</button>
    </form>
@endsection
