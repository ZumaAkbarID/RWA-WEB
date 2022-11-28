@extends('Layouts.blog')

@section('blog_content')
<main class="tm-main">
  <!-- Search form -->
  @include('Blog.Inc.search')           
            
  <div class="row tm-row">
      <div class="col-12">
          <hr class="tm-hr-primary tm-mb-55">
          <img src="{{ asset('/storage') }}/{{ $post->media }}" width="1320" height="535" class="tm-mb-40 tm-img-fluid" alt="{{ $post->title }} - Image">
      </div>
  </div>
  <div class="row tm-row">
      <div class="col-lg-8 tm-post-col">
          <div class="tm-post-full">                    
              <div class="mb-4">
                  <h2 class="pt-2 tm-color-primary tm-post-title">{{ $post->title }}</h2>
                  <p class="tm-mb-40">{{ date('H:i:s d M, Y', strtotime($post->created_at)) . ' posted by ' }} <a href="{{ route('author_profile', $author->username) }}">{{  $author->name }}</a> @if(strtotime($post->created_at) !== strtotime($post->updated_at)) modified at {{ date('H:i:s d M, Y', strtotime($post->updated_at)) }} @endif</p>
                  
                    {!! $post->content !!}

                  <span class="d-block text-right tm-color-primary">
                    Tags : 
                    @forelse ($tags as $item)
                        <a href="{{ route('Blog_tag', $item['slug']) }}">{{ $item['tag'] }}</a>,
                        @empty
                        No Tag
                    @endforelse
                  </span>
              </div>
              
              <!-- Comments -->
              <div>
                  <h2 class="tm-color-primary tm-post-title">Comments</h2>
                  <hr class="tm-hr-primary tm-mb-45">

                  @forelse ($comments as $item)
                    <div class="tm-comment tm-mb-45">
                        <figure class="tm-comment-figure">
                            <img src="{{ asset('/storage') }}/blog/img/user.png" alt="Image" width="100" height="100" class="mb-2 rounded-circle img-thumbnail">
                            <figcaption class="tm-color-primary text-center">{{ $item->name }}</figcaption>
                        </figure>
                        <div>
                            <p>
                                {{ $item->content }}
                            </p>
                            <div class="d-flex justify-content-between">
                                @if (Auth::user()->id == $author->id)
                                    <a href="/dashboard/post/reply?id={{ $item->id }}" class="tm-color-primary" style="margin-right: 20px;">REPLY</a>
                                @endif
                                <span class="tm-color-primary">{{ date('H:i:s d M, Y', strtotime($item->created_at)) }}</span>
                            </div>                                                 
                        </div>                                
                    </div>

                    @if ($item->repplied == 'yes')
                    <div class="tm-comment-reply tm-mb-45">
                        <hr>
                        <div class="tm-comment">
                            <figure class="tm-comment-figure">
                                <img src="{{ asset('/storage') }}/blog/img/user.png" width="100" height="100" alt="Image" class="mb-2 rounded-circle img-thumbnail">
                                <figcaption class="tm-color-primary text-center">{{ $author->name }}</figcaption>    
                            </figure>
                            <p>
                                {{ $item->reply_content }}
                            </p>
                        </div>                                
                        <span class="d-block text-right tm-color-primary">{{ date('H:i:s d M, Y', strtotime($item->updated_at)) }}</span>
                    </div>
                    @endif
                    
                  @empty
                      No comment found <br><br><br>
                  @endforelse
                  
                  <form action="" class="mb-5 tm-comment-form">
                      <h2 class="tm-color-primary tm-post-title mb-4">Comment on this post</h2>
                      <div class="mb-4">
                          <input class="form-control rounded" name="name" type="text" placeholder="Your Name...">
                      </div>
                      <div class="mb-4">
                          <input class="form-control rounded" name="email" type="text" placeholder="Your Email Address...">
                      </div>
                      <div class="mb-4">
                          <textarea class="form-control rounded" name="message" rows="6" placeholder="Message text here..."></textarea>
                      </div>
                      <div class="text-right">
                          <button class="tm-btn tm-btn-primary tm-btn-small">Submit</button>                        
                      </div>                                
                  </form>                          
              </div>
          </div>
      </div>
      <aside class="col-lg-4 tm-aside-col">
          <div class="tm-post-sidebar">
              <hr class="mb-3 tm-hr-primary">
              <h2 class="mb-4 tm-post-title tm-color-primary">Categories</h2>
              <ul class="tm-mb-75 pl-5 tm-category-list">
                @forelse ($allTag as $item)
                    <li><a href="{{ route('Blog_tag', $item->slug) }}" class="tm-color-primary">{{ $item->tag }}</a></li>
                    @empty
                    No Tag
                @endforelse
              </ul>
              <hr class="mb-3 tm-hr-primary">
              <h2 class="tm-mb-40 tm-post-title tm-color-primary">Related Posts</h2>
              <a href="#" class="d-block tm-mb-40">
                  <figure>
                      <img src="{{ asset('/storage') }}/blog/img/img-02.jpg" alt="Image" class="mb-3 img-fluid">
                      <figcaption class="tm-color-primary">Duis mollis diam nec ex viverra scelerisque a sit</figcaption>
                  </figure>
              </a>
              <a href="#" class="d-block tm-mb-40">
                  <figure>
                      <img src="{{ asset('/storage') }}/blog/img/img-05.jpg" alt="Image" class="mb-3 img-fluid">
                      <figcaption class="tm-color-primary">Integer quis lectus eget justo ullamcorper ullamcorper</figcaption>
                  </figure>
              </a>
              <a href="#" class="d-block tm-mb-40">
                  <figure>
                      <img src="{{ asset('/storage') }}/blog/img/img-06.jpg" alt="Image" class="mb-3 img-fluid">
                      <figcaption class="tm-color-primary">Nam lobortis nunc sed faucibus commodo</figcaption>
                  </figure>
              </a>
          </div>                    
      </aside>
  </div>
  @include('Blog.Inc.footer')
</main>
@endsection