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

## ssh 远程登录

```shell
sudo apt install openssh-server && 
ssh username@ip -p port
```

本地生成的公钥，要放在对方服务器上的 authorized_keys 里面

## 命令操作
```shell
unzip -o zipname.zip
zip -r tozip.zip *-
```
解压文件到当前目录
递归压缩当前文件夹下的所有文件到tozip.zip