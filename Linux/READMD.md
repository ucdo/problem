#

## wsl
### Ubuntu-18.04
```shell
sudo apt-get install php-pear //会自动安装php7.2
whereis pecl
cd dirs
sudo ./pecl install redis
php --ini
sudo vim dir/ini
a
extension=redis.so
ESC
:wq
php -m
```
```shell
kms
```

### 关于wsl连接宿主机mysql的问题
```
在.env中配置时，不能写localhost或者127.0.0.1 
因为127.0.0.1 或者localhost连接到的时wsl的本地，而非宿主机
在宿主机中打开 powershell,输入ipconfig 找到给 wsl 分配的 ipv4地址
然后配置env这个ip
```