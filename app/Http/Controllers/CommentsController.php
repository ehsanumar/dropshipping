<?php

namespace App\Http\Controllers;

use App\Models\Comments;
use Egulias\EmailValidator\Parser\Comment;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    public function store($product_id, Request $request)
    {
        $comment = $request->validate([
            'comment' => 'required|min:3|max:100'
        ]);
        Comments::create([
            "user_id" => auth()->id(),
            "product_id" => $product_id,
            "comment" => $request['comment'],
        ]);
        return back()->with('msg', 'Comment created successfully');
    }
    public function destroy($comment_id)
    {
        $comment = Comments::findOrFail($comment_id);
        $comment->delete();
        return back()->with('msgdan', 'comment Deleted Seccessfuly');
    }
}
