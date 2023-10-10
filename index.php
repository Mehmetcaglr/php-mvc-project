<?php
ini_set("display_errors", 1);
ini_set("display_startup_errors", 1);
error_reporting(E_ALL);
ob_start();
session_start();
include __DIR__ . "/vendor/autoload.php";

use App\Http\Controllers\Definations\GenderController;
use App\Http\Controllers\Home\HomeController;
use App\Http\Controllers\Writers\WriterController;
use Routers\Route;
use App\Http\Controllers\Books\BookController;
use App\Http\Controllers\Employee\EmployeeController;
use Dotenv\Dotenv;
use App\Http\Controllers\User\UserController;

$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

Route::get("/home", [HomeController::class, "index"]);




Route::post("/home/create", [HomeController::class, "create"]);
Route::post("/home/delete", [HomeController::class, "delete"]);





Route::get("/employee", [EmployeeController::class, "index"]);
Route::get("/employee/{id}", [EmployeeController::class, "edit"]);
//Route::post("/employeee", [EmployeeController::class, "index"]);

Route::get("/user", [UserController::class, "index"]);
Route::get("/user/create", [UserController::class, "create"]);
Route::post("/user/save", [UserController::class, "save"]);
Route::post("/user/store", [UserController::class, "store"]);
Route::get("/user/edit/{id}", [UserController::class, "edit"]);
Route::post("/user/update/{id}", [UserController::class, "update"]);
Route::post("/user/delete/{id}", [UserController::class, "delete"]);
Route::post("/user/activeUsers",[UserController::class, "activeList"]);




Route::get("/genders",[GenderController::class, "index"]);
Route::get("/genders/create", [GenderController::class, "create"]);
Route::post("/genders/save", [GenderController::class, "save"]);
Route::get("/genders/edit/{id}", [GenderController::class, "edit"]);
Route::post("/genders/update/{id}", [GenderController::class, "update"]);
Route::post("/genders/delete/{id}", [GenderController::class, "delete"]);



Route::get("/writer", [WriterController::class, "index"]);
Route::get("/writer/create", [WriterController::class, "create"]);
Route::post("/writer/save",[WriterController::class, "save"]);
Route::get("/writer/edit/{id}",[WriterController::class, "edit"]);
Route::post("/writer/update/{id}", [WriterController::class, "update"]);
Route::post("/writer/delete/{id}", [WriterController::class, "delete"]);

Route::get("/book", [BookController::class, "index"]);
Route::get("/book/create", [BookController::class, "create"]);
Route::get("/book/edit/{id}", [BookController::class, "edit"]);
Route::post("/book/save", [BookController::class, "save"]);
Route::post("/book/update/{id}", [BookController::class, "update"]);
Route::post("/book/delete", [BookController::class, "delete"]);

Route::get("/login", function (){
    echo "<h1>Login Page</h1>";
});

Route::get("/", function () {
    $_SESSION["user_name"] = "hsyntkn";
});