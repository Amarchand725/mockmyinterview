<footer id="footer">
    <div class="footer-top">
        <div class="container">
            <div class="row  justify-content-center">
                <div class="col-lg-6">
                    <h3><?php echo e($home_page_data['footer_title']); ?></h3>
                    <p><?php echo $home_page_data['footer_sub_title']; ?></p>
                </div>
            </div>

            <div class="row mt-5 " style="text-align: left;">
                <div class="col-md-6">
                    <h5 class="headin5_amrc col_white_amrc pt2">FIND US</h5>
                    <!--headin5_amrc-->
                    <p class="mb10"><?php echo $home_page_data['footer_description']; ?></p>
                    <p><i class="fa fa-location-arrow"></i> <?php echo $home_page_data['footer_address']; ?></p>
                    <p><i class="fa fa-phone"></i> <?php echo $home_page_data['footer_phone']; ?></p>
                    <p><i class="fa fa fa-envelope"></i> <?php echo $home_page_data['footer_email']; ?> </p>
                </div>
                <div class="col-md-6">
                    <div class="mobile_2">
                        <h5 class="headin5_amrc col_white_amrc pt2">EMAIL US </h5>
                        <div class="row footer-newsletter justify-content-center">
                            <form action="" method="post">
                                <input type="email" name="email" placeholder="Enter your Email"><input type="submit"
                                    value="Subscribe">
                            </form>
                        </div>
                        <div class="social-links">
                            <a href="<?php echo $home_page_data['footer_twitter']; ?>" class="twitter"><i class="bx bxl-twitter"></i></a>
                            <a href="<?php echo $home_page_data['footer_facebook']; ?>" class="facebook"><i class="bx bxl-facebook"></i></a>
                            <a href="<?php echo $home_page_data['footer_instagram']; ?>" class="instagram"><i class="bx bxl-instagram"></i></a>
                            <a href="<?php echo $home_page_data['footer_skype']; ?>" class="google-plus"><i class="bx bxl-skype"></i></a>
                            <a href="<?php echo $home_page_data['footer_linkedin']; ?>" class="linkedin"><i class="bx bxl-linkedin"></i></a>
                        </div>
                    </div>
                </div>

                <?php if(!empty($home_page_data['footer_app_image'])): ?>
                    <div class="row">
                        <div class="col-md-6 mt-4">
                            <img src="<?php echo e(asset('public/admin/assets/images/page')); ?>/<?php echo e($home_page_data['footer_app_image']); ?>" alt="imgs" class="img-fluid">
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <div class="container footer-bottom clearfix">
        <div class="copyright">
            <strong><?php echo e($home_page_data['footer_copy_right']); ?></strong>
        </div>
    </div>
</footer><?php /**PATH C:\xampp\htdocs\mockmyinterview\resources\views/layouts/web/footer.blade.php ENDPATH**/ ?>