@extends('layouts.master')
@section('header')
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Thêm mới nhân khẩu') }}
    </h2>
@endsection

@section('content')
    <form action="{{ route('families.store') }}" method="POST" class="flex flex-col gap-y-10 select-none">
        @csrf
        <div class="grid grid-cols-2 gap-x-14 gap-y-4">
            <x-input-text name="owner_id" mandatory>
                Owner ID
            </x-input-text>

            <x-input-text name="house_id" mandatory>
                House ID
            </x-input-text>

            <x-input-text name="address" mandatory>
                Address
            </x-input-text>
        </div>
        <button class="w-32 border rounded bg-green-500 px-4 py-2 self-center">Hoàn thành</button>
    </form>
@endsection