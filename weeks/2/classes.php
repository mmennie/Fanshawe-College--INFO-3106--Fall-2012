<?php

ini_set('display_errors', 'on');
error_reporting(E_ALL | E_STRICT);

require_once './classes_include1.php';

// include_once './classes_include1.php';
// include_once './classes_include.php';

/* Base class specific */
$base_class = new MyBaseClass();
$base_class->myMethod();

// $base_class->myProtectedMethod(); // won't run ... not visible
// $base_class->myPrivateMethod(); // won't run ... definitely not visible
// print_r( $base_class );
// unset($base_class);

print '<br /><br />';

$child = new MyChildClass();

MyChildClass::myStaticMethod();


print '<br /><br />';
print '<br /><br />';


myFuncInterface($base_class);
myFuncInterface($child); // still works, why?

myFuncBaseClass($base_class); // base class instance
myFuncBaseClass($child); // still works, why?

myFuncChildClass($child);
// myFuncChildClass($base_class); // doesn't work, why?