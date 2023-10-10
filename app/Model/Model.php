<?php

namespace App\Model;

use App\Model\Employee\Employee;
use Database\DB;
use PDO;

/**
 *
 */
class Model extends DB
{
    public $result, $cls;


    public function __construct()
    {
        parent::__construct();
        $this->table = isset($this->table) ? $this->table : get_called_class();
    }

    public function belongsTo(string $related,string $localKey,string $foreingKey)
    {


    }

    public function hasOne(string $related,string $localKey,string $foreingKey)
    {
        return "test";
    }

    public function hasMany(string $related,string $localKey,string $foreingKey)
    {

    }

    public function belgonsToMany(string $related,$localKey,string $foreingKey)
    {

    }


    /**
     * @param string $string
     * @return $this
     */
    public function query()
    {
        if (isset($this->fillable) && !empty($this->fillable)) {

            $fillable = join(",", $this->fillable);

            $this->sql = "select $fillable from $this->table";

        } else {

            $this->sql = "select * from $this->table";
        }

        return $this;
    }

    /**
     * @param array $data
     * @return void
     */
    public function create(array $data)
    {
        $fileds = array_keys($data); //first_name, second_name, last_name, email, identifictaion_number, phone
        $fileds = implode(",", $fileds);
        $values = array_values($data);
        $questionMark = "";
        $questionMarks = array_map(function ($item) use ($questionMark)
        {
          return $questionMark.= "?";
        },$values);

        $questionMarks = implode("," , $questionMarks);

        $sql = "insert into $this->table ($fileds) VALUES ($questionMarks)";

        $this->pdo->prepare($sql)->execute($values);

        die;
    }

    /**
     * @param $condition
     * @return $this
     */
    public function where($field = null, $operator = null)
    {
        if(strstr($operator,"like"))
        {
            $this->sql .= " where $field $operator";
        }
        else
        {
            if (!is_null($operator) && !is_null($field)) {

                $this->sql .= " where ". $field. " = " . $operator;

            } else {

                $this->sql;
            }

        }

        return $this;
    }

    /**
     * @param $field
     * @param $option
     * @return $this
     */
    public function orderBy($field = "id", $option = "asc")
    {

        if(!is_null($field)  && !is_null($option))
        {
            $this->sql .= " order by $field $option ";
        }
        return $this;
    }

    public function pagination($limit)
    {

        if(!is_null($limit))
        {
            $totalData = count($this->get());
            $totalPage = ceil($totalData / $limit);
            $page = isset($_GET["page"]) ? $_GET["page"] : 1;
            $offset = ( $page - 1 ) * $limit;
            $this->sql .= " limit  $offset, $limit";
            $data["data"] = $this->get();
            $total = count($data);

            $arr = explode("/",$_SERVER["REDIRECT_URL"]);
            $path = array_pop($arr);

            for($i = 1; $i <= $totalPage; $i++)
            {
                $data["links"][] = ["path"=>$_ENV["APP_URL"]. $path ."?limit=" . $limit . "&page=" .$i,"page"=>$i ];
            }
            return $data;
        }
        return $data["data"] = $this->get();
    }

    public function upload(array $data)
    {
        $pic_uploaded = 0;
        $data = time().$_FILES["pic"]['name'];

        $image = $data;

        if(move_uploaded_file($_FILES['pic']['tmp_name'],$_SERVER['DOCUMENT_ROOT'].'/registration/photo/'.$image))
        {
            $target_file = $_SERVER['DOCUMENT_ROOT'].'/registration/photo/'.$image;
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
            $picname = basename($_FILES['pic']['name']);
            $photo = time().$picname;

            if($imageFileType != "jpg" && $imageFileType != "jpeg" && $imageFileType != "png")
            {
                echo "error type is not define";
            }
            elseif ($_FILES["pic"]["size"] > 20000000)
            {
                echo "error photo exceed the size of 2 MB";
            }
            else
            {
                $pic_uploaded = 1;
            }
        }

        if($pic_uploaded == 1)
        {
            $this->create([
                "image_url" => $image
            ]);
        }
    }

