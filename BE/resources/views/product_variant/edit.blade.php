@extends('layout_admin')

@section('title', 'Biến thể sản phẩm')

@section('content_admin')
<div class="container">
    <div class="page-inner">
        <div class="page-header">
            <h3 class="fw-bold mb-3">CloudLab</h3>
            <ul class="breadcrumbs mb-3">
                <li class="nav-home">
                    <a href="{{ route('admin.dashboard.index') }}">
                        <i class="icon-home"></i>
                    </a>
                </li>
                <li class="separator">
                    <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.product_variant.index') }}">Cấu hình</a>
                </li>
                <li class="separator">
                    <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-item">
                    <a href="#">Thêm biến thể</a>
                </li>
            </ul>
        </div>
    </div>
    <div class="page-body">
        <div class="container-xl">
            <form action="{{ route('admin.product_variant.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row justify-content-center">
                    <div class="col-12 col-md-9">
                        <div class="card">
                            <div class="card-header justify-content-center">
                                <h3 class="mb-0 strong text-center">Thông tin cấu hình sản phẩm</h3>
                            </div>
                            <div class="row card-body">
                                
                                <div class="col-md-12 col-sm-12 gap-2 d-flex">
                                    <!-- sku -->
                                    <div class="mb-3 col-6">  
                                        <label class="control-label">Sku<span style="color: red">*</span>:</label>
                                        <input type="text" required class="form-control" name="sku" placeholder="VD: NO:130000 ">
                                    </div>
                                    <!-- storage -->
                                    <div class="mb-3 col-6">
                                        <label class="control-label">Dung lượng <span style="color: red">*</span>:</label>
                                        <input type="text" required class="form-control" name="storage" placeholder="VD: iphone-13-promax">
                                    </div>
                                </div>

                                <div class="col-md-12 col-sm-12">
                                    <!-- color -->
                                    <div class="mb-3 col-6">  
                                        <label class="control-label">Màu sắc:</label>
                                        <div class="color-items d-flex">
                                            <input type="text" name="color" id="color" multiple>
                                        </div>
                                    </div>
                                </div>


                                <div class="col-md-12 col-sm-12 gap-2 d-flex">                                   
                                    <!-- price -->
                                    <div class="mb-3 col-6">
                                        <label class="control-label">Giá <span style="color: red">*</span>:</label>
                                        <input type="number" required class="form-control" name="price" placeholder="VND">
                                    </div>

                                    <!-- price sale -->
                                    <div class="mb-3 col-6">
                                        <label class="control-label">Giá khuyến mãi :</label>
                                        <input type="number" required class="form-control" name="sale" placeholder="VND">
                                    </div>
                                </div>

                                <div class="col-md-12 col-sm-12 gap-2 d-flex">                                   
                                    <!-- memory -->
                                    <div class="mb-3 col-6">
                                        <label class="control-label">Gói bảo hành <span style="color: red">*</span>:</label>
                                        <input type="text" required class="form-control" name="memory" placeholder="VD: 1năm">
                                    </div>

                                    <!-- instock -->
                                    <div class="mb-3 col-6">
                                        <label class="control-label">Nhập số lượng (cái) :</label>
                                        <input type="number" required class="form-control" name="instock" placeholder="VD: 1">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            
                    <div class="col-12 col-md-3">
                        <div class="card mb-3">
                            <div class="card-header">Đăng</div>
                            <div class="card-body p-2">
                                <button type="submit" class="btn btn-primary p-1-2" title="Thêm">
                                    Thêm
                                </button>
                            </div>
                        </div>
            
                        <div class="card mb-3">
                            <div class="card-header" style="color: red">Số lượng bán ra</div>
                            <div class="card-body p-2">
                                <input class="form-control" required type="number" name="sold" readonly value="99" >
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
