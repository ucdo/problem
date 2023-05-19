//
// Created by Administrator on 2023/5/18.
//
/**
 * 对基结构体成员的值修改
 * 简单的：解析符赋值 t.B3::sex = 999;
 * 进阶的：指针操作
 *  T t;
 *  B* ptr = &t;
 *  ptr = static_cast<T*>(ptr)
 */
#include "utf8.h"

struct B3{
    int name = 1;
    int sex  = 1;
    void getSex()
    {
        cout << sex << endl;
    }
};

struct T3:public B3{

};

int main()
{
    T3 t;
    t.B3::getSex();
    B3* basePtr = &t;
    basePtr = static_cast<T3*>(basePtr);
    basePtr->sex = 77;
    t.B3::getSex();
    t.B3::sex = 9;
    t.B3::getSex();
}