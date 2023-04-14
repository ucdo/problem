<?php
/**
 * 迭代器
 */
function yieldTour(): Generator
{
    for ($i = 0; $i < 10; $i++) {
        yield($i);
    }
}

$yield = yieldTour();
if(! is_iterable($yield)){
    echo 'not iterable';
}

foreach ($yield as $v){
    echo $v . PHP_EOL;
}