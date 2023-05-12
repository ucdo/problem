# 关于权限的修改
``` txt
所属数据库：mysql
所属数据库表：user
操作指令：
grant 权限名(所有的权限用all) on 库名(*全部).表名(*全部) to  '要授权的用户名'@'%'(表示所有的IP，可以只些一个IP) identified by "密码"
例如修改本地的local数据库让特定的ip拥有所有权限
grant all privileges on local.* to 'root'@'具体的ip地址' identified by '具体的密码'
执行成功之后，刷新权限
update privileges
```
数据库：

```msyql
创建 CREATE USER 'username'@'hostname' IDENTIFIED BY 'password';
GRANT ALL PRIVILEGES ON *.* TO 'root'@'%' IDENTIFIED BY 'qy@mysql1123' WITH GRANT OPTION;
FLUSH PRIVILEGES;
```


grant all privileges on *.* to 'roo'@'172.30.249.113' 


GRANT ALL PRIVILEGES ON *.* TO 'root'@'%' IDENTIFIED BY 'qy@mysql1123' WITH GRANT OPTION;
FLUSH PRIVILEGES;