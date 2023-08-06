<?php
$CMSNT = new CMSNT;
require_once(__DIR__.'/../vendor/autoload.php');

$config = [
    'project'   => 'CARDV2',
    'url'       => $base_url,
    'version'   => '2.1.0',
    'ip_server' => ''
];

$list_loaithe = [
    'VIETTEL',
    'VINAPHONE',
    'MOBIFONE',
    'ZING',
    'VNMOBI',
    'GARENA',
    'GATE',
    'VCOIN'
];

function checkFormatCard($type, $seri, $pin){
    $seri = strlen($seri);
    $pin = strlen($pin);
    $data = [];
    if($type == 'Viettel' || $type == "viettel" || $type == "VT" || $type == "VIETTEL"){
        if($seri != 11 && $seri != 14){
            $data = [
                'status'    => false,
                'msg'       => 'Độ dài seri không phù hợp'
            ];
            return $data;
        }
        if($pin != 13 && $pin != 15){
            $data = [
                'status'    => false,
                'msg'       => 'Độ dài mã thẻ không phù hợp'
            ];
            return $data;
        }
    }
    if($type == 'Mobifone' || $type == "mobifone" || $type == "Mobi" || $type == "MOBIFONE"){
        if($seri != 15){
            $data = [
                'status'    => false,
                'msg'       => 'Độ dài seri không phù hợp'
            ];
            return $data;
        }
        if($pin != 12){
            $data = [
                'status'    => false,
                'msg'       => 'Độ dài mã thẻ không phù hợp'
            ];
            return $data;
        }
    }
    if($type == 'VNMB' || $type == "Vnmb" || $type == "VNM" || $type == "VNMOBI"){
        if($seri != 16){
            $data = [
                'status'    => false,
                'msg'       => 'Độ dài seri không phù hợp'
            ];
            return $data;
        }
        if($pin != 12){
            $data = [
                'status'    => false,
                'msg'       => 'Độ dài mã thẻ không phù hợp'
            ];
            return $data;
        }
    }
    if($type == 'Vinaphone' || $type == "vinaphone" || $type == "Vina" || $type == "VINAPHONE"){
        if($seri != 14){
            $data = [
                'status'    => false,
                'msg'       => 'Độ dài seri không phù hợp'
            ];
            return $data;
        }
        if($pin != 14){
            $data = [
                'status'    => false,
                'msg'       => 'Độ dài mã thẻ không phù hợp'
            ];
            return $data;
        }
    }
    if($type == 'Garena' || $type == "garena" || $type == "GARENA"){
        if($seri != 9){
            $data = [
                'status'    => false,
                'msg'       => 'Độ dài seri không phù hợp'
            ];
            return $data;
        }
        if($pin != 16){
            $data = [
                'status'    => false,
                'msg'       => 'Độ dài mã thẻ không phù hợp'
            ];
            return $data;
        }
    }
    if($type == 'Zing' || $type == "zing" || $type == "ZING"){
        if($seri != 12){
            $data = [
                'status'    => false,
                'msg'       => 'Độ dài seri không phù hợp'
            ];
            return $data;
        }
        if($pin != 9){
            $data = [
                'status'    => false,
                'msg'       => 'Độ dài mã thẻ không phù hợp'
            ];
            return $data;
        }
    }
    if($type == 'Vcoin' || $type == "VTC" || $type == "VCOIN"){
        if($seri != 12){
            $data = [
                'status'    => false,
                'msg'       => 'Độ dài seri không phù hợp'
            ];
            return $data;
        }
        if($pin != 12){
            $data = [
                'status'    => false,
                'msg'       => 'Độ dài mã thẻ không phù hợp'
            ];
            return $data;
        }
    }
    $data = [
        'status'    => true,
        'msg'       => 'Jss'
    ];
    return $data;
}

