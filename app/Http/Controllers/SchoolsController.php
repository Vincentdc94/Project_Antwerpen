<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\School;
use App\Field;
use Illuminate\Support\Facades\Auth;

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
        $school->description = $request->school["description"];

        $school->save();

        $opleidingen = $request->school["opleidingen"];

        for ($opleidingIndex = 0; $opleidingIndex < count($opleidingen); $opleidingIndex++) {
            $field = new Field();

            $field->name = $opleidingen[$opleidingIndex]["naam"];
            $field->description = $opleidingen[$opleidingIndex]["beschrijving"];
            $field->link = $opleidingen[$opleidingIndex]["link"];

            $field->school_id = $school->id;

            $field->save();
        }

        session()->flash('message', 'School succesvol toegevoegd.');

        return redirect('admin/scholen/overzicht');
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
        $school = School::findOrFail($id);

        $school->name = $request->school["title"];
        $school->description = $request->school["description"];

        $school->save();

        $opleidingen = $request->school["opleidingen"];

        for ($opleidingIndex = 0; $opleidingIndex < count($opleidingen); $opleidingIndex++) {
            $field = Field::where('school_id', $school->id);
            $field->delete();
        }

        for ($opleidingIndex = 0; $opleidingIndex < count($opleidingen); $opleidingIndex++) {
            $newField = new Field();
            
            $newField->name = $opleidingen[$opleidingIndex]["naam"];
            $newField->description = $opleidingen[$opleidingIndex]["beschrijving"];
            $newField->link = $opleidingen[$opleidingIndex]["link"];

            $newField->school_id = $school->id;

            $newField->save();
        }

        session()->flash('message', 'School succesvol bewerkt.');
        
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

        session()->flash('message', 'School succesvol verwijderd.');

        return redirect('admin/scholen/overzicht');
    }

    public function opleidingen(Request $request, $id)
    {
        $opleidingen = Field::where('school_id', '=', $id);

        return response()->json($opleidingen->get());
    }
}
