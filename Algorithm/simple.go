package main

import (
	"fmt"
	"strconv"
)

func main() {
	arr := [7]int{1, 2, 3, 4, 5, 6, 7}
	s := arr[:]
	rotate(s, 3)
	fmt.Println(arr)
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

//func s() {
//	a := "nihao"
//	for k, v := range a {
//		fmt.Printf("%d %d \n", k, v)
//	}
//}

func canConstruct(ransomNote string, magazine string) bool {
	if len(ransomNote) > len(magazine) {
		return false
	}

	//我想把他们存放在slice里面。然后ransomNote拿一个删一个

	s := make([]int, 26, 26)
	for _, v := range magazine {
		v -= 97
		//存在即加一
		if inSlice(int(v), s) {
			s[v]++
			continue
		}
		//不存在则初始化
		s[v] = 1
	}

	for _, v := range ransomNote {
		v -= 97
		if inSlice(int(v), s) && s[v] >= 1 {
			s[v]--
			continue
		}
		return false
	}

	return true
}

func inSlice(key int, s []int) bool {
	for k, _ := range s {
		if key == k {
			return true
		}
	}
	return false
}

func tsetAppend() {
	nums := []int{0, 0, 2}
	slow := 1

	for fast := 1; fast < len(nums); fast++ {
		if nums[fast] != nums[fast-1] {
			nums[slow] = nums[fast]
			slow++
		}
	}

	fmt.Println(nums)
}

func rotate(nums []int, k int) {
	//key = 3 从第 4 步开始移动  len = 7 .
	// 直接append，合并的步数为， len - key % len
	lens := len(nums)
	step := lens - k%lens
	arr := append(nums[step:], nums[:step]...)
	for k, v := range arr {
		nums[k] = v
	}

}
