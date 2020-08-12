<?php

namespace App\Services;

use App\Models\Person;
use DB;

class PersonService
{
    public function savePerson($request){      
        if($request->input('id')){
            $person = Person::find($request->input('id'));
            $message = "Person Updated Successfully.";
        }
        else{
           $person = new Person();
           $message = "Person Saved Successfully.";
        }

        $data = $request->validated();
        $person->name = $data['name'];
        $person->country_id = $data['country_id'];
        $person->city_id = $data['city_id'];
        $person->lang_skills_id = implode(",", $data['lang_skills_id']);
        $person->dob = $data['dob'];
        if($request->file('resume_file')){
            $fileName = time().'.'.$request->file('resume_file')->extension(); 
            $filePath = 'uploads/'.$fileName;
            $request->file('resume_file')->move('uploads', $fileName);

            $person->resume_filename = $fileName;
            $person->resume_filepath = $filePath;
        }
        $person->save();
        return $message;
    }


    public function getPersonData($columns){
        $persons = DB::table('persons')->select($columns)
                                       ->join('countries', 'persons.country_id', '=', 'countries.id')
                                       ->join('cities', 'persons.city_id', '=', 'cities.id')
                                       ->join("lang_skills",DB::raw("FIND_IN_SET(lang_skills.id,persons.lang_skills_id)"),">",DB::raw("'0'"));
        return $persons;
    }
}
