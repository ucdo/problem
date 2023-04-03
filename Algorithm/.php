<?php
//多项式计算
// f(x) = a0 + a1*x + ...+ an-1*x^n-1 + an * x^n
class test{
    public function f(int $n, array $a, int $x):float
    {
        $sum = 0;
        for($i = 1;$i < $n;$i++){
            $sum += $a[$i] + pow($x,$i);
        }
        return $sum;
    }

    public function f1(int $n, array $a, int $x):float
    {
        $sum = 0;
        for($i = $n;$i > 0;$i--){
            $sum = $a[$i] + $sum * $a[$i];
        }

        return $sum;
    }
}