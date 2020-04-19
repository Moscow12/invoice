<?php
require "curl_function.php";
    if(isset($_POST['save_btn'])){
        $first_name=$_POST['first_name'];
        $last_name=$_POST['last_name'];
        $json_data=json_encode(array(
                            array(
                                "first_name"=>$first_name,
                                "second_name"=>$last_name
                            )
                        )
                    );
        $responce=http_curl_request("POST","127.0.0.1/test_flow/save_patient.php",$json_data);
        print_r($responce);
    }
?>