    /**
     * @return array|false
     */
    public function get()
    {
        return $this->pdo->query($this->sql)->fetchAll(PDO::FETCH_OBJ);
    }

    /**
     * @param int $id
     * @return mixed
     */
    public function find(int $id)
    {
        $primaryKey = isset($this->primaryKey) ? $this->primaryKey : "id";
        $this->sql = "select * from $this->table where $primaryKey = $id";

        return $this->pdo->query($this->sql)->fetch(PDO::FETCH_OBJ);
    }

    /**
     * @param array $data
     * @param int $id
     * @return void
     */
    public function update(array $data, int $id): void
    {
        $item = [];

        foreach ($data as $key => $datum)
        {
            $item[] = $key . "=" . "?";
        }

        $newData = implode(', ', $item);

        $primaryKey = isset($this->primaryKey) ? $this->primaryKey : "id";

        $this->sql = "UPDATE $this->table SET $newData Where $primaryKey =  $id";

        $query = $this->pdo->prepare($this->sql)->execute(array_values($data));

    }

    /**
     * @return mixed
     */
    public function first()
    {
        return $this->pdo->query($this->sql)->fetch(PDO::FETCH_OBJ);
    }

    /**
     * @param string $model
     * @param $foreginKey
     * @param array $columns
     * @return void
     */
//    public function with(string $model,string $foreginKey, array $columns = [])
//    {
//        if (!empty($this->fillable)){
//
//            $modelColumns = array_map(function($item){
//                return $this->table.'.'.$item;
//            },$this->fillable);
//        }
//
//        if(!empty($columns))
//        {
//            $relatedClassColumns = array_map(function ($item) use ($model) {
//                return $model.".".$item;
//            }, $columns);
//        }
//        $attributes = array_merge($relatedClassColumns, $modelColumns);
//        $withColumn = implode(",", $attributes);
//
//        $this->sql = "select $withColumn $this->table";
//
//
//        $this->sql .= " inner join $model on $this->table.'img_id' = $model.$foreginKey";
//
//        echo $this->sql;die;
//
//    }

    public function with2(array $relations)
    {

        $data = array_map(function ($relation){
            $model = $this->model->{$relation};
        }, $relations);

        print_r($data);
        die;
    }

    /**
     * @param $id
     * @return void
     */
    public function delete($id): void
    {
        $primaryKey = isset($this->primaryKey) ? $this->primaryKey: "id";

        $this->sql = "DELETE FROM $this->table WHERE $primaryKey = $id";

        $this->pdo->query($this->sql)->execute();
    }

//    public function join(array $data)
//    {
//
////        'img_id' => 'images.id',
////                'writer_id' => 'writers.id'
//
//          $keys = array_keys($data);
//          $values = array_values($data);
//
//          for ($i = 0; $i < count($data); $i++)
//          {
//              $localKey = $keys[$i];
//
//              $foregeinKey = $values[$i];
//
//              $relative = explode(".",$foregeinKey)[0];
//
//              $this->sql = "SELECT * FROM $this->table INNER JOIN $relative ON $this->table.$localKey = $foregeinKey";
//
//              $test = $this->pdo->query($this->sql)->fetchAll(PDO::FETCH_OBJ);
//
//              $datum[] = $test;
//
//          }
//          $datum = array_merge($datum[0],$datum[1]);
//          echo "<pre>";
//          print_r($datum);die;
//
//        return $this;
//    }




    public function join()
    {

    }

    /**
     * @param $related
     * @param $localKey
     * @param $frogeinKey
     * @return array
     */
    public function hasMany2($related, $localKey, $frogeinKey)
    {
                                                                                                                           // img_id = local_key
        $this->sql = "SELECT $this->table, $related fROM $this->table LEFT JOIN $related ON $localKey = $frogeinKey ";    // image_id = frogeinKey

        return ["related" =>$related, "localKey" =>$localKey, "frogeinKey"=>$frogeinKey];
    }
}