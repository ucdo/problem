### 创建一个自启服务
创建脚本
```shell
vim /home/mystartup.sh
```
脚本内容
```text
# 重启nginx
systemctl restart nginx

# 重启redis
redis-server
# 重启mysql
systemctl restart mysql
```

更改文件运行权限
```shell
chmod +x /home/mystartup.sh
```

创建服务
```shell
vim /etc/systemd/system/mystartup.service
```
```服务内容
[Unit]
Description=My Custom Service

[Service]
Type=simple
ExecStart=/home/mystartup.sh

[Install]
WantedBy=default.target
```

执行和启用
```shell
sudo systemctl enable mystartup.service
sudo systemctl start mystartup.service
```

查看执行状态
```shell
sudo systemctl status mystartup.service
```

重启以测试脚本
```shell
reboot
```

检查服务运行状态以查看脚本是否启动成功
```shell
systemctl status nginx
systemctl status mysql
systemctl status redis
```

### 守护进程
```shell
nohup php srcipt.php &
```

### 常用命令
查看占用
```shell
top
```
筛查: exp :查找php进程
```shell
ps aux | grep php
```