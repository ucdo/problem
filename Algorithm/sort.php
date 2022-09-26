<?php

function dd($string){
    var_dump($string);
    die();
}
$array = [12, 2, 3, 124, 99, 0, 234, 34, 11, 345, 51];

function bubbleSort(array $arr){
    for($i = 0; $i < count($arr); $i++){
        for($j = 0;$j < count($arr) - 1; $j++){
            if($arr[$j] > $arr[$j+1]){
                $temp = $arr[$j+1];
                $arr[$j+1] = $arr[$j];
                $arr[$j] = $temp;
            }
        }
    }
    return $arr;
}
// $arr = bubbleSort($array);
//有问题
//https://www.runoob.com/w3cnote/selection-sort.html
function selectionSort(array $arr): array{
    for($i = 0; $i < count($arr); $i++){
        for($j = $i+1; $j < count($arr)-1; $j++){
            if($arr[$i] > $arr[$j]){
                $m  = $j;
            }
        }
        if( $arr[$m]< $arr[$i]){
            $temp = $arr[$i];
            $arr[$i] = @$arr[$m];
            $arr[$m] = $temp;
        }
    }
    return $arr;
}
$arr = selectionSort($array);
dd($arr);
