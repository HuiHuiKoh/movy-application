<?php

namespace App\Http\Controllers;

use App\Http\Requests\ForumRequest;
use App\Models\Forum;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use function abort;
use function redirect;
use function view;

/**
 * @author Koh Hui Hui
 */
class ForumController extends Controller {

    public function index() {
        return view('forum.index');
    }

    public function forum() {
        return view('forum.forum');
    }

    public function thread() {
        return view('forum.thread');
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
