package main

import "fmt"

func main() {
	//fmt.Print(bubbleSort([]int{12, 2, 3, 124, 99, 0, 234, 34, 11, 345, 51}))
	fmt.Print(selectionSort([]int{12, 2, 3, 124, 99, 0, 234, 34, 11, 345, 51}))
}

func bubbleSort(arr []int) []int {
	lenght := len(arr)
	for i := 0; i < lenght; i++ {
		for j := 0; j < lenght-1-i; j++ {
			if arr[j] > arr[j+1] {
				arr[j], arr[j+1] = arr[j+1], arr[j]
			}
		}
	}
	return arr
}

func selectionSort(arr []int) []int {
	for i := 0; i < len(arr); i++ {
		m := i
		for j := i + 1; j < len(arr); j++ {
			if arr[m] > arr[j] {
				m = j
			}
		}
		arr[i], arr[m] = arr[m], arr[i]
	}
	return arr
}
