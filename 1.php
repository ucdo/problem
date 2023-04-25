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

// $str = '1231asedf';
// $bool = ctype_alnum($str);
// echo $bool;

//class test{
//    public function test()
//    {
//        try {
//            return 1;
//        } catch (\Throwable $th) {
//            //throw $th;
//        }finally{
//            echo 'nihao';
//        }
//        return 2;
//    }
//}
//
//$t = (new test)->test();
//echo $t;

//function getMillisecond():string
//{
//    list($s1, $s2) = explode(' ', microtime());
//    return sprintf('%.0f', (floatval($s1) + floatval($s2)) * 1000);
//}
//
//echo getMillisecond();var_dump(json_decode('{"code":10,"msg":"\u6570\u636e\u6709\u8bef","prompt":"\u6570\u636e\u9a8c\u8bc1\u5931\u8d25","data":{"res":[["\u5bfc\u5165\u6587\u4ef6\u7684\u5934\u90e8\uff1a\"\u7528\u6237\u7f16\u53f7\",\u548c\u56fa\u5b9a\u6a21\u677f\u7684\u5934\u90e8\uff1a\"\u59d3\u540d\"\u4e0d\u4e00\u81f4"],["\u5bfc\u5165\u6587\u4ef6\u7684\u5934\u90e8\uff1a\"\u5bc6\u7801\",\u548c\u56fa\u5b9a\u6a21\u677f\u7684\u5934\u90e8\uff1a\"\u8eab\u4efd\u8bc1\"\u4e0d\u4e00\u81f4"],["\u5bfc\u5165\u6587\u4ef6\u7684\u5934\u90e8\uff1a\"\u59d3\u540d\",\u548c\u56fa\u5b9a\u6a21\u677f\u7684\u5934\u90e8\uff1a\"\u7535\u8bdd\"\u4e0d\u4e00\u81f4"],["\u5bfc\u5165\u6587\u4ef6\u7684\u5934\u90e8\uff1a\"\u6587\u5316\u7a0b\u5ea6\",\u548c\u56fa\u5b9a\u6a21\u677f\u7684\u5934\u90e8\uff1a\"\u6559\u80b2\u7a0b\u5ea6\"\u4e0d\u4e00\u81f4"],["\u5bfc\u5165\u6587\u4ef6\u7684\u5934\u90e8\uff1a\"\",\u548c\u56fa\u5b9a\u6a21\u677f\u7684\u5934\u90e8\uff1a\"\u90e8\u95e8\"\u4e0d\u4e00\u81f4"]]}}'));

//var_dump(json_decode('{"code":10,"msg":"\u6587\u4ef6\u683c\u5f0f\u6709\u8bef","prompt":"\u6587\u4ef6\u6821\u9a8c\u5931\u8d25","data":[]}'));

$arr = [
    ['姓名', '性别', '电话', '出生日期', '身份证', '教育程度', '部门',],
    ['张三','女','13310000951','36658','500228199505074690','大学专科','医学部'],
    ['张三','女','13310000951','36658','500228199505074690','大学专科','医学部'],
    ['张三','女','13310000951','36658','500228199505074690','大学专科','医学部'],
    ['张三','女','13310000951','36658','500228199505074690','大学专科','医学部'],
];
var_dump(json_encode($arr,));

var_dump(json_decode('[["姓名","性别","电话","出生日期","身份证","教育程度","部门"],["张三","女","13310000951","36658","500228199505074690","大学专科","医学部"],["张三","女","13310000951","36658","500228199505074690","大学专科","医学部"],[
    "张三","女","13310000951","36658","500228199505074690","大学专科","医学部"],["张三","女","13310000951","36658","500228199505074690","大学专科","医学部"]]'));