<?php

include 'main/Connection.php';

// Collect all Class in one Place
spl_autoload_register(function ($class_name) {
    include 'main/' . $class_name . '.php';
});
