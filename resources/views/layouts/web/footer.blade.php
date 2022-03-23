<footer id="footer">
    <div class="footer-top">
        <div class="container">
            <div class="row  justify-content-center">
                <div class="col-lg-6">
                    <h3>{{ $home_page_data['footer_title'] }}</h3>
                    <p>{!! $home_page_data['footer_sub_title'] !!}</p>
                </div>
            </div>

            <div class="row mt-5 " style="text-align: left;">
                <div class="col-md-6">
                    <h5 class="headin5_amrc col_white_amrc pt2">FIND US</h5>
                    <!--headin5_amrc-->
                    <p class="mb10">{!! $home_page_data['footer_description'] !!}</p>
                    <p><i class="fa fa-location-arrow"></i> {!! $home_page_data['footer_address'] !!}</p>
                    <p><i class="fa fa-phone"></i> {!! $home_page_data['footer_phone'] !!}</p>
                    <p><i class="fa fa fa-envelope"></i> {!! $home_page_data['footer_email'] !!} </p>
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
                            <a href="{!! $home_page_data['footer_twitter'] !!}" target="_blank" class="twitter"><i class="bx bxl-twitter"></i></a>
                            <a href="{!! $home_page_data['footer_facebook'] !!}" target="_blank" class="facebook"><i class="bx bxl-facebook"></i></a>
                            <a href="{!! $home_page_data['footer_instagram'] !!}" target="_blank" class="instagram"><i class="bx bxl-instagram"></i></a>
                            <a href="{!! $home_page_data['footer_skype'] !!}" target="_blank" class="google-plus"><i class="bx bxl-skype"></i></a>
                            <a href="{!! $home_page_data['footer_linkedin'] !!}" target="_blank" class="linkedin"><i class="bx bxl-linkedin"></i></a>
                        </div>
                    </div>
                </div>

                @if(!empty($home_page_data['footer_app_image']))
                    <div class="row">
                        <div class="col-md-6 mt-4">
                            <img src="{{ asset('public/admin/assets/images/page') }}/{{ $home_page_data['footer_app_image'] }}" alt="imgs" class="img-fluid">
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <div class="container footer-bottom clearfix">
        <div class="copyright">
            <strong>{{ $home_page_data['footer_copy_right'] }}</strong>
        </div>
    </div>
</footer>
