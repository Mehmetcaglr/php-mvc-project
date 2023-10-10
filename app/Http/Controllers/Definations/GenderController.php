<?php

namespace App\Http\Controllers\Definations;

use App\filter\gender\GenderFilter;
use App\Http\Controllers\BaseController;
use App\Model\Gender\Gender;
use \App\Http\Request\Request;

class GenderController extends BaseController
{

    public function index(Request $request)
    {

        $gender = new Gender();
        $genderFilter = new GenderFilter();

        if ($genderFilter->filter($request,$gender) || gettype($genderFilter->filter($request,$gender)) == "array") {
            $data["genders"] = $genderFilter->filter($request, $gender);
        } else {
            $sortBy = $request->has("sort")? $request->get("sort") : "asc";
            $limit = $request->has("limit")? $request->get("limit"): 5;
            $data["genders"] = $gender->query()->orderBy("name",$sortBy)->pagination($limit);
        }

        return view("defination/genders/list",$data);
    }

    public function create()
    {
        $genders = new Gender();

        $data["status"] = $genders->query()->get();

        $data["title"] = "Genders Add";

        $data["action"] = "genders/save";

        return view("defination/genders/form",$data);
    }

    public function save(Request $request)
    {

        $gender = new Gender();

        $gender->create([
            "name" => $request->get("name"),
            "status" => $request->get("status")
        ]);

    }

    public function edit(Request $request, $id)
    {

        $data["title"] = "Edit Genders";

        $gender = new Gender();

        $data["gender"] = $gender->find($id);


        $data["action"] = "genders/update/".$id;

        return view("defination/genders/form",$data);


    }

    public function update(Request $request,$id)
    {
        $gender =  new Gender();

        $gender->update([
            "name" => $request->get("name"),
            "status" => $request->get("status")
        ],$id);


    }

    public function delete($id)
    {

        print_r($id);die;

        $gender = new Gender();

        $gender->delete($id);

        return view("defination/genders/list");

    }

}