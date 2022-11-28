@extends('Layouts.admin')

@section('admin_css')
<link rel="stylesheet" href="{{ asset('/storage') }}/assets/vendor/summernote/summernote.min.css">
@endsection

@section('admin_breadcrumb')
<div class="page-breadcrumb">
    <div class="row align-items-center">
        <div class="col-6">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 d-flex align-items-center">
                  <li class="breadcrumb-item"><a href="{{ route('Admin_index') }}" class="link"><i class="mdi mdi-home-outline fs-4"></i></a></li>
                  <li class="breadcrumb-item"><a href="{{ route('Admin_blog_index') }}" class="link">Blog</i></a></li>
                  <li class="breadcrumb-item active" aria-current="page">Create Post</li>
                </ol>
              </nav>
        </div>
    </div>
</div>
@endsection

@section('admin_content')
    <!-- ============================================================== -->
          <!-- Container fluid  -->
          <!-- ============================================================== -->
          <div class="container-fluid">
            <form action="" method="post" enctype="multipart/form-data">
              @csrf
            <div class="row">
                  <div class="col-12 col-lg-8 col-sm-12">
                    <div class="card p-3">
                      <div class="card-title">
                        Post Content
                      </div>

                          <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" name="title" id="title" maxlength="64" class="form-control" required>
                          </div>
                          
                          <div class="form-group">
                            <label for="mediaUpload">Thumbnail</label>
                            <br>
                            <img src="https://via.placeholder.com/500x300.png?text=1320x535+%20+ga+harus+upload" id="ImgPreview" alt="">
                            <input type="file" name="mediaUpload" id="mediaUpload" class="form-control mt-2" accept=".jpg,.png,.jpeg">
                          </div>

                          <div class="form-group">
                            <label for="content">Content</label>
                            <textarea name="content" id="summernote" cols="30" rows="10"></textarea>
                          </div>

                    </div>
                  </div>
                  
                  <div class="col-12 col-lg-4 col-sm-12">
                    <div class="card p-3">
                      <div class="card-title">
                        Post Detail
                      </div>
                        
                      <div class="form-group">
                        <label for="status">Visibilitas</label>
                        <select name="status" id="status" class="form-control">
                          <option value="draft">Draft</option>
                          <option value="public">Public</option>
                          <option value="private">Private</option>
                        </select>
                      </div>
                      
                      <div class="form-group">
                        <label for="tag">Tag</label>
                        <input type="text" name="tag" id="tag" class="form-control">
                        <p class="small">Pisahkan tag dengan koma</p>
                      </div>

                      @if (Auth::user()->role == 'CEO')
                          <div class="form-group">
                            <label for="visitor">Visitor</label>
                            <input type="number" name="visitor" class="form-control" value="0">
                          </div>
                      @else 
                          <input type="hidden" name="visitor" value="0">
                      @endif

                      <div class="form-group">
                        <button class="btn btn-primary w-100" type="button" onclick="submitForm()">Submit</button>
                        <button type="submit" class="hide" id="submit"></button>
                      </div>

                    </div>
                  </div>
                </div>
              </form>
          </div>
          <!-- ============================================================== -->
          <!-- End Container fluid  -->
          <!-- ============================================================== -->
@endsection

@section('admin_js')
<script src="{{ asset('/storage') }}/assets/vendor/summernote/summernote.min.js"></script>
<script>
  $('#mediaUpload').change(function() {
    if (this.files && this.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $('#ImgPreview').attr('src', e.target.result);
            $('#ImgPreview').hide();
            $('#ImgPreview').css('width', '500');
            $('#ImgPreview').css('height', '300');
            $('#ImgPreview').fadeIn(650);
        }
        reader.readAsDataURL(this.files[0]);
    }
  });

  $(document).ready(function() {
    $('#summernote').summernote();
    $('.note-group-select-from-files').hide();
  });
  
  function submitForm() {
    Swal.fire({
      title: 'Are you sure?',
      text: "You can still edit this post",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#378037',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, post it!'
    }).then((result) => {
      if (result.isConfirmed) {
        $('#submit').click();
      }
    })
  }
</script>
@include('Partials.alert')
@endsection