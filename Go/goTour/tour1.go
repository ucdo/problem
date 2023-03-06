package main

import "fmt"

func main() {
	tour1()
}

func tour1() {
	i, j := 1, 9
	fmt.Println(i)
	p := &i
	fmt.Println(p)
	fmt.Println(*p)
	*p = 22
	fmt.Println(i)
	fmt.Println(*p)

	p = &j
	fmt.Println(p)
}
