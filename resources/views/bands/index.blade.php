@extends('layouts.app')

@section('content')

    <div class="wrap">
        <a href="{{ route('bands.create') }}">Add</a>
    </div>

    <div>
        <ul>
            @foreach ($bands as $band)
                <li>
                    <form action="{{ route('bands.destroy', $band->id) }}" method="POST">
                        <a href="{{ route('bands.show', $band->id) }}">{{ $band->name }} (Song count: {{ $band->songs->count() }})</a>
                        <a href="{{ route('bands.edit', $band->id) }}"> [Edit] </a>
                        @csrf
                        @method('DELETE')
                        <input value="Delete" class="del" type="submit" href="{{ route('bands.destroy', $band->id) }}"></a>
                    </form>
                </li>
            @endforeach
        </ul>
    </div>

@endsection
