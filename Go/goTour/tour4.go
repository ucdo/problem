package main

import "fmt"

type v1 struct {
	x int
	y int
}

func main() {
	v := v1{1, 2}
	p := &v
	p.x = 999
	fmt.Println(*p)
}
