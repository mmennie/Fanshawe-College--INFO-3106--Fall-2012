<?php

function myFuncInterface(IMyInterface $o)
{
  $o->myPreDefinedMethod();
}

function myFuncBaseClass(MyBaseClass $o)
{
  $o->myMethod();
  $o->myChildMethod(); // cannot/is not accessible
}

function myFuncChildClass(MyChildClass $o)
{
  $o->myChildMethod(); // accessible here ...
  $o->myMethod(); // all parent class's methods are too!
}


interface IMyInterface
{
  public function myPreDefinedMethod();
}

/* abstract */ class MyBaseClass implements IMyInterface
{
  const MY_CONST = '1';

  private $_my_private_var;
  protected $_my_protected_var;
  public $_my_public_var;

  /**
   * Constructor method
   */
  /* final */ public function __construct()
  {
    print __METHOD__ . '<br />';
    
    $this->_my_private_var = 'private';
    $this->_my_protected_var = 'protected';
    $this->_my_public_var = 'public';
    
    $this->myPrivateMethod();
  }
  
  /**
   * Destructor method
   */
  public function __destruct()
  {
    print __METHOD__ . '<br />';
  }

  /**
   * Sample method
   */
  public function myMethod()
  {
    print __METHOD__ . '<br />';
  }
  
  protected function myProtectedMethod()
  {
    print __METHOD__ . '<br />';
  }
  
  private function myPrivateMethod()
  {
    print __METHOD__ . '<br />';
  }
  
  public function myPreDefinedMethod()
  {
    print __METHOD__ . '<br />';
  }
}

class MyChildClass extends MyBaseClass
{
  public function __construct()
  {
    print __METHOD__ . '<br />';
    
    parent::__construct();
  }
  
  public function myChildMethod()
  {
    print __METHOD__ . '<br />';
  }
  
  public static function myStaticMethod()
  {
    print __METHOD__ . '<br />';
  }
}