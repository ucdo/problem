# nginx配置转发
```php
    listen 8946;
    server_name mapdaili.com 113.207.112.150;
        location / {       #代表访问8946会直接跳转到http://100.100.105.137:8995这去
        # 此处改为 socket.io 后端的 ip 和端口即可
        proxy_pass http://100.100.105.137:8995;
       proxy_set_header Host $host;
        proxy_set_header X-Real-IP $remote_addr;  # 使用客户端的真实 IP
        proxy_set_header X-Forwarded-For $proxy_add_x_forwarded_for;
        proxy_set_header X-Forwarded-Proto $scheme;
        
    }


 location /ws-proxy {#代表访问8946/ws-proxy   会直接跳转到https://log.ys7.com/这去
        resolver 114.114.114.144;  # 使用公共 DNS 解析域名      
        proxy_pass https://log.ys7.com/;  # 将请求转发到内网服务器
        proxy_http_version 1.1;
        proxy_set_header Upgrade $http_upgrade;
        proxy_set_header Connection "upgrade";
        proxy_set_header Host "log.ys7.com";
        proxy_set_header X-Real-IP $remote_addr;
        proxy_set_header X-Forwarded-For $proxy_add_x_forwarded_for;
        proxy_set_header X-Forwarded-Proto $scheme;
    }



```

# nginx 代理长连接
```php
   location / {  #代理socket连接      
        # 此处改为 socket.io 后端的 ip 和端口即可
        proxy_pass https://xy3jsdecoder.ys7.com:20006;
        proxy_set_header Host xy3jsdecoder.ys7.com:20006;
        proxy_set_header Upgrade $http_upgrade;
        proxy_set_header Connection "upgrade";
        proxy_http_version 1.1;
        proxy_set_header X-Forwarded-For $proxy_add_x_forwarded_for;
        proxy_set_header Host $host;
    }

    location / {# 此处改为 socket.io 后端的 ip 和端口即可
           proxy_pass http://23.99.198.243:8948;
           proxy_set_header Host $host;
           proxy_set_header Upgrade $http_upgrade;
           proxy_http_version 1.1;
           proxy_set_header X-Forwarded-For $proxy_add_x_forwarded_for;
       }



```
# nginx 代理设置访问的ip
```php
//设置后访问头就是 23
proxy_set_header X-Forwarded-For 23.99.221.243;
```
