<div class="page category">

    <?php if(isset($_SESSION['username'])) { ?>
    <a href="#" class="animated-arrow right-menu-toggle off-menu mobile-user-icon">
        <button type="button" class="btn btn-user btn-sm outline"><i
                class="fa fa-user"></i><?=$getUser['username'];?></button>
    </a>
    <div class="rightVerticleMenu off-menu">
        <div class="brand-block" style="margin-bottom: 20px"><a class="navbar-brand" href="<?=BASE_URL('');?>"><img
                    src="<?=$CMSNT->site('logo');?>" alt="" /></a></div>
        <div class="content-menu">
            <ul class="list-menu listMenuUserPanel">
                <li>
                    <h4 style="padding-left: 5px">Số dư: <?=format_cash($getUser['money']);?>đ</h4>
                </li>
                <?php if($getUser['level'] == 'admin') { ?>
                <li><a href="<?=BASE_URL('Admin/Home');?>" class="hover_item"><i class="fa fa-angle-right"></i>
                        <strong>Quản trị website</strong></a>
                </li>
                <?php }?>
                <li><a href="<?=BASE_URL('Auth/Profile');?>" class="hover_item"><i class="fa fa-angle-right"></i>
                        <strong>Thông tin tài khoản</strong></a></li>
                <li><a href="<?=BASE_URL('Auth/Logout');?>" class="hover_item"><i class="fa fa-angle-right"></i>
                        <strong>Đăng xuất</strong></a></li>

            </ul>
        </div>
    </div>
    <?php } else { ?>
    <a href="<?=$CMSNT->site('logo');?>" class="animated-arrow right-menu-toggle off-menu mobile-user-icon">
        <button type="button" class="btn btn-user btn-sm outline"><i class="fa fa-user"></i>Tài khoản</button>
    </a>
    <div class="rightVerticleMenu off-menu">

        <div class="brand-block" style="margin-bottom: 20px"><a class="navbar-brand" href="<?=BASE_URL('');?>"><img
                    src="<?=$CMSNT->site('logo');?>" alt=""></a></div>
        <div class="content-menu">
            <ul class="list-menu listMenuUserPanel">
                <li><a href="<?=BASE_URL('Auth/Login');?>">Đăng nhập</a></li>
                <li><a href="<?=BASE_URL('Auth/Register');?>">Đăng ký</a></li>
                <li><a href="<?=BASE_URL('Auth/ForgotPassword');?>">Quên mật khẩu?</a></li>
            </ul>
        </div>
    </div>
    <?php } ?>
    <div class="top" style="background-color:N/A ">
        <div class="container">
            <ul class="top-menu menu-top float-left" style="color: rgba(51, 51, 51, 0.8)">
                <li><span><strong> <i class="fa fa-phone"></i>&nbsp;</strong><a href="#"
                            style="color: rgba(51, 51, 51, 0.8)">CSKH SĐT/Zalo <?=$CMSNT->site('hotline');?>
                            &nbsp;</a></span>
                </li>
                <li class="p-0"><span class="separate"></span></li>
                <li><span><strong><i class="fa fa-envelope"></i>&nbsp;</strong><a href="#link"
                            style="color: rgba(51, 51, 51, 0.8)"><?=$CMSNT->site('email');?>
                            &nbsp;</a></span>
                </li>
            </ul>
            <div class="pull-right hidden-sm hidden-xs">
                <div style="padding-top: 8px">
                </div>
            </div>
        </div>
    </div>
    <header class="header-top">
        <div class="container">

            <div class="logo">
                <a href="<?=BASE_URL('');?>">
                    <img src="<?=$CMSNT->site('logo');?>" alt="">
                </a>
            </div>
            <style>
            @media (min-width: 768px) {
                .navigation ul>li:hover>ul {
                    border-top: 2px solid <?=$CMSNT->site('theme_color');
                    ?> !important;
                }

                a.hover_item:hover {
                    color: #f1f1f1;
                    background: <?=$CMSNT->site('theme_color');
                    ?> !important;
                }

                .navigation>ul>li>a::before,
                .navigation>ul>li>span::before {
                    background: <?=$CMSNT->site('theme_color');
                    ?> !important;
                }

                .navigation ul>li ul:before {
                    border-bottom: 4px dashed <?=$CMSNT->site('theme_color');
                    ?> !important;
                }
            }
            </style>

             <div class="navigation nav-left" style="padding-top: 15px">
                <ul>
                    </li>
                    <li class="mb-md-3">
                        <a href="/DoiCard.php"  style="background: -webkit-linear-gradient( 
