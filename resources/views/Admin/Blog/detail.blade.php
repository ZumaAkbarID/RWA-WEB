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
                <div class="thumbnail mt-3">
                  <img src="{{ asset('/storage') }}/{{ $post->media }}" class="rounded img-fluid px-2 mx-auto d-block" width="1100" height="600" alt="{{ $post->title }} - Image">
                </div>
                <table class="table table-responsive table-hover mt-3">
                  <thead>
                    <tr>
                      <th>Field</th>
                      <th>Content</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>Title</td>
                      <td>: {{ $post->title }}</td>
                    </tr>
                    <tr>
                      <td>Slug</td>
                      <td>: {{ $post->slug }}</td>
                    </tr>
                    <tr>
                      <td>Media URL</td>
                      <td>: {{ $post->media }}</td>
                    </tr>
                    <tr>
                      <td>Status Post</td>
                      <td>: {{ $post->status }}</td>
                    </tr>
                    <tr>
                      <td>Total Visitor</td>
                      <td>: {{ number_format($post->visitor,0,',','.') }}</td>
                    </tr>
                    <tr>
                      <td>Tags</td>
                      <td>: 
                        @forelse ($tags as $item)
                          <a href="{{ route('Blog_tag', $item['slug']) }}">{{ $item['tag'] }}</a>,
                          @empty
                          No Tag
                        @endforelse  
                      </td>
                    </tr>
                    <tr>
                      <td>Details</td>
                      <td>
                        Code : {{ $detail->code }} <br> Count : {{ number_format($detail->count,0,',','.') }}
                      </td>
                    </tr>
                    <tr>
                      <td>Created At</td>
                      <td>: {{ date('H:i:s d M, Y', strtotime($post->created_at)) }}</td>
                    </tr>
                    <tr>
                      <td>Updated At</td>
                      <td>: {{ date('H:i:s d M, Y', strtotime($post->updated_at)) }}</td>
                    </tr>
                  </tbody>
                </table>

                <table class="table table-responsive table-hover mt-3">
                  <thead>
                    <tr>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Content</th>
                      <th>Your Reply Content</th>
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @forelse ($comments as $comment)
                    <tr>
                      <td>{{ $comment->name }}</td>
                      <td>{{ $comment->email }}</td>
                      <td>{{ $comment->content }}</td>
                      <td>{{ (!is_null($comment->reply_content)) ? $comment->reply_content : 'Not replied yet' }}</td>
                      <td>
                        @if ($post->status = 'private')
                        <div class="badge bg-warning">{{ $post->status }}</div>
                        @elseif($post->status = 'public')
                        <div class="badge bg-success">{{ $post->status }}</div>
                        @else
                        <div class="badge bg-info">{{ $post->status }}</div>
                        @endif
                      </td>
                    </tr>
                    @empty
                        <tr>
                          <td colspan="6" align="center">Data comment not found</td>
                        </tr>
                    @endforelse
                  </tbody>
                </table>
              </div>
          </div>
          </div>
          <!-- ============================================================== -->
          <!-- End Container fluid  -->
          <!-- ============================================================== -->
@endsection