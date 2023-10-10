<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\BaseController;
use App\Http\Request\Request;
use App\Model\Gender\Gender;

class HomeController extends BaseController
{

    public function index()
    {
      return view("layouts/master");
    }

    public function create(Request $request)
    {

        $gender = new Gender();

        $gender->create([
            "name" => $request->get("new-gender")
        ]);
    }

    public function delete(array $data)
    {

    }

}