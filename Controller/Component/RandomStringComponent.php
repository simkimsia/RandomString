<?php
class RandomStringComponent extends Component {
 
/**
 * Random string generator function
 *
 * This function will randomly generate a password from a given set of characters
 *
 * @param int = 8, length of the password you want to generate
 * @param string = 0123456789abcdefghijklmnopqrstuvwxyz all possible values
 * @return string, the password
 */
	function generate ($length = 8, $options = array()) {
		// initialize variables
		$password = "";
		$i = 0;
		$possible = '';
		
		$numerals = '0123456789';
		$lowerAlphabet = 'abcdefghijklmnopqrstuvwxyz';
		$upperAlphabet = strtoupper($lowerAlphabet);
		$symbols = '$#@!~`%^&*()_+-=|}{\][:;<>.,/?';
		
		$defaultOptions = array('type'=>'alphanumeric', 'case'=>'mixed');
		
		$options = array_merge($defaultOptions, $options);
		
		$possible = $numerals;
		if ($options['case'] == 'lower' OR $options['case'] == 'mixed') {
			$possible .= $lowerAlphabet;
		} elseif ($options['case'] == 'upper' OR $options['case'] == 'mixed') {
			$possible .= $upperAlphabet;
		}
		if ($options['type'] != 'alphanumeric') {
			$possible .= $symbols;
		}
		
		// add random characters to $password until $length is reached
		while ($i < $length) {
			// pick a random character from the possible ones
			$char = substr($possible, mt_rand(0, strlen($possible)-1), 1);
			
			// we don't want this character if it's already in the password
			if (!strstr($password, $char)) { 
				$password .= $char;
				$i++;
			}
		}
		return $password;
	}
}
