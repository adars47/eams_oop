<?php

namespace App\Base;

class Model
{
    public function save(){
        if(empty($this->properties))
        {
            //throw an exception
        }

        $model_props = $this->properties;

        $columns = array_keys($model_props);
        $values = array_values($model_props);

        if(count($columns)!=count($values))
        {
            //params and functions do not match
        }

        $query = "INSERT INTO ".$this->table_name." (".implode(",",$columns)." ) VALUES ("."'" . implode("','", $values) . "');";
//        var_dump($query);die;
        Application::$database_context->getConnection()->query($query);
    }

    public function fetchAll(){
        $query = "SELECT * from ".$this->table_name.";";
        $result  = Application::$database_context->getConnection()->query($query);
        $response = [];
        while ($myrow = $result->fetch_array(MYSQLI_ASSOC))
        {
            $model_obj = new $this();
            $data_array = [];
            foreach($myrow as $key=>$value)
            {
                $data_array[$key]=$value;
            }
            $model_obj->properties=$data_array;
            $response[]=$model_obj;
        }
        $result->close();
        return $response;
    }


    }