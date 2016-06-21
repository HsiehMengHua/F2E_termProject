<?php

include("../connectDB.php");

$sql = "SELECT COUNT(*) FROM activity";
$result = $conn->query($sql);
$row = $result->fetch_row();
echo $row[0];

?>