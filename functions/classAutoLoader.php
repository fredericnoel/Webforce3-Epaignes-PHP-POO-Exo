<?php

function classAutoloader($className)
{
    require_once './classes/' . $className . '.php';
}
