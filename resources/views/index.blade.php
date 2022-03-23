@extends('layouts.web.app')

@push('css')
@endpush

@section('content')
    <main id="main">
        <!-- ======= About Section ======= -->
        @if($home_page_data['about_status']==1)
            <section id="about" class="about">
                <div class="container">
                    <div class="section-title">
                        <span>{{ $home_page_data['about_heading'] }}</span>
                        <h2>{{ $home_page_data['about_heading'] }}</h2>
                        <!-- <p>Sit sint consectetur velit quisquam cupiditate impedit suscipit alias</p> -->
                    </div>
                    <div class="row">
                        {{-- {!! $home_page_data['about_content'] !!} --}}
                        <div class="col-lg-6 pt-4 pt-lg-0 content">
                            <p class="fst-italic">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                                labore et dolore magna aliqua.
                            </p>
                            <ul>
                                <li><i class="bi bi-check-circle"></i> Ullamco laboris nisi ut aliquip ex ea commodo
                                    consequat</li>
                                <li><i class="bi bi-check-circle"></i> Duis aute irure dolor in reprehenderit in voluptate
                                    velit</li>
                                <li><i class="bi bi-check-circle"></i> Ullamco laboris nisi ut aliquip ex ea commodo
                                    consequat. Duis aute irure dolor in reprehenderit in voluptate trideta storacalaperda
                                </li>
                            </ul>
                            <p>
                                Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in
                                reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
                            </p>
                        </div>
                        <div class="col-lg-6 pt-4 pt-lg-0 content">
                            <p class="fst-italic">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                                labore et dolore magna aliqua.
                            </p>
                            <ul>
                                <li><i class="bi bi-check-circle"></i> Ullamco laboris nisi ut aliquip ex ea commodo
                                    consequat</li>
                                <li><i class="bi bi-check-circle"></i> Duis aute irure dolor in reprehenderit in voluptate
                                    velit</li>
                                <li><i class="bi bi-check-circle"></i> Ullamco laboris nisi ut aliquip ex ea commodo
                                    consequat. Duis aute irure dolor in reprehenderit in voluptate trideta storacalaperda
                                </li>
                            </ul>
                            <p>
                                Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in
                                reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
                            </p>
                        </div>
                    </div>

                </div>
            </section>
        @endif
        <!-- End About Section -->

        <!-- search and compaRE SEC -->
        @if($home_page_data['home_banner_status']==1)
            <section class="teass" id="search_div">
                <!-- Cards container -->
                <div class="container text-center">
                    <div class="section-title">
                        <span>{!! $home_page_data['banner_heading'] !!}</span>
                    </div>
                    <div class="container d-flex justify-content-center">
                        <div class="mt-4">
                            <div class="process-container">
                                <div class="workflow-item d-flex flex-nowrap bg-white" title="Start your agent search here">
                                    <div class="d-flex align-items-center justify-content-center">
                                        <div class="text-center text-dark p-3">
                                                <h2 class="text-red tracked" data-galabel="h2-start-click">{!! $home_page_data['top_sec_heading'] !!}</h2>
                                                <div class="information col-12">
                                                    <h3>{!! $home_page_data['top_sec_title'] !!}</h3>
                                                    <p class="byline medium">{!! $home_page_data['top_sec_description'] !!}</p>
                                                </div>
                                        </div>
                                    </div>
                                    <div class="image laf-lazyload-image lazy-load-fade-overlay loaded image-fluid" data-lazyimgtype="background" style="background-image: url(&quot;https://static.localagentfinder.com.au/img/homepage/desk-start@1x-min.png&quot;);"></div>
                                </div>
                                <div class="workflow-item d-flex flex-nowrap bg-white" title="Compare intervierews">
                                    <div class="d-flex align-items-center justify-content-center order-2">
                                        <div class="text-center text-dark p-3">
                                            <h2 class="text-red tracked" data-galabel="h2-compare-click">{!! $home_page_data['middle_sec_heading'] !!}</h2>
                                            <div class="information col-12">
                                                    <h3>{!! $home_page_data['middle_sec_title'] !!}</h3>
                                                    <p class="byline medium">{!! $home_page_data['middle_sec_description'] !!}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="image laf-lazyload-image order-1 lazy-load-fade-overlay loaded" data-lazyimgtype="background" style="background-image: url(&quot;https://static.localagentfinder.com.au/img/homepage/desk-compare@1x-min.png&quot;);"></div>
                                </div>
                                <div class="workflow-item d-flex flex-nowrap bg-white" title="Connect with the right agents for you">
                                    <div class="d-flex align-items-center justify-content-center">
                                        <div class="text-center text-dark p-3">
                                            <h2 class="text-red tracked" data-galabel="h2-connect-click">{!! $home_page_data['middle_sec_heading'] !!}</h2>
                                            <div class="information col-12">
                                                    <h3>{!! $home_page_data['middle_sec_title'] !!}</h3>
                                                    <p class="byline medium">{!! $home_page_data['middle_sec_description'] !!}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="image laf-lazyload-image lazy-load-fade-overlay loaded" data-lazyimgtype="background" style="background-image: url(&quot;https://static.localagentfinder.com.au/img/homepage/desk-connect@1x-min.png&quot;);"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        @endif

        <!-- ======= Testimonials Section ======= -->
        @if($home_page_data['home_testimonial_status']==1)
            <section id="testimonials" class="testimonials ">
                <div class="container">
                    <div class="section-title">
                        <span>{!! $home_page_data['home_testimonial_title'] !!}</span>
                        <h2>{!! $home_page_data['home_testimonial_title'] !!}</h2>
                        <p>{!! $home_page_data['home_testimonial_subtitle'] !!}</p>
                    </div>

                    <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="100">
                        <div class="swiper-wrapper">
                            @foreach ($testimonials as $testimonial)
                                <div class="swiper-slide">
                                    <div class="testimonial-item">
                                        <i class="bx bxs-quote-alt-left quote-icon-left"></i>{!! $testimonial->comment !!}<i class="bx bxs-quote-alt-right quote-icon-right"></i>
                                        <img src="{{ asset('public/admin/assets/images/testimonials/') }}/{{ $testimonial->image }}" class="testimonial-img" alt="">
                                        <h3>{{ $testimonial->name }}</h3>
                                        <h4>{{ $testimonial->designation }}</h4>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="swiper-pagination"></div>
                    </div>
                </div>
            </section>
        @endif
        <!-- End Testimonials Section -->

        <!-- advantages section -->
        @if($home_page_data['home_mock_advantage_status']==1)
            <section id="services" class="services section-bg">
                <div class="container">
                    <div class="section-title">
                        <span>{!! $home_page_data['home_mock_advantage_title'] !!}</span>
                        <h2>{!! $home_page_data['home_mock_advantage_title'] !!}</h2>
                        <p>{!! $home_page_data['home_mock_advantage_subtitle'] !!}</p>
                    </div>

                    <div class="row">
                        @foreach ($mock_advantages as $mock_advantage)
                            <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4">
                                <div class="icon-box">
                                    <div class="icon">
                                        <img src="{{ asset('public/admin/assets/images/advantage') }}/{{ $mock_advantage->image }}" alt="stress" class="img-fluid">
                                    </div>
                                    <h4><a href="">{{ $mock_advantage->title }}</a></h4>
                                    <p>{!! $mock_advantage->description !!}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>
        @endif

        <!-- ======= Counts Section ======= -->
        @if($home_page_data['home_mock_advantage_counter_status']==1)
            <section id="counts" class="counts">
                <div class="container">
                    <div class="row counters">
                        <div class="col-lg-3 col-6 text-center">
                            <span data-purecounter-start="0" data-purecounter-end="{!! $home_page_data['home_mock_advantage_bottom_first_counter'] !!}" data-purecounter-duration="1"
                                class="purecounter"></span>
                            <p>{!! $home_page_data['home_mock_advantage_bottom_first_label'] !!}</p>
                        </div>

                        <div class="col-lg-3 col-6 text-center">
                            <span data-purecounter-start="0" data-purecounter-end="{!! $home_page_data['home_mock_advantage_bottom_second_counter'] !!}" data-purecounter-duration="1"
                                class="purecounter"></span>
                            <p>{!! $home_page_data['home_mock_advantage_bottom_second_label'] !!}</p>
                        </div>

                        <div class="col-lg-3 col-6 text-center">
                            <span data-purecounter-start="0" data-purecounter-end="{!! $home_page_data['home_mock_advantage_bottom_third_counter'] !!}" data-purecounter-duration="1"
                                class="purecounter"></span>
                            <p>{!! $home_page_data['home_mock_advantage_bottom_third_label'] !!}</p>
                        </div>

                        <div class="col-lg-3 col-6 text-center">
                            <span data-purecounter-start="0" data-purecounter-end="{!! $home_page_data['home_mock_advantage_bottom_fourth_counter'] !!}" data-purecounter-duration="1"
                                class="purecounter"></span>
                            <p>{!! $home_page_data['home_mock_advantage_bottom_fourth_label'] !!}</p>
                        </div>
                    </div>
                </div>
            </section>
        @endif
        <!-- End Counts Section -->

        <!-- ======= Services Section ======= -->
        @if($home_page_data['home_real_status']==1)
            <section id="services" class="services ">
                <div class="container">
                    <div class="section-title">
                        <span>{!! $home_page_data['home_real_title'] !!}</span>
                        <h2>{!! $home_page_data['home_real_title'] !!}</h2>
                        <p>{!! $home_page_data['home_real_description'] !!}</p>
                    </div>

                    <div class="row">
                        @foreach ($services as $service)
                            <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
                                <div class="icon-box">
                                    <div class="icon"><i class="bx bxl-dribbble"></i></div>
                                    <h4><a href="">{{ $service->name }}</a></h4>
                                    <p>{!! $service->description !!}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>
        @endif
        <!-- End Services Section -->

        <!-- ======= Sign-up Section ======= -->
        @if($home_page_data['home_signup_status']==1)
            <section id="cta" class="cta">
                <div class="container">
                    <div class="text-center">
                        <h3>{{ $home_page_data['home_signup_title'] }}</h3>
                        <p>{{ $home_page_data['home_signup_description'] }}</p>
                        <a class="cta-btn" href="#">{{ $home_page_data['home_signup_btn_label'] }}</a>
                    </div>
                </div>
            </section>
        @endif
        <!-- End sign-up Section -->

        <!-- how it works section -->
        @if($home_page_data['home_how_status']==1)
            <section id="portfolio" class="section-bg">
                <div class="container">
                    <div class="section-title">
                        <span>{{ $home_page_data['home_how_title'] }}</span>
                        <h2>{{ $home_page_data['home_how_title'] }}</h2>
                        <p>{{ $home_page_data['home_how_description'] }}</p>
                    </div>
                    @php($bool = 1)
                    @php($counter = 0)
                    @foreach ($work_processes as $key=>$work_process)
                        @php($counter++)
                        <!--first section-->
                        @if($bool)
                            @php($bool=0)
                            <div class="row align-items-center how-it-works d-flex">
                                <div class="col-2 text-center bottom d-inline-flex justify-content-center align-items-center">
                                    <div class="circle font-weight-bold">{{ $counter }}</div>
                                </div>
                                <div class="col-6">
                                    <h5>{{ $work_process->title }}</h5>
                                    <p>{!! $work_process->description !!}</p>
                                </div>
                            </div>
                            <!--path between 1-2-->
                            <div class="row timeline">
                                <div class="col-2">
                                    <div class="corner top-right"></div>
                                </div>
                                <div class="col-8">
                                    <hr />
                                </div>
                                <div class="col-2">
                                    <div class="corner left-bottom"></div>
                                </div>
                            </div>
                        @else 
                            @php($bool=1)
                            <!--second section-->
                            <div class="row align-items-center justify-content-end how-it-works d-flex">
                                <div class="col-6 text-right">
                                    <h5>{{ $work_process->title }}</h5>
                                    <p>{!! $work_process->description !!}</p>
                                </div>
                                <div class="col-2 text-center full d-inline-flex justify-content-center align-items-center">
                                    <div class="circle font-weight-bold">{{ $counter }}</div>
                                </div>
                            </div>
                            
                            <!--path between 2-3-->
                            <div class="row timeline">
                                <div class="col-2">
                                    <div class="corner right-bottom"></div>
                                </div>
                                <div class="col-8">
                                    <hr />
                                </div>
                                <div class="col-2">
                                    <div class="corner top-left"></div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </section>
        @endif
        <!-- time line section ends -->

        <!-- pricing section ------->
        @if($home_page_data['home_pricing_status']==1)
            <section class="prcing" id="team">
                <!-- Cards container -->
                <div class="container text-center">
                    <div class="section-title">
                        <span>PRICING </span>
                        <h2>PRICING </h2>
                    </div>
                    <div class="row">
                        @foreach ($packages as $package)
                            <div class="col-lg-4 col-md-4 col-sm-10 pb-4 d-block ">
                                <div class="pricing-item" style="box-shadow: 0px 0px 30px -7px rgba(0,0,0,0.29);">
                                    <!-- Indicator of subscription type -->
                                    <div class="pt-4 pb-3" style="letter-spacing: 2px">
                                        <h4>{{ $package->name }}</h4>
                                    </div>
                                    <!-- Price class -->
                                    <div class="pricing-price pb-1 ">
                                        <h1 style="font-weight: 1000; font-size: 3.5em;">
                                            <span style="   font-size: 20px;">€</span>{{ $package->price }}
                                        </h1>
                                    </div>
                                    <!-- Perks of said subscription -->
                                    <div class="pricing-description">
                                        {!! $package->description !!}
                                    </div>
                                    <!-- Button -->
                                    <div class="pricing-button pb-4">
                                        <button type="button" class="btn btn-lg btn-primary w-75">Get started</button>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>
        @endif
        <!-- pricing section ends -->

        <!-- ======= Team Section ======= -->
        @if($home_page_data['home_team_status']==1)
            <section class="team section-bg" id="teams">
                <div class="container">
                    <div class="section-title">
                        <span>{{ $home_page_data['home_team_title'] }}</span>
                        <h2>{{ $home_page_data['home_team_title'] }}</h2>
                        <p>{{ $home_page_data['home_team_description'] }}</p>
                    </div>

                    <div class="row">
                        @foreach ($teams as $team)
                            <div class="col-lg-4 col-md-4 d-flex align-items-stretch">
                                <div class="member">
                                    @if($team->image)
                                        <img src="{{ asset('public/admin/assets/images/team') }}/{{ $team->image }}" alt="">
                                    @else 
                                        <img src="{{ asset('public/admin/assets/images/team/no-photo1.jpg') }}" alt="">
                                    @endif
                                    <h4>{{ $team->first_name }} {{ $team->last_name }}</h4>
                                    <span>{{ $team->designation }}</span>
                                    <p>{!! $team->description !!}</p>
                                    <div class="social">
                                        <a href="{{ $team->twitter_link }}" target="_blank"><i class="bi bi-twitter"></i></a>
                                        <a href="{{ $team->facebook_link }}" target="_blank"><i class="bi bi-facebook"></i></a>
                                        <a href="{{ $team->instagram_link }}" target="_blank"><i class="bi bi-instagram"></i></a>
                                        <a href="{{ $team->linkedin_link }}" target="_blank"><i class="bi bi-linkedin"></i></a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>
        @endif
        <!-- End Team Section -->

        <!-- ======= help Section ======= -->
        @if($home_page_data['home_help_status']==1)
            <section id="services" class="services ">
                <div class="container">
                    <div class="section-title">
                        <span>{{ $home_page_data['home_help_title'] }}</span>
                        <h2>{{ $home_page_data['home_help_title'] }}</h2>
                        <p>{{ $home_page_data['home_help_description'] }}</p>
                    </div>

                    <div class="row">
                        @foreach ($helps as $help)
                            <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
                                <div class="icon-box">
                                    <div class="icon"><i class="bx bxl-dribbble"></i></div>
                                    <h4><a href="">{{ $help->title }}</a></h4>
                                    <p>{!! \Illuminate\Support\Str::limit($help->description, 100) !!}</p>
                                    <p><a href="{{ route('help.show', $help->slug) }}">Read more</a></p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>
        @endif
        <!-- End help Section -->

        <!-- ======= Contact Section ======= -->
        @if($home_page_data['home_contact_status']==1)
            <section id="contact" class="contact">
                <div class="container">
                    <div class="section-title">
                        <span>{{ $home_page_data['home_contact_title'] }}</span>
                        <h2>{{ $home_page_data['home_contact_title'] }}</h2>
                        <p>{{ $home_page_data['home_contact_description'] }}</p>
                    </div>

                    <div class="row">
                        <div class="col-lg-5 d-flex align-items-stretch">
                            <div class="info">
                                <div class="address">
                                    <i class="bi bi-geo-alt"></i>
                                    <h4>Location:</h4>
                                    <p>{{ $home_page_data['contact_address'] }}</p>
                                </div>

                                <div class="email">
                                    <i class="bi bi-envelope"></i>
                                    <h4>Email:</h4>
                                    <p>{{ $home_page_data['contact_email'] }}</p>
                                </div>

                                <div class="phone">
                                    <i class="bi bi-phone"></i>
                                    <h4>Call:</h4>
                                    <p>{{ $home_page_data['contact_phone'] }}</p>
                                </div>

                                <iframe src="{{ $home_page_data['contact_map'] }}" frameborder="0" style="border:0; width: 100%; height: 290px;" allowfullscreen></iframe>
                            </div>

                        </div>

                        <div class="col-lg-7 mt-5 mt-lg-0 d-flex align-items-stretch">
                            <form action="forms/contact.php" method="post" role="form" class="php-email-form">
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="name">Your Name</label>
                                        <input type="text" name="name" class="form-control" id="name" required>
                                    </div>
                                    <div class="form-group col-md-6 mt-3 mt-md-0">
                                        <label for="name">Your Email</label>
                                        <input type="email" class="form-control" name="email" id="email" required>
                                    </div>
                                </div>
                                <div class="form-group mt-3">
                                    <label for="name">Subject</label>
                                    <input type="text" class="form-control" name="subject" id="subject" required>
                                </div>
                                <div class="form-group mt-3">
                                    <label for="name">Message</label>
                                    <textarea class="form-control" name="message" rows="10" required></textarea>
                                </div>
                                <div class="my-3">
                                    <div class="loading">Loading</div>
                                    <div class="error-message"></div>
                                    <div class="sent-message">Your message has been sent. Thank you!</div>
                                </div>
                                <div class="text-center"><button type="submit">Send Message</button></div>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
        @endif
        <!-- End Contact Section -->
    </main>
@endsection

@push('js')
@endpush