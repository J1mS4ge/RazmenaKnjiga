<?php

$host = "sql200.epizy.com"; /* Host name */
        $user = "epiz_31121671"; /* User */
        $password = "7XhEahxb5zgcPgN"; /* Password */
        $dbname = "epiz_31121671_db1"; /* Database name */

if(!$con = mysqli_connect($host,$user,$password,$dbname)){
    die("connection failed");
};