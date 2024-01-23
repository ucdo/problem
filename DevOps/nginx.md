### 配置转发
nginx.conf文件夹下：
```nginx
server{
    listen 80;
    server_name www.baidu.com;
    location / {
            proxy_redirect off;
            proxy_set_header Host $host;
            proxy_set_header X-Real-IP $remote_addr;
            proxy_set_header X-Forwarded-For $proxy_add_x_forwarded_for;
            proxy_pass http://localhost:81;
    }
}
```
注释：

```text
server{
    listen 80; # 监听的端口
    server_name www.baidu.com; # 域名，这个可有可无
    location / {               # 转发哪些请求
            proxy_redirect off;
            proxy_set_header Host $host; # 请求地址
            proxy_set_header X-Real-IP $remote_addr; # 来源的ip
            proxy_set_header X-Forwarded-For $proxy_add_x_forwarded_for; # 端口
            proxy_pass http://localhost:81;  # 转发到哪里
    }
}
```