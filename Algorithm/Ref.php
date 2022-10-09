<?php

/**
 * This is Ref's document
 */
class Ref
{
    public $username;
    private $password;

    public function __construct($username, $password)
    {
        $this->username = $username;
        $this->password = $password;
    }

    /**
     * 获取用户名
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * 设置用户名
     * @param string $username
     */
    public function setUsername($username)
    {
        $this->username = $username;
    }

    /**
     * 获取密码
     * @return string
     */
    private function getPassword()
    {
        return $this->password;
    }

    /**
     * 设置密码
     * @param string $password
     */
    private function setPassword($password)
    {
        $this->password = $password;
    }
}

function dd($val): void
{
    var_dump($val);
    exit();
}

$user = new ReflectionClass('Ref');//获取类
$pro = $user->getProperties();//获取类属性
$methods = $user->getMethods();//获取方法
$method = $user->getMethod('__construct');//获取方法
$params = $method->getParameters();//获取方法的参数
$doc = $user->getDocComment();//获取类的注释
$docPsw = $user->getMethod('getPassword')->getDocComment();//获取某一个方法的注释
$instance = $user->newInstance('小明','123456');//实例化
$arg = $user->newInstanceArgs(['xiaoming','123']);//实例化参数
$getName = $instance->getUsername();//调用类
$setName = $instance->setUsername('xiaoming');//调用类
//$user->getMethod('setUsername')->invoke($instance, 'xiaohong');
$name = $instance->getUsername();
$name = $user->getProperty('username') ->setValue($user,'xiaohong');
$name = $user->getProperty('username')->getValue($instance);
$name = $user->getMethod('getUsername')->invoke($instance);
$psw = $user->getMethod('setPassword')->invoke($instance,'999');
//dd(get_class($user));
//dd($pro);
//dd($methods);
//dd($method);
//dd($params);
//dd($doc);
//dd($docPsw);
//dd($instance);
//dd($arg);
//dd($getName);
//dd($name);
dd($psw);