<?php

    include '../includes/database.inc.php';

    $sql = "SELECT path FROM greetingsstickers";

    $result=mysqli_query($conn, $sql);

    $data=array();
    while($row = mysqli_fetch_assoc($result)){
        $data[]=$row;
    }

    echo json_encode($data);