<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use Illuminate\Http\Request;

class ActivityController extends Controller
{

        public function __construct()
        {
            $this->middleware('auth');
        }

        //首页
        public function index(Request $request){
            $keyword = $request->keyword;
            if($keyword){
                $activitys = Activity::where('title','like',"%$keyword%")->paginate(3);
            }else{
                $activitys = Activity::paginate(3);
            }
            return view('activity.index',compact('activitys','keyword'));
        }

        public function show(Activity $activity){
            return view('activity.show',compact('activity'));
        }

}
