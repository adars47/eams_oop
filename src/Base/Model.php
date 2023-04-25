<?php

namespace App\Base;

class Model
{

    public function query($sql)
    {
        return Application::getDatabaseConnection()->execute($sql);
    }

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
            //params and functions do not match so throw exception
        }

        $query = "INSERT INTO ".$this->table_name." (".implode(",",$columns)." ) VALUES ("."'" . implode("','", $values) . "');";
        Application::getDatabaseConnection()->execute($query);
    }

    public function fetchAll(){
        $query = "SELECT * from ".$this->table_name.";";
        $result  = Application::getDatabaseConnection()->execute($query);
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