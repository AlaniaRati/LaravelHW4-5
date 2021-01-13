<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Band;
use App\Models\Song;

class SongsController extends Controller
{
    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'band_id' => 'required',
        ]);
        
        Song::create(array(
            'name' => $request->input('name'),
            'band_id' => $request->input('band_id'),
        ));

        return redirect(route('bands.show', $request->input('band_id')));
    }

    public function show($id)
    {
        $songs = Band::join('songs', 'songs.band_id', '=', 'bands.id')->get();
        return $songs;
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        Song::where('id', $id)->delete();
        return [
            'message' => 'success'
        ];
    }
}
