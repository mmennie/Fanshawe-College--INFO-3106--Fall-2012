<?php

abstract class Factory {
	public static function create($class = null) {
		if( !$class ) {
			print __METHOD__ . '::' . __LINE__ . '<br />';
			$class = get_called_class();
			if( $class == 'Factory' ) {
				throw new Exception('Cannot create an instance of Factory class.');
			}
		}
		else {
			print __METHOD__ . '::' . __LINE__ . '<br />';
		}
		
		if( !class_exists($class) ) {
			throw new Exception(sprintf('%1$s does not exist.', $class));
		}
		
		return new $class;
	}
	
	/** 
	 * Do NOT allow the instantiation of this class. (first example)
	 */
	// final private function __construct() { }
	// final private function __destruct() { }
}