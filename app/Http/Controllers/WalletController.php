<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BookingPriority;

class WalletController extends Controller
{
    public function create()
    {
        $page_title = 'Buy Credits - Create';
        $booking_priorities = BookingPriority::where('status', 1)->get();
        return view('web-views.candidate.wallets.create', compact('page_title', 'booking_priorities'));
    }
}
