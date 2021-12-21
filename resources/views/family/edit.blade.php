@extends('layouts.master')
@section('header')
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Thêm mới nhân khẩu') }}
    </h2>
@endsection

@section('content')
    <form action="{{ route('families.update', $family->id) }}" method="POST" class="flex flex-col gap-y-10 select-none">
        @csrf
        <input name="_method" value="PUT" style="display: none;" />
        <div class="grid grid-cols-2 gap-x-14 gap-y-4">
            <x-input-text name="owner_id" value="{{ $family->owner_id }}" mandatory>
                Owner ID
            </x-input-text>

            <x-input-text name="house_id" value="{{ $family->house_id }}" mandatory>
                House ID
            </x-input-text>

            <x-input-text name="address" value="{{ $family->address }}" mandatory> {{-- TODO input box too small --}}
                Address
            </x-input-text>
        </div>
        <button class="w-32 border rounded bg-green-500 px-4 py-2 self-center">Hoàn thành</button>
    </form>
@endsection
