package main

import (
	"strconv"
)

func main() {
	num := []int{1, 2, 3}
	runningSum(num)
}

func runningSum(nums []int) []int {
	num := nums
	size := len(num)
	for i := 1; i < size; i++ {
		num[i] += num[i-1]
	}
	return num
}

func c(c int) int {
	times := 0
	for c > 0 {
		if c%2 != 0 {
			c /= 2
		} else {
			c--
		}
		times++
	}
	return times
}

func e(e [][]int) int {
	maxu := 0
	for _, v := range e {
		sum := 0
		for _, v1 := range v {
			sum += v1
		}
		maxu = max(maxu, sum)
	}

	return maxu
}

func max(e int, f int) int {
	if e >= f {
		return e
	}
	return f
}

func f(n int) []string {
	full := "FizzBuzz"
	left := "Fizz"
	right := "Buzz"
	var arr []string

	for i := 1; i <= n; i++ {
		if i%3 != 0 || i%5 != 0 {
			arr = append(arr, strconv.Itoa(i))
			continue
		}

		if i%3 == 0 && i%5 == 0 {
			arr = append(arr, full)
		}

		if i%3 == 0 {
			arr = append(arr, left)
		}

		if i%5 == 0 {
			arr = append(arr, right)
		}

	}

	return arr
}

type ListNode1 struct {
	Val  int
	Next *ListNode1
}

func middleNode(head *ListNode1) *ListNode1 {
	//试试快慢指针
	slow, fast := head, head

	for fast != nil && fast.Next != nil {
		fast = fast.Next.Next
		slow = slow.Next
	}
	return slow
}

func tomMiddleNode(head *ListNode1) *ListNode1 {
	arr := make([]*ListNode1, 0)
	lens := 0
	for head.Next != nil {
		lens++
		arr = append(arr, head)
		head = head.Next
	}
	if lens%2 == 0 {
		return arr[lens/2+1]
	}
	return arr[lens/2]
}
