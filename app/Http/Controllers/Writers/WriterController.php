<?php


namespace App\Http\Controllers\Writers;

use App\filter\gender\GenderFilter;
use App\filter\writer\WriterFilter;
use App\Http\Controllers\BaseController;
use App\Http\Request\Request;
use App\Model\Gender\Gender;
use App\Model\Writer\Writer;


class WriterController extends BaseController
{
    public function index(Request $request)
    {
        $writer = new Writer();
        $writerFilter = new WriterFilter();

        if($writerFilter->filter($request, $writer) || gettype($writerFilter->filter($request,$writer)) ==  "array"){
            $data["writer"] = $writerFilter->filter($request, $writer);
        }else{
            $sortBy = $request->has("sort") ? $request->get("sort") : "asc";
            $limit = $request->has("limit") ? $request->get("limit") :  5;
            $data["writer"] = $writer->query()->orderBy("first_name",$sortBy)->pagination($limit);
        }

        $data["title"] = "Writer List";

        $data["action"] = "writer/create";


        return view("writer/list",$data);
    }

    public function create()
    {
        $genders = new Gender();

        $data["genders"] = $genders->query()->get();

        $data["title"] = "Add Writer";

        $data["action"] = "writer/save";

        return view("writer/form",$data);
    }

    public function save(Request $request)
    {
        $writer = new Writer();

        $writer->create([
            "first_name" => $request->get("firstName"),
            "second_name" => $request->get("secondName"),
            "last_name" => $request->get("lastName"),
            "gender_id" => $request->get("genderID")
        ]);
    }

    public function edit(Request $request, $id)
    {
        $data["title"] = "Edit Writer";

        $writer = new Writer();

        $data["writers"] = $writer->find($id);

        $data["action"] = "writer/update/".$id;

        return view("writer/form",$data);
    }

    public function update(Request $request, $id)
    {
        $writer = new Writer();

        $writer->update([
            "first_name" => $request->get("firstName"),
            "second_name" => $request->get("secondName"),
            "last_name" => $request->get("lastName"),
            "gender_id" => $request->get("genderID")
        ],$id);
    }





}