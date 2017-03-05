<?php
$conn = mysqli_connect('localhost','root','','tuts_rest');
if (!$conn) {
    die('Could not connect: ' . mysqli_error($conn));
}
