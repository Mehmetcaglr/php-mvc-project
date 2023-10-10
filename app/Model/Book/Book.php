<?php

namespace app\Model\Book;

use App\Model\Model;
use App\Model\Image\Image;

class Book extends Model
{

    protected $table = "books";
    protected $fillable = ["id","name","img_id"];

    public function image()
    {
        return $this->hasOne("App\Model\Image\Image","img_id","id");
    }
}