<?php

class simple
{
    function e(int $n)
    {
        $full = "FizzBuzz";
        $left = "Fizz";
        $right = "Buzz";
        $arr = [];
    
        for( $i = 1; $i <= $n; $i++ ){
            if ($i%3 == 0 && $i%5 == 0 ){
                $arr = array_push($arr, $full);
                continue;
            }
    
            if ($i%3 == 0 ){
                $arr = array_push($arr, $left);
                continue;
            }
    
            if ($i%5 == 0 ){
                $arr = array_push($arr, $right);
                continue;
            }
    
            $arr = array_push($arr, $this->string($i));
        }

	    return $arr;
    }

    private function string($i): string
    {
        return "{$i}";
    }
}