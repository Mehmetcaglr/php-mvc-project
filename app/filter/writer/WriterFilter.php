<?php

namespace App\filter\writer;

use App\Http\Request\Request;
use App\Model\Writer\Writer;

class WriterFilter
{
    public function filter(Request $request, Writer $writer )
    {

        $first_name = $request->has("firstName") === true ? $request->get("firstName" ) : false;
        $second_name = $request->has("second_name") === true ? $request->get("secondName") : false;
        $last_name = $request->has("lastName") === true ? $request->get("lastName") : false;
        $gender = $request->has("genderID") === true ? $request->get("genderID") : false;
        $model = "";

        $limit = $request->has("limit") ? $request->get("limit") : 5;



        if(!$first_name && !$second_name && !$last_name && !$gender)
        {
            return false;
        }

        if(($request->has("firstName")) && $request->get("firstName" ) != null)
        {

            $model = $writer->query()->where("first_name", "like '%$first_name%'");
        }

        if(($request->has("secondName")) && $request->get("secondName") != null)
        {
            $model = $writer->query()->where("second_name", $second_name);
        }

        if(($request->has("lastName")) && $request->get("lastName") != null)
        {
            $model = $writer->query()->where("last_name", $last_name);
        }

        if(($request->has("genderID")) && $request->get("genderID") != null)
        {
            $model = $writer->query()->where("gender_id", $gender);
        }

        if($request->get("order") != null)
        {
            $model = $writer->query()->where("first_name", "order by '$first_name' desc");
        }


        return $model->pagination($limit);

    }
}