19deg
 , <?=$CMSNT->site('theme_color');?> 0%, <?=$CMSNT->site('theme_color');?> 100%);-webkit-background-clip: text;-webkit-text-fill-color: transparent;"><i class="far fa-credit-card"></i>&nbsp;Đổi Thẻ Cào</a>
                    </li>
                    <li class="mb-md-3">
                        <a href="#" style="background: -webkit-linear-gradient( 
19deg
 , <?=$CMSNT->site('theme_color');?> 0%, <?=$CMSNT->site('theme_color');?> 100%);-webkit-background-clip: text;-webkit-text-fill-color: transparent;"><i class="nav-main-link-icon fa fa-donate"></i>&nbsp;Nạp/Rút Tiền</a>
                        <ul>
                                                            <li>
                                    <a class="hover_item"  href="/Withdraw"  >►Tạo đơn rút tiền</a>
                                </li>
                                    <?php if($CMSNT->site('status_napbank') == 'ON') { ?>
                                                            <li>
                                    <a class="hover_item"  href="/Bank"  >►Nạp tiền</a>
                                </li>
                    <?php }?>
 <li>
                                    <a class="hover_item"  href="/Localbank"  >►Thêm TK ngân hàng</a>
                                </li>
                                                    </ul>
                    <li class="mb-md-3">
                        <a href="#" style="background: -webkit-linear-gradient( 
19deg
 , <?=$CMSNT->site('theme_color');?> 0%, <?=$CMSNT->site('theme_color');?> 100%);-webkit-background-clip: text;-webkit-text-fill-color: transparent;"><i class="fas fa-list"></i>&nbsp;Tiện Ích</a>
   <ul>
                                     
<?php if($CMSNT->site('status_chuyentien') == 'ON') { ?>
 <li>
                                    <a class="hover_item"  href="/Transfers"  >►Chuyển Tiền Thành Viên</a>
                                 </li>
                     <?php }?>
                                     <?php if($CMSNT->site('status_muathe') == 'ON') { ?>                                              <li>
                                  <a class="hover_item"  href="/BuyCard"  >►Mua Mã Thẻ</a>
                                </li>
                    <?php }?>
                    
<?php if($CMSNT->site('status_napdt') == 'ON') { ?>
                                                            <li>
                                    <a class="hover_item"  href="/Topup"  >►Nạp Điện Thoại</a>
                                </li>
                    <?php }?>
<?php if($CMSNT->site('status_blog') == 'ON') { ?>
 <li>
                                    <a class="hover_item"  href="/Blogs"  >►Tin Tức</a>    
                                
                                     </li>
                     <?php }?>
<?php if($CMSNT->site('status_ref') == 'ON') { ?>
 <li>
                                    <a class="hover_item"  href="/Referral"  >►Mời Bạn Bè</a>    
                                
                                     </li>
                     <?php }?>
 
 <li>
                                   
                                                    </ul>
                                                  </li>
                                                  
                    </li>
                    <li class="mb-md-3">
                        <a href="/CreateWebsite"  style="background: -webkit-linear-gradient( 
19deg
 , <?=$CMSNT->site('theme_color');?> 0%, <?=$CMSNT->site('theme_color');?> 100%);-webkit-background-clip: text;-webkit-text-fill-color: transparent;"><i class="fas fa-newspaper"></i>&nbsp;Tạo web con</a>
                    </li>
                    <li class="mb-md-3">
                        <a href="/History/Card"  style="background: -webkit-linear-gradient( 
19deg
 , <?=$CMSNT->site('theme_color');?> 0%, <?=$CMSNT->site('theme_color');?> 100%);-webkit-background-clip: text;-webkit-text-fill-color: transparent;"><i class="nav-main-link-icon fa fa-history"></i>&nbsp;Lịch sử đổi thẻ</a>
                    </li>
                    <li class="mb-md-3">
                        <a href="/Ket-noi-api"  style="background: -webkit-linear-gradient( 
