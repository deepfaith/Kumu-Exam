<?php

namespace App\Http\Traits;

trait Helpers
{
  
	/**
     * Get the users from github api 
     *
     * @param int $x 
     * @param int $y 
     * @return int $dh humming distance value
     */  
	function humming_distance ($x,$y) {

	    //convert integer to binary padded with leading zeros
	    //splits the binaries into array
	    $a1 = str_split(str_pad(decbin($x), 4, '0', STR_PAD_LEFT));
	    $a2 = str_split(str_pad(decbin($y), 4, '0', STR_PAD_LEFT));
	    $dh = 0;

	    for ($i = 0; $i < count($a1); $i++){ 
	        //increment the value of the humming distance if 2 bits are not equal.
	        if($a1[$i] != $a2[$i]){ 
	        	$dh++;
	        }		
	    }    
	    return $dh;
	}       
  
}
