//
// Created by doff on 2023/5/21.
//

#ifndef PROBLEM_CURLDEMO_H
#define PROBLEM_CURLDEMO_H

#include <iostream>
#include "../curl/curl.h"
#include <regex>
#include <fstream>
#include <random>

using namespace std;

#endif //PROBLEM_CURLDEMO_H

int Request();
// hava an curl request
CURLcode CURLRequest(const char *url, FILE *file);
//write curl content to file
size_t Write2File(char *data, size_t size, size_t nmemb, FILE *file);
// parseHyperLink
size_t ParseHyperLink(const char *, std::vector<std::string> &);
//download img
void DownloadImg(const std::vector<std::string> &);

// filter hyperlink use 2nd vector
void Filter(std::vector<std::string> &, std::vector<std::string>);
// extract content
void ExtractContent(const char *, std::string &);
// get random int
int GetRandom();