package main

import "fmt"

// 定义一个空的切片
// 空切片底层没有数组
func main() {
	var s []int
	fmt.Printf("%v %d %d \n", s, len(s), cap(s))
}
