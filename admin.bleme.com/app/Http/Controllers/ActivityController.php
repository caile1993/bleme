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

    public function index(Request $request)
    {
        $activitys = Activity::paginate(3);
        $time = date("Y-m-d H:i:s");

        if($request->keyword==1){
            $activitys = Activity::where('start_time','>',$time)->paginate(3);//未进行的条件
        }elseif($request->keyword==2){
            $activitys = Activity::where('start_time','<',$time)->where('end_time','>',$time)->paginate(3);//进行中的条件
        }elseif($request->keyword==3){
            $activitys = Activity::where('end_time','<',$time)->paginate(3);//已结束的条件
        }

        return view('activity.index',['activitys' => $activitys,'keyword'=>$request->keyword]);
    }

    public function create(){
        return view('activity.create');
    }
        
    public function store(Request $request){
        $this->validate($request,[
            'title'=>'required',
            'content'=>'required',
            'start_time'=>'nullable|date',
            'end_time'=>'nullable|date',
        ],[
            'title.required' => '请填写标题',
            'content.required' => '请填写详情',
            'start_time.date' => '必须是一个正确的时间格式',
            'end_time.date' => '必须是一个正确的时间格式',
        ]);
        $data = [
            'title' => $request->title,
            'content' => $request->content,
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,
        ];
        Activity::create($data);
        return redirect()->route('activitys.index')->with('success','添加成功');
    }

    public function edit(Activity $activity){
        return view('activity.edit',compact('activity'));
    }
    
    public function update(Activity $activity,Request $request){

        $this->validate($request,[
            'title'=>'required',
            'content'=>'required',
            'start_time'=>'required|date',
            'end_time'=>'required|date',
        ],[
            'title.required' => '请填写标题',
            'content.required' => '请填写详情',
            'start_time.required' => '请填写日期',
            'start_time.date' => '必须是一个正确的时间格式',
            'end_time.required' => '请填写日期',
            'end_time.date' => '必须是一个正确的时间格式',
        ]);
            $activity->title = $request->title;
            $activity->content = $request->content;
            $activity->start_time = $request->start_time;
            $activity->end_time = $request->end_time;
            $activity->save();
            return redirect()->route('activitys.index')->with('success','修改成功');
    }

    public function destroy(Activity $activity)
    {
        $activity->delete();
        return redirect()->route('activitys.index')->with('danger','删除成功');
    }
}
