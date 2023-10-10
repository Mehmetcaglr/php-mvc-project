<?php

namespace App\Http\Controllers\User;

use App\filter\user\UserFilter;
use App\Http\Controllers\BaseController;
use App\Http\Request\Request;
use App\Model\Address\Address;
use App\Model\Gender\Gender;
use App\Model\Publishing_House\publishing_House;
use App\Model\User\User;
use App\Model\Writer\Writer;


class UserController extends BaseController
{
    public function index(Request $request)
    {
        $user = new User();
        $userFilter =  new UserFilter();


        if ($userFilter->filter($request,$user) || gettype($userFilter->filter($request,$user)) == "array") {
            $data["users"] = $userFilter->filter($request, $user);
        } else {
            $sortBy = $request->has("sort")? $request->get("sort") : "asc";
            $limit = $request->has("limit")? $request->get("limit"): 5;
            $data["users"] = $user->query()->orderBy("first_name",$sortBy)->pagination($limit);
        }

        $genders = new Gender();
        $data["genders"] = $genders->query()->get();

        $writer = new Writer();
        $data["writers"] =  $writer->query()->get();

        $publishHouse = new Publishing_House();
        $data["publishing_houses"] = $publishHouse->query()->get();

        return view("user/list",$data);
    }

    public function create(Request $request)
    {
        $genders =  new Gender();
        $data['genders'] = $genders->query()->get();

        $data["title"] = "Add User";

        $data["action"] = "user/save";


        return view("user/form", $data);
    }


    public function save(Request $request)
    {
        $this->validate($request,[
            "first_name" => ["string","required"],
            "second_name" => ["string", "required"],
            "last_name" => ["string", "required"],
            "email" => ["required","string","email","exits:users"],
            "identification_number" => ["required","number"],
            "phone" => ["required","number"]
        ]);

        if(1>3){
            return $request->referer();
        }else {
            $user = new User();
            $user->create([
                "first_name" => $request->get("first_name"),
                "second_name" => $request->get("second_name"),
                "last_name" => $request->get("last_name"),
                "email" => $request->get("email"),
                "identification_number" => $request->get("identification_number"),
                "phone" => $request->get("phone")
            ]);

            $address = new Address();
            $address->create([
                "address_" => $request->get("address")
            ]);
        }
    }

    public function update(Request $request, $id)
    {
        $this->validate($request,[
            "first_name" => ["string","required"],
            "second_name" => ["string", "required"],
            "last_name" => ["string", "required"],
            "email" => ["required","string","email"],
            "identification_number" => ["required","number"],
            "phone" => ["required","number"]
        ]);
        if(error()>0){
            return $request->referer();
        }else{
            $user = new User();
            $user->update([
                "first_name" => $request->get("first_name"),
                "second_name" => $request->get("second_name"),
                "last_name" => $request->get("last_name"),
                "email" => $request->get("email"),
                "identification_number" => $request->get("identification_number"),
                "gender_id" => $request->get("gender_id") ,
                "phone" => $request->get("phone")
            ],$id);
        }
    }

    public function edit(Request $request,$id)
    {
        $genders = new Gender();

        $data["genders"] = $genders->query()->get();

        $data["title"] = "Edit User";

        $user = new User();

        $data["user"] = $user->find($id);

        $data["action"] = "user/update/".$id;



        return view("user/form",$data);

    }


    public function store(Request $request)
    {
        $datum = array_keys($request->all())[0];

        $user = new User();

        $data["users"] = $user->Like("first_name","$datum")->get();

        return view("user/list",$data);

    }

    public function delete(Request $request,$id)
    {
        $user = new User();

        $user->delete($id);

        return view("user/list");

    }
}