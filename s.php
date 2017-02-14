<?php
/**
 * @Author: Mayuko
 * @Date:   2017-02-12 11:46:34
 * @Last Modified by:   Mayuko
 * @Last Modified time: 2017-02-14 08:52:50
*/
$url = $_GET['u'];
echo decode_url($url);
function decode_url($url){
    $s = array();
    if(strlen($url) < 20){
        preg_match('/(http).*?(?=")/si', get_file($url), $url);
        $url = $url[0];
    }else{
        preg_match('/(?<=fid=).*/si', $url, $fid);
        $url = "http://video.weibo.com/show?fid=".$fid[0];
    }
    preg_match('/(http%3A%2F%2Fus.sinaimg.cn).*?(?=")/si', get_file($url), $url);
    if(!empty($url)){
        $s['code'] = 1;
        $s['url'] = urldecode($url[0]);
        $s['msg'] = 'success';
    }
    else{
        $s['code'] = -1;
        $s['msg'] = 'error';
    }
    echo json_encode($s);   
}
function get_file($url)
{
$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_HEADER, 0);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE); // https请求 不验证证书和hosts
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, FALSE);
$data = curl_exec($curl);
curl_close($curl);
return $data;
}