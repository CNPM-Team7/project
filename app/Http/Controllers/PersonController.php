<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Person;
use App\Models\Family;

class PersonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $people = Person::all();
        return view('person.index')->with([
            'people' => $people
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $families = Family::all();
        $owner_name = array();
        foreach($families as $family){
            $owner_name[$family->id] = Person::find($family->owner_id);
        }
        return view('person.create')->with([
            'families' => $families,
            'owner_name' => $owner_name
        ]);;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        Person::create([
            'name' => $request->get('name'),
            'birthday' => $request->get('birthday'),
            'birth_place' => $request->get('birth_place'),
            'sex' => $request->get('sex'),
            'race' => $request->get('race'),
            'job' => $request->get('job'),
            'work_place' => $request->get('work_place'),
            'id_number' => $request->get('id_number'),
            'idn_receive_place' => $request->get('idn_receive_place'),
            'idn_receive_date' => $request->get('idn_receive_date'),
            'register_place' => $request->get('register_place'),
            'register_date' => $request->get('register_date'),
            'owner_relation' => $request->get('owner_relation'),
            'status' => $request->get('status'),
            'family_id' => $request->get('family_id'),
        ]);
        return redirect()->route('person.index');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        $person = Person::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        $person = Person::find($id);
        // $people = Person::all();
        
        $families = Family::all();
        $owner_name = array();
        foreach($families as $family){
            $owner_name[$family->id] = Person::find($family->owner_id);
        }
        // echo "<pre>";
        //     print_r($family_name);
        // echo "</pre>";
        // dd($family_name[1]->name);

        return view('person.edit')->with([
            'person' => $person,
            'families' => $families,
            'owner_name' => $owner_name
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        Person::find($id)->update([
            'name' => $request->get('name'),
            'birthday' => $request->get('birthday'),
            'birth_place' => $request->get('birth_place'),
            'sex' => $request->get('sex'),
            'race' => $request->get('race'),
            'job' => $request->get('job'),
            'work_place' => $request->get('work_place'),
            'id_number' => $request->get('id_number'),
            'idn_receive_place' => $request->get('idn_receive_place'),
            'idn_receive_date' => $request->get('idn_receive_date'),
            'register_place' => $request->get('register_place'),
            'register_date' => $request->get('register_date'),
            'owner_relation' => $request->get('owner_relation'),
            'status' => $request->get('status'),
            'family_id' => $request->get('family_id'),
        ]);
        return redirect()->route('person.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        Person::find($id)->delete();
        return redirect()->route('person.index');
    }
}