function checkPassword2($id_user, $password2)
{
    global $CMSNT;
    $getUser = $CMSNT->get_row("SELECT * FROM `users` WHERE `id` = '$id_user' ");
    if($getUser['password2'] != '')
    {
        if($getUser['password2'] != $password2)
        {
            return false;
        }
        return true;
    }
    return true;
}
function getRowRealtime($table, $id, $row)
{
    global $CMSNT;
    return $CMSNT->get_row("SELECT * FROM `$table` WHERE `id` = '$id' ")[$row];
}
function format_currency($amount)
{
    $currency = 'VND';
    if($currency == 'USD')
    {
        return '$'.number_format($amount / 23000, 2, '.', '');
    }
    else if($currency == 'VND')
    {
        return format_cash($amount).'đ';
    }
}
function myGroupExCard($username)
{
    global $CMSNT;
    if($username != '')
    {
        if($getUser = $CMSNT->get_row("SELECT * FROM `users` WHERE `username` = '$username' "))
        {
            if($getUser['group_excard'] == 'Thành viên')
            {
                return 'ck_card_auto';
            }
            if($getUser['group_excard'] == 'Đại lí/PR web')
            {
                return 'ck_card_auto_platinum';
            }
            if($getUser['group_excard'] == 'Siêu Vip/ 30Tr')
            {
                return 'ck_card_auto_diamond';
            }
        }
    }
    else
    {
        if(isset($_SESSION['username']))
        {
            if($getUser = $CMSNT->get_row("SELECT * FROM `users` WHERE `username` = '".$_SESSION['username']."' "))
            {
                if($getUser['group_excard'] == 'Thành viên')
                {
                    return 'ck_card_auto';
                }
                if($getUser['group_excard'] == 'Đại lí/PR web')
                {
                    return 'ck_card_auto_platinum';
                }
                if($getUser['group_excard'] == 'Siêu Vip/ 30Tr')
                {
                    return 'ck_card_auto_diamond';
                }
            }
        }
    }
    return 'ck_card_auto';
}
function myRank()
{
    global $CMSNT;
    if(isset($_SESSION['username']))
    {
        $getUser = $CMSNT->get_row("SELECT * FROM `users` WHERE `username` = '".$_SESSION['username']."' ");
        if($getUser['group_excard'] == 'Thành viên')
        {
            return '<b><a style="color: #FF0000"> <span class="label label-danger"> <b>Thành viên</b></span> </a></b>';
        }
        if($getUser['group_excard'] == 'Đại lí/PR web')
        {
            return '<b><a style="color: #00FF00"> <span class="label label-success"> <b>Đại lí/PR web</b></span> </a></b>';
        }
        if($getUser['group_excard'] == 'Siêu Vip/ 30Tr')
        {
            return '<b><a style="color: #0000FF"> <span class="label label-primary"> <b>Siêu Vip/ 30Tr</b></span> </a></b>';
        }
    }
    return '<b><a style="color: #FF0000"> <span class="label label-danger"> <b>Thành viên</b></span> </a></b>';
        }
