<?php  
    require_once(__DIR__."/../../config/config.php");
    require_once(__DIR__."/../../config/function.php");


    if(empty($_SESSION['username']))
    {
        echo msg_error3("Vui lòng đăng nhập");
        die();
    }
    foreach($_POST['data'] as $data)
    {
        $token = check_string($_POST['token']);
        $loaithe = check_string($data['loaithe']);
        $menhgia = check_string($data['menhgia']);
        $seri = check_string($data['serial']);
        $pin = check_string($data['pin']);
        $code = random('123456789', 4).time();

        if(empty($loaithe))
        {
            echo msg_error3("Vui lòng chọn loại thẻ");
            continue;
        }
        if(empty($menhgia))
        {
            echo msg_error3("Vui lòng chọn mệnh giá");
            continue;
        }
        if(empty($seri))
        {
            echo msg_error3("Vui lòng nhập seri thẻ");
            continue;
        }
        if(empty($pin))
        {
            echo msg_error3("Vui lòng nhập mã thẻ");
            continue;
        }
        if (strlen($seri) < 5 || strlen($pin) < 5)
        {
            echo msg_error3("Mã thẻ hoặc seri không đúng định dạng!");
            continue;
        }
        $array_checkFormatCard = checkFormatCard($loaithe, $seri, $pin);
        if($array_checkFormatCard['status'] != true){
            echo msg_error3($array_checkFormatCard['msg']);
            continue;
        }
        $getUser = $CMSNT->get_row("SELECT * FROM `users` WHERE `username` = '".$getUser['username']."' ");
        if(!$getUser)
        {
            echo msg_error3("Vui lòng đăng nhập để sử dụng chức năng này");
            continue;
        }
        if($CMSNT->get_row("SELECT * FROM `card_auto` WHERE `seri` = '$seri' AND `pin` = '$pin' AND `loaithe` = '$loaithe' "))
        {
            echo msg_error3("Thẻ này đã tồn tại trong hệ thống của chúng tôi");
            continue;
        }
        if($CMSNT->num_rows("SELECT * FROM `card_auto` WHERE `trangthai` = 'xuly' AND `username` = '".$getUser['username']."'  ") >= 10)
        {
            echo msg_error3("Bạn đang có nhiều thẻ đang chờ xử lý, vui lòng đợi 1 lát rồi thử lại");
            continue;
        }
        if(
        $CMSNT->num_rows("SELECT * FROM `card_auto` WHERE `trangthai` = 'thatbai' AND `username` = '".$getUser['username']."' AND `thoigian` >= DATE(NOW()) AND `thoigian` < DATE(NOW()) + INTERVAL 1 DAY  ") - 
        $CMSNT->num_rows("SELECT * FROM `card_auto` WHERE `trangthai` = 'hoantat' AND `username` = '".$getUser['username']."' AND `thoigian` >= DATE(NOW()) AND `thoigian` < DATE(NOW()) + INTERVAL 1 DAY  ") >= 30)
        {
            echo msg_error3("Bạn đã bị chặn sử dụng chức năng này");
            continue;
        }
        $ck = $CMSNT->get_row("SELECT * FROM `".myGroupExCard($getUser['username'])."` WHERE `loaithe` = '$loaithe' AND `menhgia` = '$menhgia' ");
        $ck = is_array($ck) ? $ck['ck'] : false;
        if($ck === false)
        {
            echo msg_error3("Loại thẻ không tồn tại trong hê thống");
            continue;
        }
        if($ck == 0)
        {
            echo msg_error3("Thẻ này đang bảo trì, vui lòng đợi !");
            continue;
        }
        $thucnhan = $menhgia - $menhgia * $ck / 100;

        // CARDV2
        if($CMSNT->site('status_cardv2') == 'ON')
        {
            $result = cardv2($loaithe, $pin, $seri, $menhgia, $code);
            if($result['data']['status'] == 'success')
            {
                $isInsert = $CMSNT->insert("card_auto", [
                    'code'      => $code,
                    'seri'      => $seri,
                    'pin'       => $pin,
                    'loaithe'   => $loaithe,
                    'menhgia'   => $menhgia,
                    'thucnhan'  => $thucnhan,
                    'username'  => $getUser['username'],
                    'trangthai' => 'xuly',
                    'ghichu'    => '',
                    'thoigian'  => gettime(),
                    'server'    => $CMSNT->site('domain_cardv2')
                ]);
                if($isInsert)
                {
                    echo msg_success3("Gửi thẻ thành công");
                    continue;
                }
                else
                {
                    echo msg_error3("Thao tác thất bại");
                    continue;
                }
            }
            else
            {
                echo msg_error3($result['data']['msg']);
                continue;
            }
        }

        echo msg_error3("Hệ thống đang bảo trì vui lòng quay lại sau!");
        continue;
    }
 
    