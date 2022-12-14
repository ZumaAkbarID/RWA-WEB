@extends('Layouts.main')

@section('content')
    <header class="container header active" id="home">
        <div class="header-content">
            <div class="left-header">
                <div class="h-shape"></div>
                <div class="image">
                    <img src="{{ asset('/storage') }}/main/img/me/hero.png" alt="">
                </div>
            </div>
            <div class="right-header">
                <h1 class="name">
                    Hi, I'm <span>Rahmat Wahyuma Akbar.</span>
                    A BackEnd Web Developer.
                </h1>
                <p>
                    I'm a BackEnd Web Developer, I love to create a functional of websites.
                    I am an active student at Amikom University Yogyakarta.
                    I study in informatics study program.
                </p>
                <div class="btn-con">
                    <a href="{{ route('Main_download_cv') }}" class="main-btn">
                        <span class="btn-text">Download CV</span>
                        <span class="btn-icon"><i class="fas fa-download"></i></span>
                    </a>
                </div>
            </div>
        </div>
    </header>

    <main>
        <section class="container about" id="about">
            <div class="main-title">
                <h2>About <span>me</span><span class="bg-text">my stats</span></h2>
            </div>
            <div class="about-container">
                <div class="left-about">
                    <h4>Information About me</h4>
                    <p>
                        I am an enthusiastic and highly motivated informatics student with leadership skills, initiative and
                        looking for new challenges. Experienced in various internal and external campus organizations.
                    </p>
                    <div class="btn-con">
                        <a href="{{ route('Main_download_cv') }}" class="main-btn">
                            <span class="btn-text">Download CV</span>
                            <span class="btn-icon"><i class="fas fa-download"></i></span>
                        </a>
                    </div>
                </div>
                <div class="right-about">
                    <div class="about-item">
                        <div class="abt-text">
                            <p class="large-text">1+</p>
                            <p class="small-text">Projects <br /> Completed</p>
                        </div>
                    </div>
                    <div class="about-item">
                        <div class="abt-text">
                            <p class="large-text">0+</p>
                            <p class="small-text">Years of <br /> experience</p>
                        </div>
                    </div>
                    <div class="about-item">
                        <div class="abt-text">
                            <p class="large-text">0+</p>
                            <p class="small-text">Happy <br /> Clients</p>
                        </div>
                    </div>
                    <div class="about-item">
                        <div class="abt-text">
                            <p class="large-text">0+</p>
                            <p class="small-text">Customer <br /> reviews</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="about-stats">
                <h4 class="stat-title">My Skills</h4>
                <div class="progress-bars">
                    <div class="progress-bar">
                        <p class="prog-title">PHP</p>
                        <div class="progress-con">
                            <p class="prog-text"></p> {{-- Ini bisa di isi teks --}}
                            <div class="progress">
                                <span class="skill"></span>
                            </div>
                        </div>
                    </div>
                    <div class="progress-bar">
                        <p class="prog-title">javascript</p>
                        <div class="progress-con">
                            <p class="prog-text"></p>
                            <div class="progress">
                                <span class="skill"></span>
                            </div>
                        </div>
                    </div>
                    <div class="progress-bar">
                        <p class="prog-title">nodejs</p>
                        <div class="progress-con">
                            <p class="prog-text"></p>
                            <div class="progress">
                                <span class="skill"></span>
                            </div>
                        </div>
                    </div>
                    <div class="progress-bar">
                        <p class="prog-title">c++</p>
                        <div class="progress-con">
                            <p class="prog-text"></p>
                            <div class="progress">
                                <span class="skill"></span>
                            </div>
                        </div>
                    </div>
                    <div class="progress-bar">
                        <p class="prog-title">laravel</p>
                        <div class="progress-con">
                            <p class="prog-text"></p>
                            <div class="progress">
                                <span class="skill"></span>
                            </div>
                        </div>
                    </div>
                    <div class="progress-bar">
                        <p class="prog-title">Python</p>
                        <div class="progress-con">
                            <p class="prog-text"></p>
                            <div class="progress">
                                <span class="skill"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- <h4 class="stat-title">My Timeline</h4>
      <div class="timeline">
          <div class="timeline-item">
              <div class="tl-icon">
                  <i class="fas fa-briefcase"></i>
              </div>
              <p class="tl-duration">2010 - present</p>
              <h5>Web Developer<span> - Vircrosoft</span></h5>
              <p>
                  Lorem ipsum dolor sit amet consectetur adipisicing elit. Saepe quasi vero fugit.
              </p>
          </div>
          <div class="timeline-item">
              <div class="tl-icon">
                  <i class="fas fa-briefcase"></i>
              </div>
              <p class="tl-duration">2008 - 2011</p>
              <h5>Software Engineer<span> - Boogle, Inc.</span></h5>
              <p>
                  Lorem ipsum dolor sit amet consectetur adipisicing elit. Saepe quasi vero fugit.
              </p>
          </div>
          <div class="timeline-item">
              <div class="tl-icon">
                  <i class="fas fa-briefcase"></i>
              </div>
              <p class="tl-duration">2016 - 2017</p>
              <h5>C++ Programmer<span> - Slime Tech</span></h5>
              <p>
                  Lorem ipsum dolor sit amet consectetur adipisicing elit. Saepe quasi vero fugit.
              </p>
          </div>
          <div class="timeline-item">
              <div class="tl-icon">
                  <i class="fas fa-briefcase"></i>
              </div>
              <p class="tl-duration">2009 - 2013</p>
              <h5>Business Degree<span> - Sussex University</span></h5>
              <p>
                  Lorem ipsum dolor sit amet consectetur adipisicing elit. Saepe quasi vero fugit.
              </p>
          </div>
          <div class="timeline-item">
              <div class="tl-icon">
                  <i class="fas fa-briefcase"></i>
              </div>
              <p class="tl-duration">2013 - 2016</p>
              <h5>Computer Science Degree<span> - Brookes University</span></h5>
              <p>
                  Lorem ipsum dolor sit amet consectetur adipisicing elit. Saepe quasi vero fugit.
              </p>
          </div>
          <div class="timeline-item">
              <div class="tl-icon">
                  <i class="fas fa-briefcase"></i>
              </div>
              <p class="tl-duration">2017 - present</p>
              <h5>3d Animation<span> - Brighton University</span></h5>
              <p>
                  Lorem ipsum dolor sit amet consectetur adipisicing elit. Saepe quasi vero fugit.
              </p>
          </div>
      </div> --}}

            <h4 class="stat-title">My Awards</h4>
            <div class="timeline">

                <div class="timeline-item">
                    <div class="tl-icon">
                        <i class="fas fa-briefcase"></i>
                    </div>
                    <p class="tl-duration">2022</p>
                    <h5>Champion 1 of Web Technologies<span> - Districts of Jepara</span></h5>
                    <p>
                        Create FrontEnd, CRUD, and Functional Member Admin.
                    </p>
                </div>

                <div class="timeline-item">
                    <div class="tl-icon">
                        <i class="fas fa-briefcase"></i>
                    </div>
                    <p class="tl-duration">2022</p>
                    <h5>Web Technologies<span> - Province of Central Java</span></h5>
                    <p>
                        2 Days work.
                    </p>
                </div>

            </div>

        </section>
        <section class="container" id="portfolio">
            <div class="main-title">
                <h2>My <span>Portfolio</span><span class="bg-text">My Work</span></h2>
            </div>
            <p class="port-text">
                Here is some of my work that I've done in various programming languages.
            </p>
            <div class="portfolios">

                <div class="portfolio-item">
                    <div class="image">
                        <img src="{{ asset('/storage') }}/main/img/project/softrental.png" alt="">
                    </div>
                    <div class="hover-items">
                        <h3>Source Of Fortune</h3>
                        <div class="icons">
                            <a href="https://github.com/ZumaAkbarID/VehiRent-Web" target="_blank" class="icon">
                                <i class="fab fa-github"></i>
                            </a>
                            <a href="https://ukk-smk-2022.rahmatwahyumaakbar.com/" target="_blank" class="icon">
                                <i class="fas fa-globe"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="portfolio-item">
                    <div class="image">
                        <img src="https://i.ibb.co/wz6Zy7b/Screenshot-21.png" alt="">
                    </div>
                    <div class="hover-items">
                        <h3>SiMemar - Sistem Member Area</h3>
                        <div class="icons">
                            <a href="https://github.com/ZumaAkbarID/SiMemar" target="_blank" class="icon">
                                <i class="fab fa-github"></i>
                            </a>
                            <a href="https://simemar.rahmatwahyumaakbar.com/" target="_blank" class="icon">
                                <i class="fas fa-globe"></i>
                            </a>
                        </div>
                    </div>
                </div>

            </div>
        </section>

        {{-- 
    <section class="container" id="blogs">
      <div class="blogs-content">
          <div class="main-title">
              <h2>My <span>Blogs</span><span class="bg-text">My Blogs</span></h2>

              <p class="blog-text" style="margin-top: 20px;">
                  <a href="{{ route('Blog_index') }}">All Blog</a>
              </p>
              
          </div>


          <div class="blogs">  
            
              <div class="blog">
                  <img src="{{ asset('/storage') }}/main/img/port6.jpg" alt="">
                  <div class="blog-text">
                      <h4>
                          How to Create Your Own Website
                      </h4>
                      <p>
                          Lorem ipsum dolor sit, amet consectetur adipisicing elit. 
                          Doloribus natus voluptas, eos obcaecati recusandae amet?
                      </p>
                  </div>
              </div>
              
          </div>
      </div>
  </section>
    --}}

        <section class="container contact" id="contact">
            <div class="contact-container">
                <div class="main-title">
                    <h2>Contact <span>Me</span><span class="bg-text">Contact</span></h2>
                </div>
                <div class="contact-content-con">
                    <div class="left-contact">
                        <h4>Contact me here</h4>
                        <p>
                            If you have questions, or have a need with me, please contact the contact below.
                        </p>
                        <div class="contact-info">
                            <div class="contact-item">
                                <div class="icon">
                                    <i class="fas fa-map-marker-alt"></i>
                                    <span>Location</span>
                                </div>
                                <p>
                                    Depok, Sleman, Yogyakarta
                                </p>
                            </div>
                            <div class="contact-item">
                                <div class="icon">
                                    <i class="fas fa-envelope"></i>
                                    <span>Email</span>
                                </div>
                                <p>
                                    <span> rahmatwahyumaakbar@gmail.com</span>
                                </p>
                            </div>
                            <div class="contact-item">
                                <div class="icon">
                                    <i class="fas fa-user-graduate"></i>
                                    <span>Education</span>
                                </div>
                                <p>
                                    <span> AMIKOM University, Yogyakarta</span>
                                </p>
                            </div>
                            <div class="contact-item">
                                <div class="icon">
                                    <i class="fas fa-user-graduate"></i>
                                    <span>Mobile Number</span>
                                </div>
                                <p>
                                    <span> +6281225389903</span>
                                </p>
                            </div>
                            <div class="contact-item">
                                <div class="icon">
                                    <i class="fas fa-globe-africa"></i>
                                    <span>Languages</span>
                                </div>
                                <p>
                                    <span> Indonesian, English, Javanese</span>
                                </p>
                            </div>
                        </div>
                        <div class="contact-icons">
                            <div class="contact-icon">
                                <a href="https://facebook.com/zuma.akbar.96" target="_blank">
                                    <i class="fab fa-facebook-f"></i>
                                </a>
                                <a href="https://twitter.com/zuma_akbar" target="_blank">
                                    <i class="fab fa-twitter"></i>
                                </a>
                                <a href="https://instagram.com/zuma.akbar" target="_blank">
                                    <i class="fab fa-instagram"></i>
                                </a>
                                <a href="https://github.com/ZumaAkbarID" target="_blank">
                                    <i class="fab fa-github"></i>
                                </a>
                                <a href="https://www.linkedin.com/in/rahmat-wahyuma-akbar-933020251/" target="_blank">
                                    <i class="fab fa-linkedin-in"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="right-contact">
                        <form action="" class="contact-form">
                            <div class="input-control i-c-2">
                                <input type="text" required placeholder="YOUR NAME">
                                <input type="email" required placeholder="YOUR EMAIL">
                            </div>
                            <div class="input-control">
                                <input type="text" required placeholder="ENTER SUBJECT">
                            </div>
                            <div class="input-control">
                                <textarea name="" id="" cols="15" rows="8" placeholder="Message Here..."></textarea>
                            </div>
                            <div class="submit-btn">
                                <a href="/sendmsg" class="main-btn">
                                    <span class="btn-text">Send Message</span>
                                    <span class="btn-icon"><i class="fas fa-paper-plane"></i></span>
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
