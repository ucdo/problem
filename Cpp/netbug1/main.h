//
// Created by doff on 2023/5/21.
//

#ifndef PROBLEM_CURLDEMO_H
#define PROBLEM_CURLDEMO_H

#include <iostream>
#include "curl/curl.h"
#include <regex>
#include <fstream>
#include <random>
using namespace std;

#endif //PROBLEM_CURLDEMO_H

int Request();
CURLcode CURLRequest(const char* url,FILE* file);
size_t Write2File(char *data, size_t size, size_t nmemb, FILE *file);
size_t ParseHyperLink(const char*,std::vector<std::string>& );
void DownloadImg(const std::vector<std::string>&);
// filter hyperlink use 2nd vector
void Filter(std::vector<std::string>&,std::vector<std::string>);

int GetRandom();