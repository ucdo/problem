//
// Created by doff on 2023/5/21.
//

#include "main.h"

size_t callbackFunction(char* data, size_t size, size_t nmemb, std::string* result)
{
    size_t totalSize = size * nmemb;
    result->append(data, totalSize);
    return totalSize;
}

size_t Write2File(char* data, size_t size, size_t nmemb, FILE* file)
{
    return fwrite(data, size, nmemb, file);
}


size_t ParseHyperLink(FILE* file){
    char* line;
    int i = 1;
    int max = 1e5;
    while(fgets(line,max,file)){
        cout<< "第" << i << "行：" << line << endl;
        i++;
    }
    return 0;
}

using namespace std;
int main() {
    SetConsoleOutputCP(CP_UTF8);
    Request();
}

int Request()
{
    CURL* curl;
    CURLcode res;
    char* url = (char*) malloc(256);

    cout << "input url:";

    cin >> url;
    //    cout << endl<< "url" <<url << endl;
    //    return 0;

    curl_global_init(CURL_GLOBAL_DEFAULT);
    curl = curl_easy_init();

    if (curl) {
        FILE* file = fopen("1.html", "wb");  // 打开文件用于写入
//        char* receivedData = (char*) malloc(1024);
        std::string receivedData;
        curl_easy_setopt(curl, CURLOPT_SSL_VERIFYPEER, 0L);
        curl_easy_setopt(curl, CURLOPT_SSL_VERIFYHOST, 0L);
        curl_easy_setopt(curl, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36");
        curl_easy_setopt(curl, CURLOPT_URL, url);
//        curl_easy_setopt(curl, CURLOPT_WRITEFUNCTION, callbackFunction);
//        curl_easy_setopt(curl, CURLOPT_WRITEDATA, &receivedData);  // 将文件指针传递给回调函数
        curl_easy_setopt(curl, CURLOPT_WRITEFUNCTION, Write2File);
        curl_easy_setopt(curl, CURLOPT_WRITEDATA, file);

        free(url);

        res = curl_easy_perform(curl);

        fclose(file);  // 关闭文件

        if (res != CURLE_OK) {
            std::cerr << "curl_easy_perform() failed: " << curl_easy_strerror(res) << std::endl;
        }else{
            ParseHyperLink(file);
        }

        curl_easy_cleanup(curl);
    }

    curl_global_cleanup();

    return 1;
}

