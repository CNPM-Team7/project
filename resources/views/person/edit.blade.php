@extends('layouts.master')
@section('header')
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Person') }}
    </h2>
@endsection
@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="h-screen bg-white overflow-hidden shadow-xl sm:rounded-lg border border-gray-100 p-10">
                <h2>{{ $person->name }}</h2>
                <form action="{{ route('person.update', $person->id) }}" method="POST">
                    {{ method_field('PUT') }}
                    @csrf
                    name<input type="text" name="name" value="{{ $person->name }}">
                    birthday<input type="date" name="birthday" value="{{ $person->birthday }}">
                    birth_place<input type="text" name="birth_place" value="{{ $person->birth_place }}">
                    sex<select name="sex">
                        <option value="0" {{ $person->sex == 0?"selected":"" }}>Male</option>
                        <option value="1" {{ $person->sex == 1?"selected":"" }}>Female</option>
                    </select>
                    race<input type="text" name="race" value="{{ $person->race }}">
                    job<input type="text" name="job" value="{{ $person->job }}">
                    work_place<input type="text" name="work_place" value="{{ $person->work_place }}">
                    id_number<input type="text" name="id_number" value="{{ $person->id_number }}">
                    idn_receive_place<input type="text" name="idn_receive_place" value="{{ $person->idn_receive_place }}">
                    idn_receive_date<input type="date" name="idn_receive_date" value="{{ $person->idn_receive_date }}">
                    register_place<input type="text" name="register_place" value="{{ $person->register_place }}">
                    register_date<input type="date" name="register_date" value="{{ $person->register_date }}">
                    owner_relation<input type="text" name="owner_relation" value="{{ $person->owner_relation }}">
                    status<select name="status">
                        <option value="0" {{ $person->sex == 0?"selected":"" }}>Không tiếp xúc/bị lây nhiễm</option>
                        @for($i = 1; $i <= 4; $i++)
                        <option value="{{ $i }}" {{ $person->status == $i?"selected":"" }}>F{{$i-1}}</option>
                        @endfor
                    </select>
                    family_id<select name="family_id">
                        @foreach($families as $family)
                            <option value="{{ $family->id }}" {{ $person->family_id == $family->id?"selected":"" }}>{{$family->id}} - {{ $owner_name[$family->id]->name }}</option>
                        @endforeach
                    </select>
                    <input type="submit" value="submit">
                </form>
            </div>
        </div>
    </div>
@endsection
