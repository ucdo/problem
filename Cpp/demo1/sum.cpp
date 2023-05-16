//
// Created by doff on 2023/5/16.
//

#include "utf8.h"
#include <iostream>
#include <windows.h>
double sum2();
int t();
int space1();
void exchange(int*,int*);
void reverseString(std::string* s);
void swapChar(char* i, char* j);
using namespace std;
int main()
{
    SetConsoleOutputCP(CP_UTF8);
//    sum2();
//    t();
//    space1();
//    int i,j;
//    i = 0;
//    j = 1;
//    exchange(&i,&j);
//    cout << i << endl << j << endl;

    std::string t;
    cin >> t;
    cout << t << endl;
    reverseString(&t);
    cout << t << endl;
    return 0;
}

double sum2(){
    double i,j,res;
    cout << "请输入两个数字" << endl;
    if(! (cin >> i)){
        cout << "非数字" << endl;
        return -1;
    }

    if(! (cin >> j)){
        cout << "非数字" << endl;
        return -1;
    }

    res = i + j;

    cout<< i << "+" << j << "=" << res << endl;
}

int t()
{
    int i,res;
    cout << "请输入一个整数" << endl;
    if(! (cin >> i)){
        cout << "非整数" << endl;
        return -1;
    }

    if(i % 2 == 0){
        cout << "偶数" << endl;
    }else{
        cout << "非偶数" << endl;
    }

    return 0;
}

int space1()
{
    int count = 0;
    std::string t;
    cout << "输入一个字符串" << endl;
    cin >> t;
    cout << t << endl;
    for (char i:t) {
        if(isspace(i)){
            cout << i << endl;
            continue;
        }
        count++;

    }
    cout << count << endl;

    return 0;
}

void swapIntegers(int* i, int* j)
{
    int temp = 0;
    temp = *i;
    *i = *j;
    *j = temp;
}

void reverseString(std::string* s){
    int len = (*s).size();
    int right = len - 1;
    char temp;

    for (int left = 0; left < right; ++left,--right) {
        temp = (*s)[left];
        (*s)[left] = (*s)[right];
        (*s)[right] = temp;
    }
}

void swapChar(char* i, char* j){
    char temp;
    temp = *i;
    *i = *j;
    *j = temp;
}