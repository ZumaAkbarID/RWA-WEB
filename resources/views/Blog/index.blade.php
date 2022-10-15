@extends('Layouts.blog')

@section('blog_content')
<main class="tm-main">
  <!-- Search form -->
  @include('Blog.Inc.search')           
  <div class="row tm-row">
    
      {{-- <article class="col-12 col-md-6 tm-post">
          <hr class="tm-hr-primary">
          <a href="post.html" class="effect-lily tm-post-link tm-pt-20">
              <div class="tm-post-link-inner">
                  <img src="{{ asset('/storage') }}/blog/img/img-06.jpg" alt="Image" class="img-fluid">
              </div>
              <h2 class="tm-pt-30 tm-color-primary tm-post-title">Donec convallis varius risus</h2>
          </a>                    
          <p class="tm-pt-30">
              Quisque id ipsum vel sem maximus vulputate sed quis velit. Nunc vel turpis eget orci elementum cursus vitae in eros. Quisque vulputate nulla ut dolor consectetur luctus.
          </p>
          <div class="d-flex justify-content-between tm-pt-45">
              <span class="tm-color-primary">Visual . Artworks</span>
              <span class="tm-color-primary">June 16, 2020</span>
          </div>
          <hr>
          <div class="d-flex justify-content-between">
              <span>96 comments</span>
              <span>by Admin Sam</span>
          </div>
      </article> --}}

      <div class="alert alert-danger w-100 text-center">
        No Post Found
      </div>

  </div>
  <div class="row tm-row tm-mt-100 tm-mb-75">
      <div class="tm-prev-next-wrapper">
          <a href="#" class="mb-2 tm-btn tm-btn-primary tm-prev-next disabled tm-mr-20">Prev</a>
          <a href="#" class="mb-2 tm-btn tm-btn-primary tm-prev-next">Next</a>
      </div>
      <div class="tm-paging-wrapper">
          <span class="d-inline-block mr-3">Page</span>
          <nav class="tm-paging-nav d-inline-block">
              <ul>
                  <li class="tm-paging-item active">
                      <a href="#" class="mb-2 tm-btn tm-paging-link">1</a>
                  </li>
                  <li class="tm-paging-item">
                      <a href="#" class="mb-2 tm-btn tm-paging-link">2</a>
                  </li>
                  <li class="tm-paging-item">
                      <a href="#" class="mb-2 tm-btn tm-paging-link">3</a>
                  </li>
                  <li class="tm-paging-item">
                      <a href="#" class="mb-2 tm-btn tm-paging-link">4</a>
                  </li>
              </ul>
          </nav>
      </div>                
  </div>            
  @include('Blog.Inc.footer')
</main>
@endsection