19deg
 , <?=$CMSNT->site('theme_color');?> 0%, <?=$CMSNT->site('theme_color');?> 100%);-webkit-background-clip: text;-webkit-text-fill-color: transparent;"><i class="nav-main-link-icon fa fa-code"></i>&nbsp;Kết nối API</a>
                    </li>
                </ul>
            </div>

            <?php if(isset($_SESSION['username'])) { ?>
            <span class="pull-right loginBox" style="color: #5a5a5a; padding-top: 15px">
                <span class="navi-wrapper">
                    <div class="navigation">
                        <ul>
                            <li>
                                <i class="far fa-money-bill-alt" aria-hidden="true"></i>
                                <?=format_cash($getUser['money']);?>đ
                            </li>
                            <li>
                                <a href="#" style="color: #5a5a5a;"><i class="fa fa-user"
                                        aria-hidden="true"></i>
                                    <?=$getUser['username'];?></a>
                                <ul>
                                    <?php if($getUser['level'] == 'admin') { ?>
                                    <li><a href="<?=BASE_URL('Admin/Home');?>" class="hover_item"><i
                                                class="fa fa-angle-right"></i> <strong>Quản trị website</strong></a>
                                    </li>
                                    <?php }?>
                                    <li><a href="<?=BASE_URL('Auth/Profile');?>" class="hover_item"><i
                                                class="fa fa-angle-right"></i> <strong>Thông tin tài khoản</strong></a>
                                    </li>
                                    <li><a href="<?=BASE_URL('Localbank');?>" class="hover_item"><i
                                                class="fa fa-angle-right"></i> <strong>Quản lý ngân hàng</strong></a>
                                    </li>
                                    <?php if($CMSNT->site('status_chuyentien') == 'ON') { ?>
                                    <li><a href="<?=BASE_URL('Transfers');?>" class="hover_item"><i
                                                class="fa fa-angle-right"></i> <strong>Chuyển tiền</strong></a>
                                    </li>
                                    <?php }?>
                                    <?php if($CMSNT->site('status_napbank') == 'ON') { ?>
                                    <li><a href="<?=BASE_URL('Bank');?>" class="hover_item"><i
                                                class="fa fa-angle-right"></i> <strong>Nạp tiền bằng ngân
                                                hàng</strong></a>
                                    </li>
                                    <?php }?>
                                    <?php if($CMSNT->site('status_muathe') == 'ON') { ?>
                                    <li><a href="<?=BASE_URL('BuyCard');?>" class="hover_item"><i
                                                class="fa fa-angle-right"></i> <strong>Mua thẻ</strong></a>
                                    </li>
                                    <?php }?>
                                    <?php if($CMSNT->site('status_napdt') == 'ON') { ?>
                                    <li><a href="<?=BASE_URL('Topup');?>" class="hover_item"><i
                                                class="fa fa-angle-right"></i> <strong>Nạp tiền điện thoại</strong></a>
                                    </li>
                                    <?php }?>
                                    <?php if($CMSNT->site('status_ref') == 'ON'){?>
                                    <li>
                                        <a href="<?=BASE_URL('Referral');?>" class="hover_item"><i
                                                class="fa fa-angle-right"></i> <strong>CTV</strong></a>
                                    </li>
                                    <?php }?>
                                    <li><a href="<?=BASE_URL('Withdraw');?>" class="hover_item"><i
                                                class="fa fa-angle-right"></i> <strong>Rút tiền</strong></a>
                                    </li>
                                    <li><a href="<?=BASE_URL('History/Card');?>" class="hover_item"><i
                                                class="fa fa-angle-right"></i> <strong>Lịch sử đổi thẻ</strong></a>
                                    </li>
                                    <li><a href="<?=BASE_URL('Ket-noi-api');?>" class="hover_item"><i
                                                class="fa fa-angle-right"></i> <strong>Kết nối API</strong></a>
                                    </li>
                                    <li><a href="<?=BASE_URL('Auth/Logout');?>" class="hover_item"><i
                                                class="fa fa-angle-right"></i> <strong>Đăng xuất</strong></a></li>


                                </ul>
                            </li>
                        </ul>
                    </div>
                </span>
            </span>
            <?php } else  { ?>
            <span class="pull-right user-header" style="padding-top: 15px">
                <a href="<?=BASE_URL('Auth/Register');?>" class="btn btn-third">
                    <i class="icon ion-android-person"></i> Đăng ký
                </a>
                <a href="<?=BASE_URL('Auth/Login');?>" class="btn btn-second"
                    style="background: <?=$CMSNT->site('theme_color');?>;border-color: <?=$CMSNT->site('theme_color');?>;">
                    <i class="fa ion ion-android-unlock"></i> Đăng nhập </a>
            </span>
            <?php }?>
        </div>
    </header>