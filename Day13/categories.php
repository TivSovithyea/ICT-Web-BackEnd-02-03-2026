<?php

require 'connectToDb.php';

$method = $_SERVER['REQUEST_METHOD'];

if($method == "GET") {

    $requestId = $_GET['id'] ?? null;

    if($requestId != null) {

        $stmt = $conn->query("SELECT * FROM categories WHERE id = $requestId");
        echo json_encode($stmt->fetchObject());
    } else {

        $stmt = $conn->query("SELECT * FROM categories");
        echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
    }


    // $stmt = $conn->query("SELECT * FROM categories");
    // echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
} else if($method == "POST") {

    $data = json_decode(file_get_contents("php://input"));
    // var_dump($data->name);

    $stmt = $conn->prepare("INSERT INTO categories (name) VALUES (?) ");
    $stmt->execute([$data->name]);

} else if($method == "PUT") {
    $data = json_decode(file_get_contents("php://input"));
    // $stmt

    //UPDATE categories SET name = ? WHERE id = ?
} else if($method == "DELETE") {
    $requestId = $_GET['id'] ?? null;
    if($requestId != null) {
        //DELETE FROM categories WHERE id = 
    }
}
else {
    echo json_encode(["message" => "Method Not Allow"]);
}
