<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sight;
use App\SightMedia;

class SightsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sights = Sight::all();

        return view('sights.index', compact('sights'));
    }

    public function overview()
    {
        $sights = Sight::all();

        return view('sights.overview', compact('sights'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sights.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate(request(), [
            'sight-name' => 'required',
            'sight-description' => 'required',
            'sight-address' => 'required',
            'sight-email' => 'email',
        ]);

        $sight = new Sight();

        $sight->name = request('sight-name');
        $sight->description = request('sight-description');
        $sight->address = request('sight-address');
        $sight->email = request('sight-email');
        $sight->tel = request('sight-tel');

        $sight->save();


        foreach(request('sight-media') as $media){
            $sightMedia = new SightMedia();

            $sightMedia->sight_id = $sight->id;
            $sightMedia->media_id = $media["id"];

            $sightMedia->save();
        }


        return redirect('admin/bezienswaardigheden/overzicht');
    }

    public function media($id){
        $sight = Sight::find($id);

        $sightMedia = $sight->media;

        return response()->json(compact('sightMedia'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $sight = Sight::findOrFail($id);

        return view('sights.show', compact('sight'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sight = Sight::find($id);

        return view('sights.edit', compact('sight'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        /*dd(request()->all());*/

        $sight = Sight::findOrFail($id);

        $sight->name        = request('sight-name');
        $sight->description = request('sight-description');
        $sight->address     = request('sight-address');
        $sight->email       = request('sight-email');
        $sight->tel         = request('sight-tel');
        $sight->save();

        //Onefficient maar snel(deadlines enzo)
        $sightMedia = SightMedia::where('sight_id', $id);
        $sightMedia->delete();

        foreach(request('sight-media') as $media){
            $sightMedia = new SightMedia();

            $sightMedia->sight_id = $id;
            $sightMedia->media_id = $media["id"];

            $sightMedia->save();
        }

        return redirect('bezienswaardigheden/' . $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sight = Sight::findOrFail($id);

        $sight->delete();

        return redirect('admin/bezienswaardigheden/overzicht');
    }
}
