#

## 头文件
引入iostream的头文件
使用std明明空间，不然要写成 std::out << "--" << std::endl;
```c++
#include <iostream>
using namespace std;
int main()
{
    cout << "ucdo first cpp code!" << endl;
    return 0;
}
```

## enum
可以在哪里定义？
头文件定义也可以，然后引入头文件
关于enum的使用
```c++
enum Name{
    BIG_SHOW1,
    AODUN,
    TESTT,
    TT
};
int main()
{
    Name t = TT;
    cout << t << endl; //输出3.因为enum默认是自动递增。从0 开始。如果 BIG_SHOW=1,则输出4
    return 0;
}
```

## 指针
指针指针，我看他就是保存地址的东西
type* ptr = nullptr;
意思是使用 type* 来定义一个指针。
int value = 1;
ptr = &value;
&取地址，然后，把地址保存在ptr里面了。
*ptr,你知道什么意思吗？其实是解析地址，然后取值的

下面是个例子
```c++
#include <iostream>
using namespace std;
int main()
{
    int* ptr = nullptr;
    int value = 1;
    ptr = &value;
    cout << "value is >>> " << ptr << endl;
    return 0;
}
```

再来一个指向数组的指针。
```c++
#include <iostream>
using namespace std;
int main()
{
    int arr[5] = {1,2,3,4,5,6};
    int* ptr = nullptr;
    ptr = arr;
    cout << *(ptr + 2) << endl; // 这里输出3
}
```

# pro
## 简单计算器
```c++
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

```

# 包罗万象的
## 关于中文乱码的问题
在头部设置字符集为utf-8
```c++
#pragma _character_set('utf-8')
```
如果在控制台乱码

```c++
#include <windows.h>
using namespace std;
int main()
{
    SetConsoleOutputCP(CP_UTF8)
}
```