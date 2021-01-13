@extends('layouts.app')

@section('content')

    <form action="{{ route('bands.update', $band->id) }}" method="POST">
        <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
        <input name="name" type="text" placeholder="Band Name" value="{{ $band->name }}">
        @csrf
        @method('PUT')
        <input type="submit" value="Update" class="su">
    </form>

@endsection
