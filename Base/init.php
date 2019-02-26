<?php
include 'config.php';

spl_autoload_register('_autoload', true, false);
function _autoload($className)
{
    $parts = explode('_', $className);
    $file = implode(DIRECTORY_SEPARATOR, $parts) . '.php';
    include $file;
}