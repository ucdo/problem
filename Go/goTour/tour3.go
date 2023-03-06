package main

import "fmt"

type v struct {
	x int
	y int
}

func main() {
	v := v{12, 3}
	//允许使用 `.` 访问结构体
	v.x = 4
	fmt.Println(v)
}
