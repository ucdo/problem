package main

import "fmt"

func main() {
	s := []int{1, 2, 3, 4, 5}

	s1 := s[2:]
	s2 := s[:5]
	s3 := s[:]
	fmt.Println(s1, s2, s3)
}
