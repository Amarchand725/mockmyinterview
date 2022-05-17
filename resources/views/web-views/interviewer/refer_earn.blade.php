@extends('web-views.dashboard.master.app')

@section('title', $page_title)

@section('content')
    <div class="container-fluid py-3 ">
        <div class="row mx-auto">
            <h2 class="mb-3">Refer and Earn </h2>
            <div class="row">
                <div class="col-md-12 email_verificaion_box bg-white  ">
                    <span>                                
                        <b> Invite friends and get free credits </b>
                    </span>
                    <div>
                        <span class="sub-text-normal">                                   
                            {{ $referral->offer_message }}
                        </span>
                    </div>
                    <div class=" mt-3 sub-heading-font-bold">
                        <b>Referral Code:</b> &nbsp;&nbsp;&nbsp;
                        <span class="sub-text-normal">
                            <i class="ng-binding">{{ Auth::user()->referral_code }}</i>
                        </span>
                    </div>
                    <div class="clearfix"></div>
                    <form action="{{ route('invite.store') }}" method="post">
                        @csrf

                        <input type="hidden" name="referral_id" value="{{ $referral->id }}">
                        <div class="row ">
                            <div class="col-md-6 mt-3">
                                <div class="form-group float-label-control">
                                    <label for=""><b>Invite friends by email:</b>  </label>
                                    <input type="text" name="emails" class="form-control" placeholder="Add your friends emails here">
                                </div>
                            </div>
                            <div class="col-md-2 mt-5">
                                <button type="submit" class="btn btn-primary pull-left blue-btn-small">Send</button>
                            </div>
                            
                            <div class="col-md-12">
                                <b>Note:</b> Use comma separated emails to invite multiple friends.
                            </div>
                        </div>
                    </form>

                    <form action="">

                        <input type="hidden" name="referral_id" value="{{ $referral->id }}">
                        <div class="row ">
                            <div class="col-md-6 mt-3">
                                <div class="form-group float-label-control">
                                    <label for=""> Share your invite link </label>
                                    <input type="email" class="form-control" placeholder="https//www.LinkedIn.com">
                                </div>
                            </div>
                            <div class="col-md-2 mt-5">
                                <button type="submit" class="btn btn-primary pull-left blue-btn-small">Send</button>
                            </div>
                            
                            <div class="col-md-12  bg-white ">
                                <div class="table-responsive border-0">
                                    <table class="table" data-paging="true" data-filtering="true" data-sorting="true" data-state="true">
                                        <thead>
                                            <tr>
                                                <th data-breakpoints="xs">Name</th>
                                                <th data-breakpoints="xs">Email</th>
                                                <th data-breakpoints="xs">Date of Joined</th>
                                                <th data-breakpoints="xs">Credits Earned</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @if(!empty($invite->hasInvitedUsers))
                                                @foreach ($invite->hasInvitedUsers as $user)
                                                    <tr>
                                                        <td>Ahmed</td>
                                                        <td>ahmed@mail.com</td>
                                                        <td>date of joining</td>
                                                        <td>100</td>
                                                    </tr>
                                                @endforeach
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')
@endpush