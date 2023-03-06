package main

import "fmt"

//切片不会保存任何数据，只是底层数组的部分表现
//切片的值改变会使得底层的数组改变
func main() {
	arr := [9]int{1, 2, 3, 4, 5, 6, 7, 8}

	s := arr[1:]
	s[3] = 5555
	fmt.Println(s)
	fmt.Println(arr)
}
