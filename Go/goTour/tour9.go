package main

import "fmt"

//类型可以定义。。。
//切片的定义为
//This is an array literal
//[2]bool{false, true}
//slice
//[]bool{false,true}
//创建切片时，底层会创建一个数组，然后切片是对底层的引用
func main() {
	q := []int{1, 2, 3, 4, 5}
	b := []bool{true, false}

	s := []struct {
		i int
		j bool
	}{
		{i: 1, j: true},
		{111, false},
	}

	fmt.Println(q)
	fmt.Println(b)
	fmt.Println(s[1].i)
}
