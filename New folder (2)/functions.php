<?php

function check_login($con)
{
    if(isset($_SESSION['user_id']))
    {
        $id= $_SESSION['user_id'];
        $query = "SELECT * FROM users WHERE user_id = '$id' limit 1";
        $resault = mysqli_query($con, $query);

        if($resault && mysqli_num_rows($resault) > 0)
        {
            $user_data = mysqli_fetch_assoc($resault);
            return $user_data;
        }
    }

    //redirect to login
    header("Location: login.php");
    die;
}

function getData($con){
    $query = "SELECT * FROM users";
    $result = mysqli_query($con, $query);

    $resultArray = array();

    // fetch users data one by one
    while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)){
        $resultArray[] = $item;
    }

    return $resultArray;
}

function getDataImg($con){
    $query = "SELECT * FROM images";
    $result = mysqli_query($con, $query);

    $resultArray = array();

    // fetch users data one by one
    while ($item1 = mysqli_fetch_array($result, MYSQLI_ASSOC)){
        $resultArray[] = $item1;
    }

    return $resultArray;
}

function random_num($length){
    $text = "";
    if($length < 5)
    {
        $length = 5;
    }

    $len = rand(4, $length); // between 4 and length

    for ($i=0;$i<$len;$i++)
    {
        $text .= rand(0,9);
    }

    return $text;
}

