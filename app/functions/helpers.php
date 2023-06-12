<?php

use app\src\Flash;
use app\src\Redirect;

function dd($data)
{
    print_r($data);
    //var_dump($data);
    die();
}

function json($data)
{
    header('Contet-Type: application/json');
    echo json_encode($data);
}

function path()
{
    $vendorDir = dirname(__FILE__);
    return dirname($vendorDir);
}

function flash($index, $message)
{
    Flash::add($index, $message);
}

function error($message)
{
    return "<span class='alert alert-danger'>* {$message}</span>";
}

function success($message)
{
    return "<span class='alert alert-success'>* {$message}</span>";
}

function back()
{
    Redirect::back();
    die();
}
