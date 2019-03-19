<?php

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $plecare = $_GET['plecare'];
    $sosire = $_GET['sosire'];
    $legaturi = isset($_GET['legaturi']);
}

$conn = new mysqli("localhost", "root", "", "problema1");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$stmt = $conn->prepare("select * from trenuri where localitate_plecare = ? and localitate_sosire = ?");
$stmt->bind_param("ss", $plecare, $sosire);

$stmt->execute();

$result = array_map(function ($tren) {
    return [$tren];
}, $stmt->get_result()->fetch_all(MYSQLI_ASSOC));


if ($legaturi) {
    $stmt = $conn->prepare(
        "select t1.nr_tren nr_tren1, t1.ora_plecare ora_plecare1, t1.ora_sosire ora_sosire1, t2.nr_tren nr_tren2, t2.localitate_plecare intermediar, t2.ora_plecare ora_plecare2, t2.ora_sosire ora_sosire2 from trenuri t1 inner join trenuri t2 on t1.localitate_sosire  = t2.localitate_plecare where t1.localitate_plecare = ? and t2.localitate_sosire  = ?"
    );

    $stmt->bind_param("ss", $plecare, $sosire);
    $stmt->execute();


    $trenuri = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    foreach ($trenuri as $legatura) {
        $result[] = [
            [
                "localitate_plecare" => $plecare,
                "nr_tren" => $legatura['nr_tren1'],
                "ora_plecare" => $legatura['ora_plecare1'],
                "ora_sosire" => $legatura['ora_sosire1'],
                "localitate_sosire" => $legatura['intermediar'],
            ],
            [
                "localitate_plecare" => $legatura['intermediar'],
                "nr_tren" => $legatura['nr_tren2'],
                "ora_plecare" => $legatura['ora_plecare2'],
                "ora_sosire" => $legatura['ora_sosire2'],
                "localitate_sosire" => $sosire,
            ]
        ];
    }
}

require "views/afisare_trenuri.php";
