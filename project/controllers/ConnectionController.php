<?php

namespace Project\Controllers;

use \Core\Controller;


class ConnectionController extends Controller 
{
    public function connect() {
        $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        mysqli_query($conn, "SET NAMES 'utf8'");

        return $conn;
    }
}