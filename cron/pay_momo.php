<?php
    require_once("../config/config.php");
    require_once("../config/function.php");

    if(getSite('token_momo') == '')
    {
        die('Vui lòng nhập token ví momo');
    }
    if(getSite('password_momo') == '')
    {
        die('Vui lòng nhập mật khẩu ví momo');
    }


    function payment_momo($token, $sdtnguoinhan, $password, $money, $noidung)
    {
        $sdtnguoinhan = $sdtnguoinhan;
        $money  = $money;
        $noidung = $noidung;
        $dataPost = array(
        "Loai_api" => "chuyentien", 
        );
        $curl = curl_init();
        curl_setopt_array($curl, array(
        CURLOPT_URL => "https://api.dichvudark.vn/api/ApiMomo",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_SSL_VERIFYPEER => false,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => $dataPost,
        CURLOPT_HTTPHEADER => array(
        "Code: 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",
        "Token: $token",
        "Phone: $sdtnguoinhan",
        "Password: $password",
        "Amount: $money",
        "Comment: $noidung")
        ));
        $response = curl_exec($curl);
        curl_close($curl);
        return json_decode($response, true);
    }

    // LẤY DANH SÁCH ĐƠN RÚT TIỀN VỀ VÍ MOMO ĐANG ĐỢI XỬ LÝ
    foreach($CMSNT->get_list("SELECT * FROM `ruttien` WHERE `trangthai` = 'xuly' AND `nganhang` = 'MOMO' ") as $ruttien)
    {
        if($ruttien['trangthai'] != 'xuly')
        {
            break;
        }
        $CMSNT->update("ruttien", [
            'trangthai'  => 'hoantat'
        ], " `id` = '".$ruttien['id']."' ");
        $noidung = $ruttien['magd'];
        $result1 = payment_momo(getSite('token_momo'), $ruttien['sotaikhoan'], getSite('password_momo'), $ruttien['sotien'], $noidung . " | TheSieuSao.Com cảm ơn quý khách .");
        if($result1['status'] == 200)
        {
            $CMSNT->update("ruttien", [
                'trangthai'  => 'hoantat'
            ], " `id` = '".$ruttien['id']."' ");
            break;
        }
        else
        {
            $CMSNT->update("ruttien", [
                'trangthai'  => 'xuly'
            ], " `id` = '".$ruttien['id']."' ");
        }

    }