function getMoney_momo($token)
{
        $dataPost = array(
                "Loai_api" => "momothongtin",
                );
                $curl = curl_init();
                curl_setopt_array($curl, array(
                CURLOPT_URL => "https://api.dichvudark.vn/api/ApiMomo",
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_SSL_VERIFYPEER => false,
                CURLOPT_CUSTOMREQUEST => "POST",
                CURLOPT_POSTFIELDS => $dataPost,
                CURLOPT_HTTPHEADER => array(
                "Code: T6YAmun5PYTfF2nR5y4sqzPZqu6Br6M44Wwheyvkuff3P3WVqBfqSWqPaBMr54YrM5Lx96Y9jF7havMx5Kx3cpkwDHVZTA2X6gF3jByH76PQfvwqTqw4UWKUB7twF9mUXMNFHmasNfVUFFvZY5nvrk5n4XvVz2d9qswZjdFb4CDcXMeQHFnuHcNZyX5XsHN9fKsEgeVhh7TFjjNUVjKEGceXJqeL9dA5fdUsnBqAxyynz4mSQwA6AP9qPE7CWzxLtpPq4BjRJLnDep9WKbYHQnnqyuMmPcGhdcyc5FqDXZ6MxJggP5GZuZtzuNbpSAmwVdnS9vfGy5fJG7wbU2Lf5nByMybuAnJyrRRGKjuWjXZd6PgGAeRH7RmGyFb9K3eb5uEGFRqTm9MkKxx3gVvPZDjvZ84AjmpdcAd68u9dZtFQQQYxduaSAcZR9JVtLykjBUJVssWrALuU7SLTgvKwnRQfRp2PvQGYjwKcue3ppgfFR6QnygbSfQjnnbDVFc3KmqpPDPRAMMWDCmBBwtwYRh5fxpCMss3e7KZXv6S2S7tuQMRar5AgKdfgqwASuWcaMtetRf9x5FFrD8zASwq45TGsQ4JuXkbqL8tJ82RFfPQK4VNUxtLpsMkbRmbWAxFDdHvNzFygpHdVQNwcZUJDycQKqhzSxy3fjGA766vmM4drQwxqPCT27EcXnrG7yHBXvdcLgnFp2DwM4AxAFYsDKbXVwtM2urUuS3xQPwcGjNbk2tfSPP3RDGn6wDSrPPhsbQVjeJVqvCw2LL52ykjAxw3cDqhW2MrxR4cRhewzy3agLCJ6rzR2rVzXR4L6HhdE7vEaFDDpBcpSDjymyDfmaVL8rs3A6tEG6Wr5XvtqBRxaydCRWnjKHHzDfGxfjXJD5ynk52Xkb6dEBg7v2x65QdegM3GLCnSaxTHPPAmzxveYeZSt2XptwGj5679zDvQDMDgUgX2JUeErYcJUarRzWThuTgzpGM53zdPRH7fQU9UDwa9q6thY7PNj8QWMkAzhhYW7ncbYfEfQTmpYMtrScSuYUQxw2WyuKXBdeTxgZSEdX5b6BaaCTP7VTF6VZhhh5QmVJv3eHWy4fCA3Pm96hN8SbvnjQE5UpVGDYsM5QkGPMjU2dQ8EtVEzwzhfBt6VyPBMqbaXyHq2rx6wdDBXmMjsk7MQ9a3xPB7PTsrL3BnPMJ9WMHyAdp6zZQUqqXueSbGUL5GjZsSkW4rZNUUj8yALVcSZUwb8Ht9EYWJ7jrmFdSBGXDCEvTEJrB8ebWUzEcLagYm3sgMMgBPSGkpT277dNYJeZMTPZ8AVCbU536ByLb4CfdgmkjU6ryLhrcjnScGHNhUpkBkMpGu5T3RX2TYaGcJ2JFrJXn2UAz76WnvuHB3FsKGfrhgzNFgZEdvGvNCedzC42c68FHF6kQpBcAU9NnbLqHWzbTPLRzPHcM44vgLGAvT8tdnFAvama8VpVEhws36ZkYU6pJzgGSbPbknS5cduDtPrakGmy67r7uKp9SveTxgxWNyLbtVtjCyb6K7nLUGa99Z6qpvTGAJEg6NWHQDSHcxfDhNAAFCxvn2DBpY5kNp8xFZqvxsBSq7hyS8nDgQMjDNGn2CF86PWQxJhfNpcM6q4Vrbywwagh2kUJeDX8mRgTaAULTeCU8qFV2uTV8D6zQQg9sFY4eSKP9AzhTT83dasdVsVPce5nWfPYASL7dALR9LcsgW4WatYC2vyjHXM3xKVs55HZcPsxjfLBnkKLebrZbKHFMr82PB2NSR5M8wWcvjFz2cGjpqbG5ayM8uD5afQ6eh9ALDL6fQ4q9McMRpQZyTQd83rSMvWSxBtJsEcb3kGX2Qb43Y8YJ6YfdaVsweuRQcCeK2jmPCznXMFvCYtfqNatMB8U8J5KK6Ga78Fm7YSLVk9uZrGjgPdbJWuU9fzR7JmmEDDAurgn6swL8zHdS5XdrZdkcNZKUdABgegJKU3qTUSDD3vxxCXsrRSGgDuT6wKks6RGsEMfa33EYfhEDbRBFffWddZcK6VQt8MMxQUQu8QsDG",
                "Token: $token")
                ));
                $response = curl_exec($curl);
                curl_close($curl); 
                $response = json_decode($response, true);
                if($response['status'] == 200){
                    $sotien = $response['SoDu'];
                }else{
                    $sotien = $response['msg'];
                }
                return $sotien;
}
function insert_options($name, $value){
    global $CMSNT;
    if(!$CMSNT->get_row("SELECT * FROM `options` WHERE `name` = '$name' "))
    {
        $CMSNT->insert("options", [
            'name'  => $name,
            'value' => $value
        ]);
    }
}
function sendCallBack($domain, $content, $status, $thucnhan, $menhgiathuc)
{
    if(isset($domain))
    {
        curl_get("$domain?content=$content&status=$status&thucnhan=$thucnhan"."&menhgiathuc=$menhgiathuc");
    }
}
function getSite($name){
    global $CMSNT;
    return $CMSNT->get_row("SELECT * FROM `options` WHERE `name` = '$name' ")['value'];
}
function getUser($username, $row){
    global $CMSNT;
    return $CMSNT->get_row("SELECT * FROM `users` WHERE `username` = '$username' ")[$row];
}
function cardv2($loaithe, $pin, $seri, $menhgia, $code){  
    global $CMSNT;
    $response = curl_get("https://".$CMSNT->site('domain_cardv2')."/api/card-auto.php?type=$loaithe&menhgia=$menhgia&seri=$seri&pin=$pin&APIKey=".$CMSNT->site('api_cardv2')."&callback=".BASE_URL('callback.php')."&content=$code");
    return json_decode($response, true);
}
function format_date($time){
    return date("H:i:s d/m/Y", $time);
}
function listbank(){
    $html = '
    <option value="">Chọn ngân hàng</option>
    <option value="MOMO">MOMO</option>
    <option value="VIETCOMBANK">VIETCOMBANK</option>
    <option value="BIDV">BIDV</option>
    <option value="AGRIBANK">AGRIBANK</option>
    <option value="VIETTINBANK">VIETTINBANK</option>
    <option value="TECHCOMBANK">TECHCOMBANK</option>
    <option value="SACOMBANK">SACOMBANK</option>
    <option value="MBBANK">MBBANK</option>
    <option value="VPBANK">VPBANK</option>
    <option value="ACB">ACB</option>
    <option value="SHB">SHB</option>
    ';
    return $html;
}
function CBC($BankName)
{
        if($BankName == 'VIETCOMBANK'){
            $bankcode = '970436';
        }elseif($BankName == 'BIDV'){
            $bankcode = '970418';
        }elseif($BankName == 'AGRIBANK'){
            $bankcode = '970405';
        }elseif($BankName == 'VIETTINBANK'){
            $bankcode = '970415';
        }elseif($BankName == 'TECHCOMBANK'){
            $bankcode = '970407';
        }elseif($BankName == 'SACOMBANK'){
            $bankcode = '970403';
        }elseif($BankName == 'MBBANK'){
            $bankcode = '970422';
        }elseif($BankName == 'VPBANK'){
            $bankcode = '970432';
        }elseif($BankName == 'ACB'){
            $bankcode = '970416';
        }elseif($BankName == 'SHB'){
            $bankcode = '970443';
        }
        return $bankcode;
}
function daily($data){
    if($data == 0)
    {
        return 'Thành viên';
    }
    else if($data == 1)
    {
        return 'Đại lý';
    }
}
function trangthai($data)
{
    if($data == 'xuly')
    {
        return 'Đang xử lý';
    }
    else if($data == 'hoantat')
    {
        return 'Hoàn tất';
    }
    else if($data == 'thanhcong')
    {
        return 'Thành công';
    }
    else if($data == 'huy')
    {
        return 'Hủy';
    }
    else if($data == 'thatbai')
    {
        return 'Thất bại';
    }
    else
    {
        return 'Khác';
    }
}
function loaithe($data)
{
    if ($data == 'Viettel' || $data == 'viettel')
    {
        $show = 'https://i.imgur.com/xFePMtd.png';
    }
    else if ($data == 'Vinaphone' || $data == 'vinaphone')
    {
        $show = 'https://i.imgur.com/s9Qq3Fz.png';
    }
    else if ($data == 'Mobifone' || $data == 'mobifone')
    {
        $show = 'https://i.imgur.com/qQtcWJW.png';
    }
    else if ($data == 'Vietnamobile' || $data == 'vietnamobile')
    {
        $show = 'https://i.imgur.com/IHm28mq.png';
    }
    else if ($data == 'Zing' || $data == 'zing')
    {
        $show = 'https://i.imgur.com/xkd7kQ0.png';
    }
    else if ($data == 'Garena' || $data == 'garena')
    {
        $show = 'https://i.imgur.com/BLkY5qm.png';
    }
    return '<img style="text-align: center;" src="'.$show.'" width="70px" />';
}

