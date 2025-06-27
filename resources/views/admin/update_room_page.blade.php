<!DOCTYPE html>
<html lang="vi">
<head>
    <base href="/public">
    @include('admin.css')
    <style>
        .form-label {
            font-weight: 600;
        }
        .card-header h4 {
            margin: 0;
        }
    </style>
</head>
<body>
    @include('admin.header')

    <div class="d-flex align-items-stretch">
        @include('admin.sidebar')

        <div class="page-content">
            <div class="container-fluid pt-4">
                <div class="card shadow">
                    <div class="card-header bg-warning text-dark text-center">
                        <h4 class="mb-0">Chỉnh sửa phòng</h4>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('room_update',$data->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="mb-3">
                                <label for="title" class="form-label">Tên phòng :</label>
                                <input type="text" class="form-control" id="title" name="title" value="{{$data->room_title}}">
                            </div>

                            <div class="mb-3">
                                <label for="description" class="form-label">Mô tả :</label>
                                <textarea class="form-control" id="description" name="description" rows="3 ">{{$data->description}}</textarea>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="price" class="form-label">Giá phòng :</label>
                                    <input type="number" class="form-control" id="price" name="price" value="{{$data->price}}">
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="type" class="form-label">Loại phòng : </label>
                                    <select class="form-select" id="type" name="type" selected="{{$data->room_type}}">
                                        <option value="single">Single Room</option>
                                        <option value="double">Double Room</option>
                                        <option value="deluxe">Deluxe Room</option>
                                        <option value="suite">Suite Room</option>
                                        <option value="presidental">Presidential Suite</option>
                                    </select>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="freewifi" class="form-label">Có Wifi miễn phí?</label>
                                <select class="form-select" id="freewifi" name="freewifi" selected='{{$data->has_wifi}}'>
                                    <option value="yes">Có</option>
                                    <option value="no">Không</option>
                                </select>
                            </div>

                            <div class="mb-4">
                                <label for="imageroom" class="form-label">Ảnh chính hiện tại : </label>
                                <img width="100" src="/room_images/{{$data->image}}">
                            </div>

                            <div class="mb-4">
                                <label for="imageroom" class="form-label">Thay đổi ảnh chính : </label>
                                <input type="file" id="imageroom" name="imageroom">
                            </div>

                            <div class="mb-4">
                                <label class="form-label">Ảnh phụ hiện tại : </label>
                                <div class="row">
                                    @foreach($data->images as $image)
                                    <div class="col-md-3 mb-2">
                                        <div class="position-relative">
                                            <img width="100" src="/room_images/{{$image->image_path}}" class="img-fluid">
                                            <a href="{{ route('delete_room_image', $image->id) }}" class="btn btn-danger btn-sm position-absolute top-0 end-0" onclick="return confirm('Bạn có chắc muốn xóa ảnh này?')">
                                                <i class="fa fa-times"></i>
                                            </a>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>

                            <div class="mb-4">
                                <label for="room_images" class="form-label">Thêm ảnh phụ mới : </label>
                                <input type="file" id="room_images" name="room_images[]" multiple accept="image/*">
                                <small class="form-text text-muted">Bạn có thể chọn nhiều hình ảnh cùng lúc</small>
                            </div>

                            <div class="text-end ">
                                <button type="submit" class="btn btn-warning px-4">Sửa</button>
                            </div>
                            @if(session('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                            @endif
                        </form>
                    </div>
                </div>
            </div>
        </div>

        @include('admin.footer')
    </div>

    @include('admin.script')
</body>
</html>
