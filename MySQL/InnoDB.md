## 关于innodb引擎

### 文件存储方式

### 数据恢复
> innodb_force_recovery
> .ibdata1 恢复
> 

### 步骤

innodb_file_per_table=1 设置 innodb为独立表空间模式。默认是 全部存在 .ibdata1文件下。

搞他妈半天，还是要复制 .ibdata1 文件才能恢复数据
不管是不是开启 innodb_file_per_table;alter table set engine=Innodb