function sendCSM($mail_nhan,$ten_nhan,$chu_de,$noi_dung,$bcc)
{
    global $CMSNT;
        // PHPMailer Modify
        $mail = new PHPMailer();
        $mail->SMTPDebug = 0;
        $mail ->Debugoutput = "html";
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = $CMSNT->site('email'); // GMAIL STMP
        $mail->Password = $CMSNT->site('pass_email'); // PASS STMP
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;
        $mail->setFrom($CMSNT->site('email'), $bcc);
        $mail->addAddress($mail_nhan, $ten_nhan);
        $mail->addReplyTo($CMSNT->site('email'), $bcc);
        $mail->isHTML(true);
        $mail->Subject = $chu_de;
        $mail->Body    = $noi_dung;
        $mail->CharSet = 'UTF-8';
        $send = $mail->send();
        return $send;
}
function parse_order_id($des)
{
    global $CMSNT;
    $re = '/'.$CMSNT->site('noidung_naptien').'\d+/im';
    preg_match_all($re, $des, $matches, PREG_SET_ORDER, 0);
    if (count($matches) == 0 )
        return null;
    // Print the entire match result
    $orderCode = $matches[0][0];
    $prefixLength = strlen($CMSNT->site('noidung_naptien'));
    $orderId = intval(substr($orderCode, $prefixLength ));
    return $orderId ;
}

