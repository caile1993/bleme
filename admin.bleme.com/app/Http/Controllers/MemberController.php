<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class MemberController extends Controller
{
    //首页
    public function index(Request $request){
        $keyword = $request->keyword;
        if($keyword){
            $members = Member::where('name','like',"%$keyword%")->paginate(3);
        }else{
            $members = Member::paginate(3);
        }
        return view('member.index',compact('members','keyword'));
    }

    //删除
    public function destroy(Member $member)
    {
        $member->delete();
        return redirect()->route('members.index')->with('success','删除成功');
    }

    public function create()
    {
        return view('member.create');
    }

    public function store(Request $request)
    {
        Member::create([
            'username' =>$request->username,
            'tel' =>$request->tel,
            'password' =>Hash::make($request->password),
        ]);
        return redirect()->route('members.index')->with('success','添加成功');
    }

}
