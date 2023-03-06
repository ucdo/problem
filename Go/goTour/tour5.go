package main

import "fmt"

type v2 struct {
	x, y int
}

var (
	x = v2{x: 1, y: 2}

	p = &v2{x: 3, y: 4}
)

func main() {
	fmt.Println(x, *p)
}
