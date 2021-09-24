<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DataController extends Controller
{
    public function getCountries()
    {
        $countries = DB::table('countries')->pluck("name","id");
        return view('dependent.dropdown',compact('countries'));
    }

    public function getStates($id)
    {
            $states = DB::table("states")->where("countries_id",$id)->pluck("name","id");
            return json_encode($states);
    }
}
