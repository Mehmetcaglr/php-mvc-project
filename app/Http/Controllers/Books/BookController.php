<?php

namespace App\Http\Controllers\Books;

use App\filter\book\BookFilter;
use App\Http\Controllers\BaseController;
use App\Http\Request\Request;
use App\Model\Book\Book;
use App\Model\Employee\Employee;
use App\Model\Image\Image;
use GuzzleHttp\Client;
use Routers\Route;

class BookController extends BaseController
{

    public function index(Request $request)
    {
        $book = new Book();
        $bookFilter =  new BookFilter();

        if ($bookFilter->filter($request,$book) || gettype($bookFilter->filter($request,$book)) == "array") {
            $data["books"] = $bookFilter->filter($request, $book);
        } else {
            $sortBy = $request->has("sort")? $request->get("sort") : "asc";
            $limit = $request->has("limit")? $request->get("limit"): 5;
            $data["books"] = $book->with2(["image"])->orderBy("name",$sortBy)->pagination($limit);
        }
        $data["images"] = $book->join()->get(); // dinamik hale gelecek

        $data["title"] = "Book List";

        return view("book/list",$data);
    }

    public function create()
    {
        $data["title"] = "Add Book";

        $data["action"] = "book/save";

        return view("book/form",$data);

    }

    public function save(Request $request)
    {
        $image = new Image();

        $image->upload($_FILES);



        die;

        $book = new Book();
        $book->create([
            "name" => $request->get("bookName"),
            "publishing_house_id" => $request->get("publishingHouseId"),
            "writer_id" =>  $request->get("writerId"),
            "number_of_page" => $request->get("numberOfPage"),
            "release_date" => $request->get("releaseDate"),
            "material_id" => $request->get("materialId"),
            "img_id" => $request->get("materialId"),
        ]);
    }

    public function update(Request $request, $id)
    {
        $book = new Book();

        $book->update([
            "name" => $request->get("bookName"),
            "publishing_house_id" => $request->get("publishingHouseId"),
            "writer_id" =>  $request->get("writerId"),
            "number_of_page" => $request->get("numberOfPage"),
            "release_date" => $request->get("releaseDate"),
            "material_id" => $request->get("materialId"),
        ],$id);

        $image = new Image();

    }


    public function edit(Request $request,$id)
    {
        $data["title"] =  "Edit Book";

        $book = new Book();

        $data["book"] = $book->find($id);

        $data["action"] = "book/update/".$id;

        return view("book/form",$data);
    }

    public function store(Request $request)
    {

    }

    public function delete($id)
    {

        $book = new Book();

        $book->delete($id);

        return view("book/list");

    }
}