<?php
    require_once("../../config/config.php");
    require_once("../../config/function.php");
    $title = 'TẠO WEBSITE | '.$CMSNT->site('tenweb');
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
                <a itemprop="item" href="<?=BASE_URL('CreateWebsite');?>"><span itemprop="name">Tạo Website</span></a>
                <span itemprop="position" content="2"></span>
            </li>
        </ol>
    </div>
</div>

        <div class="col-md-12"> 
          <div class="panel panel-default"> 
           <div class="panel-heading">
             Thông tin namesever và Hướng dẫn 
           </div> 
           <div class="panel-body"> 
            <div class="row"> 
             <div class="col-md-6"> 
              <div class="form-group mb-3"> 
               <label>NS1:</label> 
               <input class="form-control" id="ns1" value="damian.ns.cloudflare.com" readonly> 
              </div> 
              <div class="btn-group"> 
               <button data-clipboard-target="#ns1" class="btn btn-success copy">Copy NS1 </button> 
              </div> 
              <div class="form-group"> 
               <label>NS2:</label> 
               <input class="form-control" id="ns2" value="zariyah.ns.cloudflare.com" readonly> 
              </div> 
              <div class="btn-group"> 
               <button data-clipboard-target="#ns2" class="btn btn-success copy">Copy NS2 </button> 
              </div> 
             </div> 
             <div class="col-md-6"> 
              <p><strong>Hướng dẫn:</strong></p> 
              <p><strong>Bước 1:</strong> Bạn cần phải có tên miền, nếu chưa bạn có thể mua tên miền tại tenten.vn (đọc lưu ý trước khi mua).</p> 
              <p><strong>Bước 2:</strong> Trỏ Nameserver về địa chỉ NS1, NS2 Bên cạnh và xóa các NS còn lại(Nếu có).</p> 
              <p><strong>Bước 3:</strong> Sau khi đã trỏ Nameserver bạn hãy liên hệ zalo<a href="https://zalo.me/0907376977"> Admin </a>để hỗ trợ tạo website con/cháu.</p> 
              <p><strong>Lưu ý:</strong></p> 
              <p><strong>1.</strong>Nếu chưa biết mua miền thì hãy ib<a href="https://zalo.me/0907376977"> Admin </a>nhờ trợ giúp nhé.</p> 
              <p><strong>2.</strong>Phí tạo web con là 45K.</p> 
              <p><strong>3.</strong>Phí duy trì hàng tháng là 25K ( nếu sảng lượng tháng 5m thẻ thì sẽ không thu phí ).</p> 
              <p><strong>4.</strong>Nếu quá hạn mà chưa đóng phí duy trì sẽ tốn phí tạo web lại nhé.</p> 
             </div> 
            </div> 
           </div> 
          </div> 
         </div> 
        </section> 
       </div> 
      </div> 
     </div> 
    </div> 
   </section> 

<?php 
    require_once("../../public/client/Footer.php");
?>