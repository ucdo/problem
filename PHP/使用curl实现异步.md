<?php
function asyncCurl($url, $data)
{
    if (is_array($data)) {
        $data = http_build_query($data, null, '&');
    }
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    curl_setopt($ch, CURLOPT_TIMEOUT, 1);//设置1s超时 不等待 
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $result['response'] = curl_exec($ch);
    $result['httpCode'] = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    return $result;

}
while (true){
    var_dump(date('H:i'));
    $url = "http://www.shuifeiyitihua.com:8090/api/executeDaily";
    asyncCurl($url,[]);
}
