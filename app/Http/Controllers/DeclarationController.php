<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Declaration;
use App\Models\Person;

class DeclarationController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $declarations = Declaration::orderBy('id', 'desc')->paginate(10);
        return view('declaration.index', ['declarations' => $declarations]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create($id)
    {
        $person = Person::find($id);
        return view('declaration.create', ['person' => $person]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        Declaration::create($this->filterRequest($request));
        return redirect()->route('declarations.index');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        $declaration = Declaration::find($id);
        $person = Person::find($declaration->person_id);
        return view('declaration.show', ['declaration' => $declaration, 'person' => $person]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        $declaration = Declaration::find($id);
        $person = Person::find($declaration->person_id);
        return view('declaration.edit', ['declaration' => $declaration, 'person' => $person]);
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
        Declaration::find($id)->update($this->filterRequest($request));
        return redirect()->route('declarations.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        return Declaration::find($id)->delete();
    }

    public function filterRequest($request){
        $data = $request->all();
        if(isset($data['test_date'])) $data['test_date'] = date('Y-m-d', strtotime(str_replace('/', '-', $data['test_date'])));
        if(isset($data['isolation_date'])) $data['isolation_date'] = date('Y-m-d', strtotime(str_replace('/', '-', $data['isolation_date'])));
        return $data;
    }
}
