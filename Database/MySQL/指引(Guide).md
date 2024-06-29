### 数据库
1. 数据存储引擎：InnoDB、myISAM、Memory
2. 数据库索引类型及原理：B+树索引、哈希表索引
3. 锁：悲观锁、乐观锁
4. 事务：事务的四大特性（ACID）、事务并发的三大问题、事务隔离级别及实现原理
5. 多版本并发控制实现机制（MCVV）原理


### 安装的相关信息
#### ERROR 1698 (28000): Access denied for user ‘root‘@‘localhost‘解决方法
1. 问题原理:一般出现这种情况多数是安装新版本mysql，root密码是随机的，也不是空密码，所以要通过查看随机密码进入，再进行修改原来的密码。
2. sudo cat /etc/mysql/debian.cnf   使用该用户名和密码进入MySQL：
   ![img.png](../../../Source/Img/Database/img_4.png)
3. 查看user表 use mysql; select user,plugin from user;
4. 修改root密码格式执行完这一步，不要忘记刷新权限（可以理解为高并发，可能还没处理完数据让他缓存，就执行下一步操作可能会出错）
   update user set plugin='mysql_native_password' where user='root'; # 修改其密码格式
   select user,plugin from user; # 查询其用户
5. 增加root密码 alter user 'root'@'localhost' identified by 'root';  再次刷新权限flush privileges;
6. exit;
7. service mysql restart

#### linux系统的网关配置  博客 https://blog.csdn.net/Ailop/article/details/130987565

### 部分其他
#### 查看这个表数据占用

select sum(DATA_LENGTH)
from information_schema.TABLES
where table_schema = 'db'
and table_name = '
#### MYSQL在不删除原数据的情况下重置自增值  会修改原来的id  如 1234589  改为  1234567
SET @num = 0;  
UPDATE t_news SET id = @num := @num +1;  
SELECT max(id)+1 from t_news;  
ALTER TABLE t_news AUTO_INCREMENT = 这里填入上一条的执行结果;

#### [mysqld]
这个好像是因为 group by 多个字段报错。在配置中加上这一行，然后重启mysql
SET GLOBAL sql_mode=(SELECT REPLACE(@@sql_mode,'ONLY_FULL_GROUP_BY',''));


#### [mysqld]
```mysql.ini
sql_mode=STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION
```

#### 锁
死锁：
show processList    
会显示id，以及执行哪一条sql语句导致的阻塞
然后kill pid就好了

