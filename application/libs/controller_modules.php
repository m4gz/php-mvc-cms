<?php

/**
 * This is the "base controller class". All other "real" controllers modules extend this class.
 */
class Controller_modules extends Controller
{
	
	protected function display() {
		$class = get_called_class();
	}
	
}