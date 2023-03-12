<?php
interface actionHandler{
    public function execute();
}

#[Attribute]
class setUp{}

class copyFile implements actionHandler
{
    public string $fileName;
    public string $dirPath;

    #[setUp]
    public function fileExist(): bool
    {
        if(! file_exists($this->fileName)){
            return false;
        }
        return true;
    }

    #[setUp]
    public function dirExist(): bool{
        if(! file_exists($this->dirPath)){
            return mkdir($this->dirPath);
        }

        if(! is_dir($this->dirPath)){
            throw new \Exception("{$this->dirPath} is not a dir!");
        }
        return false;
    }

    public function execute()
    {
        copy($this->fileName, $this->dirPath . '/' . basename($this->fileName));
    }
}

function executeActionHandler(actionHandler $handler){
    $reflection = new ReflectionObject($handler);
    $methods = $reflection->getMethods();
    foreach ($methods as $method){
        $attribute = $method->getAttributes(setUp::class);

        if(sizeof($attribute) > 0){
            $methodName = $method->getName();
            $handler->$methodName();
        }
    }

    $handler->excute();
}

$copyAction = new copyFile();
$copyAction->fileName = "/tmp/foo.jpg";
$copyAction->dirPath = "/home/user";

executeActionHandler($copyAction);