//
// Created by Administrator on 2023/5/18.
//
#include "utf8.h"
struct N{
    std::string name;
    int sex;
    N( string& n,int s){
        name = n;
        sex = s;
        n = "zhangsan";
    };
};

int main()
{
    SetConsoleOutputCP(CP_UTF8);
    std::string name = "张山峰";
    N n(name,16);
    cout << n.name << endl << n.sex<< endl << name;
}