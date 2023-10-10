<?php

use App\Model\Model;

if (!function_exists("basename_class")) {
    /**
     * @param $class
     * @return string
     */
    function class_basename($class): string
    {
        $class = is_object($class) ? get_class($class) : $class;

        return basename(str_replace('\\', '/', $class));
    }
}

if (!function_exists("view")) {
    /**
     * @param $file
     * @param array $data
     * @return void
     */
    function view($file, array $data = []): void
    {
        extract($data);
        $path = dirname(__DIR__,2)."/resource/view/".$file.".php";
        if (file_exists($path)) {
            include $path;
        }
    }
}

if (!function_exists("resource")) {
    /**
     * @param $path
     * @return void
     */
    function resource($path = null)
    {
        include dirname(__DIR__,2)."/resource/view/".$path;
    }
}

if (!function_exists("asset")) {
    /**
     * @param $path
     * @return string
     */
    function asset($path = null): string
    {
        return $_ENV["ASSET_URL"]."/$path";
    }
}

if(function_exists("request")){

    function request(string $key)
    {
        return isset($_GET[$key]) ? $_GET[$key] : null  ;
    }
}

if (!function_exists("error")) {
    /**
     * @param $key
     * @return array|false|mixed
     */
    function error($key = null)
    {
        if ($key !== null) {
            return isset($_SESSION["error"][$key]) ? $_SESSION["error"][$key] : false;
        }
        return isset($_SESSION["error"]) ?  $_SESSION["error"] : [];
    }
}

if (!function_exists("old")) {
    /**
     * @param $key
     * @return mixed|string
     */
    function old($key)
    {
        return isset($_SESSION["old"][$key]) ? $_SESSION["old"][$key] : "";
    }
}

if (!function_exists("env")) {
    function env($key, $default = null)
    {
        $env_key = $key == "" ? $default : $_ENV[$key];

        return $env_key;
    }
}

if(!function_exists("pagination"))
{
    function pagination(array $data, string $modul)
    {   // $data["users"]["links"] = $data;
        // $datum["page"] = $page;
        // $_GET["page"] = $getPage;
        // $data["users"]["links"][3]["path"] = $url
        $getPage = (isset($_GET["page"])) ? $_GET["page"] : 1;
        $limit = (isset($_GET["limit"])) ? $_GET["limit"] : 5;
        (int) $path = $_ENV["APP_URL"].$modul."?limit=".$limit."&"."page=".$getPage;
        $previous = $_ENV["APP_URL"].$modul."?limit=".$limit."&"."page=".$getPage - 1;
        $next = $_ENV["APP_URL"].$modul."?limit=".$limit."&"."page=".$getPage + 1;

        $url = $_ENV["APP_URL"].$modul."?limit=".$limit."&"."page=1";


        echo "<div class='float-right'>";
        echo "<nav aria-label='Page navigation example'>
              <ul class='pagination'>";
        echo   "<li class='page-item'><a class='page-link' href="; if(isset($getPage) && $getPage > 1){ echo $previous; }else{ echo $url;} echo">Previous</a></li>";
                foreach ($data as $key => $datum):
        echo  "<li class='page-item "; if(isset($datum["page"]) && $datum["page"] == $getPage ){ echo 'active';} else{ } echo "'><a class='page-link' href="; echo $datum['path']; echo">"; echo $datum["page"];echo"</a></li>";
                endforeach;
        echo   "<li class='page-item'><a class='page-link";  echo "' href="; if(isset($getPage) && $getPage < $limit){ echo $next; }else{ echo $url;} echo">Next</a></li>
              </ul>
            </nav>
         </div>";
    }
}

if(!function_exists("active"))
{
    function active()
    {
        if(isset($_GET["active"]))
        {
           echo "text-white active";
        }
        else
        {
          echo " ";
        }
    }

}

if(!function_exists("image"))
{
    function image()
    {
        if(isset($_FILES['my_image'])) {
            $img_name = $_FILES['my_image']['name'];
            $img_size = $_FILES['my_image']['size'];
            $tmp_name = $_FILES['my_image']['tmp_name'];
            $error = $_FILES['my_image']['error'];

            if($error === 0) {
                if($img_size > 291941){
                    $em = "Sorry, your file is too laege";
                }else{
                    $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
                    $img_ex_lc = strtolower($img_ex);

                    $allowed_exs =  ["jpg","jpeg","png"];

                    if(in_array($img_ex_lc,$allowed_exs)){
                        $new_img_name = uniqid("IMG-",true).'.'.$img_ex_lc;
                        $img_upload_path = $new_img_name;


                        move_uploaded_file($tmp_name,$img_upload_path);
                        return $new_img_name;

                    }else{
                        $em = "You can't upload files of this type";
                    }
                }

            } else {
                $em = "unknow error occurred!";

            }
        } else {

        }
    }
}






//if(count($data) == $getPage){ echo 'disabled';}


