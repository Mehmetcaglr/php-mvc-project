<?php

namespace App\filter\user;

use App\Http\Request\Request;
use App\Model\Model;
use App\Model\User\User;

class UserFilter
{
    public function filter(Request $request, User $user)
    {
        $first_name = $request->has("first_name") === true ? $request->get("first_name") : false;
        $last_name = $request->has("last_name") === true ? $request->get("last_name") : false;
        $identification_number = $request->has("identification_number") === true ? $request->get("identification_number") : false;
        $email = $request->has("email") === true ? $request->get("email") : false;
        $status = $request->has("status") === true ? true : false;
        $model = "";


        $limit = $request->has("limit") ? $request->get("limit") : 5;


        if(!$first_name && !$last_name && !$identification_number && !$email && !$status )
        {
            return false;
        }

        if(($request->has("first_name") && $request->get("first_name") != null) || ($request->has("last_name") && $request->get("last_name") != null))
        {
            $model = $user->query()->where("first_name" ,"like '%$first_name%' ");
        }

        if($request->has("status") && $request->get("status") != null)
        {
            $model = $user->query()->where("status",$request->get("status"));
        }

        if($request->has("email") && $request->get("email") != null)   // !!! hepisi dolu olsa ve sadece first name olan birini çağırsam hata alıyorum(yani first name doğru diğerleri de dolu ama yanlış)
        {
            $model = $user->query()->where("email",$email);
        }

        if($request->has("identification_number") && $request->get("identification_number") != null)
        {
            $model = $user->query()->where("identification_number", $identification_number);
        }

        if($request->get("order") != null)
        {
            $model = $user->query()->where("first_name","order by '$first_name' desc ");
        }



        return $model->pagination($limit);
    }
}