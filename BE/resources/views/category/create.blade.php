@extends('layout_admin')
@section('title','Danh mục')
@section('content_admin')
<div class="container">
    <div class="page-inner">
        <div class="page-header">
          <h3 class="fw-bold mb-3">DataTables</h3>
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
              <a href="#">Category</a>
            </li>
            <li class="separator">
              <i class="icon-arrow-right"></i>
            </li>
            <li class="nav-item">
              <a href="{{ route('admin.category.index') }}">DS danh mục</a>
            </li>
            <li class="separator">
                <i class="icon-arrow-right"></i>
              </li>
            <li class="nav-item">
              <a href="#">Thêm danh mục</a>
            </li>
          </ul>
        </div>
    </div>
    <div class="page-body">
        <div class="container-xl">
            <form action="{{ route('admin.category.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row justify-content-center">
                    <div class="col-12 col-md-9">
                        <div class="card">
                            <div class="card-header justify-content-center">
                                <h3 class="mb-0 strong text-center">Thông tin danh mục</h3>
                            </div>
                            <div class="row card-body">
                                <!-- name -->
                                <div class="col-md-12 col-sm-12">
                                    <div class="mb-3">
                                        <label class="control-label">Tên danh mục:</label>
                                        <input type="text" required class="form-control" name="name" placeholder="Tên danh mục">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="mb-3">
                                        <label for="description" class="control-label">Mô tả:</label>
                                        <textarea class="form-control" id="description" name="description" rows="5"></textarea>
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
                            <div class="card-header">Trạng thái</div>
                            <div class="card-body p-2">
                                <select required class="form-select" name="status">
                                    @foreach ($status as $key => $value)
                                        <option value="{{ $key }}">{{ $value }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="card mb-3">
                            <div class="card-header">Ảnh đại diện</div>
                            <div class="card-body p-2">
                                <input required type="file" id="fileInput" name="images" class="d-none" accept="image/*">
                                <input type="hidden" name="images" id="imageUrl" value="{{ asset($category->images) }}">
                                <div class="image-container" style="cursor: pointer;">
                                    <img id="imagePreview" src="{{ asset($category->images) }}" alt="Ảnh đại diện" style="max-width: 100%;">
                                </div>
                            </div>                            
                        </div>
                        
                        <script>
                            document.addEventListener('DOMContentLoaded', function() {
                                function loadFile(event) {
                                    const imagePreview = document.getElementById('imagePreview');
                                    const file = event.target.files[0];
                        
                                    if (file) {
                                        // Kiểm tra kiểu tệp
                                        const validTypes = ['image/jpeg', 'image/png', 'image/jpg' ,'image/gif'];
                                        if (!validTypes.includes(file.type)) {
                                            alert('Vui lòng chọn một tệp hình ảnh hợp lệ (JPG, PNG, GIF).');
                                            return;
                                        }
                        
                                        // Tạo URL blob cho hình ảnh đã chọn
                                        imagePreview.src = URL.createObjectURL(file);
                                    } else {
                                        imagePreview.src = "{{ asset('/images/default-image.png') }}";
                                        document.getElementById('imageUrl').value = ''; 
                                    }
                                }
                        
                                document.querySelector('.image-container').addEventListener('click', function() {
                                    document.getElementById('fileInput').click();
                                });
                        
                                document.getElementById('fileInput').addEventListener('change', loadFile);
                            });
                        </script>
                                
                    </div>                    
                </div>
            </form>    
        </div>
    </div>   
</div>
@endsection