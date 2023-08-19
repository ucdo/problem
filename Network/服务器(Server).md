# Nginx

## 伪静态之url重写
``` 
try_files $uri $uri/ /index.html;
```

## 配置请求转发
目的：因为是以服务监听端口的方式启动，但是想通过hosts里配置的域名访问。
1. 先配置hosts
2. 找到这个站点的Nginx的配置
3. 配置如下(只包含部分内容)
``` 
upstream serverName{
    # ip:port
    server 127.0.0.1:9501
    # 这里可以配置很多个
}

server{
    listen 80
    # 在hosts里面配置的网站名
    server_name hosts`url 
    # 转发所有的请求
    location / {
        proxy_set_header Host $http_host;
        proxy_set_header X-Real-IP $remote_addr;
        proxy_set_header X-Forwarded-For $proxy_add_x_forwarded_for;
        #转发cookie
        proxy_cookie_path / "/; secure; HttpOnly; SameSite=strict";
        #执行访问真正的服务器
        proxy_pass http://serverName
    }
}
```