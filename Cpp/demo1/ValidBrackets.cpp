//
// Created by Administrator on 2023/5/16.
// 计算有效括号的个数
//
#pragma _character_set("utf-8")
#include <windows.h>
#include <iostream>
using namespace std;

int valid();

int main()
{
    SetConsoleOutputCP(CP_UTF8);
    int res;
    res = valid();
    return 0;
}

int valid()
{
    cout << sizeof(char[6]) << endl;
    return 1;
}
