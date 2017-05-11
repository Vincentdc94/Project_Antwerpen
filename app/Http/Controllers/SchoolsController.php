<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\School;
use App\Field;

class SchoolsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $scholen = School::all();

        return view('schools.index', compact('scholen'));
    }

    public function overview()
    {
        $scholen = School::all();

        return view('schools.overview', compact('scholen'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('schools.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $school = new School();

        $school->name = $request->school["title"];
        $school->description = $request->school["text"];

        $school->save();

        $opleidingen = $request->school["opleidingen"];

        for($opleidingIndex = 0; $opleidingIndex < count($opleidingen); $opleidingIndex++){
            $field = new Field();

            $field->name = $opleidingen[$opleidingIndex]["naam"];
            $field->description = $opleidingen[$opleidingIndex]["beschrijving"];
            $field->link = $opleidingen[$opleidingIndex]["link"];

            $field->school_id = $school->id;

            $field->save();
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $school = School::findOrFail($id);
        
        return view('schools.show', compact('school'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $school = School::findOrFail($id);
        $opleidingen = Field::where('school_id', '=', $id);

        return view('schools.edit', compact('school', 'opleidingen'));
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

        $school = School::findOrFail($id);

        $school->name       = request('school-name');
        $school->description= request('school-description');
        $school->save();

        return redirect('scholen/' . $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $school = School::findOrFail($id);

        $school->delete();

        return redirect('admin/scholen/overzicht');
    }
}
