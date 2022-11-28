<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>{{ $title }}</title>
	<link rel="stylesheet" href="{{ asset('/storage') }}/blog/fontawesome/css/all.min.css"> <!-- https://fontawesome.com/ -->
	<link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro&display=swap" rel="stylesheet"> <!-- https://fonts.google.com/ -->
    <link href="{{ asset('/storage') }}/blog/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('/storage') }}/blog/css/xtra-blog.css" rel="stylesheet">

</head>
<body>
	<header class="tm-header" id="tm-header">
        <div class="tm-header-wrapper">
            <button class="navbar-toggler" type="button" aria-label="Toggle navigation">
                <i class="fas fa-bars"></i>
            </button>
            <div class="tm-site-header">
                <div class="mb-3 mx-auto tm-site-logo"><i class="fas fa-times fa-2x"></i></div>            
                <h1 class="text-center">RWA Blog</h1>
            </div>
            <nav class="tm-nav" id="tm-nav">            
                <ul>
                    <li class="tm-nav-item active"><a href="{{ url('/') }}" class="tm-nav-link">
                        <i class="fas fa-home"></i>
                        Main Website
                    </a>
                  </li>
                    <li class="tm-nav-item"><a href="{{ route('Blog_index') }}" class="tm-nav-link">
                        <i class="fas fa-book-reader"></i>
                        Main Blog
                    </a>
                  </li>
                </ul>
            </nav>
            <div class="tm-mb-65">
                <a rel="nofollow" href="https://facebook.com/zuma.akbar.96" target="_blank" class="tm-social-link">
                    <i class="fab fa-facebook tm-social-icon"></i>
                </a>
                <a href="https://twitter.com/zuma_akbar" target="_blank" class="tm-social-link">
                    <i class="fab fa-twitter tm-social-icon"></i>
                </a>
                <a href="https://instagram.com/zuma.akbar" target="_blank" class="tm-social-link">
                    <i class="fab fa-instagram tm-social-icon"></i>
                </a>
                <a href="https://www.linkedin.com/in/rahmat-wahyuma-akbar-933020251/" target="_blank" class="tm-social-link">
                    <i class="fab fa-linkedin tm-social-icon"></i>
                </a>
            </div>
            {{-- <p class="tm-mb-80 pr-5 text-white">
                unused text
            </p> --}}
        </div>
    </header>
    <div class="container-fluid">
        @yield('blog_content')
    </div>
    <script src="{{ asset('/storage') }}/blog/js/jquery.min.js"></script>
    <script src="{{ asset('/storage') }}/blog/js/templatemo-script.js"></script>
</body>
</html>