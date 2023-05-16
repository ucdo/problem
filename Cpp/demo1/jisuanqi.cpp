#pragma _character_set('utf-8')
#include <iostream>
#include <windows.h>

int cal();

using namespace std;

int main()
{
    SetConsoleOutputCP(CP_UTF8);
    cal();
    return 0;
}

int cal() {
    char cr;
    double fir,sec,res;

    cout << "请输入四则运算符 ( + ,-,*,/)" << endl;
    cin >> cr;

    cout << "请输入第一个数字，以获取计算结果" << endl;
    if(! (cin >> fir)){
        cout << "输入的数字无效" << endl;
        return -1;
    }

    cout << "请输入第二个数字，以获取计算结果" << endl;
    if(! (cin >> sec)){
        cout << "输入的数字无效" << endl;
        return -1;
    }

    switch(cr){
        case '+':
            res = fir + sec;
            break;
        case '-':
            res = fir - sec;
            break;
        case '*':
            res = fir * sec;
            break;
        case '/':
            if(sec < 0 ){
                cout << "除数必须大于0" << endl;
            }
            return -1;
        default: cout << "无效的运算符" << endl;
    }

    cout << "运算结果为" << res << endl;
    return 0;
}
