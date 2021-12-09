@extends('layouts.master')
@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="h-screen bg-white overflow-hidden shadow-xl sm:rounded-lg border border-gray-100 p-10">
                <h2>Create</h2>
                <form action="{{ route('person.store') }}" method="POST">
                    @csrf
                    name<input type="text" name="name">
                    birthday<input type="date" name="birthday">
                    birth_place<input type="text" name="birth_place">
                    sex<select name="sex">
                        <option value="0">Male</option>
                        <option value="1">Female</option>
                    </select>
                    race<input type="text" name="race">
                    job<input type="text" name="job">
                    work_place<input type="text" name="work_place">
                    id_number<input type="text" name="id_number">
                    idn_receive_place<input type="text" name="idn_receive_place">
                    idn_receive_date<input type="date" name="idn_receive_date">
                    register_place<input type="text" name="register_place">
                    register_date<input type="date" name="register_date">
                    owner_relation<input type="text" name="owner_relation">
                    status<select name="status">
                        <option value="0">Không tiếp xúc/bị lây nhiễm</option>
                        @for($i = 1; $i <= 4; $i++)
                        <option value="{{ $i }}">F{{$i-1}}</option>
                        @endfor
                    </select>
                    family_id<select name="family_id">
                        @foreach($families as $family)
                            <option value="{{ $family->id }}">{{$family->id}} - {{ $owner_name[$family->id]->name }}</option>
                        @endforeach
                    </select>
                    <input type="submit" value="submit">
                </form>
            </div>
        </div>
    </div>
@endsection
