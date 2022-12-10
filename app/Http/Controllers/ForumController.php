<?php

namespace App\Http\Controllers;

use App\Http\Requests\ForumRequest;
use App\Http\Requests\ReplyRequest;
use App\Http\Requests\ThreadRequest;
use App\Models\Forum;
use App\Models\Reply;
use App\Models\Thread;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use function abort;
use function redirect;
use function view;

/**
 * @author Koh Hui Hui
 */
class ForumController extends Controller {

    public function index() {
        $forums = Forum::all();
        return view('forum.index', compact('forums'));
    }

    public function forum() {
        return view('forum.forum');
    }

    public function thread($id) {
        try {
            $forums = Forum::find($id);
            $threads = DB::table('threads')
                    ->where('forum_id', '=', $id)
                    ->get();
            return view('forum.thread',
                    compact('forums', 'id'),
                    ['threads' => $threads]);
        } catch (QueryException $e) {
            abort(500);
        }
    }

    public function reply($id) {
//        try {
            $threads = DB::table('threads')
                    ->select('*')
                    ->where('threads.id', '=', $id)
                    ->join('users', 'threads.user_id', '=', 'users.id')
                    ->get();
            $replies = DB::table('replies')
                    ->select('*')
                    ->where('replies.thread_id', '=', $id)
                    ->join('users', 'replies.user_id', '=', 'users.id')
                    ->get();
            if ($replies->isEmpty()) {
                $replies = null;
            }
            return view('forum.reply', [
                'replies' => $replies,
                'threads' => $threads
            ]);
//        } catch (QueryException $e) {
//            abort(500);
//        }
    }

    public function post($id) {
        try {
            $threads = DB::table('threads')
                    ->where('user_id', '=', $id)
                    ->get();
            if ($threads->isEmpty()) {
                $threads = null;
            }
            return view('forum.post', [
                'threads' => $threads
            ]);
        } catch (QueryException $e) {
            abort(500);
        }
    }

    public function create() {
        try {
            $forums = Forum::all();
            return view('forum.create', ['forums' => $forums]);
        } catch (QueryException $e) {
            abort(500);
        }
    }

    public function deleteReply($id) {
        try {
            Reply::find($id)->delete();
            return redirect()->back()->with('success', 'Comment has been deleted.');
        } catch (QueryException $e) {
            abort(500);
        }
    }

    public function storeReply(ReplyRequest $request) {
        $request->validationData();
        $userid = Auth::user()->id;

        try {
            Reply::create([
                'user_id' => $userid,
                'content' => $request->get('content'),
                'thread_id' => $request->thread,
                'created_at' => Carbon::now()->toDateTimeString(),
            ]);
            return redirect()->back()->with('success', 'Comment has been added.');
        } catch (QueryException $e) {
            abort(500);
        }
    }

    public function storePost(ThreadRequest $request) {
        $request->validationData();
        $userid = Auth::user()->id;

        try {
            Thread::create([
                'title' => $request->get('title'),
                'content' => $request->get('content'),
                'forum_id' => $request->forum,
                'user_id' => $userid,
                'created_at' => Carbon::now()->toDateTimeString(),
            ]);
            return redirect()->back()->with('success', 'Post has been added.');
        } catch (QueryException $e) {
            abort(500);
        }
    }

    public function list() {

        try {
            $forums = Forum::all();
            return view('admin.forum_list', compact('forums'));
        } catch (QueryException $e) {
            abort(500);
        }
    }

    public function add() {
        return view('admin.forum_add');
    }

    public function store(ForumRequest $request) {
        $request->validationData();

        try {
            Forum::create([
                'title' => $request->get('title'),
                'created_at' => Carbon::now()->toDateTimeString(),
            ]);
            return redirect()->back()->with('success', 'New Item has been added.');
        } catch (QueryException $e) {
            abort(500);
        }
    }

    public function edit($id) {
        try {
            $forums = Forum::find($id);
            return view('admin.forum_update', compact('forums', 'id'));
        } catch (QueryException $e) {
            abort(500);
        }
    }

    public function update(Request $request, $id) {

        $forums = Forum::find($id);

        $this->validate($request, [
            'title' => 'required|string|max:250',
        ]);

        $forums->title = $request->get('title');
        $forums->updated_at = Carbon::now()->toDateTimeString();

        $forums->save();

        return redirect()->back()->with('success', 'Item has been updated.');
    }

    public function delete($id) {
        try {
            Forum::find($id)->delete();
            return redirect()->back()->with('success', 'Item has been deleted.');
        } catch (QueryException $e) {
            abort(500);
        }
    }

    public function renew() {
        try {
            $forums = Forum::onlyTrashed()->get();
            return view('admin.forum_restore', compact('forums'));
        } catch (QueryException $e) {
            abort(500);
        }
    }

    public function restore($id) {
        try {
            Forum::onlyTrashed()->find($id)->restore();
            return redirect()->back()->with('success', 'Item has been restored.');
        } catch (QueryException $e) {
            abort(500);
        }
    }

}
