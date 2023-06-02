cmake_minimum_required(VERSION 3.0)
project(netbug1)

set(CMAKE_CXX_STANDARD 11)

# 添加 curl 头文件路径
include_directories(${CMAKE_CURRENT_SOURCE_DIR}/curl)

# 添加 curl 库文件
link_directories(${CMAKE_CURRENT_SOURCE_DIR})

add_executable(main main.cpp)

# 链接 curl 库
target_link_libraries(main ${CMAKE_CURRENT_SOURCE_DIR}/libcurl-x64.dll)