<?php
/**
 * Created by PhpStorm.
 * User: Alina
 */
session_start();
function error($errorMessage)
{
    if (!isset($_SESSION['errors'])) {
        $_SESSION['errors'] = [];
    }
    $_SESSION['errors'][] = $errorMessage;
}

function message($message)
{
    if (!isset($_SESSION['messages'])) {
        $_SESSION['messages'] = [];
    }
    $_SESSION['messages'][] = $message;
}
