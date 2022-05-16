<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Coupon;
use Auth;
use Session;

class CouponController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->ajax()){
            $query = Coupon::orderby('id', 'desc')->where('id', '>', 0);
            if($request['search'] != ""){
                $query->where('name', 'like', '%'. $request['search'] .'%')
                ->orWhere('type', 'like', '%'. $request['search'] .'%')
                ->orWhere('coupon_code', 'like', '%'. $request['search'] .'%')
                ->orWhere('discount', 'like', '%'. $request['search'] .'%')
                ->orWhere('start_date', 'like', '%'. $request['search'] .'%')
                ->orWhere('end_date', 'like', '%'. $request['search'] .'%');
            }
            if($request['status']!="All"){
                if($request['status']==2){
                    $request['status'] = 0;
                }
                $query->where('status', $request['status']);
            }
            $models = $query->paginate(10);
            return (string) view('admin.coupons.search', compact('models'));
        }
        $page_title = 'All Coupons';
        $models = Coupon::orderby('id', 'desc')->paginate(10);
        return view('admin.coupons.index', compact('models', 'page_title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $page_title = 'Add New Coupon';
        return view('admin.coupons.create', compact('page_title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = $request->validate([
            'name' => 'required|max:255',
            'discount' => 'required|max:5',
            'start_date' => 'required',
            'description' => 'max:255',
        ]);

        do{
            $coupon_code = $random = \Str::random(6);
        }while(Coupon::where('coupon_code', $coupon_code)->first());

        $model = new Coupon();

        if (isset($request->banner)) {
            $banner = date('d-m-Y-His').'.'.$request->file('banner')->getClientOriginalExtension();
            $request->banner->move(public_path('/admin/assets/coupons'), $banner);
            $model->banner = $banner;
        }
        
        $model->created_by = Auth::user()->id;
        $model->name = $request->name;
        $model->slug = \Str::slug($request->name);
        $model->type = $request->type;
        $model->coupon_code = $coupon_code;
        $model->discount = $request->discount;
        $model->start_date = date('Y-m-d', strtotime($request->start_date));
        $model->end_date = date('Y-m-d', strtotime($request->end_date));
        $model->max_usages = $request->max_usages;
        $model->description = $request->description;
        $model->save();

        return redirect()->route('coupon.index')->with('message', 'Coupon Added Successfully !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Coupon  $coupon
     * @return \Illuminate\Http\Response
     */
    public function show(Coupon $coupon)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Coupon  $coupon
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $page_title = 'Edit Coupon';
        $model  = Coupon::where('slug', $slug)->first();
        return view('admin.coupons.edit', compact('page_title', 'model'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Coupon  $coupon
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {
        $validator = $request->validate([
            'name' => 'required|max:255',
            'discount' => 'required|max:5',
            'start_date' => 'required',
            'description' => 'max:255',
        ]);

        $model = Coupon::where('slug', $slug)->first();

        if (isset($request->banner)) {
            $banner = date('d-m-Y-His').'.'.$request->file('banner')->getClientOriginalExtension();
            $request->banner->move(public_path('/admin/assets/coupons'), $banner);
            $model->banner = $banner;
        }
        
        $model->created_by = Auth::user()->id;
        $model->name = $request->name;
        $model->slug = \Str::slug($request->name);
        $model->type = $request->type;
        $model->discount = $request->discount;
        $model->start_date = date('Y-m-d', strtotime($request->start_date));
        $model->end_date = date('Y-m-d', strtotime($request->end_date));
        $model->max_usages = $request->max_usages;
        $model->description = $request->description;
        $model->status = $request->status;
        $model->save();

        return redirect()->route('coupon.index')->with('message', 'Coupon updated Successfully !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Coupon  $coupon
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        $model = Coupon::where('slug', $slug)->delete();
        if ($model) {
            return true;
        } else {
            return response()->json(['message' => 'Failed '], 404);
        }
    }

    public function getCoupon(Request $request)
    {   
        $coupon = Coupon::where('coupon_code', $request->coupon_code)->first();
        try{
            if($coupon->status==0){
                return 'in-active';
            }elseif(date('Y-m-d') > $coupon->end_date){
                return 'expired';
            }else{
                if($coupon->max_usages == count($coupon->hasUsages)){
                    return 'max-limit';
                }else{
                    $used_coupon = [];
                    if($coupon->type=='fix'){
                        $used_coupon['coupon_code'] = $coupon->coupon_code;
                        $used_coupon['type'] = $coupon->type;
                        $used_coupon['sub_total'] = $request->sub_total;
                        $used_coupon['discount'] = number_format($coupon->discount, 2);
                    }elseif($coupon->type=='percent'){
                        $sub_total = $request->sub_total;
                        $discount = number_format($sub_total/100*$coupon->discount, 2);

                        $used_coupon['coupon_code'] = $coupon->coupon_code;
                        $used_coupon['type'] = $coupon->type;
                        $used_coupon['sub_total'] = $request->sub_total;
                        $used_coupon['discount'] = $discount;
                    }
                    Session::put('used_coupon', $used_coupon);
                    return true;
                }
            }
        }catch (\Exception $e) {
            return false;
        }
    }
    public function removeCoupon(Request $request)
    {
        Session::forget($request->coupon);
        return true;
    }
}
