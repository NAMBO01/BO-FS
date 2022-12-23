<!-- @if (isset($NoticeSuccess))
    <script>
        alert("{{ $NoticeSuccess }}");
    </script>
@endif -->
<?php
$controller->cap_nhat();

?>
<div class="container">
    <form action="" method="POST" class="form-horizontal" role="form" enctype="multipart/form-data">
        <?php
        $_SESSION['token'] = md5(uniqid(mt_rand(), true));
        ?>
        <div class="form_them_san_pham">
            <div class="form-group">
                <legend>Thông tin sản phẩm</legend>
            </div>
            <?php
            $controller->info_san_pham();
            ?>
            <div class="form-group">
                <div class="col-md-3">
                    Loại sản phẩm
                </div>
                <div class="col-md-9">
                    <select name="id_loai_sp" id="id_loai_sp" class="form-control" value="" required="required" name="" id="">
                        <?php
                        $controller->select_loai_sp();
                        ?>
                    </select>
                </div>
            </div>
            <?php
            $controller->info_edit();
            ?>
            <div class="form-group">
                <div class="col-md-9 col-sm-offset-3">
                    <button type="submit" class="btn btn-primary update" style="padding: 5px 30px">Cập nhật sản phẩm</button>
                </div>
            </div>
        </div>
    </form>
</div>