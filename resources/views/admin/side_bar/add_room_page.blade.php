<!DOCTYPE html>
<html>
  <head> 
    @include('admin.css')
  </head>
  <body>
    @include('admin.header')

    <div class="d-flex align-items-stretch">
      <!-- Sidebar Navigation-->
      @include('admin.sidebar')
      <!-- Sidebar Navigation end-->

      <div class="page-content">
          <div class="container-fluid">
            <div class="card shadow mt-4">
              <div class="card-header bg-success text-white">
                <h4 class="mb-0">Thêm phòng mới</h4>
              </div>
              <div class="card-body">

                <form action="{{route('add_new_room')}}" method="POST" enctype="multipart/form-data">
                  @csrf

                  <div class="mb-3">
                    <label for="title" class="form-label">Tên Phòng</label>
                    <input type="text" class="form-control" id="title" name="title" placeholder="Nhập tên phòng">
                  </div>

                  <div class="mb-3">
                    <label for="description" class="form-label">Mô tả</label>
                    <textarea class="form-control" id="description" name="description" rows="3" placeholder="Nhập mô tả..."></textarea>
                  </div>

                  <div class="mb-3">
                    <label for="price" class="form-label">Giá</label>
                    <input type="number" class="form-control" id="price" name="price" placeholder="Nhập giá phòng">
                  </div>

                  <div class="mb-3">
                    <label for="type" class="form-label">Loại Phòng</label>
                    <select class="form-select" id="type" name="type">
                      <option value="single">Single Room</option>
                      <option value="double">Double Room</option>
                      <option value="deluxe">Deluxe Room</option>
                      <option value="suite">Suite Room</option>
                      <option value="presidental">Presidental Suite</option>
                    </select>
                  </div>

                  <div class="mb-3">
                    <label for="freewifi" class="form-label">Wifi</label>
                    <select class="form-select" id="freewifi" name="freewifi">
                      <option value="yes">Yes</option>
                      <option value="no">No</option>
                    </select>
                  </div>

                  <div class="mb-3">
                    <label for="imageroom" class="form-label">Hình ảnh chính</label>
                    <input type="file" id="imageroom" name="imageroom" required>
                  </div>

                  <div class="mb-3">
                    <label for="room_images" class="form-label">Thêm hình ảnh khác</label>
                    <input type="file" id="room_images" name="room_images[]" multiple accept="image/*">
                    <small class="form-text text-muted">Bạn có thể chọn nhiều hình ảnh cùng lúc</small>
                  </div>

                  <div class="text-end">
                    <button type="submit" class="btn btn-success">Thêm Phòng</button>
                  </div>

                </form>
                
              </div>
            </div>
        </div>
      </div>

    </div>

    <!-- JavaScript files-->
    @include('admin.script')
  </body>
</html>
