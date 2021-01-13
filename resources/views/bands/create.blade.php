@extends('layouts.app')

@section('content')

    <form action="{{ route('bands.store') }}" method="POST">
        <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
        <input name="name" type="text" placeholder="Band Name">
        <input class="su" type="submit" value="Submit"> 
    </form>

@endsection
