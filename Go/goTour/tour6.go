package main

import "fmt"

// [n]T 是数组，长度是数组必不可少的因素
// 数组自动0值初始化
func main() {
	var arr [2]string
	arr[1] = "hello"
	arr[0] = "world"
	fmt.Println(arr)

	pr := [8]int{}
	fmt.Println(pr)
}
