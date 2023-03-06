package main

import "fmt"

//slice
func main() {
	arr := [8]int{1, 2, 3, 4, 5, 6, 7}
	s := arr[1:]

	fmt.Println(arr)
	fmt.Println(s)
}
