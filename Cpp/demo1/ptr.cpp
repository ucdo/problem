//
// Created by Administrator on 2023/5/16.
//

#pragma _character_set("utf-8")
#include <iostream>
#include <windows.h>

void ptr1();
int ptr2();
using namespace std;
int main()
{
    cout << "ptr1" << endl;
    ptr1();
    cout << "ptr1" << endl;
    ptr2();
    return 0;
}

void ptr1()
{
    int* ptr = nullptr;
    int value = 1;
    ptr = &value; // 取value的地址，保存在ptr里
    cout << "parse ptr >>>>  " << *ptr << endl;
}

int ptr2()
{
    int arr[5] = {1,2,3,4,5};
    int* ptr = nullptr;
    ptr = arr;

    cout << *(ptr + 2) << endl;

    return 0;
}
