## linux虚拟机配置网络环境
```text
# 环境配置
    https://blog.csdn.net/Ailop/article/details/130987565
# 远程连接linux中的mysql服务器
https://blog.csdn.net/syealfalfa/article/details/127263275
```

## linux 下解压压缩包
解压文件到当前目录
递归压缩当前文件夹下的所有文件到tozip.zip
```shell
unzip -o zipname.zip
zip -r tozip.zip *
```
### linux下解压压缩包文件乱码

在windows压缩的文件，到linux上解压之后是乱码  
因为linux上默认是utf8编码。

```shell
unzip -O gbk zipname.zip
```

## ssh 远程登录
本地生成的公钥，要放在对方服务器上的 authorized_keys 里面
```shell
sudo apt install openssh-server && 
ssh username@ip -p port
```

## wsl
###  [连接数据库](https://learn.microsoft.com/zh-cn/windows/wsl/tutorials/wsl-database)

### 关于wsl连接宿主机mysql的问题
```
在.env中配置时，不能写localhost或者127.0.0.1 
因为127.0.0.1 或者localhost连接到的时wsl的本地，而非宿主机
在宿主机中打开 powershell,输入ipconfig 找到给 wsl 分配的 ipv4地址
然后配置env这个ip
```

## curl发起请求
发送POST且请求数据类型是JSON
```shell 
curl -X POST -H "Content-Type: application/json" -d '{"key1":"value1", "key2":"value2"}' http://example.com/api
```