## 数据库的备份

```sql
mysqldump -uroot -p password databaseName --verbose -t table_name... >/www/file_name.sql
```
--verbose 进度
-t 指定表，可指定多个

```sql
source file_name.sql
```