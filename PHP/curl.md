# curl方法
```php
class OtherApi
{
    public  function curl_get($url,$token)
    {
        $ch = curl_init();
// 设置 cURL 选项
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'API-TOKEN:'.$token,
        ]);
        curl_setopt($ch, CURLOPT_TIMEOUT, 30); // 设置最大执行时间为30秒
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10); // 设置连接超时时间为10秒
        $data = curl_exec($ch);
        $data = json_decode($data,true);
        return $data;
    }
    public  function curl_post($url, $postData, $token)
    {
        //$postData = json_encode($postData);
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS =>json_encode($postData),
            CURLOPT_HTTPHEADER => array(
                "API-TOKEN:".$token,
                'Content-Type: application/json',
                'Accept: */*',
            ),
        ));
        $response = curl_exec($curl);
        curl_close($curl);
        return $response;
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        // 禁用 SSL 证书验证
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            //'Content-Type'=>'application/json',
            'API-TOKEN:' . $token,
        ]);
        $response = curl_exec($ch);
        if (curl_errno($ch)) {
            echo 'cURL Error: ' . curl_error($ch);
        }
        curl_close($ch);
        return $response;
    }


}
```
