//
// Created by Administrator on 2023/6/5.
//

#include "string1.h"

int main() {
    std::string str = "https://pic1.zhimg.com/v2-8334b702e42ba8bff03e69ba323f96fb_l.jpg?source=5a24d060";
    auto pos = str.find_last_of('.');
    auto sub = str.substr(pos + 1);
    auto pos1 = sub.find_last_of('?');
    auto suffix = sub.substr(0,pos1);
    cout << suffix << endl;
}