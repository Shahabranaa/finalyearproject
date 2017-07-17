<?php

namespace App\Http\Controllers;
use App\User;

use App\Gig;
use App\Profile;
use Illuminate\Support\Facades\Auth;
use App\Order;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;



class UserController extends Controller
{
    public function dashboard()
    {

        $user = Auth::user()->id;
        // Life Time Dashboard Controller for dashbaord.blade.php File

        //  life Time Earning
        $totalEarning =0;
        $orderTotal = Order::where('seller_id', $user)->where('status', 2)->get();
        foreach ($orderTotal as $orderTotals)
        {
            $gig_id = $orderTotals->gig_id;
            $gig =Gig::where('id',$gig_id)->first();
            $totalEarning +=  $orderTotals->gig_price;
        }

        //  total order in quaue
        $totalOrderQuaue =0;
        $orderforQuaue = Order::where('seller_id', $user)->where('status', 1)->get();
        foreach ($orderforQuaue as $orderforQuaues)
        {
            $totalOrderQuaue++;
        }

        //Total Completed Order
        $totalOrderComplated =0;
        $orderTotalComplated = Order::where('seller_id', $user)->where('status', 2)->get();
        foreach ($orderTotalComplated as $orderTotalComplates)
        {
            $totalOrderComplated++;
        }

        //Total cancle order
        $totalOrderCancle =0;
        $orderTotalCancle = Order::where('seller_id', $user)->where('status', 3)->get();
        foreach ($orderTotalCancle as $orderTotalCancles)
        {
            $totalOrderCancle++;
        }

        // Today Dashboard Controller for dashbaord.blade.php File
        $currentDate = date('d');

        //   Earning Today
        $todayEarning =0;
        $orderTodayEaring = Order::where('seller_id', $user)->where('status', 2)->whereDay('updated_at', $currentDate)->get();
        foreach ($orderTodayEaring as $orderTodayEarings)
        {
            $gig_id = $orderTodayEarings->gig_id;
            $gig =Gig::where('id',$gig_id)->first();
            $todayEarning +=  $orderTodayEarings->gig_price;
        }

        //  Today order in quaue
        $todayOrderQuaue =0;
        $orderTodayQuaue = Order::where('seller_id', $user)->where('status', 1)->whereDay('updated_at', $currentDate)->get();
        foreach ($orderTodayQuaue as $orderTodayQuaues)
        {
            $todayOrderQuaue++;
        }

        //Today completed Order
        $todayOrderComplated =0;
        $orderTodayComplated = Order::where('seller_id', $user)->where('status', 2)->whereDay('updated_at', $currentDate)->get();
        foreach ($orderTodayComplated as $orderTotayComplates)
        {
            $todayOrderComplated++;
        }

        // Today cancle order
        $todayOrderCancle =0;
        $orderTodayCancle = Order::where('seller_id', $user)->where('status', 3)->whereDay('updated_at', $currentDate)->get();
        foreach ($orderTodayCancle as $orderTodayCancles)
        {
            $todayOrderCancle++;
        }


        // Monthly Dashboard Controller for dashbaord.blade.php File
        $currentMonth = date('m');
        //   Earning Today
        $monthEarning =0;
        $orderMonthEaring = Order::where('seller_id', $user)->where('status', 2)->whereMonth('updated_at', $currentMonth)->get();
        foreach ($orderMonthEaring as $orderMonthEarings)
        {
            $gig_id = $orderMonthEarings->gig_id;
            $gig =Gig::where('id',$gig_id)->first();
            $monthEarning +=  $orderMonthEarings->gig_price;
        }

        //  Today order in quaue
        $monthOrderQuaue =0;
        $orderMonthQuaue = Order::where('seller_id', $user)->where('status', 1)->whereMonth('updated_at', $currentMonth)->get();
        foreach ($orderMonthQuaue as $orderMonthQuaues)
        {
            $monthOrderQuaue++;
        }

        //Today completed Order
        $monthOrderComplated =0;
        $orderMonthComplated = Order::where('seller_id', $user)->where('status', 2)->whereMonth('updated_at', $currentMonth)->get();
        foreach ($orderMonthComplated as $orderMonthComplates)
        {
            $monthOrderComplated++;
        }

        // Today cancle order
        $monthOrderCancle =0;
        $ordermonthCancle = Order::where('seller_id', $user)->where('status', 3)->whereMonth('updated_at', $currentMonth)->get();
        foreach ($ordermonthCancle as $ordermonthCancles)
        {
            $monthOrderCancle++;
        }
        return view('dashboard')->with(['totalEarning'=>$totalEarning,'totalOrderQuaue' =>$totalOrderQuaue,
            'totalOrderComplated'=>$totalOrderComplated,'totalOrderCancle'=>$totalOrderCancle,
            'todayOrderCancle'=>$todayOrderCancle, 'todayOrderComplated'=>$todayOrderComplated,
            'todayOrderQuaue'=>$todayOrderQuaue,'todayEarning'=>$todayEarning,'monthOrderCancle'=>$monthOrderCancle,
            'monthOrderComplated'=>$monthOrderComplated,'monthOrderQuaue'=>$monthOrderQuaue,'monthEarning'=>$monthEarning]);
    }

}


