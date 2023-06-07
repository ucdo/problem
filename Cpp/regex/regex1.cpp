//
// Created by Administrator on 2023/6/3.
//
#include <fstream>
#include "regex1.h"
#include <cerrno>
using namespace std;
void regex_1();
void regex_2();
int main() {
    regex_2();
    return 0;
}

void regex_1() {
    std::vector<std::string> vector;
    std::string line = "src=\"http:src.test\"href=\"http:href.test\"";

    std::regex pattern("(href|src)=\"([^\"]*)\"");

    std::smatch match;
    std::string::const_iterator iterator(line.cbegin());
    while (std::regex_search(iterator, line.cend(), match, pattern)) {
        for (auto n: match) {
            cout << n << endl;
        }
        vector.push_back(match[2].str());

        iterator = match.suffix().first;
        cout << "=============================" << endl;
    }
}

void regex_2() {
    // 创建一个regex匹配器
    std::regex pattern("<(li|p|span|div)([^>]*)\">([^<]*)");
    std::smatch match;
    std::string line;
    // 创建一个string迭代器
    cout << "begin" << endl;
    std::string match_str = "<span class=\"n\">DWORD</span>";
//    while (std::getline(file, line)){
        std::string::const_iterator iterator(match_str.cbegin());
        while (std::regex_search(iterator, match_str.cend(), match, pattern)) {
            for (auto n : match) {
                cout << n << endl;

            }
//            cout << match[2] << endl;
            iterator = match.suffix().first;
        }
//    }
}