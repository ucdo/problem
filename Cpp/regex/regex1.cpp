//
// Created by Administrator on 2023/6/3.
//
#include "regex1.h"

int main() {
    std::regex pattern("href=\"([^\"]*)\"");
    std::string str = "<meta data-rh=\"true\" property=\"og:site_name\" content=\"知乎专栏\"/><link data-rh=\"true\" rel=\"apple-touch-icon\" href=\"https://static.zhihu.com/heifetz/assets/apple-touch-icon-152.81060cab.png\"/><link data-rh=\"true\" rel=\"apple-touch-icon\" href=\"https://static.zhihu.com/heifetz/assets/apple-touch-icon-152.81060cab.png\" sizes=\"152x152\"/><link data-rh=\"true\" rel=\"apple-touch-icon\" href=\"https://static.zhihu.com/heifetz/assets/apple-touch-icon-120.d5793cac.png\" sizes=\"120x120\"/><link data-rh=\"true\" rel=\"apple-touch-icon\" href=\"https://static.zhihu.com/heifetz/assets/apple-touch-icon-76.7abf3393.png\" sizes=\"76x76\"/><link data-rh=\"true\" rel=\"apple-touch-icon\" href=\"https://static.zhihu.com/heifetz/assets/apple-touch-icon-60.362a8eac.png\" sizes=\"60x60\"/><link crossorigin=\"\" rel=\"shortcut icon\" type=\"image/x-icon\" href=\"https://static.zhihu.com/heifetz/favicon.ico\"/><link crossorigin=\"\" rel=\"search\" type=\"application/opensearchdescription+xml\" href=\"https://static.zhihu.com/heifetz/search.xml\" title=\"知乎\"/><link rel=\"dns-prefetch\" href=\"//static.zhimg.com\"/><link rel=\"dns-prefetch\" href=\"//pica.zhimg.com\"/><link rel=\"dns-prefetch\" href=\"//picx.zhimg.com\"/><link rel=\"dns-prefetch\" href=\"//pic1.zhimg.com\"/><link rel=\"dns-prefetch\" href=\"//pic2.zhimg.com\"/><link rel=\"dns-prefetch\" href=\"//pic3.zhimg.com\"/><link rel=\"dns-prefetch\" href=\"//pic4.zhimg.com\"/><link rel=\"dns-prefetch\" href=\"//static.zhihu.com\"/>";
    std::smatch matchs;
    std::vector<std::string> res = {};
    // TODO 递归匹配
    std::string::const_iterator iterator(str.cbegin());

    while (std::regex_search(iterator,str.cend(), matchs, pattern)) {
        res.push_back(matchs[1]);
        cout << matchs[1] << endl;
        iterator = matchs.suffix().first;
    }

    return 0;
}