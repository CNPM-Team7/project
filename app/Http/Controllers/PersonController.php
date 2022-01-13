<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Person;
use App\Http\Requests\PersonRequest;
use App\Http\Requests\TemporaryRequest;
use App\Models\Temporary;

class PersonController extends Controller
{

    protected array $statuses = ['Bình thường', 'Mới sinh', 'Mới mất', 'Tạm trú', 'Đã chuyển đi', 'Đã mất'];

    protected array $genders = ['Nam', 'Nữ'];

    public function dashboard()
    {
        $tempo = Temporary::with('declarant', 'stayAt')->orderBy('created_at', 'desc')->get()->groupBy('person_id');

        return view('dashboard',['people' => Person::all(), 'tempo' => $tempo]);
    }

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

        $people = Person::where($likeQuery)->orderBy('id', 'desc')->paginate(10);
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
        $id = Person::create($this->filterRequest($request));
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
        Person::find($id)->delete();
        return redirect()->route('person.index');
    }

    public function filterRequest($request){
        $data = $request->all();
        $data['birthday'] = date('Y-m-d', strtotime(str_replace('/', '-', $data['birthday'])));
        if(isset($data['idn_receive_date'])) $data['idn_receive_date'] = date('Y-m-d', strtotime(str_replace('/', '-', $data['idn_receive_date'])));
        if(isset($data['register_date'])) $data['register_date'] = date('Y-m-d', strtotime(str_replace('/', '-', $data['register_date'])));
        return $data;
    }

    public function staying(TemporaryRequest $request){

//        "name" => "adsad"
//        "birthday" => "2022-01-11"
//        "id_number" => "1234"
//        "sex" => "0"
//        "move_to" => "asdd"
//        "family_id" => "1"
//        "owner_name" => "12"
//        "family_address" => "3986 Terry CrossingNew Haileyburgh, OH 01242"
//        "register_date" => "2022-01-12"
//        "start_date" => "26/01/2022"
//        "end_date" => "24/01/2022"
//        "reason" => "asdasd"


        $personData = $this->filterRequest($request);
        $personData['status'] = 3; // tam tru
        $personData['owner_relation'] = $this->statuses[$personData['status']];
        $personData['family_id'] = null;
        $person_id = Person::create($personData)->id;

        $tempoData = $this->filterTempoRequest($request);
        $tempoData['person_id'] = $person_id;
        $tempoData['type'] = 0;
        Temporary::create($tempoData);

        return redirect()->route('person.show', $person_id);
    }

    public function absentView($id){
        return \view('person.absent', ['person' => Person::find($id)]);
    }

    public function absent(TemporaryRequest $request){
        $tempoData = $this->filterTempoRequest($request);
        Temporary::create($tempoData);
        Person::find($tempoData['person_id'])->update(['status' => 3]);

        return redirect()->route('person.show', $tempoData['person_id']);
    }

    public function filterTempoRequest($request){
        $data = $request->all();
        $data['register_date'] = date('Y-m-d', strtotime(str_replace('/', '-', $data['register_date'])));
        $data['start_date'] = date('Y-m-d', strtotime(str_replace('/', '-', $data['start_date'])));
        $data['end_date'] = date('Y-m-d', strtotime(str_replace('/', '-', $data['end_date'])));
        return $data;
    }

    //theo ID, theo ten, theo so CMND/CCCD
    public function get($type, $data = null)
    {
        if ($data == null) {
            if($type == 'all'){
               return Person::all();
            }
            return \response('', 404);
        }
        return Person::with('family')->where($type, 'LIKE', "%{$data}%")->where('family_id', '!=', null)->get(); // neu tam tru se ko co family_id
    }
}
