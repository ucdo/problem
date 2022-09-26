<?php

function dd($string){
    var_dump($string);
    die();
}

function bubbleSort(array $arr){
    for($i = 0; $i < count($arr); $i++){
        for($j = 0;$j < count($arr) - 1; $j++){
            if($arr[$j] > $arr[$j+1]){
                [$arr[$j], $arr[$j+1]] = [$arr[$j+1], $arr[$j]];
            }
        }
    }
    return $arr;
}

function selectionSort(array $arr): array{
    for($i = 0; $i < count($arr); $i++){
        $m = $i;
        for($j = $i+1; $j < count($arr); $j++){
            if($arr[$j] < $arr[$m]){
                $m  = $j;
            }
        }
        [$arr[$i], $arr[$m]] = [$arr[$m], $arr[$i]];
    }
    return $arr;
}

function main(){
    $array = [12, 2, 3, 124, 99, 0, 234, 34, 11, 345, 51];
//     dd(bubbleSort($array);
    dd(selectionSort($array));
}

main();