<?php
/**
 * 令人困惑的 strtotime
 */

var_dump(date("Y-m-d", strtotime("-1 month", strtotime("2017-03-31"))));
//输出2017-03-03
var_dump(date("Y-m-d", strtotime("+1 month", strtotime("2017-08-31"))));
//输出2017-10-01
var_dump(date("Y-m-d", strtotime("next month", strtotime("2017-01-31"))));
//输出2017-03-03
var_dump(date("Y-m-d", strtotime("last month", strtotime("2017-03-31"))));

var_dump(date("Y-m-d", strtotime("last day of -1 month", strtotime("2017-03-31"))));
//输出2017-02-28
var_dump(date("Y-m-d", strtotime("first day of +1 month", strtotime("2017-08-31"))));
////输出2017-09-01
var_dump(date("Y-m-d", strtotime("first day of next month", strtotime("2017-01-31"))));
////输出2017-02-01
var_dump(date("Y-m-d", strtotime("last day of last month", strtotime("2017-03-31"))));
////输出2017-02-28

/**
 * 令人困惑的 dMy
 * 比如 09-FEB-57 如果是出生日期的话，就代表，1957-02-09. 但是如果直接用strtotime就会发现，会变成 2057-02-09
 */

function dMy2Ymd(string $date)
{
    //  $date = '09-FEB-57';
    $year = explode('-',$date);
    $old =$year = end($year);
    // 值得注意的是，这个suffix可以通过获取当前年的前两位然后 - 1 比较合理。 不过也没关系。30年谁会用这个
    if($year > substr(date('Y'),2)){
        $suffix = "19";
    }else{
        $suffix = "20";
    }
    
    $year = $suffix . $year;
    $date = str_replace("-{$old}","-{$year}",$date);
    return \DateTime::createFromFormat('d-M-Y', $date)->format('Y-m-d');
}