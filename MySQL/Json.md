# 关于json字段的查询

> JSON_EXTRACT

1. TABLE: test
2. COLUMNS: data
3. DATA: [{"id": 99}, {"id": 107}, { "id": 127}, {"id": 193}, {"id": 126}]

```sql
select JSON_EXTRACT(data,'$[*].id') from test
```