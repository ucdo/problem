//
// Created by Administrator on 2023/5/18.
//
/**
 * 这个，展示了的对象不能被直接调用。但是可以通过提供的函数调用。
 * 同时，基结构体中的方法，不能直接被派生结构体直接重写。除非，基结构体的方法被定义为 virtual
 * 派生结构体才重写。举个例子
 * 基结构体：virtual int setx(){}
 * 派生结构体重写：int sex() override{};
 *
 */
#include "utf8.h"
struct T{
    int y;
    void setX(int x1)
    {
        x = x1;
    }
    void getx()
    {
        cout << x << endl;
    }
private: int x;

};

struct C:public T{
    void getx(){
        cout << "in c" << endl;
    }
};
int main()
{
    T t;
    t.x = 1;
    t.getx();
    t.setX(1);
    t.getx();
}