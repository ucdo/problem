package main

import "fmt"

//make 创建动态数组
func main() {
	s := make([]int, 5, 10)
	printSlice1("s", s)

	s1 := s[1:]
	printSlice1("s1", s1)

	s2 := s[:10]
	printSlice1("s2", s2)
}
func printSlice1(s string, x []int) {
	fmt.Printf("%s len=%d cap=%d %v\n",
		s, len(x), cap(x), x)
}
