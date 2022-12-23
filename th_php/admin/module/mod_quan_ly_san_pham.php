<link rel="stylesheet" href="css/data_table.min.css">
<script src="js/data_table.min.js"></script>
<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h3 class="page-header"><i class="fa fa-table"></i> Table</h3>
                <ol class="breadcrumb">
                    <li><i class="fa fa-home"></i><a href="index.html">Home</a></li>
                    <li><i class="fa fa-table"></i>Table</li>
                    <li><i class="fa fa-th-list"></i>Basic Table</li>
                </ol>
            </div>
        </div>
        <!-- page start-->

        <!-- @if ($errors->NoticeDelete->first())
        {{-- <div class="error_message panel panel-danger">
                <div class="panel-heading">Vui lòng kiểm tra lỗi</div>
                @foreach ($errors->loginErrors->all() as $error)
                    <div class="panel-body item_message text-danger">{{$error}}</div>
        @endforeach
        </div> --}}
        <script>
            alert('{{ $errors->NoticeDelete->first() }}');
        </script>
        @endif -->

        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">
                        Bảng sản phẩm
                    </header>

                    <table id="ds_san_pham" class="table table-striped table-advance table-hover">
                        <thead>
                            <tr>
                                <th><i class="icon_profile"></i> Tên sản phẩm</th>
                                <th><i class="icon_calendar"></i> Loại sản phẩm</th>
                                <th><i class="icon_calendar"></i> Loại đơn giá</th>
                                <th><i class="icon_calendar"></i> Hình Sản Phẩm</th>
                                <th><i class="icon_pin_alt"></i> Nhà sản xuất</th>
                                <th><i class="icon_mobile"></i> Nổi bật</th>
                                <th><i class="icon_cogs"></i> Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $controller->ds_san_pham_admin(); ?>

                        </tbody>
                    </table>
                </section>
            </div>
        </div>
        <!-- page end-->
    </section>
</section>

<script>
    $(document).ready(function() {
        $('#ds_san_pham').DataTable();
    });
</script>