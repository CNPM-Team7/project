<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Person;
use App\Http\Requests\PersonRequest;

class PersonController extends Controller
{

    protected array $statuses = ['Normal', 'Just Born', 'Just Died', 'Temporary', 'Moved', 'Dead'];

    protected array $genders = ['Nam', 'Nữ', 'Khác'];
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $query = request()->query();
        unset($query['page']);

        $likeQuery = [];
        foreach($query as $key => $value){
            $likeQuery[] = [$key, 'like', '%'.$value.'%'];
        }

        $people = Person::where($likeQuery)->paginate(10);
        return view('person.index', ['people' => $people, 'statuses' => $this->statuses, 'genders' => $this->genders]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('person.create', ['statuses' => $this->statuses, 'genders' => $this->genders]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(PersonRequest $request)
    {
        $id = Person::create($this->filterRequest($request)); // TODO cant insert birthday
        return redirect()->route('person.show', $id);
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
        return view('person.show', ['person' => $person, 'statuses' => $this->statuses, 'genders' => $this->genders]);
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
        return view('person.edit', ['person' => $person, 'statuses' => $this->statuses, 'genders' => $this->genders]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(PersonRequest $request, $id)
    {
        Person::find($id)->update($this->filterRequest($request));
        return redirect()->route('person.show', $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        return Person::find($id)->delete();
    }

    public function filterRequest($request){
        $data = $request->all();
        $data['birthday'] = date('Y-m-d', strtotime($data['birthday']));
        if(isset($data['idn_receive_date'])) $data['idn_receive_date'] = date('Y-m-d', strtotime($data['idn_receive_date']));
        if(isset($data['register_date'])) $data['register_date'] = date('Y-m-d', strtotime($data['register_date']));
        return $data;
    }
}
