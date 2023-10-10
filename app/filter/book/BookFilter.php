<?php

namespace App\filter\book;

use App\Http\Request\Request;
use App\Model\Book\Book;

class BookFilter
{
    public function filter(Request $request, Book $book)
    {
        $bookName = $request->has("bookName") === true ? $request->get("bookName") : false;
        $publishing_house = $request->has("publishing_house") === true ? $request->get("publishingHouse") : false;
        $writer = $request->has("writer") === true ? $request->get("writer") : false;
        $number_of_page = $request->has("number_of_page") === true ? $request->get("numberOfPage") : false;
        $material = $request->has("material") === true ? $request->get("material") : false;

        $model = "";



        $limit = $request->has("limit") && $request->get("limit") != null ? $request->get("limit"): 5;


        if(!$bookName && !$publishing_house && !$writer &&  !$number_of_page && !$material){
            return false;
        }

        if(($request->has("bookName") && $request->get("bookName") != null))
        {
            $model = $book->query()->where("name" ,"like '%$bookName' ");
        }

        if($request->has("publishingHouse") && $request->get("publishingHouse") != null)
        {
            $model = $book->query()->where("publishingHouse",$request->get("publishingHouse"));
        }

        if($request->has("writer") && $request->get("writer") != null)
        {
            $model = $book->query()->where("writer",$request->get("writer"));
        }

        if($request->has("numberOfPage") && $request->get("numberOfPage") != null)
        {
            $model = $book->query()->where("number_of_page",$request->get("numberOfPage"));
        }

        if($request->has("material") && $request->get("material") != null)
        {
            $model = $book->query()->where("material",$request->get("material"));
        }




        return $model->pagination($limit);
    }

}