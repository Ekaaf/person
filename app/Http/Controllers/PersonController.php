<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PersonPost;
use App\Models\Country;
use App\Models\City;
use App\Models\Lang_skill;
use App\Models\Person;
use App\Services\PersonService;
use Datatables;
use DB;

class PersonController extends Controller
{   
    public function __construct(PersonService $personService)
    {
        $this->personService = $personService;
    }
	public function add(Request $request){
		$countries = Country::all();
		$lang_skills = Lang_skill::all();
        return view('add',compact(['countries', 'lang_skills']));
    }

    public function savePerson(PersonPost $request){
    	$result = $this->personService->savePerson($request);
    	if($request->input('id')){
            return redirect('/')->with('success', $result);
        }
        else{
            return redirect()->back()->with('success', $result);
        }
    }

    public function index(){
    	return view('index');
    }

    public function getPersons(Request $request){
    	$columns = ['persons.id as id','persons.name','countries.name as country_name','cities.name as city_name','persons.resume_filename','persons.dob','persons.resume_filepath'];
        $persons = $this->personService->getPersonData($columns);
        $persons->selectRaw("GROUP_CONCAT(lang_skills.language SEPARATOR ', ') as 'languages'")
                ->groupBy('persons.id');
    	return datatables()->of($persons)->addIndexColumn()
            ->make(true);
    }

    public function getCitiesByCountry(Request $request){
    	$cities = City::where('country_id',$request->input('country_id'))->get();
    	return response()->json($cities);
    }

    public function personDelete($id){
        $delete = Person::where('id',$id)->delete();
        if($delete){
            return "Person Deleted";
        }
        else{
            return "Person could not be deleted. Please try later";
        }
    }

    public function view($id){
        $columns = ['persons.id as id','persons.name','countries.name as country_name','cities.name as city_name','persons.resume_filename','persons.dob','persons.resume_filepath'];
        $personModel = $this->personService->getPersonData($columns);
        $person = $personModel->selectRaw("GROUP_CONCAT(lang_skills.language SEPARATOR ', ') as 'languages'")
               ->groupBy('persons.id')
               ->where('persons.id',$id)
               ->first();
        return view('view',compact(['person'])); 
    }

    public function edit($id){
        $countries = Country::all();
        $lang_skills = Lang_skill::all();
        $columns = ['persons.id as id','persons.name','countries.id as country_id','cities.id as city_id','persons.resume_filename','persons.dob','persons.resume_filepath','persons.lang_skills_id'];
        $personModel = $this->personService->getPersonData($columns);
        $person = $personModel->selectRaw("GROUP_CONCAT(lang_skills.language SEPARATOR ', ') as 'languages'")
                                        ->groupBy('persons.id')
                                        ->where('persons.id',$id)
                                        ->first();

        return view('edit',compact(['countries', 'lang_skills', 'person'])); 
    }
}	
