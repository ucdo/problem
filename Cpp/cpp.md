#

## const
```text
const 对象默认是文件局部变量，要在其它地方也能访问的话，就要设置成 extern
```

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
    cout << "value is >>> " << *ptr << endl;
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

## 结构体
struct StrutName{
};

```text
可以在结构体中定义成员，并可以对成员手动初始化。也可以在成员中定义方法。
值得注意的是，继承的结构体，被称为派生结构体，被继承的结构体，称之为基结构体。依然是多继承。
结构体继承，派生结构体和基结构体如果存在同名成员，则隐藏(hidden)基结构体的成员。可以通过解析符调用基类的成员
如果是基结构体的方法，只有被申明为 virtual 类型，才能被派生结构体复写
同样的，成员和方法也可以被定义为 private protected，不写默认是pubic
```
说了这么多，下面看看代码
### 

# 调试
```c++
#include <cerrno>
#include <ifstream>

void open_file(const char*);
int main()
{
    char* file_name = "1.html";
    open_file(file_name);
}

void open_file(const char* file_name)
{
    std::ifstream file(file_name);
    if(! file.is_open()){
        cout << std::strerror(errno) << endl;
    }
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