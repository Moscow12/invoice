<?php
    function query_insert($json_data){
        global $conn;
        $data_array=array();
        $table_name=array();
        $table_data=array();
        $response = "";
        try{
            $data_array=json_decode($json_data,true);
            $table_name=$data_array['table'];
            $table_data=$data_array['data'];
            foreach($table_data as $rows){
                $query ="INSERT INTO ".$table_name;
                $column = array();
                $value = array();
                foreach($rows as $column_Name => $column_Data){
                    array_push($column,$column_Name);
                    array_push($value,mysqli_real_escape_string($conn,$column_Data));
                }
                $query .= " (".join(",",$column).") values('".join("','",$value)."')";
                $response = mysqli_query($conn,$query);
                if(!$response){
                    error_log(mysqli_error($conn)."\n",3,"/var/www/html/middle_wr/logs-".date('Y-m-d').".log");
                    die(json_encode(array("Error"=>503)));
                }
            }
      }catch(Exception $e){
        return json_encode(array("Error"=>$e));
      }
      return $response;
    }

    function query_update($json_data){
        global $conn;
        $data_array=array();
        $table_name=array();
        $table_data=array();
        $condition=array();
        $response = "";
        try{
            $data_array=json_decode($json_data,true);
            $table_name=$data_array['table'];
            $table_data=$data_array['data'];
            $condition=$data_array['condition'];
            foreach($table_data as $rows){
                $query ="UPDATE ".$table_name." SET ";
                $set_values = array();
                $condition_value = array();
                foreach($rows as $column_Name => $column_Data){
                    array_push($set_values,$column_Name."='".mysqli_real_escape_string($conn,$column_Data)."'");
                }
                foreach($condition as $column_Name => $column_Data){
                    array_push($condition_value,mysqli_real_escape_string($conn,$column_Name)."='".mysqli_real_escape_string($conn,$column_Data)."'");
                }
                $query .= join(",",$set_values)." WHERE ".join(" AND ",$condition_value);
                $response = mysqli_query($conn,$query);
                if(!$response){
                    error_log(mysqli_error($conn)."\n",3,"/var/www/html/middle_wr/logs-".date('Y-m-d').".log");
                    die(json_encode(array("Error"=>503)));
                }
            }
      }catch(Exception $e){
        return json_encode(array("Error"=>$e));
      }
      return $response;
    }
?>