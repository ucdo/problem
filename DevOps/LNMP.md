# LNMP

## 编译安装php
### 前置条件 CMAKE 。。。
### 编译openssl > 作为 编译curl的前置条件
版本号 ： 1.0.2k
```shell
tar -xvf openssl-1.0.2k && cd openssl-1.0.2k && ./config && make depend && make install
```
find 命令
```shell
# 找到所有的openssl
find / -name openssl
```
把openssl加入环境变量
```shell
vim ~/.bashrc
```
这里特指openssl
```shell
export=/path/to/openssl/apps/:$PATH
```
保存
```shell
source ~/.bashrc
```

查找包含
```shell
find / -name ""
```
配置启动脚本  
后面的 > /dev/null 2>&1 & 意思是不输出
````shell
/www/server/nginx/sbin/nginx > /dev/null 2>&1 &
systemctl start mysqld
redis-server > /dev/null 2>&1 &
````