<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CommentRequest;
use App\Http\Requests\StoreTaskRequest;
use App\Jobs\SendTaskDoneEmail;
use App\Models\Comment;
use App\Models\Department;
use App\Models\Label;
use App\Models\Task;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        // Không phải admin và trưởng bộ môn
        if (! $user->hasRole('Admin') && ! $user->hasRole('Trưởng bộ môn')) {
            $tasks = $tasks->whereHas('users', function ($query) use ($user) {
                $query->where('user_id', $user->id);
            });
        }
        else {
            $tasks = $tasks->where('parent_id', null);
        }
        // Trưởng bộ môn
        if ($user->hasRole('Trưởng bộ môn')) {
            $tasks = $tasks->where('department_id', $user->department_id);
        }
        // tìm kiếm
        if ($request->search) {
            $tasks = $tasks->where('title', 'like', '%'.$request->search.'%');
        }

        $tasks = $tasks->paginate(10)->appends(['search' => $request->search]);

        $data = [
            'tasks' => $tasks,
        ];

        return view('admin.task.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $users = User::where('id', '!=', 1);
        $labels = Label::all();
        $departments = Department::all();
        if ($request->parent_id) {
            $departmentId = Task::find($request->parent_id)->department_id;
            $users = $users->where('department_id', $departmentId);
        }
        $users = $users->get();

        $data = [
            'departments' => $departments,
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

            $params = $request->all();
            $user = auth()->user();
            // là task con THÌ bộ môn = bộ môn task cha
            if ($request->parent_id) {
                $parentTask = Task::find($request->parent_id);
                $params['department_id'] = $parentTask->department_id;
            }
            // là task cha
            else {
                if (! $user->hasRole('Admin')) {
                    $params['department_id'] = $user->department_id;
                }
            }

            $params['start_date'] = $request->start_date ? date('Y-m-d', strtotime($request->start_date)) : null;
            $params['end_date'] = $request->end_date ? date('Y-m-d', strtotime($request->end_date)) : null;
            $params['estimated_time'] = $request->estimated_time ? date('Y-m-d', strtotime($request->estimated_time)) : null;
            $task = Task::create($params);

            $task->users()->attach($request->users);
            $task->labels()->attach($request->labels);

            // Gửi mail khi trạng thái là "Đã giải quyết"
            if ($task->status == 5) {
                $this->sendMail($task);
            }

            DB::commit();

            if (isset($params['parent_id'])) {
                return redirect()->route('tasks.show', $params['parent_id'])->with('alert-success', 'Thêm công việc thành công!');
            }
            return redirect()->route('tasks.index')->with('alert-success', 'Thêm công việc thành công!');
        } catch (Exception $e) {
            dd($e);
            DB::rollback();

            return redirect()->back()->with('alert-error', 'Thêm công việc thất bại!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task)
    {
        $users = User::all();
        $labels = Label::all();
        $comments = Comment::where('task_id', $task->id)->get();
        $departments = Department::all();

        $data = [
            'departments' => $departments,
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
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $task)
    {
        $departmentId = old('department_id', $task->department_id);
        $users = User::where('department_id', $departmentId)->get();
        $labels = Label::all();
        $departments = Department::all();

        $data = [
            'departments' => $departments,
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
     * @return \Illuminate\Http\Response
     */
    public function update(StoreTaskRequest $request, Task $task)
    {
        try {
            DB::beginTransaction();

            $params = $request->all();
            $user = auth()->user();
            // là task con THÌ bộ môn = bộ môn task cha
            if ($request->parent_id) {
                $parentTask = Task::find($request->parent_id);
                $params['department_id'] = $parentTask->department_id;
            }
            // là task cha
            else {
                if (! $user->hasRole('Admin')) {
                    $params['department_id'] = $user->department_id;
                }
            }

            $params['start_date'] = $request->start_date ? date('Y-m-d', strtotime($request->start_date)) : null;
            $params['end_date'] = $request->end_date ? date('Y-m-d', strtotime($request->end_date)) : null;
            $params['estimated_time'] = $request->estimated_time ? date('Y-m-d', strtotime($request->estimated_time)) : null;

            $task->update($params);

            if ($user->hasRole('Admin') || $user->hasRole('Trưởng bộ môn')) {
                $task->users()->sync($request->users);
            }
            $task->labels()->sync($request->labels);

            // Gửi mail khi trạng thái là "Đã giải quyết"
            if ($task->status == 5) {
                $this->sendMail($task);
            }

            DB::commit();

            if (!empty($task->parent_id)) {
                return redirect()->route('tasks.show', $task->parent_id)->with('alert-success', 'Thêm công việc thành công!');
            }
            return redirect()->route('tasks.index')->with('alert-success', 'Sửa công việc thành công!');
        } catch (Exception $e) {
            DB::rollback();

            return redirect()->back()->with('alert-error', 'Sửa công việc thất bại!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {
        try {
            DB::beginTransaction();

            if ($task->isParent() && $task->subTasks->count() > 0) {
                return redirect()->back()->with('alert-error', 'Xóa công việc thất bại! Công việc "'.$task->title.'" đang có công việc con.');
            }

            $task->users()->detach();
            $task->labels()->detach();
            $task->destroy($task->id);

            DB::commit();

            return redirect()->back()->with('alert-success', 'Xóa công việc thành công!');
        } catch (Exception $e) {
            DB::rollback();

            return redirect()->back()->with('alert-error', 'Xóa công việc thất bại!');
        }
    }

    public function comment(CommentRequest $request, $id)
    {
        try {
            DB::beginTransaction();

            Comment::create([
                'task_id' => $id,
                'user_id' => auth()->id(),
                'content' => $request->content,
            ]);

            DB::commit();

            return redirect()->back()->with('alert-success', 'Bạn đã bình luận thành công!');
        } catch (Exception $e) {
            DB::rollback();

            return redirect()->back()->with('alert-error', 'Bạn đã bình luận thất bại!');
        }
    }

    private function sendMail($task)
    {
        $emailAdmins = User::role('Admin')->get()->pluck('email')->toArray();
        $emailDepartments = User::role('Trưởng bộ môn')->where('department_id', $task->department_id)->get()->pluck('email')->toArray();

        $job = (new SendTaskDoneEmail($emailAdmins, $task->toArray(), $emailDepartments))
            ->delay(now());
        dispatch($job);
    }
}
