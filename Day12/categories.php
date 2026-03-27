<?php

require 'connectToDb.php';

$stmt = $conn->query("SELECT * FROM villages LIMIT 15");
echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));