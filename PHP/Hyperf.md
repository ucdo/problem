# 关于在使用Hyperf开发遇到的一些问题

## 关于路由

### 路由找不到

``` 
php bin/hyperf.php start之后
php bin/hyperf.php describe:route

查看 composer.json里面的 psr4(自动加载)，看是否把没有找到的了路由放在了里面，并注意检查命名空间
打开新增/修改路由的文件，查看class上面是否添加了#[Controller]注解。
```
测试工具 php stan