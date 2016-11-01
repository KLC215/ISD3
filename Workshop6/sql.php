<?php

function connectDB()
{
    $mysqli = new mysqli("localhost", "root", "", "bookdb")
                or die ("Cannot connect to database server! Please check the connection.");

    return $mysqli;
}