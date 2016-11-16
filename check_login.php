<?php
session_start();
if(!isset($_SESSION["username"]))
{
   echo "No";
}
else
{
    echo "Yes";
}
       
        