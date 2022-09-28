package main

import (
	"fmt"
)

func main() {
	arr := []int{12, 2, 3, 124, 99, 0, 234, 34, 11, 345, 51}
	//fmt.Print(bubbleSort(arr))
	//fmt.Print(selectionSort(arr))
	fmt.Print(quilckSort(arr, 0, len(arr)-1))
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

func quilckSort(arr []int, left int, right int) []int {
	if left < right {
		index := left + 1
		for i := index; i <= right; i++ {
			if arr[left] > arr[i] {
				arr[i], arr[index] = arr[index], arr[i]
				index++
			}
		}
		arr[left], arr[index-1] = arr[index-1], arr[left]
		pivote := index - 1
		quilckSort(arr, left, pivote-1)
		quilckSort(arr, pivote+1, right)
	}
	return arr
}
