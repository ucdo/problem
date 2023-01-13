package main

import (
	"fmt"
	"math"
)

func main() {
	//pivotIndex([]int{1, 7, 3, 6, 5, 6})
	//testS([]int{1, 2, 3, 4, 5})
	isSubsequence("hello", "world")
}

func maxArea(arr []int) int {
	max := 0
	i, j := 0, len(arr)-1
	for i < j {
		min := int(math.Min(float64(arr[i]), float64(arr[j])))
		max = int(math.Max(float64(max), float64(min*(j-i))))
		if arr[i] > arr[j] {
			j--
		} else {
			i++
		}
	}
	return max
}

func pivotIndex(nums []int) int {
	var sum int
	var arr []int
	i, index := 0, 0
	for _, v := range nums {
		sum += v
	}
	j := sum
	for index = 0; index < len(nums); index++ {
		j -= nums[index]
		if i == j {
			arr = append(arr, index)
		}
		i += nums[index]
	}
	if len(arr) > 0 {
		return arr[0]
	}
	return -1
}

func convArray(arr []int) []int {
	for i, j := 0, len(arr)-1; i < j; i, j = i+1, j-1 {
		arr[i], arr[j] = arr[j], arr[i]
	}
	return arr
}

// 测试slice会不会因为array的改变而改变
func testS(arr []int) {
	a := arr[:]
	for k, v := range arr {
		arr[k] = v * v
	}
	fmt.Print(arr)
	fmt.Print("\r\n")
	fmt.Print(a)
}

func isSubsequence(h string, n string) bool {
	//思路一定要清晰
	//1.首先应该确定遍历哪个 n
	//2.先拿出来 h 中的 一个，然后遍历 n ，如果 n存在，则 h中的指针往后移动一步，n继续跑
	index := 0
	for k, _ := range n {
		if h[index] == n[k] {
			index++
			if index == len(h) {
				return true
			}
		}
	}
	return false
}
