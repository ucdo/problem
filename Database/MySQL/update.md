# mysql 修改列
```php
SUBSTRING 字符串截取
UPDATE aiteshop_rechargecard SET passwd= SUBSTRING(sn, LENGTH(sn) - 5) where batchflag = "X240103"
```