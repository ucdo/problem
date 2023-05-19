//
// Created by Administrator on 2023/5/18.
//
#include <iostream>
#include "utf8.h"

struct Name{
    std::string name;
    float height = 11.f;
    void display() const{
        cout << name << endl;
    }
private:
    int sex = 1;
    std::string phone = "12345678900";
};

struct Game{
    std::string name;
};

struct cc: public Name,public Game{
    std::string name;
};

int main()
{
    cc c;
    c.Name::name = "cpp.xx 11;";
    c.Name::display();
//    cout << "name:" << c.name << c.name<< endl;
}