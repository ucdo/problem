<?php
function dd($val){
    var_dump($val);
    exit();
}

function maxArea($arr) {
    $max = 0;
    [$i ,$j] = [0,count($arr)-1];
    while($i < $j){
        $max = max($max,(min($arr[$i],$arr[$j]))*($j -$i));
        $arr[$i] > $arr[$j] ? $j-- : $i++;
    }
    return $max;
}

function pivotIndex($nums) {
    //想复杂了，直接遍历两次就好了
    //伪代码
    $sum = array_sum($nums);
    [$index, $i] = [0, 0];
    $j = $sum;
    
    $arr = array();
    
    for($index;$index < count($nums); $index++ ){
        $j -= $nums[$index];
        if($i == $j){
            $arr[] = $index;
        }
        $i += $nums[$index]; 
    }
    
    if(count($arr) > 0) return min($arr);
    return -1;
}

function main(){
    $array = [12, 2, 3, 124, 99, 0, 234, 34, 11, 345, 51];
    // dd(maxArea($array));
    dd(pivotIndex([1, 7, 3, 6, 5, 6]));
}

main();