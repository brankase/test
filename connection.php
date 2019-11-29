<?php

$link= new mysqli("localhost","root","","online_quiz");//konekcija sa bazom
if($link->connect_error)
    die("Connnection Failed".$link->connect_error);
