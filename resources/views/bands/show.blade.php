@extends('layouts.app')

@section('content')

    <h1>{{ $band->name }}</h1>

    <form action="{{ route('songs.store') }}" method="POST">
        <label>Add Song</label>
        <input name="name" type="text" placeholder="Song Name">
        <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
        <input name="band_id" type="hidden" value="{{ $band->id }}">
        <input type="submit">
    </form>

    <ul id="song-list">
      
    </ul>

    <script>
        $.ajaxSetup({
            headers: {
                'X-XSRF-TOKEN': '{{ csrf_token() }}'
            }
        });

        function delete_song(id) {
            $.ajax({
                url: `/songs/${id}`,
                type: 'DELETE',
                data: {
                    _token: "{{ csrf_token() }}",
                    id: id
                },
                success: reload,
                error: function(){
                    alert("something went wrong!");
                }
            });
        }

        function reload() {
            $.ajax({
                url: "{{ route('songs.show', $band->id) }}",
                success: function(results) {
                    console.log(results);
                    let output = "";
                    results.forEach(song => {
                        output += `<li>
                                <a href="${song.id}"> ${song.name} </a>
                                <button onclick='delete_song(${song.id})'> delete </button>
                            </li>`
                    });
                    $("#song-list").html(output);
                }
            });
        }

        reload();

    </script>

@endsection
