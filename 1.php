<?php
//$z = [6,11,21,26,36,41,51,56,2,7,17,22,32,37,47,52,3,8,13,38,43,53,58,4,29,34,49,5,10,20,25,35,40,50,60];
//$f = [1,16,31,46,12,27,42,57,18,23,28,33,48,9,14,19,24,39,44,54,59,15,30,45,55];
//
//sort($z);
//sort($f);
//$temp = [];
//$k1 = '正向';
//$k2 = '反向';
//$i = 1;
//while($i != 61)
//{
//    if(in_array($i,$z)){
//        $temp[] = $k1 . $i;
//    }else{
//        $temp[] = $k2 . $i;
//    }
//    $i++;
//}
//
//$z = implode('/',$temp);
////echo $z . PHP_EOL;
//
//
//function singleNumber($nums) {
//    $temp = [];
////    for ($i = 0; $i < count($nums); $i++) {
////        $temp[$nums[$i]]++;
////        if($temp[$nums[$i]] == 3){
////            unset($temp[$nums[$i]]);
////        }
////    }
//    $arr = array_count_values($nums);
//    return array_key_first(reset($temp));
//
//}
//
//singleNumber([0,1,0,1,0,1,100]);

//$slow = 0;
//$fast = 1;
//$arr = [0,0,1,1,1,2,2,3,3,4];
//$len = count($arr);
//while($fast < $len){
//    if($arr[$slow] == $arr[$fast]){
//        unset($arr[$fast]);
//        $fast++;
//        continue;
//    }
//    $slow = $fast;
//    $fast++;
//}
//sort($arr);
//var_dump($arr);

//$a = 1;
//$b = 2;
//[$a,$b] = [$b,$a];
//echo $a . PHP_EOL;
//ECHO $b;

$str = '1231asedf';
$bool = ctype_alnum($str);
echo $bool;