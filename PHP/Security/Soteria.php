<?php

class Soteria
{
    private $key;

    function __construct()
    {
        // 使用MD5生成key并截取前16位
        $this->key = substr(md5("123456"), 0, 16);
    }

    public function encrypt($str, $iv): string
    {
        // 加密
        $packedIv = pack("H*", $iv);
        $encrypted = openssl_encrypt($str, "AES-128-CBC", $this->key, OPENSSL_RAW_DATA, $packedIv);

        // 返回Base64编码的字符串
        return base64_encode($encrypted);
    }

    public function decrypt($encryptedStr, $iv): string
    {
        // 解密
        $packedIv = pack("H*", $iv);
        $encryptedData = base64_decode($encryptedStr);
        $decrypted = @openssl_decrypt($encryptedData, "AES-128-CBC", $this->key, OPENSSL_RAW_DATA, $packedIv);

        // 返回UTF8编码的解密字符串
        return $decrypted;
    }

    public function securityCode()
    {
//        header('Content-type: image/png');                        //输出头信息
        $image_w = 100;                                            //验证码图形的宽
        $image_h = 25;                                            //验证码图形的高
        $number = range(0, 9);                                        //定义一个成员为数字的数组
        $character = range("Z", "A");                                //定义一个成员为大写字母的数组
        $result = array_merge($number, $character);                //合并两个数组
        $string = "";                                                //初始化
        $len = count($result);                                    //新数组的长
        for ($i = 0; $i < 6; $i++) {
            $new_number[$i] = $result[rand(0, $len - 1)];            //在$result数组中随机取出6个字符
            $string = $string . $new_number[$i];                    //生成验证码字符串
        }
        $_SESSION['string'] = $string;                            //使用$_SESSION变量传值
        $check_image = imagecreatetruecolor($image_w, $image_h);    //创建图片对象
        $white = imagecolorallocate($check_image, 255, 255, 255);
        $black = imagecolorallocate($check_image, 0, 0, 0);
        imagefill($check_image, 0, 0, $white);//设置背景颜色为白色
        $line_color = imagecolorallocate($check_image, 255, 0, 0);//设直线的颜色
        imageline($check_image, 0, 10, 100, 20, $line_color);//画线
        for ($i = 0; $i < 100; $i++)                                    //加入100个干扰的黑点
        {
            imagesetpixel($check_image, rand(0, $image_w), rand(0, $image_h), $black);
        }
        for ($i = 0; $i < count($new_number); $i++)                    //在背景图片中循环输出4位验证码
        {
            $x = mt_rand(1, 7) + $image_w * $i / 6;                        //设定字符所在位置X坐标
            $y = mt_rand(1, $image_h / 6);                            //设定字符所在位置Y坐标
            //随机设定字符颜色
            $color = imagecolorallocate($check_image, mt_rand(0, 200), mt_rand(0, 200), mt_rand(0, 200));
            //输入字符到图片中
            imagestring($check_image, 5, $x, $y, $new_number[$i], $color);
        }
        imagepng($check_image);
        imagedestroy($check_image);
        header('Content-Type: image/gif');
        header('Cache-Control: max-age=0');
        die();
    }

    public function verify(&$param): array
    {
        [$code, $vi] = [$param['code'] ?? '', bin2hex($param['iv']) ?? ''];

        if (empty($code) || empty($vi)) {
            return ['code' => 400400, 'msg' => '登录验证失败', 'data' => []];
        }

        if ($_SESSION['string'] != $code) {
            return ['code' => 400400, 'msg' => '验证码错误', 'data' => []];
        }

        $param['userName'] = $this->decrypt($param['userName'], $vi);
        $param['password'] = $this->decrypt($param['password'], $vi);
        return ['code' => 400200];
    }
}