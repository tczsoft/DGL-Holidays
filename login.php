<?php
    require_once "db_config.php";
    header("Content-Type: application/json");

    $username = (trim($_POST['username']));
    $password = (trim($_POST['password']));
    
    $sql = "SELECT * FROM logindb WHERE username= ? and password= ?";

    if($stmt = $mysqli->prepare($sql)){
        $stmt->bind_param("ss", $username, $password);
        if($stmt->execute()){
            $result = $stmt->get_result();
            $value = $result->fetch_object();

            

            if( $result->num_rows != 0){

                $_SESSION['username'] = $username;

                $content = array("result" => "Login Successfully!!");
                echo json_encode($content, true);
            }
            else{
                $content = array("result" => "Incorrect login! Please provide a valid login");
                echo json_encode($content, true);
            }
        }
    }
?>