<?php

    $con=mysqli_connect('localhost','root','','argent');

    if(!$con)
    {
        die(' Please Check Your Connection'.mysqli_error($con));
    }
?>