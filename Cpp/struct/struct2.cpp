//
// Created by Administrator on 2023/5/18.
//
/**
 * 这里展示了，继承基结构体，派生结构体的方法不会被覆盖。
 * 而是隐藏了基结构体的同名成员。并可以通过解析符调用。
 */
#include "utf8.h"
struct T{
    int name = 1;
    int sex  = 1;
};

struct C:public T{
    int name = 2;
};

int main()
{
    C c;
    cout << c.name << endl;
    cout << c.sex << endl;
    cout << c.T::name << endl;
}