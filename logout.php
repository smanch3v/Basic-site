<?php

session_start();
if(session_destroy()) { //Destroying all sessions
    header("Location: index.php"); //Redirection to home page
}