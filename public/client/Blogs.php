<?php
    require_once("../../config/config.php");
    require_once("../../config/function.php");
    $title = 'TIN TỨC | '.$CMSNT->site('tenweb');
    require_once("../../public/client/Header.php");
    require_once("../../public/client/Nav.php");
?>


<div class="heading-page">
    <div class="container">
        <ol class="breadcrumb" itemscope="" itemtype="http://schema.org/BreadcrumbList">
            <li class="breadcrumb-item" itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">
                <a itemprop="item" href="<?=BASE_URL('');?>"><span itemprop="name">Trang chủ</span></a>
                <span itemprop="position" content="1"></span>
            </li>
            <li class="breadcrumb-item" itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">
                <a itemprop="item" href="<?=BASE_URL('Blogs');?>"><span itemprop="name">Tin tức</span></a>
                <span itemprop="position" content="2"></span>
            </li>
        </ol>
    </div>
</div>
<br>
<div class="text-center" style="font-size: 30px">
<script type="text/javascript">
farbbibliothek = new Array();
farbbibliothek[0] = new Array("#FF0000","#FF1100","#FF2200","#FF3300","#FF4400","#FF5500","#FF6600","#FF7700","#FF8800","#FF9900","#FFaa00","#FFbb00","#FFcc00","#FFdd00","#FFee00","#FFff00","#FFee00","#FFdd00","#FFcc00","#FFbb00","#FFaa00","#FF9900","#FF8800","#FF7700","#FF6600","#FF5500","#FF4400","#FF3300","#FF2200","#FF1100");
farbbibliothek[1] = new Array("#00FF00","#000000","#00FF00","#00FF00");
farbbibliothek[2] = new Array("#00FF00","#FF0000","#00FF00","#00FF00","#00FF00","#00FF00","#00FF00","#00FF00","#00FF00","#00FF00","#00FF00","#00FF00","#00FF00","#00FF00","#00FF00","#00FF00","#00FF00","#00FF00","#00FF00","#00FF00","#00FF00","#00FF00","#00FF00","#00FF00","#00FF00","#00FF00","#00FF00","#00FF00","#00FF00","#00FF00","#00FF00","#00FF00","#00FF00","#00FF00","#00FF00","#00FF00");
farbbibliothek[3] = new Array("#FF0000","#FF4000","#FF8000","#FFC000","#FFFF00","#C0FF00","#80FF00","#40FF00","#00FF00","#00FF40","#00FF80","#00FFC0","#00FFFF","#00C0FF","#0080FF","#0040FF","#0000FF","#4000FF","#8000FF","#C000FF","#FF00FF","#FF00C0","#FF0080","#FF0040");
farbbibliothek[4] = new Array("#FF0000","#EE0000","#DD0000","#CC0000","#BB0000","#AA0000","#990000","#880000","#770000","#660000","#550000","#440000","#330000","#220000","#110000","#000000","#110000","#220000","#330000","#440000","#550000","#660000","#770000","#880000","#990000","#AA0000","#BB0000","#CC0000","#DD0000","#EE0000");
farbbibliothek[5] = new Array("#000000","#000000","#000000","#FFFFFF","#FFFFFF","#FFFFFF");
farbbibliothek[6] = new Array("#0000FF","#FFFF00");
farben = farbbibliothek[4];
function farbschrift(){for(var b=0;b<Buchstabe.length;b++){document.all["a"+b].style.color=farben[b]}farbverlauf()}function string2array(b){Buchstabe=new Array();while(farben.length<b.length){farben=farben.concat(farben)}k=0;while(k<=b.length){Buchstabe[k]=b.charAt(k);k++}}function divserzeugen(){for(var b=0;b<Buchstabe.length;b++){document.write("<span id='a"+b+"' class='a"+b+"'>"+Buchstabe[b]+"</span>")}farbschrift()}var a=1;function farbverlauf(){for(var b=0;b<farben.length;b++){farben[b-1]=farben[b]}farben[farben.length-1]=farben[-1];setTimeout("farbschrift()",30)}var farbsatz=1;function farbtauscher(){farben=farbbibliothek[farbsatz];while(farben.length<text.length){farben=farben.concat(farben)}farbsatz=Math.floor(Math.random()*(farbbibliothek.length-0.0001))}setInterval("farbtauscher()",5000);

text= "TGT247-TIN TỨC"; //h
string2array(text);
divserzeugen();
//document.write(text);
</script></div>

  <section class="main"> 
   <div class="container"> 
    <br> 
    <div class="row">
     <center> 
                        <?php foreach($CMSNT->get_list("SELECT * FROM `blogs` WHERE `display` = 'SHOW' ") as $row) { ?>
       <div class="col-lg-3 col-md-3  col-sm-4 col-xs-6"> 
        <div class="thumbnail"> 
         <a class="cover" href="<?=BASE_URL('Blog/'.$row['id']);?>"> <img src="<?=$row['img'];?>" width="200" height="140" alt="<?=$row['title'];?>"> </a> 
         <div class="caption"> 
          <h5><a class="title" href="<?=BASE_URL('Blog/'.$row['id']);?>"><?=$row['title'];?></a> </h5> 
         </div> 
        </div> 
       </div> 
                        <?php }?>
                    </div>
                </div>
            </div>

            <div class="col-sm-3">
                <div class="sidebar">
                    <div class="row lineHorizontal">
                        <h4><span style="margin-left: 15px"><i class="fa fa-newspaper"></i> Tin mới</span></h4>
                    </div>

                    <div class="content-side">
                    <?php foreach($CMSNT->get_list("SELECT * FROM `blogs` WHERE `display` = 'SHOW' ORDER BY id DESC ") as $row) { ?>
                        <div class="row" style="margin-bottom: 10px">
                            <div class="col-sm-12">
                                <div><a href="<?=BASE_URL('Blog/'.$row['id']);?>"><strong><?=$row['title'];?></strong></a></div>
                                <small class="text-muted"><?=$row['time'];?></small>
                            </div>
                        </div>
                        <?php }?>
                    </div>
                </div>
            </div>
          </center>
        </div>
    </div>
</section>


<?php 
    require_once("../../public/client/Footer.php");
?>