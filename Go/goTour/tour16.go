package main

import "fmt"

//range , 如果只有一个值，则是key
func main() {
	s := []int{1, 2, 3, 4}
	for k := range s {
		fmt.Println(k)
	}
}
