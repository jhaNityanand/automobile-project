
@include("layout-2.top")

<body class="template-color-1">
    <div class="main-wrapper">
        <br>
        <!-- Begin Uren's Breadcrumb Area -->
        <div class="breadcrumb-area">
            <div class="container">
                <div class="breadcrumb-content">
                    <h2>About Us</h2>
                </div>
            </div>
        </div>
        <!-- Uren's Breadcrumb Area End Here -->
        <!-- Begin Uren's About Us Area -->
        <div class="about-us-area">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-6 col-md-5">
                        <div class="overview-img text-center img-hover_effect">
                            <a href="#">
                                <img class="img-full" src="{{url('public/public/assets/images/about-us/1.jpg')}}" alt="Uren's About Us Image">
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-7 d-flex align-items-center">
                        <div class="overview-content">
                            <h2>Welcome To <span>Auto-Part's</span> Store!</h2>
                            <p class="short_desc">We Provide Lorem ipsum, dolor sit amet consectetur adipisicing elit.
                                Repudiandae nisi fuga facilis, consequuntur, maiores eveniet voluptatum, omnis possimus
                                temporibus aspernatur nobis animi in exercitationem vitae nulla! Adipisci ullam illum quisquam.
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolorem, nulla veniam? Magni aliquid
                                asperiores magnam. Veniam ex tenetur.</p>
                            <div class="uren-about-us_btn-area">
                                <a class="about-us_btn" href="{{url('/')}}">Shop Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Uren's About Us Area End Here -->

        <!-- Begin Uren's Project Countdown Area -->
        <div class="project-count-area">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="single-count text-center">
                            <div class="count-icon">
                                <span class="far fa-user"></span>
                            </div>
                            <div class="count-title">
                                <h2 class="count">{{ $view3 }}</h2>
                                <span>Total Users</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="single-count text-center">
                            <div class="count-icon">
                                <span class="fas fa-cart-arrow-down"></span>
                            </div>
                            <div class="count-title">
                                <h2 class="count">{{ $view1 }}</h2>
                                <span>Total Products</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="single-count text-center">
                            <div class="count-icon">
                                <span class="fas fa-cart-arrow-down"></span>
                            </div>
                            <div class="count-title">
                                <h2 class="count">{{ $view2 }}</h2>
                                <span>Total Orders</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="single-count text-center">
                            <div class="count-icon">
                                <span class="ion-happy-outline"></span>
                            </div>
                            <div class="count-title">
                                <h2 class="count">{{ $view3 }}</h2>
                                <span>Happy Customer</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Uren's Project Countdown Area End Here -->

        <!-- Begin Uren's Team Area -->
        <div class="team-area">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="section_title-2">
                            <h3>Our Team</h3>
                        </div>
                    </div>
                </div> <!-- section title end -->
                <div class="row">
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="team-member">
                            <div class="team-thumb img-hover_effect">
                                <a href="#">
                                    <img src="{{url('public/public/assets/images/about-us/team/1.jpg')}}" alt="Our Team Member">
                                </a>
                            </div>
                            <div class="team-content text-center">
                                <h3>Edwin Adams</h3>
                                <p>IT Expert</p>
                                <a href="#">info@example.com</a>
                                <div class="uren-social_link">
                                    <ul>
                                        <li class="facebook">
                                            <a href="https://www.facebook.com/" data-toggle="tooltip" target="_blank" title="Facebook">
                                                <i class="fab fa-facebook"></i>
                                            </a>
                                        </li>
                                        <li class="twitter">
                                            <a href="https://twitter.com/" data-toggle="tooltip" target="_blank" title="Twitter">
                                                <i class="fab fa-twitter-square"></i>
                                            </a>
                                        </li>

                                        <li class="instagram">
                                            <a href="https://rss.com/" data-toggle="tooltip" target="_blank" title="Instagram">
                                                <i class="fab fa-instagram"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div> <!-- end single team member -->

                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="team-member">
                            <div class="team-thumb img-hover_effect">
                                <a href="#">
                                    <img src="{{url('public/public/assets/images/about-us/team/3.jpg')}}" alt="Our Team Member">
                                </a>
                            </div>
                            <div class="team-content text-center">
                                <h3>Edvin Adams</h3>
                                <p>Content Writer</p>
                                <a href="javascript:void(0)">info@example.com</a>
                                <div class="uren-social_link">
                                    <ul>
                                        <li class="facebook">
                                            <a href="https://www.facebook.com/" data-toggle="tooltip" target="_blank" title="Facebook">
                                                <i class="fab fa-facebook"></i>
                                            </a>
                                        </li>
                                        <li class="twitter">
                                            <a href="https://twitter.com/" data-toggle="tooltip" target="_blank" title="Twitter">
                                                <i class="fab fa-twitter-square"></i>
                                            </a>
                                        </li>

                                        <li class="instagram">
                                            <a href="https://rss.com/" data-toggle="tooltip" target="_blank" title="Instagram">
                                                <i class="fab fa-instagram"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div> <!-- end single team member -->
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="team-member">
                            <div class="team-thumb img-hover_effect">
                                <a href="#">
                                    <img src="{{url('public/public/assets/images/about-us/team/4.jpg')}}" alt="Our Team Member">
                                </a>
                            </div>
                            <div class="team-content text-center">
                                <h3>Eddy Adams</h3>
                                <p>Marketing officer</p>
                                <a href="#">info@example.com</a>
                                <div class="uren-social_link">
                                    <ul>
                                        <li class="facebook">
                                            <a href="https://www.facebook.com/" data-toggle="tooltip" target="_blank" title="Facebook">
                                                <i class="fab fa-facebook"></i>
                                            </a>
                                        </li>
                                        <li class="twitter">
                                            <a href="https://twitter.com/" data-toggle="tooltip" target="_blank" title="Twitter">
                                                <i class="fab fa-twitter-square"></i>
                                            </a>
                                        </li>

                                        <li class="instagram">
                                            <a href="https://rss.com/" data-toggle="tooltip" target="_blank" title="Instagram">
                                                <i class="fab fa-instagram"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div> <!-- end single team member -->
                </div>
            </div>
        </div>
        <!-- Uren's Team Area End Here -->
    </div>

    @include("layout-2.script")

</body>
</html>
