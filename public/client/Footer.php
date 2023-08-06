<footer class="footer" style="margin-top: 30px">
    <div class="footer-main">
        <div class="container">
            <div class="row">
               
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="text-center" class="copyright" style="color: #000000" >© 2022 <a href="/"><?=$CMSNT->site('tenweb');?></a> - Hệ thống được thiết kế và vận hành bởi <a href="<?=$CMSNT->site('facebook');?>"><?=$CMSNT->site('tenchunhan');?></a>.</div>
                    </div>
</footer>

</div>

<?php if(!isset($_SESSION['thongbaonoi'])) { $_SESSION['thongbaonoi'] = True;?>
<!-- Modal -->
<div class="modal fade" id="thongbaonoi" role="dialog" style="display: none;">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">THÔNG BÁO</h5>
            </div>
            <div class="modal-body">
                <?=$CMSNT->site('modal_thongbao');?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Đóng</button>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
$(document).ready(function() {
    setTimeout(e => {
        showlog()
    }, 1000)
});

function showlog() {
    $('#thongbaonoi').modal({
        keyboard: true,
        show: true
    });
}
</script>
<?php }?>

<?=getSite('script_live_chat');?>

<!-- ĐƠN VỊ THIẾT KẾ WEB WWW.CMSNT.CO | ZALO: 0947838128 | FACEBOOK: FB.COM/NTGTANETWORK -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/2.0.6/clipboard.min.js"></script>
<script>
new ClipboardJS('.copy');
</script>
<script src="<?=BASE_URL('template/trumthe/');?>assets/default/libs/jquery/jquery.min.js"></script>
<script src="<?=BASE_URL('template/trumthe/');?>assets/default/libs/bootstrap/bootstrap.min.js"></script>
<script src="<?=BASE_URL('template/trumthe/');?>assets/default/libs/OwlCarousel2/owl.carousel.min.js"></script>
<script src="<?=BASE_URL('template/trumthe/');?>assets/default/js/main.min.js"></script>
<!-- DataTables -->
<script src="<?=BASE_URL('template/');?>plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?=BASE_URL('template/');?>plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?=BASE_URL('template/');?>plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?=BASE_URL('template/');?>plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<!-- daterangepicker -->
<script src="<?=BASE_URL('template/');?>plugins/moment/moment.min.js"></script>
<script src="<?=BASE_URL('template/');?>plugins/daterangepicker/daterangepicker.js"></script>
</body>
<!-- ĐƠN VỊ THIẾT KẾ WEB WWW.CMSNT.CO | ZALO: 0947838128 | FACEBOOK: FB.COM/NTGTANETWORK -->

</html>