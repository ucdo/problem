原因：PHPEnv升级到高版本时，无法打开。重新下载低版本之后，覆盖安装，然后MySQL打开之后，数据全都无了。幸运的是，MySQL所在的文件，data里面的数据库以及表结构还在。
现象: 
 1. MyISAM 引擎的表结构能够直接被读取出来，但是Inno的引擎的表结构不会被直接读取出来

解决：
 1. show binary logs 查看有没有二进制日志，有则可以通过日志恢复。`You are not using binary logging` ,尝试睡觉。
 2. 官方文档说在my.ini [mysqld] 下面加一句 innodb_force_recovery = 1 来尝试。但是似乎并没有什么用。开始困了。
