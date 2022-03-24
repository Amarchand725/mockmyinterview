

<?php $__env->startSection('title', $page_title); ?>

<?php $__env->startPush('css'); ?>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <main id="main">
        <section id="log" class="d-flex align-items-center">
            <div class="container ">
                <div class="row align-items-center justify-content-center">
                    <div class="col-lg-5 pt-5 pt-lg-0 order-2 order-lg-1 d-flex flex-column justify-content-center">
                        <h1 class="text-center">LOG-IN</h1>
                        <div class="card signup_v4 mb-30 ">
                            <div class="card-body ">
                                <ul class="nav nav-tabs" id="myTab" role="tablist">
                                    <li class="nav-item" role="presentation"> <a class="nav-link active" id="candidate-login-tab" data-toggle="tab" href="#candidate-login" role="tab" aria-controls="login" aria-selected="true">Candidate</a> </li>
                                    <li class="nav-item" role="presentation"> <a class="nav-link" id="interviewer-login-tab" data-toggle="tab" href="#interviewer-login" role="tab" aria-controls="register" aria-selected="false">Interviewer</a> </li>
                                </ul>
                                <div class="tab-content" id="myTabContent">
                                    <div class="tab-pane fade show active" id="candidate-login" role="tabpanel" aria-labelledby="candidate-login-tab">
                                        <h4 class="text-center mt-4 mb-4" style="text-transform: uppercase;"></h4>
                                        <form method="POST" action="<?php echo e(route('user-authenticate')); ?>">
                                            <?php echo csrf_field(); ?>

                                            <input type="hidden" name="user_type" value="Candidate">
                                            <div class="form-row">
                                                <div class="form-group col-md-12">
                                                    <input type="email" class="form-control" name="email" id="inputEmail4" placeholder="Email" required=""> 
                                                    <span style="color:red"><?php echo e($errors->first('email')); ?></span>
                                                </div>
                                                <div class="form-group col-md-12 mt-3">
                                                    <input type="password" class="form-control" name="password" id="inputPassword4" placeholder=" password" required=""> </div>
                                                    <span style="color:red"><?php echo e($errors->first('password')); ?></span>
                                                <div class="form-group col-md-12">
                                                    <div class="d-flex flex-wrap justify-content-between align-items-center">
                                                        <div class="custom-checkbox mt-2">
                                                            <a href="<?php echo e(route('forgot-password')); ?>" target="_blank">Forgot Password?</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mt-2 mb-3"> <button class="btn btn-primary full-width" type="submit">Login</button> </div>
                                            <span>Don't have an account? <a ui-sref="access.signup" href="<?php echo e(route('signup')); ?>">Sign up here</a></span>
                                        </form>
                                        <div class="social-area">
                                            <h3 class="title">Or</h3>
                                            <p class="text">Sign In with social media</p>
                                            <ul class="social-links">
                                                <li>
                                                    <a href="#"> <i class="fa fa-facebook-f"></i> </a>
                                                </li>
                                                <li>
                                                    <a href="#"> <i class="fa fa-twitter"></i> </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="interviewer-login" role="tabpanel" aria-labelledby="interviewer-login-tab">
                                        <h4 class="text-center mt-4 mb-4" style="text-transform: uppercase;"></h4>
                                        <form method="POST" action="<?php echo e(route('user-authenticate')); ?>">
                                            <?php echo csrf_field(); ?>

                                            <input type="hidden" name="user_type" value="Interviewer">
                                            <div class="form-row">
                                                <div class="mt-2 mb-3 linkedin_clr">
                                                    <button class="btn" type="submit">
                                                        <i class="fa fa-linkedin pull-left" aria-hidden="true"></i>
                                                        <span> Connect with Linkedin</span>
                                                    </button>
                                                </div>

                                                <div class="form-group col-md-12">
                                                    <input type="text" class="form-control" name="email" id="inputEmail4" placeholder="Email" required="" style="background-image: url(&quot;data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACAAAAAgCAYAAABzenr0AAAAAXNSR0IArs4c6QAAAmJJREFUWAntV7uKIkEUvbYGM4KID3wEIgjKRLLpKGLgFwiCfslGhkb7IbLgAzE1GhMxWxRRBEEwmEgDERWfW6fXuttq60a2wU6B1qlzb9U5fatsKROJVigUArvd7oeAyePx6Af3qGYymT7F2h8Wi+V7Pp+fmE7iv4Sw81GieusKIzNh4puCJzdaHIagCW1F4KSeQ4O4pPLoPb/3INBGBZ7avgz8fxWIxWIUCoX43Blegbe3NwoGg88zwMoncFUB8Yokj8dDdrv9MpfHVquV/H4/iVcpc1qgKAp5vV6y2WxaWhefreB0OimXy6kGkD0YDKhSqdB2u+XJqVSK4vE4QWS5XKrx0WjEcZ/PR9lslhwOh8p1Oh2q1Wp0OBw4RwvOKpBOp1kcSdivZPLvmxrjRCKhiiOOSmQyGXp5ecFQbRhLcRDRaJTe39//BHW+2cDr6ysFAoGrlEgkwpwWS1I7z+VykdvtliHuw+Ew40vABvb7Pf6hLuMk/rGY02ImBZC8dqv04lpOYjaw2WzUPZcB2WMPZet2u1cmZ7MZTSYTNWU+n9N4PJbp3GvXYPIE2ADG9Xqder2e+kTr9ZqazSa1222eA6FqtUoQwqHCuFgscgWQWC6XaTgcEiqKQ9poNOiegbNfwWq1olKppB6yW6cWVcDHbDarIuzuBBaLhWrqVvwy/6wCMnhLXMbR4wnvtX/F5VxdAzJoRH+2BUYItlotmk6nLGW4gX6/z+IAT9+CLwPPr8DprnZ2MIwaQBsV+DBKUEfnQ8EtFRdFneBDKWhCW8EVGbdUQfxESR6qKhaHBrSgCe3fbLTpPlS70M0AAAAASUVORK5CYII=&quot;); background-repeat: no-repeat; background-attachment: scroll; background-size: 16px 18px; background-position: 98% 50%;">
                                                    <span style="color:red"><?php echo e($errors->first('email')); ?></span>
                                                </div>
                                                <div class="form-group col-md-12 mt-3">
                                                    <input type="password" class="form-control" name="password" id="inputPassword4" placeholder=" password" required="" style="background-image: url(&quot;data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACAAAAAgCAYAAABzenr0AAAAAXNSR0IArs4c6QAAAmJJREFUWAntV7uKIkEUvbYGM4KID3wEIgjKRLLpKGLgFwiCfslGhkb7IbLgAzE1GhMxWxRRBEEwmEgDERWfW6fXuttq60a2wU6B1qlzb9U5fatsKROJVigUArvd7oeAyePx6Af3qGYymT7F2h8Wi+V7Pp+fmE7iv4Sw81GieusKIzNh4puCJzdaHIagCW1F4KSeQ4O4pPLoPb/3INBGBZ7avgz8fxWIxWIUCoX43Blegbe3NwoGg88zwMoncFUB8Yokj8dDdrv9MpfHVquV/H4/iVcpc1qgKAp5vV6y2WxaWhefreB0OimXy6kGkD0YDKhSqdB2u+XJqVSK4vE4QWS5XKrx0WjEcZ/PR9lslhwOh8p1Oh2q1Wp0OBw4RwvOKpBOp1kcSdivZPLvmxrjRCKhiiOOSmQyGXp5ecFQbRhLcRDRaJTe39//BHW+2cDr6ysFAoGrlEgkwpwWS1I7z+VykdvtliHuw+Ew40vABvb7Pf6hLuMk/rGY02ImBZC8dqv04lpOYjaw2WzUPZcB2WMPZet2u1cmZ7MZTSYTNWU+n9N4PJbp3GvXYPIE2ADG9Xqder2e+kTr9ZqazSa1222eA6FqtUoQwqHCuFgscgWQWC6XaTgcEiqKQ9poNOiegbNfwWq1olKppB6yW6cWVcDHbDarIuzuBBaLhWrqVvwy/6wCMnhLXMbR4wnvtX/F5VxdAzJoRH+2BUYItlotmk6nLGW4gX6/z+IAT9+CLwPPr8DprnZ2MIwaQBsV+DBKUEfnQ8EtFRdFneBDKWhCW8EVGbdUQfxESR6qKhaHBrSgCe3fbLTpPlS70M0AAAAASUVORK5CYII=&quot;); background-repeat: no-repeat; background-attachment: scroll; background-size: 16px 18px; background-position: 98% 50%;">
                                                    <span style="color:red"><?php echo e($errors->first('password')); ?></span>
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <div class="d-flex flex-wrap justify-content-between align-items-center">
                                                        <div class="custom-checkbox mt-2">
                                                            <a href="#" target="_blank">Forgot Password?</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mt-2 mb-3"> 
                                                <button class="btn btn-primary full-width" type="submit">Login</button>
                                            </div>
                                            <span>Don't have an account? <a ui-sref="access.signup" href="<?php echo e(route('signup')); ?>">Sign up here</a></span>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('js'); ?>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.auth.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\mockmyinterview\resources\views/web-views/login/login.blade.php ENDPATH**/ ?>