<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Activitylog\Models\Activity;
use App\Http\Controllers\ActivityLogController;

class ActivityLogController extends Controller
{
        //activity log
        public function activityLog(){

            $show =  Activity::orderBy('id', 'DESC')->paginate(15);

            return view('admin.activityLog.activitylog', ['show'=>$show]);
        }
}
