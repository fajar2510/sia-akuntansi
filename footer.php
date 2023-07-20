<!-- footer area start-->
<footer>
    <div class="footer-area">
        <p>© 2019 Sistem Informasi Akuntansi "Toko Bahan Bangunan - Dhono Joyo"</p>
    </div>
</footer>
<!-- footer area end-->
</div>
<!-- page container area end -->

<!-- jquery latest version -->
<script src="assets/js/vendor/jquery-2.2.4.min.js"></script>
<!-- bootstrap 4 js -->
<script src="assets/js/popper.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/owl.carousel.min.js"></script>
<script src="assets/js/metisMenu.min.js"></script>
<script src="assets/js/jquery.slimscroll.min.js"></script>
<script src="assets/js/jquery.slicknav.min.js"></script>


<!-- start chart js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js"></script>
<!-- start highcharts js -->
<script src="https://code.highcharts.com/highcharts.js"></script>
<!-- start zingchart js -->
<script src="https://cdn.zingchart.com/zingchart.min.js"></script>
<script>
    zingchart.MODULESDIR = "https://cdn.zingchart.com/modules/";
    ZC.LICENSE = ["569d52cefae586f634c54f86dc99e6a9", "ee6b7db5b51705a13dc2339db3edaf6d"];
</script>
<!-- Start datatable js -->
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
<script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap.min.js"></script>
<!-- all line chart activation -->
<script src="assets/js/line-chart.js"></script>
<!-- all pie chart -->
<script src="assets/js/pie-chart.js"></script>
<!-- others plugins -->
<script src="assets/js/plugins.js"></script>
<script src="assets/js/scripts.js"></script>

<script type="text/javascript">
    <?php
    echo $a;
    ?>

    function changeValue(nama_barang) {
        document.getElementById("harga").value = harga[nama_barang].harga;
    };
</script>
<script>
    jQuery(function($) {
        $("#harga_jual").keyup(function() {
            keuntungan = $("#harga_jual").val() - $("#harga_beli").val();
            $("#keuntungan").val(keuntungan);
        });

        $("#harga_beli").keyup(function() {
            keuntungan = $("#harga_jual").val() - $("#harga_beli").val();
            $("#keuntungan").val(keuntungan);
        });
    })
</script>
<script>
    jQuery(function($) {
        $("#jumlah").keyup(function() {
            total = $("#jumlah").val() * $("#harga").val();
            $("#total").val(total);
        });

        $("#harga").keyup(function() {
            total = $("#jumlah").val() * $("#harga").val();
            $("#total").val(total);
        });
    })
</script>
<script>
    jQuery(function($) {
        $("#saldo_awal").keyup(function() {
            saldo = $("#saldo_awal").val()
            $("#saldo").val(saldo);
        });
    })
</script>
<script type="text/javascript">
    $(document).on("click", ".open-AddBookDialog", function() {
        var myBookId = $(this).data('id');
        $(".modal-body #bookId").val(myBookId);
    });
</script>



</body>

</html>