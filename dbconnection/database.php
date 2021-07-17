<?php

try {
    $conn = new PDO("mysql:host=localhost; dbname=bus_ticket_reservation_db", "root", "");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo $e->getMessage();
}