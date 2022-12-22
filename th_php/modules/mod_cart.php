<div class="padding-bottom-3x mb-1 include_table_cart">
    <?php $controller->gio_hang(); ?>

</div>
<script>
    function xoa_gio_hang(e) {
        e.preventDefault();
        var kq = confirm('Bạn có chắc chắn muốn xóa toàn bộ giỏ hàng');
        if (kq) {
            $.get('/xoa-gio-hang/')
                .done((data) => {
                    if (data) {
                        $('.number_item_cart').remove();
                        $('.include_table_cart').html(`<div class="container">
            <div class = "notice" >
                <h3> không có sản phẩm trong giỏ hàng </h3>
            </div>
            </div>`);
                    }
                })
                .fail(err => {
                    console.log(err);
                })
        } else {
            //khong lam gi het
        }
    }

    function process_gio_hang_client(id_sp, so_luong) {
        $('#thanh_tien_' + id_sp).html((parseInt($('#gia_duoc_giam_' + id_sp).html().replace(/,/gi, "")) * so_luong)
            .toLocaleString('vi', {
                style: 'currency',
                currency: 'VND'
            }))
        var ds_thanh_tien = $('.thanh_tien');
        var ds_so_luong = $('.so_luong_input');
        var tong_tien = 0;
        var tong_so_luong = 0;
        for (var i = 0; i < ds_thanh_tien.length; i++) {
            tong_tien += parseInt($(ds_thanh_tien[i]).html().replace(/\./gi, ""));
            tong_so_luong += parseInt($(ds_so_luong[i]).val());
        }
        $('#tong_tien').html('Tổng tiền: ' + tong_tien.toLocaleString('vi', {
            style: 'currency',
            currency: 'VND'
        }) + '');
        $('.number_item_cart').html(tong_so_luong);
    }

    function nut_thung_rac(e, id_sp) {
        e.preventDefault();
        var kq = confirm('Bạn có muốn xóa sản phẩm khỏi giỏ hàng?');
        if (kq) {
            $.get('/xoa-item-gio-hang/' + id_sp)
                .done((data) => {
                    if (data) {
                        $('#san_pham_' + id_sp).remove();
                        process_gio_hang_client(id_sp, 0);
                    }
                })
                .fail(err => {
                    console.log(err);
                })
        } else {
            //khong lam gi het
        }
    }

    function thay_doi_so_luong_gio_hang(id_sp) {
        var so_luong = $('#so_luong_' + id_sp).val();
        if (so_luong > 0) {
            $.get('/update-gio-hang/' + id_sp + '?so_luong=' + so_luong)
                .done((data) => {
                    if (data) {
                        // process_gio_hang_client(id_sp, so_luong);
                        process_gio_hang_client(id_sp, so_luong);
                    }
                })
                .fail(err => {
                    console.log(err);
                })
        } else {
            var kq = confirm('Bạn có muốn xóa sản phẩm khỏi giỏ hàng?');
            if (kq) {
                $.get('/xoa-item-gio-hang/' + id_sp)
                    .done((data) => {
                        if (data) {
                            $('#san_pham_' + id_sp).remove();
                            process_gio_hang_client(id_sp, 0);
                        }
                    })
                    .fail(err => {
                        console.log(err);
                    })
            } else {
                $.get('/update-gio-hang/' + id_sp + '?so_luong=' + 1)
                    .done((data) => {
                        if (data) {
                            $('#so_luong_' + id_sp).val(1);
                            process_gio_hang_client(id_sp, 1);
                        }
                    })
                    .fail(err => {
                        console.log(err);
                    })
            }
        }
    }
</script>