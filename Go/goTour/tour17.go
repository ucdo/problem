package main

import "fmt"

func main() {
	pow := make([]int, 10)
	for k := range pow {
		pow[k] = 1 << uint8(k)
	}

	for i, i2 := range pow {
		fmt.Println(i, i2)
	}
}
