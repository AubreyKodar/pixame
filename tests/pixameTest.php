<?php 

/**
* @author AubreyKodar
*/
class pixameTest extends PHPUnit_Framework_TestCase{
	
  /**
  * Check for syntax errors
  */
  public function testIsThereAnySyntaxError(){
	$pix = new AubreyKodar\pixame\pixame();
	$this->assertTrue(is_object($pix));
	unset($var);
  }

}