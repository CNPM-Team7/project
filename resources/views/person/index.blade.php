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
                <h2>Person</h2>
                <a href="{{route('person.create')}}">create</a>
                @foreach($people as $person)
                    <a href="{{ route('person.edit', $person->id) }}">edit {{ $person->id }}</a>
                    <form action="{{ route('person.destroy', $person->id) }}" method="POST">
                        {{ method_field('DELETE') }}
                        @csrf
                        <input type="submit" value="delete {{ $person->id }}">
                    </form>
                @endforeach
            </div>
        </div>
    </div>
@endsection
