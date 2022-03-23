@extends('web-views.dashboard.master.app')

@section('title', $page_title)

@section('content')
    <div class="container-fluid py-3 ">
        <div class="row mx-auto">
            <h2 class="mb-3">Resources </h2>
            <div class="container pt-5">
                <div class="row">
                    <div class="col-sm-6 ">
                        <select class="form-select" aria-label="Default select example">
                            <option selected>All</option>
                            <option value="1">Carreer Management</option>
                            <option value="2">Interview Tips</option>
                            <option value="3">Job Search</option>
                        </select>
                    </div>
                    <div class="col-sm-6">
                        <div class="input-group rounded">
                            <input type="search" class="form-control rounded" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
                            <span class="input-group-text border-0" id="search-addon">
                                <i class="fa fa-search"></i>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- scheduling code -->
            <div class="container pt-5">
                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-bordered resource_tb table-responsive ">
                            <tbody>
                                <tr>
                                    <td>
                                        <b> <u><a href="#"> How to Refine Your English through Listening</a></u></b>
                                        <br>
                                        <span class="label  interview-tips ">Career Management </span>
                                        <span class="label  interview-tips1 ml-2 ">paid </span>
                                    </td>
                                </tr>
                                <tr>
                                    <td> If you’re on the lookout for ways to hone your English skills, then a safe bet would be through the process of listening. This involves listening to audio, videos, radio programs, etc <a href="#"> more...</a></td>
                                </tr>
                                <tr>
                                    <td>
                                        <b> <u><a href="#"> Nifty Ways to Touch Up Your Non-Verbal Communication Skills</a></u></b>
                                        <br>
                                        <span class="label  interview-tips ">Career Management </span>
                                        <span class="label  interview-tips1 ml-2 ">paid </span>
                                    </td>
                                </tr>
                                <tr>
                                    <td> What you often tend to forget is the fact that your body can speak louder than your words. Your resume may be impressive and your verbal skills even more so, but unless your body lang <a href="#">more...</a></td>
                                </tr>
                                <tr>
                                    <td>
                                        <b> <u><a href="#"> Typical Blunders to Evade At Job Interviews</a></u></b>
                                        <br>
                                        <span class="label  interview-tips ">Career Management </span>
                                        <span class="label  interview-tips1 ml-2 ">paid </span>
                                    </td>
                                </tr>
                                <tr>
                                    <td> It may seem self-evident that you need to convey a good first impression for your interview. If you are too stressed out though, you might end up committing any of the following blun <a href="#">more...</a></td>
                                </tr>
                                <tr>
                                    <td>
                                        <b> <u><a href="#"> How to Nail Your Next Interview?</a></u></b>
                                        <br>
                                        <span class="label  interview-tips ">Career Management </span>
                                        <span class="label  interview-tips1 ml-2 ">paid </span>
                                    </td>
                                </tr>
                                <tr>
                                    <td> Below are seven lessons every person should keep in mind before his or her next job interview: <a href="#">more...</a></td>
                                </tr>
                            </tbody>
                        </table>

                        <div class="card-footer p-0">
                            <nav aria-label="...">
                                <ul class="pagination justify-content-end mt-3 mr-3">
                                    <li class="page-item disabled">
                                        <span class="page-link">Previous</span>
                                    </li>
                                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                                    <li class="page-item active">
                                        <span class="page-link">2<span class="sr-only">(current)</span>
                                        </span>
                                    </li>
                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                    <li class="page-item">
                                        <a class="page-link" href="#">Next</a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
    
@push('js')
@endpush