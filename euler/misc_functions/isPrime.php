<?php


function isPrime($num)
{
	for ($i = 3; $i <= ceil($num /3); $i++) {
		if ($num % $i == 0) {
			return false;
		}
	}
	return true;
}


