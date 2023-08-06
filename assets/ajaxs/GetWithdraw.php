<?php 
    require_once("../../config/config.php");
    require_once("../../config/function.php");

    $data = $CMSNT->get_list("SELECT * FROM `ruttien` WHERE `trangthai` = 'xuly' ");

    foreach($data as $row)
    {
        exit("<script type='text/javascript'>VanillaToasts.create({
            title: 'Có đơn rút tiền cần xử lý #".$row['id']."',
            text: 'Developer by: Thái Nguyên',
            type: 'warning',
            icon: '".BASE_URL('assets/img/withdraw.png')."',
            positionClass: 'bottomRight'
            });</script>");
    };
    
    