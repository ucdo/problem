package main

import (
	"fmt"
	"go/types"
)

type t struct {
	a string
	b int
	c float32
	d float64
	f map[string]int
	g types.Slice
	h *t
}

func main() {
	fmt.Println("1")
}
