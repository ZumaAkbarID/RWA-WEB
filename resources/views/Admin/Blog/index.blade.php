@extends('Layouts.admin')

@section('admin_breadcrumb')
<div class="page-breadcrumb">
    <div class="row align-items-center">
        <div class="col-6">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 d-flex align-items-center">
                  <li class="breadcrumb-item"><a href="{{ route('Admin_index') }}" class="link"><i class="mdi mdi-home-outline fs-4"></i></a></li>
                  <li class="breadcrumb-item active" aria-current="page">Blog</li>
                </ol>
              </nav>
            <h1 class="mb-0 fw-bold">Manage Blog</h1> 
        </div>
        <div class="col-6">
            <div class="text-end upgrade-btn">
                <a href="{{ route('Admin_blog_create') }}" class="btn btn-primary text-white">Create New Post</a>
            </div>
        </div>
    </div>
</div>
@endsection

@section('admin_content')
          <!-- ============================================================== -->
          <!-- Container fluid  -->
          <!-- ============================================================== -->
          <div class="container-fluid">
            <div class="col-12">
              <div class="card">
                  <div class="table-responsive">
                      <table class="table table-hover">
                          <thead>
                              <tr>
                                  <th scope="col" colspan="1">No.</th>
                                  <th scope="col" colspan="2">Title</th>
                                  <th scope="col" colspan="2">Thumbnail</th>
                                  <th scope="col" colspan="2">Author</th>
                                  <th scope="col" colspan="2">Visibility</th>
                                  <th scope="col" colspan="1">Visitor</th>
                                  <th scope="col" colspan="2">Action</th>
                              </tr>
                          </thead>
                          <tbody>
                            @php
                                $no = 1;
                            @endphp
                            @forelse ($posts as $post)
                            <tr>
                                <th scope="row" align="center" colspan="1">{{ $no++ }}</th>
                                <td colspan="2">{{ $post->title }}</td>
                                <td colspan="2"><img src="{{ asset('/storage') }}/{{ $post->media }}" width="200" height="130" alt="{{ $post->title }} - Image"></td>
                                <td colspan="2">{{ $post->name }}</td>
                                <td colspan="2">
                                    @if ($post->status = 'private')
                                    <div class="badge bg-warning">{{ $post->status }}</div>
                                    @elseif($post->status = 'public')
                                    <div class="badge bg-success">{{ $post->status }}</div>
                                    @else
                                    <div class="badge bg-info">{{ $post->status }}</div>
                                    @endif
                                </td>
                                <td colspan="1">{{ number_format($post->visitor,0,',','.') }}</td>
                                <td colspan="2">
                                    <a href="{{ route('Admin_blog_detail', $post->code) }}">Detail</a>
                                    | 
                                    <a href="{{ route('Blog_read_short', $post->code) }}">Read</a>
                                    | 
                                    <a href="{{ route('Admin_blog_edit', $post->code) }}">Edit</a>
                                    | 
                                    <a onclick="Swal.fire('R u sure?')">Delete</a>    
                                </td>
                            </tr>
                            @empty
                                <tr>
                                    <td colspan="12" align="center">Data empty</td>
                                </tr>
                            @endforelse
                          </tbody>
                      </table>
                  </div>
              </div>
          </div>
          </div>
          <!-- ============================================================== -->
          <!-- End Container fluid  -->
          <!-- ============================================================== -->
@endsection