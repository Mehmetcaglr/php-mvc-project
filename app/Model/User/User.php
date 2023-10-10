<?php

namespace App\Model\User;

use App\Model\Model;

class User extends Model
{

    protected $table = "users";

    protected $primaryKey = "id";

    protected $fiilable = ["first_name", "second_name", "last_name", "identification_number", "email","phone","status"];



}