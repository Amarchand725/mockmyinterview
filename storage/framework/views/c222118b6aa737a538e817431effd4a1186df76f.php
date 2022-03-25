

<?php $__env->startPush('css'); ?>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <main id="main">
        <!-- ======= About Section ======= -->
        <?php if($home_page_data['about_status']==1): ?>
            <section id="about" class="about">
                <div class="container">
                    <div class="section-title">
                        <span><?php echo e($home_page_data['about_heading']); ?></span>
                        <h2><?php echo e($home_page_data['about_heading']); ?></h2>
                        <!-- <p>Sit sint consectetur velit quisquam cupiditate impedit suscipit alias</p> -->
                    </div>
                    <div class="row">
                        
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
        <?php endif; ?>
        <!-- End About Section -->

        <!-- search and compaRE SEC -->
        <?php if($home_page_data['home_banner_status']==1): ?>
            <section class="teass" id="search_div">
                <!-- Cards container -->
                <div class="container text-center">
                    <div class="section-title">
                        <span><?php echo $home_page_data['banner_heading']; ?></span>
                    </div>
                    <div class="container d-flex justify-content-center">
                        <div class="mt-4">
                            <div class="process-container">
                                <div class="workflow-item d-flex flex-nowrap bg-white" title="Start your agent search here">
                                    <div class="d-flex align-items-center justify-content-center">
                                        <div class="text-center text-dark p-3">
                                                <h2 class="text-red tracked" data-galabel="h2-start-click"><?php echo $home_page_data['top_sec_heading']; ?></h2>
                                                <div class="information col-12">
                                                    <h3><?php echo $home_page_data['top_sec_title']; ?></h3>
                                                    <p class="byline medium"><?php echo $home_page_data['top_sec_description']; ?></p>
                                                </div>
                                        </div>
                                    </div>
                                    <div class="image laf-lazyload-image lazy-load-fade-overlay loaded image-fluid" data-lazyimgtype="background" style="background-image: url(&quot;https://static.localagentfinder.com.au/img/homepage/desk-start@1x-min.png&quot;);"></div>
                                </div>
                                <div class="workflow-item d-flex flex-nowrap bg-white" title="Compare intervierews">
                                    <div class="d-flex align-items-center justify-content-center order-2">
                                        <div class="text-center text-dark p-3">
                                            <h2 class="text-red tracked" data-galabel="h2-compare-click"><?php echo $home_page_data['middle_sec_heading']; ?></h2>
                                            <div class="information col-12">
                                                    <h3><?php echo $home_page_data['middle_sec_title']; ?></h3>
                                                    <p class="byline medium"><?php echo $home_page_data['middle_sec_description']; ?></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="image laf-lazyload-image order-1 lazy-load-fade-overlay loaded" data-lazyimgtype="background" style="background-image: url(&quot;https://static.localagentfinder.com.au/img/homepage/desk-compare@1x-min.png&quot;);"></div>
                                </div>
                                <div class="workflow-item d-flex flex-nowrap bg-white" title="Connect with the right agents for you">
                                    <div class="d-flex align-items-center justify-content-center">
                                        <div class="text-center text-dark p-3">
                                            <h2 class="text-red tracked" data-galabel="h2-connect-click"><?php echo $home_page_data['middle_sec_heading']; ?></h2>
                                            <div class="information col-12">
                                                    <h3><?php echo $home_page_data['middle_sec_title']; ?></h3>
                                                    <p class="byline medium"><?php echo $home_page_data['middle_sec_description']; ?></p>
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
        <?php endif; ?>

        <!-- ======= Testimonials Section ======= -->
        <?php if($home_page_data['home_testimonial_status']==1): ?>
            <section id="testimonials" class="testimonials ">
                <div class="container">
                    <div class="section-title">
                        <span><?php echo $home_page_data['home_testimonial_title']; ?></span>
                        <h2><?php echo $home_page_data['home_testimonial_title']; ?></h2>
                        <p><?php echo $home_page_data['home_testimonial_subtitle']; ?></p>
                    </div>

                    <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="100">
                        <div class="swiper-wrapper">
                            <?php $__currentLoopData = $testimonials; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $testimonial): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="swiper-slide">
                                    <div class="testimonial-item">
                                        <i class="bx bxs-quote-alt-left quote-icon-left"></i><?php echo $testimonial->comment; ?><i class="bx bxs-quote-alt-right quote-icon-right"></i>
                                        <img src="<?php echo e(asset('public/admin/assets/images/testimonials/')); ?>/<?php echo e($testimonial->image); ?>" class="testimonial-img" alt="">
                                        <h3><?php echo e($testimonial->name); ?></h3>
                                        <h4><?php echo e($testimonial->designation); ?></h4>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                        <div class="swiper-pagination"></div>
                    </div>
                </div>
            </section>
        <?php endif; ?>
        <!-- End Testimonials Section -->

        <!-- advantages section -->
        <?php if($home_page_data['home_mock_advantage_status']==1): ?>
            <section id="services" class="services section-bg">
                <div class="container">
                    <div class="section-title">
                        <span><?php echo $home_page_data['home_mock_advantage_title']; ?></span>
                        <h2><?php echo $home_page_data['home_mock_advantage_title']; ?></h2>
                        <p><?php echo $home_page_data['home_mock_advantage_subtitle']; ?></p>
                    </div>

                    <div class="row">
                        <?php $__currentLoopData = $mock_advantages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mock_advantage): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4">
                                <div class="icon-box">
                                    <div class="icon">
                                        <img src="<?php echo e(asset('public/admin/assets/images/advantage')); ?>/<?php echo e($mock_advantage->image); ?>" alt="stress" class="img-fluid">
                                    </div>
                                    <h4><a href=""><?php echo e($mock_advantage->title); ?></a></h4>
                                    <p><?php echo $mock_advantage->description; ?></p>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </section>
        <?php endif; ?>

        <!-- ======= Counts Section ======= -->
        <?php if($home_page_data['home_mock_advantage_counter_status']==1): ?>
            <section id="counts" class="counts">
                <div class="container">
                    <div class="row counters">
                        <div class="col-lg-3 col-6 text-center">
                            <span data-purecounter-start="0" data-purecounter-end="<?php echo $home_page_data['home_mock_advantage_bottom_first_counter']; ?>" data-purecounter-duration="1"
                                class="purecounter"></span>
                            <p><?php echo $home_page_data['home_mock_advantage_bottom_first_label']; ?></p>
                        </div>

                        <div class="col-lg-3 col-6 text-center">
                            <span data-purecounter-start="0" data-purecounter-end="<?php echo $home_page_data['home_mock_advantage_bottom_second_counter']; ?>" data-purecounter-duration="1"
                                class="purecounter"></span>
                            <p><?php echo $home_page_data['home_mock_advantage_bottom_second_label']; ?></p>
                        </div>

                        <div class="col-lg-3 col-6 text-center">
                            <span data-purecounter-start="0" data-purecounter-end="<?php echo $home_page_data['home_mock_advantage_bottom_third_counter']; ?>" data-purecounter-duration="1"
                                class="purecounter"></span>
                            <p><?php echo $home_page_data['home_mock_advantage_bottom_third_label']; ?></p>
                        </div>

                        <div class="col-lg-3 col-6 text-center">
                            <span data-purecounter-start="0" data-purecounter-end="<?php echo $home_page_data['home_mock_advantage_bottom_fourth_counter']; ?>" data-purecounter-duration="1"
                                class="purecounter"></span>
                            <p><?php echo $home_page_data['home_mock_advantage_bottom_fourth_label']; ?></p>
                        </div>
                    </div>
                </div>
            </section>
        <?php endif; ?>
        <!-- End Counts Section -->

        <!-- ======= Services Section ======= -->
        <?php if($home_page_data['home_real_status']==1): ?>
            <section id="services" class="services ">
                <div class="container">
                    <div class="section-title">
                        <span><?php echo $home_page_data['home_real_title']; ?></span>
                        <h2><?php echo $home_page_data['home_real_title']; ?></h2>
                        <p><?php echo $home_page_data['home_real_description']; ?></p>
                    </div>

                    <div class="row">
                        <?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
                                <div class="icon-box">
                                    <div class="icon"><i class="bx bxl-dribbble"></i></div>
                                    <h4><a href=""><?php echo e($service->name); ?></a></h4>
                                    <p><?php echo $service->description; ?></p>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </section>
        <?php endif; ?>
        <!-- End Services Section -->

        <!-- ======= Sign-up Section ======= -->
        <?php if($home_page_data['home_signup_status']==1): ?>
            <section id="cta" class="cta">
                <div class="container">
                    <div class="text-center">
                        <h3><?php echo e($home_page_data['home_signup_title']); ?></h3>
                        <p><?php echo e($home_page_data['home_signup_description']); ?></p>
                        <a class="cta-btn" href="#"><?php echo e($home_page_data['home_signup_btn_label']); ?></a>
                    </div>
                </div>
            </section>
        <?php endif; ?>
        <!-- End sign-up Section -->

        <!-- how it works section -->
        <?php if($home_page_data['home_how_status']==1): ?>
            <section id="portfolio" class="section-bg">
                <div class="container">
                    <div class="section-title">
                        <span><?php echo e($home_page_data['home_how_title']); ?></span>
                        <h2><?php echo e($home_page_data['home_how_title']); ?></h2>
                        <p><?php echo e($home_page_data['home_how_description']); ?></p>
                    </div>
                    <?php ($bool = 1); ?>
                    <?php ($counter = 0); ?>
                    <?php $__currentLoopData = $work_processes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$work_process): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php ($counter++); ?>
                        <!--first section-->
                        <?php if($bool): ?>
                            <?php ($bool=0); ?>
                            <div class="row align-items-center how-it-works d-flex">
                                <div class="col-2 text-center bottom d-inline-flex justify-content-center align-items-center">
                                    <div class="circle font-weight-bold"><?php echo e($counter); ?></div>
                                </div>
                                <div class="col-6">
                                    <h5><?php echo e($work_process->title); ?></h5>
                                    <p><?php echo $work_process->description; ?></p>
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
                        <?php else: ?> 
                            <?php ($bool=1); ?>
                            <!--second section-->
                            <div class="row align-items-center justify-content-end how-it-works d-flex">
                                <div class="col-6 text-right">
                                    <h5><?php echo e($work_process->title); ?></h5>
                                    <p><?php echo $work_process->description; ?></p>
                                </div>
                                <div class="col-2 text-center full d-inline-flex justify-content-center align-items-center">
                                    <div class="circle font-weight-bold"><?php echo e($counter); ?></div>
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
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </section>
        <?php endif; ?>
        <!-- time line section ends -->

        <!-- pricing section ------->
        <?php if($home_page_data['home_pricing_status']==1): ?>
            <section class="prcing" id="team">
                <!-- Cards container -->
                <div class="container text-center">
                    <div class="section-title">
                        <span>PRICING </span>
                        <h2>PRICING </h2>
                    </div>
                    <div class="row">
                        <?php $__currentLoopData = $packages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $package): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-lg-4 col-md-4 col-sm-10 pb-4 d-block ">
                                <div class="pricing-item" style="box-shadow: 0px 0px 30px -7px rgba(0,0,0,0.29);">
                                    <!-- Indicator of subscription type -->
                                    <div class="pt-4 pb-3" style="letter-spacing: 2px">
                                        <h4><?php echo e($package->name); ?></h4>
                                    </div>
                                    <!-- Price class -->
                                    <div class="pricing-price pb-1 ">
                                        <h1 style="font-weight: 1000; font-size: 3.5em;">
                                            <span style="   font-size: 20px;">€</span><?php echo e($package->price); ?>

                                        </h1>
                                    </div>
                                    <!-- Perks of said subscription -->
                                    <div class="pricing-description">
                                        <?php echo $package->description; ?>

                                    </div>
                                    <!-- Button -->
                                    <div class="pricing-button pb-4">
                                        <button type="button" class="btn btn-lg btn-primary w-75">Get started</button>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </section>
        <?php endif; ?>
        <!-- pricing section ends -->

        <!-- ======= Team Section ======= -->
        <?php if($home_page_data['home_team_status']==1): ?>
            <section class="team section-bg" id="teams">
                <div class="container">
                    <div class="section-title">
                        <span><?php echo e($home_page_data['home_team_title']); ?></span>
                        <h2><?php echo e($home_page_data['home_team_title']); ?></h2>
                        <p><?php echo e($home_page_data['home_team_description']); ?></p>
                    </div>

                    <div class="row">
                        <?php $__currentLoopData = $teams; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $team): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-lg-4 col-md-4 d-flex align-items-stretch">
                                <div class="member">
                                    <?php if($team->image): ?>
                                        <img src="<?php echo e(asset('public/admin/assets/images/team')); ?>/<?php echo e($team->image); ?>" alt="">
                                    <?php else: ?> 
                                        <img src="<?php echo e(asset('public/admin/assets/images/team/no-photo1.jpg')); ?>" alt="">
                                    <?php endif; ?>
                                    <h4><?php echo e($team->first_name); ?> <?php echo e($team->last_name); ?></h4>
                                    <span><?php echo e($team->designation); ?></span>
                                    <p><?php echo $team->description; ?></p>
                                    <div class="social">
                                        <a href="<?php echo e($team->twitter_link); ?>" target="_blank"><i class="bi bi-twitter"></i></a>
                                        <a href="<?php echo e($team->facebook_link); ?>" target="_blank"><i class="bi bi-facebook"></i></a>
                                        <a href="<?php echo e($team->instagram_link); ?>" target="_blank"><i class="bi bi-instagram"></i></a>
                                        <a href="<?php echo e($team->linkedin_link); ?>" target="_blank"><i class="bi bi-linkedin"></i></a>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </section>
        <?php endif; ?>
        <!-- End Team Section -->

        <!-- ======= help Section ======= -->
        <?php if($home_page_data['home_help_status']==1): ?>
            <section id="services" class="services ">
                <div class="container">
                    <div class="section-title">
                        <span><?php echo e($home_page_data['home_help_title']); ?></span>
                        <h2><?php echo e($home_page_data['home_help_title']); ?></h2>
                        <p><?php echo e($home_page_data['home_help_description']); ?></p>
                    </div>

                    <div class="row">
                        <?php $__currentLoopData = $helps; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $help): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
                                <div class="icon-box">
                                    <div class="icon"><i class="bx bxl-dribbble"></i></div>
                                    <h4><a href=""><?php echo e($help->title); ?></a></h4>
                                    <p><?php echo \Illuminate\Support\Str::limit($help->description, 100); ?></p>
                                    <p><a href="<?php echo e(route('help.show', $help->slug)); ?>">Read more</a></p>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </section>
        <?php endif; ?>
        <!-- End help Section -->

        <!-- ======= Contact Section ======= -->
        <?php if($home_page_data['home_contact_status']==1): ?>
            <section id="contact" class="contact">
                <div class="container">
                    <div class="section-title">
                        <span><?php echo e($home_page_data['home_contact_title']); ?></span>
                        <h2><?php echo e($home_page_data['home_contact_title']); ?></h2>
                        <p><?php echo e($home_page_data['home_contact_description']); ?></p>
                    </div>

                    <div class="row">
                        <div class="col-lg-5 d-flex align-items-stretch">
                            <div class="info">
                                <div class="address">
                                    <i class="bi bi-geo-alt"></i>
                                    <h4>Location:</h4>
                                    <p><?php echo e($home_page_data['contact_address']); ?></p>
                                </div>

                                <div class="email">
                                    <i class="bi bi-envelope"></i>
                                    <h4>Email:</h4>
                                    <p><?php echo e($home_page_data['contact_email']); ?></p>
                                </div>

                                <div class="phone">
                                    <i class="bi bi-phone"></i>
                                    <h4>Call:</h4>
                                    <p><?php echo e($home_page_data['contact_phone']); ?></p>
                                </div>

                                <iframe src="<?php echo e($home_page_data['contact_map']); ?>" frameborder="0" style="border:0; width: 100%; height: 290px;" allowfullscreen></iframe>
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
        <?php endif; ?>
        <!-- End Contact Section -->
    </main>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('js'); ?>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.web.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\mockmyinterview\resources\views/index.blade.php ENDPATH**/ ?>