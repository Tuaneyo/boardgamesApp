<?php

namespace App\Http\Controllers;

use App\Game;
use Illuminate\Http\Request;
use App\Comment;

class CommentController extends Controller
{
    /**
     * instance for storing comment
     * @return back
     * */
    public function store(Request $request)
    {

        $comment = new Comment;
        $comment->body = $request->comment;
        $comment->users()->associate($request->user());
        $game = Game::find($request->gameid);
        $game->comments()->save($comment);

        return back()->with('status', 'Congratz! comment succesfully saved');

    }

    /**
     * instance for storing a replied on comment
     * @return
     * */
    public function replied(Request $request)
    {
        if($request->ajax()){

            $reply = new Comment();
            $reply->body = $request->comment;
            $reply->users()->associate($request->user());
            $reply->parent_id = $request->comment_id;
            $game = Game::find($request->gameid);
            $game->comments()->save($reply);
            return json_encode(['username' => $request->user()->username, 'body' => $reply->body]);


        }


        //return back()->with('status', 'Congratz! replied on comment. If the comment was inpropriate then the admin will delete your post');
    }
}
