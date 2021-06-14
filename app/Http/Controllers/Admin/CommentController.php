<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CommentController extends Controller
{
    public function commentAll()
    {
        $query = Comment::query();
        $comments = $query
            ->where('is_valid','=','0')
            ->orderBy('created_at', 'DESC')
            ->paginate(20);
        return view('admin.comment',['comments'=>$comments]);
    }
    public function commentGood(Request $request)
    {
        DB::table('comments')
            ->where('id','=',$request->input('id'))
            ->update(['is_valid'=>1]);
        return redirect()->back();
    }
    public function commentBad(Request $request)
    {
        DB::table('comments')
            ->where('id','=',$request->input('id'))
            ->delete();
        return redirect()->back();
    }
    public function commentBadAll(Request $request)
    {
        $comment = Comment::all()
            ->where('id','=',$request->input('id'))
            ->first();
        $user_id = $comment->user_id;
        DB::table('comments')
            ->where('user_id','=',$user_id)
            ->where('is_valid','=',0)
            ->delete();
        return redirect()->back();
    }
}
