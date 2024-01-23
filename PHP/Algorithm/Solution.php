<?php

namespace Algorithm;

class Solution
{
    /**
     * 原地删除排序数组中的重复项
     * 策略：双指针之快慢指针
     * 思路：慢指针在最前面，快指针移动。相等即删除快指针所在的位置的值，并将快指针移动；否则将快指针赋值慢指针之后再移动。
     * 细节：简单题，参考代码和思路
     * @param $arr array
     */
    function removeDuplicates(array &$arr) {
        $slow = 0;
        $fast = 1;
        $len = count($arr);
        while($fast < $len){
            if($arr[$slow] == $arr[$fast]){
                unset($arr[$fast]);
                $fast++;
                continue;
            }
            $slow = $fast;
            $fast++;
        }
        sort($arr);
    }

    /**
     * @param Integer[] $nums
     */
    function moveZeroes(&$nums) {
        $slow = 0;
        $len = count($nums);
        $fast = 1;
        //一个slow，当前值为0.和后面一个交换位置。slow++。
        while($slow < $len && $fast < $len){
            if($slow > $fast){
                $fast = $slow;
            }

            if($nums[$slow] == 0 && $nums[$fast] == 0){
                $fast++;
                continue;
            }

            if($nums[$slow] != 0){
                $slow++;
                continue;
            }

            if($nums[$fast] != 0 && $slow < $fast){
                [$nums[$slow],$nums[$fast]] = [$nums[$fast],$nums[$slow]];
                $slow++;
                $fast++;
            }
        }
    }

    /**
     * 这道题要注意到进位之类的操作
     * @param array $arr
     * @return array
     */
    function addOne($arr)
    {
        $len = count($arr);
        // 注意到有进位之类的操作你懂我意思吧。
        for ($i = $len - 1; $i >= 0; $i--) {
            $arr[$i] += 1;
            if($arr[$i] < 10){
                break;
            }
            $arr[$i] %= 10;
        }

        if(reset($arr) == 0){
            $arr = array_merge([1],$arr);
        }

        return $arr;
    }

    /**
     * 找到只出现一次的字符串
     * @param $nums
     * @return int
     */
    function singleNumber($nums){
        $len = count($nums);
        if($len == 1) return $nums[0];
        $arr = [];
        for ($i = 0; $i < $len; $i++) {
            if(!isset($arr[$nums[$i]])){
                $arr[$nums[$i]] = 1;
                continue;
            }
            $arr[$nums[$i]] ++;

            if($arr[$nums[$i]] == 2){
                unset($arr[$nums[$i]]);
            }
        }
        return array_key_first($arr);
    }

    /**
     * 旋转字符串
     * @param $arr
     * @param $k
     */
    function rotate(&$arr,$k){
        $len = count($arr);
        $k %= $len;
        if($k == 0){
            return ;
        }

        $arr1 = array_slice($arr,0,-$k);
        $arr2 = array_slice($arr,-$k,$k);
        $arr = array_merge($arr2,$arr1);
    }

    /**
     * @param String[][] $board
     * @return Boolean
     */
    function isValidSudoku($board) {
        for ($i = 3; $i <= 9; $i += 3) {
            for ($j = 3; $j <= 9; $j += 3) {
                $res =  $this->is_sudo($board,$i,$j);
                if(! $res){
                    return false;
                }
            }
        }

        for ($f = 0; $f < 9; $f++) {
            $res = $this->is_sudo2($board,$f);
            if(! $res){
                return false;
            }
        }

        return true;
    }

    /**
     * 检查3×3格子
     * @param $data
     * @param $i
     * @param $j
     * @return bool
     */
    function is_sudo($data,$i,$j)
    {
        $f = [];
        for ($k = $i - 3; $k < $i; $k++) {
            for ($l = $j - 3; $l < $j; $l++) {
                $key = $data[$k][$l];
                if($key != '.'){
                    $f[] = $data[$k][$l];
                }

                $len = count($f);
                if(count(array_unique($f)) != $len){
                    return false;
                }
            }
        }
        return true;
    }

    /**
     * 检查列
     * @param $data
     * @param $i
     * @return bool
     */
    function is_sudo2($data, $i)
    {
        $temp = [];
        $arr = array_values($data[$i]);
        for ($j = 0; $j < 9; $j++) {
            if($data[$i][$j] != '.'){
                $temp[] = $data[$i][$j];
            }

            if($arr[$j] == '.'){
                unset($arr[$j]);
            }
        }
        $len1 = count($arr);
        $len2 = count($temp);
        if(count(array_unique($arr)) != $len1 || count(array_unique($temp)) != $len2){
            return false;
        }
        return true;
    }
    
    /**
     * 递归测试
     * 输出：
     * 1
     * 2
     * 3
     * 4
     * 4
     * 3
     * 2
     * 1
     *
     * @param int $n
     *
     * @return void
     */
    function recursion(int $n)
    {
        echo sprintf("%d",$n) . PHP_EOL;
        if($n < 4){
            $this->recursion($n + 1);
        }
        
        echo sprintf("%d",$n) . PHP_EOL;
    }
}

//$arr = [["5","3",".",".","7",".",".",".","."],["6",".",".","1","9","5",".",".","."],[".","9","8",".",".",".",".","6","."],["8",".",".",".","6",".",".",".","3"],["4",".",".","8",".","3",".",".","1"],["7",".",".",".","2",".",".",".","6"],[".","6",".",".",".",".","2","8","."],[".",".",".","4","1","9",".",".","5"],[".",".",".",".","8",".",".","7","9"]];
//$res = (new Solution())->isValidSudoku($arr);
//var_dump($res);

//$arr = (new Solution())->range([[1,2],[3,4]]);
//var_dump($arr);

(new Solution())->recursion(1);