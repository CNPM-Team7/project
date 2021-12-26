<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Family;
use App\Models\Person;
use App\Http\Requests\FamilyRequest;

class FamilyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $families = Family::orderBy('id', 'desc')->paginate(10); // TODO search
        return view('family.index', ['families' => $families]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('family.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(FamilyRequest $request)
    {
        $family_id = Family::create($request->all())->id;
        return redirect()->route('families.show', $family_id);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        $family = Family::find($id);
        $statuses = ['Normal', 'Just Born', 'Just Died', 'Temporary', 'Moved', 'Dead'];
        $genders = ['Nam', 'Nữ', 'Khác'];

        return view('family.show', ['family' => $family, 'statuses' => $statuses, 'genders' => $genders]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        $family = Family::find($id);
        return view('family.edit', ['family' => $family]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(FamilyRequest $request, $id)
    {
        Family::find($id)->update($request->all());
        return redirect()->route('families.show', $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        Family::find($id)->delete();
        return redirect()->route('families.index');
    }

    public function split(){
        $data = request()->all();
        $family_id = Family::create([
            'house_id' => $data['house_id'],
            'owner_id' => $data['owner_id'],
            'address' => $data['address'],
        ])->id;

        foreach($data['members'] as $id => $relation){
            Person::find($id)->update([
                'family_id' => $family_id, 
                'owner_relation' => $relation,
            ]);
        }
    }

    public function splitView()
    {
        return view('family.split');
    }

    public function members($id)
    {
        return Family::find($id)->members;
    }
}
