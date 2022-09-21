# 环境
## redis：
### 持久化 
持久化方式：
AOF持久化以及RDB持久化。
    ```
        AOF：
            持久化设置的每秒
        RDB
            开启满足条件持久化，exp：多少秒内插入多少条数据即持久化
    ```
## 云平台
    ```
        功能插件化
    ```
## 重构
Linux下搭建Hyperf环境，手动编译安装PHP，PHP安装Redis，Swoole等扩展。
## 不同之处
    ```
    1、ThinkPHP是传统FPM模式，Hyperf是cli常驻内存模式。
    2、Hyperf需要手动启动。 php bin/hyperf.php start
    3、路由可以还可以通过注解的方式注入
    ```
## 数据库
在编写项目中自己也写了个创建Model层的方法。