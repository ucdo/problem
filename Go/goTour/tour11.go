package main

import "fmt"

//当切片的容量不够时，会扩容。具体的扩容机制咱先不谈，后续深入学习
func main() {
	s := []int{1, 2, 3, 4, 5, 6, 7, 8}
	printSlice(s)

	s1 := s[:0]
	printSlice(s1)

	s2 := s[3:7]
	printSlice(s2)

	s = append(s, 10)
	printSlice(s)
}

func printSlice(s []int) {
	fmt.Printf("%d %d %v\n", len(s), cap(s), s)
}
