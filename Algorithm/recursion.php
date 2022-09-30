<?php

function dd($val){
    var_dump($val);
    die();
}

function add($x){
    if($x > 0){
        return $x + add($x-1);
    }else{
        return 0;
    }

}

function main(){
    dd(add(2));
}

main();