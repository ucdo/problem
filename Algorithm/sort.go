package main

import (
	"fmt"
)

func main() {
	arr := []int{12, 2, 3, 124, 99, 0, 234, 34, 11, 345, 51}
	//fmt.Print(bubbleSort(arr))
	//fmt.Print(selectionSort(arr))
	fmt.Print(quickSort(arr, 0, len(arr)-1))
}

func bubbleSort(arr []int) []int {
	lengths := len(arr)
	for i := 0; i < lengths; i++ {
		for j := 0; j < lengths-1-i; j++ {
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

func quickSort(arr []int, left int, right int) []int {
	if left < right {
		index := left + 1
		for i := index; i <= right; i++ {
			if arr[left] > arr[i] {
				arr[i], arr[index] = arr[index], arr[i]
				index++
			}
		}
		arr[left], arr[index-1] = arr[index-1], arr[left]
		pivot := index - 1
		quickSort(arr, left, pivot-1)
		quickSort(arr, pivot+1, right)
	}
	return arr
}
