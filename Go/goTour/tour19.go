package main

import "fmt"

type v19 struct {
	Lat, Long float64
}

var m map[string]v19

func main() {
	m = make(map[string]v19)
	m["1"] = v19{Lat: 11}
	fmt.Println(m["1"])
}
