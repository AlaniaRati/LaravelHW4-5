<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Band;
use App\Models\Song;

class BandsController extends Controller
{
    public function index()
    {
        $bands = Band::all();
        return view('bands.index')->with('title', 'Bands List')->with('bands', $bands);
    }

    public function create()
    {
        return view('bands.create')->with('title', 'Bands add');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);
        Band::create(array(
            'name' => $request->input('name')
        ));
        return redirect(route('bands.index'));
    }

    public function show($id)
    {
        $band = Band::find($id);
        return view('bands.show')->with('band', $band);
    }

    public function edit($id)
    {
        $band = Band::find($id);
        return view('bands.edit')->with('band', $band);
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required'
        ]);
        Band::where('id', $id)->update(array(
            'name' => $request->input('name')
        ));
        return redirect(route('bands.index'));
    }

    public function destroy($id)
    {
        Band::where('id', $id)->delete();
        Song::where('band_id', $id)->delete();
        return redirect(route('bands.index'));
    }
}
