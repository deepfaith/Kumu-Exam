<?php

namespace App\Http\Traits;

use Illuminate\Support\Facades\Redis;

trait Helpers
{

	/**
     * Get the users from github api
     *
     * @param int $x
     * @param int $y
     * @return int $dh humming distance value
     */
    protected static function humming_distance ($x,$y) {

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

    /**
     * helper to print arrays and objects
     * @param $data
     */
    protected static function di($data): void
    {
        print "<pre>";	print_r($data);	print "</pre>";
    }

    /**
     * helper to store cache
     * @param string $key
     * @return string
     */
    protected static function redis_get_cache(string $key): string
    {
        return Redis::exists($key) ? Redis::get($key) : '';
    }

    /**
     * helper to set cache to 3 minutes
     * @param string $key
     * @param string $value
     */
    protected static function redis_set_cache(string $key, string $value): void
    {
        Redis::set($key, $value, 'EX', 180);
    }
}