function apitele($message){
      global $NTD;
    

    $url="https://api.telegram.org/bot".$NTD->site('bot_tele')."/sendMessage?chat_id=".$NTD->site('id_chat_tele')."&text=".urlencode($message)."";
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $data = curl_exec($ch);
    curl_close($ch);
}

function BASE_URL($url)
{
    global $config;
    $a = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://" . $_SERVER["HTTP_HOST"];
    if($a == 'http://localhost'){
        $a = 'http://localhost/CMSNT.CO/TRUMTHE';
    }
    return $a.'/'.$url;
}
function gettime()
{
    return date('Y/m/d H:i:s', time());
}
function check_string($data)
{
    return trim(htmlspecialchars(addslashes($data)));
    //return str_replace(array('<',"'",'>','?','/',"\\",'--','eval(','<php'),array('','','','','','','','',''),htmlspecialchars(addslashes(strip_tags($data))));
}
function format_cash($price)
{
    return str_replace(",", ".", number_format($price));
}
function curl_get($url)
{
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $data = curl_exec($ch);
    
    curl_close($ch);
    return $data;
}
function random($string, $int)
{  
    return substr(str_shuffle($string), 0, $int);
}
function pheptru($int1, $int2)
{
    return $int1 - $int2;
}
function phepcong($int1, $int2)
{
    return $int1 + $int2;
}
function phepnhan($int1, $int2)
{
    return $int1 * $int2;
}
function phepchia($int1, $int2)
{
    return $int1 / $int2;
}
function check_img($img)
{
    $filename = $_FILES[$img]['name'];
    $ext = explode(".", $filename);
    $ext = end($ext);
    $valid_ext = array("png","jpeg","jpg","PNG","JPEG","JPG","gif","GIF");
    if(in_array($ext, $valid_ext))
    {
        return true;
    }
}
function msg_error3($text)
{
    return '<div class="alert alert-danger alert-dismissible error-messages">
    <a href="#" class="close" data-dismiss="alert" aria-badge="close">×</a>'.$text.'</div>';
}
function msg_success3($text)
{
    return '<div class="alert alert-success alert-dismissible error-messages">
    <a href="#" class="close" data-dismiss="alert" aria-badge="close">×</a>'.$text.'</div>';
}


