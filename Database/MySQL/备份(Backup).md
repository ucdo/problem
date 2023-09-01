## 备份

### mysqldump
使用的时候，不要连进去mysql，连了用不了。  mysqldump和mysql是同一级的  是个工具，不是函数。

### 如果能直接只用 navicat 这种图形化界面的数据库工具，那最好

### 备份数据库
```shell
mysqldump -u user -p db_name > /path/to/source.sql
```

### 备份数据库(只备份结构)
```shell
mysqldump -u user -p --no-data db_name > /path/to/source.sql
```

### 备份部分表
```shell
mysqldump -u user -p db_name table_name1,talbe_name2,... > /path/to/source.sql
```

### 备份部分表(只备份结构)
```shell
mysqldump -u user -p --no-data db_name table_name1,talbe_name2,... > /path/to/source.sql
```

