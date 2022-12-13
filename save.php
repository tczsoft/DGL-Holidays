<?php
    require_once "db_config.php";

    $data = json_decode(file_get_contents('php://input'), true);

    $name = $data["name"];
    $email = $data["email"];
    $phone = $data["phone"];
    $gst = $data["gst"];
    $special_request = $data["special_request"];
    $place = $data["Place"];
    $hotel = $data["hotel"];
    $from_date = $data["from_date"];
    $to_date = $data["To_Date"];
    $room_details = $room_details = json_encode($data["Room_Details"], true);
    $id = 6;
    
    $sql = "INSERT INTO hotel_reservations (name, email, phone, gst, special_request, place, hotel, from_date, to_date, room_details) VALUES ( ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    if($stmt = $mysqli->prepare($sql)){

        $stmt->bind_param("ssssssssss", $name, $email, $phone, $gst, $special_request, $place, $hotel, $from_date, $to_date, $room_details);

        if($stmt->execute()){
            $content = array("result" => "Insert Succesfully!");
            echo json_encode($content, true);
            exit();
        } else{
            echo "Oops! Something went wrong. Please try again later.";
        }
    }

?>