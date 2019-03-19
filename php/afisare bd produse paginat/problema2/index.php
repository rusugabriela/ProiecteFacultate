<?php
/**
 * Created by PhpStorm.
 * User: Alina
 */

$conn = new mysqli("localhost", "root", "", "problema2");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$nrResultsPerPage = 5;
$page = 1;

if (isset($_GET['nrResultsPerPage'])) {
    $nrResultsPerPage = $_GET["nrResultsPerPage"];
    if (!array_search($nrResultsPerPage, [ 5, 10, 15, 30])){
        $nrResultsPerPage = 5;
    }
}
if (isset($_GET['page'])) {
    $page = $_GET["page"];
}

$num_rows = mysqli_num_rows($conn->query("select * from products"));

$numberOfPages = $num_rows / $nrResultsPerPage + 1;

$result = $conn->query("select * from products limit " .($page-1) * $nrResultsPerPage.",". $nrResultsPerPage);


require "views/show_products.php";