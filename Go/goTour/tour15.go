package main

import "fmt"

// append 会返回 增加之后的数组，如果原数组的容量不够，就会创建一个更大的，新的，数组，并指向切片
func main() {
	var s []int
	PrintSlice(s)
	s = append(s, 1, 2, 34, 5, 5, 6, 7)
	PrintSlice(s)
}

func PrintSlice(s []int) {
	fmt.Printf("%d %d %v\n", len(s), cap(s), s)
}
