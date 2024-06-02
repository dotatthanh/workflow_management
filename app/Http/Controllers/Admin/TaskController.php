<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CommentRequest;
use App\Http\Requests\StoreTaskRequest;
use App\Models\Comment;
use App\Models\Label;
use App\Models\Task;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user = auth()->user();
        $tasks = Task::query();
        if (! $user->hasRole('Admin')) {
            $tasks = $tasks->whereHas('users', function($query) use ($user) {
                $query->where('user_id', $user->id);
            });
        }
        $tasks = $tasks->paginate(10);

        if ($request->search) {
            $tasks = Task::where('title', 'like', '%'.$request->search.'%')->paginate(10);
            $tasks->appends(['search' => $request->search]);
        }

        $data = [
            'tasks' => $tasks
        ];

        return view('admin.task.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();
        $labels = Label::all();

        $data = [
            'users' => $users,
            'labels' => $labels,
        ];

        return view('admin.task.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTaskRequest $request)
    {
        try {
            DB::beginTransaction();
            $task = Task::create([
                'title' => $request->title,
                'start_date' => date("Y-m-d", strtotime($request->start_date)),
                'end_date' => date("Y-m-d", strtotime($request->end_date)),
                'priority' => $request->priority,
                'progress' => $request->progress,
                'estimated_time' => $request->estimated_time ? date("Y-m-d", strtotime($request->estimated_time)) : null,
                'description' => $request->description,
                'status' => $request->status,
            ]);

            $task->users()->attach($request->users);
            $task->labels()->attach($request->labels);

            DB::commit();
            return redirect()->route('tasks.index')->with('alert-success','Thêm công việc thành công!');
        } catch (Exception $e) {
            DB::rollback();
            return redirect()->back()->with('alert-error','Thêm công việc thất bại!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task)
    {
        $users = User::all();
        $labels = Label::all();
        $comments = Comment::where('task_id', $task->id)->get();

        $data = [
            'users' => $users,
            'labels' => $labels,
            'data_edit' => $task,
            'comments' => $comments,
        ];

        return view('admin.task.detail', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $task)
    {
        $users = User::all();
        $labels = Label::all();

        $data = [
            'users' => $users,
            'labels' => $labels,
            'data_edit' => $task,
        ];

        return view('admin.task.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(StoreTaskRequest $request, Task $task)
    {
        try {
            DB::beginTransaction();

            $task->update([
                'title' => $request->title,
                'start_date' => date("Y-m-d", strtotime($request->start_date)),
                'end_date' => date("Y-m-d", strtotime($request->end_date)),
                'priority' => $request->priority,
                'progress' => $request->progress,
                'estimated_time' => $request->estimated_time ? date("Y-m-d", strtotime($request->estimated_time)) : null,
                'description' => $request->description,
                'status' => $request->status,
            ]);

            $task->users()->sync($request->users);
            $task->labels()->sync($request->labels);

            DB::commit();
            return redirect()->route('tasks.index')->with('alert-success','Sửa công việc thành công!');
        } catch (Exception $e) {
            DB::rollback();
            return redirect()->back()->with('alert-error','Sửa công việc thất bại!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {
        try {
            DB::beginTransaction();

            $task->users()->detach();
            $task->labels()->detach();
            $task->destroy($task->id);

            DB::commit();
            return redirect()->route('tasks.index')->with('alert-success','Xóa công việc thành công!');
        } catch (Exception $e) {
            DB::rollback();
            return redirect()->back()->with('alert-error','Xóa công việc thất bại!');
        }
    }

    public function comment(CommentRequest $request, $id) {
        try {
            DB::beginTransaction();

            Comment::create([
                'task_id' => $id,
                'user_id' => auth()->id(),
                'content' => $request->content,
            ]);

            DB::commit();
            return redirect()->back()->with('alert-success','Bạn đã bình luận thành công!');
        } catch (Exception $e) {
            DB::rollback();
            return redirect()->back()->with('alert-error','Bạn đã bình luận thất bại!');
        }
    }
}