function msg_success2($text)
{
    return die('<div class="alert alert-success alert-dismissible error-messages">
    <a href="#" class="close" data-dismiss="alert" aria-badge="close">×</a>'.$text.'</div>');
}
function msg_error2($text)
{
    return die('<div class="alert alert-danger alert-dismissible error-messages">
    <a href="#" class="close" data-dismiss="alert" aria-badge="close">×</a>'.$text.'</div>');
}
function msg_warning2($text)
{
    return die('<div class="alert alert-warning alert-dismissible error-messages">
    <a href="#" class="close" data-dismiss="alert" aria-badge="close">×</a>'.$text.'</div>');
}
function msg_success($text, $url, $time)
{
    return die('<div class="alert alert-success alert-dismissible error-messages">
    <a href="#" class="close" data-dismiss="alert" aria-badge="close">×</a>'.$text.'</div><script type="text/javascript">setTimeout(function(){ location.href = "'.$url.'" },'.$time.');</script>');
}
function msg_error($text, $url, $time)
{
    return die('<div class="alert alert-danger alert-dismissible error-messages">
    <a href="#" class="close" data-dismiss="alert" aria-badge="close">×</a>'.$text.'</div><script type="text/javascript">setTimeout(function(){ location.href = "'.$url.'" },'.$time.');</script>');
}
function msg_warning($text, $url, $time)
{
    return die('<div class="alert alert-warning alert-dismissible error-messages">
    <a href="#" class="close" data-dismiss="alert" aria-badge="close">×</a>'.$text.'</div><script type="text/javascript">setTimeout(function(){ location.href = "'.$url.'" },'.$time.');</script>');
}
function admin_msg_success($text, $url, $time)
{
    return die('<script type="text/javascript">Swal.fire("Thành Công", "'.$text.'","success");
    setTimeout(function(){ location.href = "'.$url.'" },'.$time.');</script>');
}
function admin_msg_error($text, $url, $time)
{
    return die('<script type="text/javascript">Swal.fire("Thất Bại", "'.$text.'","error");
    setTimeout(function(){ location.href = "'.$url.'" },'.$time.');</script>');
}
function admin_msg_warning($text, $url, $time)
{
    return die('<script type="text/javascript">Swal.fire("Thông Báo", "'.$text.'","warning");
    setTimeout(function(){ location.href = "'.$url.'" },'.$time.');</script>');
}
function display_banned($data)
{
    if ($data == 1)
    {
        $show = '<span class="badge badge-danger">Banned</span>';
    }
    else if ($data == 0)
    {
        $show = '<span class="badge badge-success">Hoạt động</span>';
    }
    return $show;
}
function display_loaithe($data)
{
    if ($data == 0)
    {
        $show = '<span class="badge badge-warning">Bảo trì</span>';
    }
    else 
    {
        $show = '<span class="badge badge-success">Hoạt động</span>';
    }
    return $show;
}
function display_ruttien($data)
{
    if ($data == 'xuly')
    {
        $show = '<span class="badge badge-info">Đang xử lý</span>';
    }
    else if ($data == 'hoantat')
    {
        $show = '<span class="badge badge-success">Đã thanh toán</span>';
    }
    else if ($data == 'huy')
    {
        $show = '<span class="badge badge-danger">Hủy</span>';
    }
    return $show;
}
function display_ruttien_user($data)
{
    if ($data == 'xuly')
    {
        $show = '<span class="label label-info">Đang xử lý</span>';
    }
    else if ($data == 'hoantat')
    {
        $show = '<span class="label label-success">Đã thanh toán</span>';
    }
    else if ($data == 'huy')
    {
        $show = '<span class="label label-danger">Hủy</span>';
    }
    return $show;
}
function XoaDauCach($text)
{
    return trim(preg_replace('/\s+/',' ', $text));
}
function display($data)
{
    if ($data == 'HIDE')
    {
        $show = '<span class="badge badge-danger">ẨN</span>';
    }
    else if ($data == 'SHOW')
    {
        $show = '<span class="badge badge-success">HIỂN THỊ</span>';
    }
    return $show;
}
function status($data)
{
    if ($data == 'xuly'){
        $show = '<span class="label label-info">Đang xử lý</span>';
    }
    else if ($data == 'hoantat'){
        $show = '<span class="label label-success">Hoàn tất</span>';
    }
    else if ($data == 'thanhcong'){
        $show = '<span class="label label-success">Thành công</span>';
    }
    else if ($data == 'success'){
        $show = '<span class="label label-success">Success</span>';
    }
    else if ($data == 'thatbai'){
        $show = '<span class="label label-danger">Thất bại</span>';
    }
    else if ($data == 'error'){
        $show = '<span class="label label-danger">Error</span>';
    }
    else if ($data == 'loi'){
        $show = '<span class="label label-danger">Lỗi</span>';
    }
    else if ($data == 'huy'){
        $show = '<span class="label label-danger">Hủy</span>';
    }
    else if ($data == 'dangnap'){
        $show = '<span class="label label-warning">Đang đợi nạp</span>';
    }
    else if ($data == 2){
        $show = '<span class="label label-success">Hoàn tất</span>';
    }
    else if ($data == 1){
        $show = '<span class="label label-info">Đang xử lý</span>';
    }
    else{
        $show = '<span class="label label-warning">Khác</span>';
    }
    return $show;
}
function status_admin($data)
{
    if ($data == 'xuly'){
        $show = '<span class="badge badge-info">Đang xử lý</span>';
    }
    else if ($data == 'hoantat'){
        $show = '<span class="badge badge-success">Hoàn tất</span>';
    }
    else if ($data == 'thanhcong'){
        $show = '<span class="badge badge-success">Thành công</span>';
    }
    else if ($data == 'success'){
        $show = '<span class="badge badge-success">Success</span>';
    }
    else if ($data == 'thatbai'){
        $show = '<span class="badge badge-danger">Thất bại</span>';
    }
    else if ($data == 'error'){
        $show = '<span class="badge badge-danger">Error</span>';
    }
    else if ($data == 'loi'){
        $show = '<span class="badge badge-danger">Lỗi</span>';
    }
    else if ($data == 'huy'){
        $show = '<span class="badge badge-danger">Hủy</span>';
    }
    else if ($data == 'dangnap'){
        $show = '<span class="badge badge-warning">Đang đợi nạp</span>';
    }
    else if ($data == 2){
        $show = '<span class="badge badge-success">Hoàn tất</span>';
    }
    else if ($data == 1){
        $show = '<span class="badge badge-info">Đang xử lý</span>';
    }
    else{
        $show = '<span class="badge badge-warning">Khác</span>';
    }
    return $show;
}
function getHeader(){
    $headers = array();
    $copy_server = array(
        'CONTENT_TYPE'   => 'Content-Type',
        'CONTENT_LENGTH' => 'Content-Length',
        'CONTENT_MD5'    => 'Content-Md5',
    );
    foreach ($_SERVER as $key => $value) {
        if (substr($key, 0, 5) === 'HTTP_') {
            $key = substr($key, 5);
            if (!isset($copy_server[$key]) || !isset($_SERVER[$key])) {
                $key = str_replace(' ', '-', ucwords(strtolower(str_replace('_', ' ', $key))));
                $headers[$key] = $value;
            }
        } elseif (isset($copy_server[$key])) {
            $headers[$copy_server[$key]] = $value;
        }
    }
    if (!isset($headers['Authorization'])) {
        if (isset($_SERVER['REDIRECT_HTTP_AUTHORIZATION'])) {
            $headers['Authorization'] = $_SERVER['REDIRECT_HTTP_AUTHORIZATION'];
        } elseif (isset($_SERVER['PHP_AUTH_USER'])) {
            $basic_pass = isset($_SERVER['PHP_AUTH_PW']) ? $_SERVER['PHP_AUTH_PW'] : '';
            $headers['Authorization'] = 'Basic ' . base64_encode($_SERVER['PHP_AUTH_USER'] . ':' . $basic_pass);
        } elseif (isset($_SERVER['PHP_AUTH_DIGEST'])) {
            $headers['Authorization'] = $_SERVER['PHP_AUTH_DIGEST'];
        }
    }
    return $headers;
}

function check_username($data)
{
    if (preg_match('/^[a-zA-Z0-9_-]{3,16}$/', $data, $matches))
    {
        return True;
    }
    else
    {
        return False;
    }
}
function check_email($data)
{
    if (preg_match('/^.+@.+$/', $data, $matches))
    {
        return True;
    }
    else
    {
        return False;
    }
}
function check_phone($data)
{
    if (preg_match('/^\+?(\d.*){3,}$/', $data, $matches))
    {
        return True;
    }
    else
    {
        return False;
    }
}
function check_url($url)
{
    $c = curl_init();
    curl_setopt($c, CURLOPT_URL, $url);
    curl_setopt($c, CURLOPT_HEADER, 1);
    curl_setopt($c, CURLOPT_NOBODY, 1);
    curl_setopt($c, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($c, CURLOPT_FRESH_CONNECT, 1);
    if(!curl_exec($c))
    {
        return false;
    }
    else
    {
        return true;
    }
}
function check_zip($img)
{
    $filename = $_FILES[$img]['name'];
    $ext = explode(".", $filename);
    $ext = end($ext);
    $valid_ext = array("zip","ZIP");
    if(in_array($ext, $valid_ext))
    {
        return true;
    }
}
function TypePassword($string)
{
    return md5($string);
}
function phantrang($url, $start, $total, $kmess)
{
    $out[] = '<nav aria-badge="Page navigation example"><ul class="pagination pagination-lg">';
    $neighbors = 2;
    if ($start >= $total) $start = max(0, $total - (($total % $kmess) == 0 ? $kmess : ($total % $kmess)));
    else $start = max(0, (int)$start - ((int)$start % (int)$kmess));
    $base_link = '<li class="page-item"><a class="page-link" href="' . strtr($url, array('%' => '%%')) . 'page=%d' . '">%s</a></li>';
    $out[] = $start == 0 ? '' : sprintf($base_link, $start / $kmess, '<i class="fas fa-angle-left"></i>');
    if ($start > $kmess * $neighbors) $out[] = sprintf($base_link, 1, '1');
    if ($start > $kmess * ($neighbors + 1)) $out[] = '<li class="page-item"><a class="page-link">...</a></li>';
    for ($nCont = $neighbors;$nCont >= 1;$nCont--) if ($start >= $kmess * $nCont) {
        $tmpStart = $start - $kmess * $nCont;
        $out[] = sprintf($base_link, $tmpStart / $kmess + 1, $tmpStart / $kmess + 1);
    }
    $out[] = '<li class="page-item active"><a class="page-link">' . ($start / $kmess + 1) . '</a></li>';
    $tmpMaxPages = (int)(($total - 1) / $kmess) * $kmess;
    for ($nCont = 1;$nCont <= $neighbors;$nCont++) if ($start + $kmess * $nCont <= $tmpMaxPages) {
        $tmpStart = $start + $kmess * $nCont;
        $out[] = sprintf($base_link, $tmpStart / $kmess + 1, $tmpStart / $kmess + 1);
    }
    if ($start + $kmess * ($neighbors + 1) < $tmpMaxPages) $out[] = '<li class="page-item"><a class="page-link">...</a></li>';
    if ($start + $kmess * $neighbors < $tmpMaxPages) $out[] = sprintf($base_link, $tmpMaxPages / $kmess + 1, $tmpMaxPages / $kmess + 1);
    if ($start + $kmess < $total)
    {
        $display_page = ($start + $kmess) > $total ? $total : ($start / $kmess + 2);
        $out[] = sprintf($base_link, $display_page, '<i class="fas fa-angle-right"></i>');
    }
    $out[] = '</ul></nav>';
    return implode('', $out);
}
function myip()
{
    if (!empty($_SERVER['HTTP_CLIENT_IP']))     
    {  
        $ip_address = $_SERVER['HTTP_CLIENT_IP'];  
    }  
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))    
    {  
        $ip_address = $_SERVER['HTTP_X_FORWARDED_FOR'];  
    }  
    else  
    {  
        $ip_address = $_SERVER['REMOTE_ADDR'];  
    }
    return check_string($ip_address);
}
function timeAgo($time_ago)
{
    $time_ago   = date("Y-m-d H:i:s", $time_ago);
    $time_ago   = strtotime($time_ago);
    $cur_time   = time();
    $time_elapsed   = $cur_time - $time_ago;
    $seconds    = $time_elapsed ;
    $minutes    = round($time_elapsed / 60 );
    $hours      = round($time_elapsed / 3600);
    $days       = round($time_elapsed / 86400 );
    $weeks      = round($time_elapsed / 604800);
    $months     = round($time_elapsed / 2600640 );
    $years      = round($time_elapsed / 31207680 );
    // Seconds
    if($seconds <= 60)
    {
        return "$seconds giây trước";
    }
    //Minutes
    else if($minutes <= 60)
    {
        return "$minutes phút trước";
    }
    //Hours
    else if($hours <= 24)
    {
        return "$hours tiếng trước";
    }
    //Days
    else if($days <= 7)
    {
        if($days == 1)
        {
            return "Hôm qua";
        }
        else
        {
            return "$days ngày trước";
        }
    }
    //Weeks
    else if($weeks <= 4.3)
    {
        return "$weeks tuần trước";
    }
    //Months
    else if($months <=12)
    {
        return "$months tháng trước";
    }
    //Years
    else
    {
        return "$years năm trước";
    }
}
/* CMSNT.CO TEAM LEADER - NTTHANH - DEV PHP */