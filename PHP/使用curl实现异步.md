````php 
<?php
function asyncCurl($url, $data,$method = 'GET'): array
{
    $method = $method == 'GET' ? 'GET' : 'POST';
    $ch = curl_init();

    if($method == 'POST'){
        curl_setopt($ch, CURLOPT_POST, 1);
        ! empty($data) && curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
    }else{
        $url .= (strpos($url, '?') === false ? '?' : '&') . http_build_query($data);
    }

    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_TIMEOUT, 1);//设置1s超时 不等待
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    
    // 执行 CURL 请求并获取响应
    $response = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    $error = curl_errno($ch) ? curl_error($ch) : null;
    
    // 关闭 CURL 会话
    curl_close($ch);
    
    // 构建并返回结果数组
    return [
        'response' => $response,
        'httpCode' => $httpCode,
        'error' => $error
    ];
}

// 用法
asyncCurl("http://127.0.0.1:9999/genReport",['id' => $id]);
````