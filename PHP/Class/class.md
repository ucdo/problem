## 类成员

class1.php
```php
<?php
namespace class;
class class1{
    protected int pro = 1;
    private   int pri = 2;
    public    int pub = 3;
    
    final function echo()
    {
        echo "pub={$this->pub}" . PHP_EOL;
        echo "pub={$this->pub}" . PHP_EOL;
        echo "pub={$this->pub}" . PHP_EOL;
    }
}
```

test.php
```php
<?php
use class\class1;

class test extends class1
{

    public function __construct() {
        // fatal: 访问修饰符的问题。父级的私有属性不能被访问
        $this->pri;
    }
    
    // fatal:you can`t rewrite final function
    public function echo()
    {
    }
}

```