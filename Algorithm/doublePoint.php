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

function isSubsequence($s, $t) {
    if(empty($s)) return true;
    $index = 0;
    for($i=0;$i<strlen($t);$i++){
        if($t[$i] == $s[$index]){
            $index++;
            if(strlen($s) == $index) return true;
        }
    }
    return false;
}

function isIsomorphic($s, $t) {
    //先找思路，再做题
    //先遍历这个字符串
    //把值作为键名，把键名作为值存储为数组
    //再遍历后面一个
    //比较他们两个的值。所有相等则相等
    if(strlen($s) != strlen($t)) return false;
    $pattern = [];
    $object = [];
    for($i=0;$i<strlen($s);$i++){
        $pattern[$s[$i]][] = $i;
        $object[$t[$i]][] = $i;
        if($pattern[[$s[$i]]] != $object[$t[$i]]){
            return false;
        }
    }
    
    return true;
}

function mergeTwoLists($l1, $l2){
    //边界控制
    if($l1->next == null) return $l1;
    if($l2->next == null) return $l2;

    if($l1->val <= $l2->val){
        $l1->next = mergeTwoLists($l1->next, $l2);
        return $l1;
    }else{
        $l2->next = mergeTwoLists($l1, $l2->next);
        return $l2;
    }

}

function main(){
//    $array = [12, 2, 3, 124, 99, 0, 234, 34, 11, 345, 51];
    // dd(maxArea($array));
    // dd(pivotIndex([1, 7, 3, 6, 5, 6]));
    // dd(isIsomorphic($a = 'abd', $b = 'bac'));
    $a =(object)[
        'val'=>1,
        'next' => (object)[
            'val'=>2,
            'next' => (object)[
                'val'=>3,
                'next' => (object)[
                    'val'=>4,
                    'next' => NULL
                ]
            ]
        ]
    ];
    $b =(object)[
        'val'=>1,
        'next' => (object)[
            'val'=>2,
            'next' => (object)[
                'val'=>3,
                'next' => (object)[
                    'val'=>7,
                    'next' => NULL
                ]
            ]
        ]
    ];

dd(mergeTwoLists($a,$b));
}

main();