<?php
    require_once "db_config.php";
    
    header("Content-Type: application/json");

    $Place = trim($_POST["Place"]);
    $Hotel = trim($_POST["Hotel"]);
    $status = "Yes";
    
    $sql = "SELECT * FROM hotel_details WHERE place= ? and hotel_name= ? and  available_status= ?";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("sss", $Place, $Hotel, $status);
    $stmt->execute();

    $array = [];
    foreach ($stmt->get_result() as $row) {
        $array[] = $row;
    }

    echo json_encode($array, true);

?>