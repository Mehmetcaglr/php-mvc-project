<?php

namespace App\filter\gender;

use App\Http\Request\Request;
use App\Model\Gender\Gender;
use App\Model\Model;
use App\Model\User\User;

class GenderFilter
{
    public function filter(Request $request, Gender $gender)
    {
        $name = $request->has("name") === true ? $request->get("name") : false;
        $status = $request->has("status") === true ? $request->get("status") : false;

        $model = "";


        $limit = $request->has("limit") && $request->get("limit") != null ? $request->get("limit"): 5;


        if(!$name && !$status ){
            return false;
        }

        if(($request->has("name") && $request->get("name") != null) )
        {
            $model = $gender->query()->where("name" ,"like '%$name%' ");
        }

        if($request->has("status") && $request->get("status") != null)
        {
            $model = $status->query()->where("status",$request->get("status"));
        }

        return $model->pagination($limit);
    }
}