## 恢复

### 写在前面：mysqldump导出的数据，在navicat里面执行，是执行成功的。

### 写在前面：windows：需要找到对应的 mysql/bin 目录下。 cmd 执行连接数据库

### 写在前面： Linux一般来说是可以直接用 mysql 来连接的。应该是加入了全局变量的。
```shell
# TODO 挖个坑后面来填
```

### 连接成功之后，选择的数据库

### 如果不确定有哪些数据库
```shell
show databases;
```

### use 对应的数据库

### 执行资源文件
```shell
source /path/to/source.sql
```

### 提示
```shell
如果是对线上的数据库进行表结构的操作，一定要仔细读一读 source.sql 文件，做到心里有数
还是那句话。任何线上数据库操作之前，记得先备份。
```