# 关于json字段的查询

> JSON_EXTRACT

1. TABLE: test
2. COLUMNS: data
3. DATA: [{"id": 99}, {"id": 107}, { "id": 127}, {"id": 193}, {"id": 126}]

```sql
select JSON_EXTRACT(data,'$[*].id') from test;
```
> group by

1. TABLE: test
2. COLUMNS: gauge_id,user_id
3. DATA: [{"id": 99}, {"id": 107}, { "id": 127}, {"id": 193}, {"id": 126}]

```sql
select * from test group by gauge_id,user_id;
``` 


> JSON_EXTRACT
1. 解析一层
```sql
 JSON_EXTRACT(COL,'$.answer')
```
2. 解析两层
```sql
JSON_EXTRACT(COL,'$."answer".conclusion')
```

> 计算年龄
TIMESTAMPDIFF(YEAR,@birthday,CURTIME()) AS `age`
> IF
```sql
exp: IF(CONDITION,TRUE,NULL)
```