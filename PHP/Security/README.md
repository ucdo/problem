## openssl 对称加密 js和php代码
### [php代码](Soteria.php)

### [js代码](Soteria.php)


### 使用方法

``` 
1. npm install crypto-js 
2. 前端 ---调用---> 后端 (new M)->securityCode(); 提供的接口;生成图片并返回
3. 前端加密账号密码，连带和初始向量iv，图形验证码传到后端
4. 后端调用verify
```

### 坑

``` 
1. 注意的是js代码里面的key要16位，因为php这边是 AES-128-CBC 加密
2. js生成的key要和php生成的key一致
```