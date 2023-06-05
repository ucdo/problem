//
// Created by Administrator on 2023/6/3.
//
#include <fstream>
#include "regex1.h"

int main() {
    std::vector<std::string> vector;
    std::string line = "src=\"http:src.test\"href=\"http:href.test\"";

    std::regex pattern("(href|src)=\"([^\"]*)\"");

        std::smatch match;
        std::string::const_iterator iterator(line.cbegin());
        while (std::regex_search(iterator, line.cend(), match, pattern)) {
            for (auto n : match) {
                cout << n << endl;
            }
            vector.push_back(match[2].str());

            iterator = match.suffix().first;
            cout << "=============================" << endl;
        }
    return 0;
}