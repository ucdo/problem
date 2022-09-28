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


function quickSort(array $arr): array{
    if(count($arr) <= 1) return $arr;
    
    $point = $arr[0];
    $leftArray = array();
    $rightArray = array();

    for($i = 1;$i < count($arr); $i++){
        if($point > $arr[$i]){
            $leftArray[] = $arr[$i];
        }else{
            $rightArray[] = $arr[$i];
        }
    }
    $leftArray = quickSort($leftArray);
    $leftArray[] = $point;
    $rightArray = quickSort($rightArray);
    return array_merge($leftArray, $rightArray);
}

function main(){
    $array = [12, 2, 3, 124, 99, 0, 234, 34, 11, 345, 51];
    // dd(bubbleSort($array);
    // dd(selectionSort($array));
    dd(quickSort($array));
}

main();