## [mysqld]
这个好像是因为 group by 多个字段报错。在配置中加上这一行，然后重启mysql
SET GLOBAL sql_mode=(SELECT REPLACE(@@sql_mode,'ONLY_FULL_GROUP_BY',''));