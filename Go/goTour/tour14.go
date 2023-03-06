package main

import (
	"fmt"
)

// slice 可以装任何东西，包括其他切片
func main() {
	s := []string{"12", "info"}
	b := [][]string{
		[]string{"_", "_", "_"},
		[]string{"_", "_", "_"},
		[]string{"_", "_", "_"},
	}
	b[0][0] = "1"
	b[1][1] = "1"
	b[0][2] = "1"
	b[2][1] = "1"
	b[2] = s

	for i := 0; i < len(b); i++ {
		fmt.Printf("%s", b[i])
	}
}
