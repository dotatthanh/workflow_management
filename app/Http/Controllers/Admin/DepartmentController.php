<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDepartmentRequest;
use App\Models\Department;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $departments = Department::paginate(10);

        if ($request->search) {
            $departments = Department::where('name', 'like', '%'.$request->search.'%')->paginate(10);
            $departments->appends(['search' => $request->search]);
        }

        $data = [
            'departments' => $departments,
        ];

        return view('admin.department.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.department.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDepartmentRequest $request)
    {
        try {
            DB::beginTransaction();

            $create = Department::create([
                'name' => $request->name,
                'guard_name' => 'admin',
            ]);

            DB::commit();

            return redirect()->route('departments.index')->with('alert-success', 'Thêm bộ môn thành công!');
        } catch (Exception $e) {
            DB::rollback();

            return redirect()->back()->with('alert-error', 'Thêm bộ môn thất bại!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $department = Department::findOrFail($id);

        $data = [
            'data_edit' => $department,
        ];

        return view('admin.department.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreDepartmentRequest $request, $id)
    {
        try {
            DB::beginTransaction();

            $update = Department::findOrFail($id)->update([
                'name' => $request->name,
            ]);

            DB::commit();

            return redirect()->route('departments.index')->with('alert-success', 'Cập nhật bộ môn thành công!');
        } catch (Exception $e) {
            DB::rollback();

            return redirect()->back()->with('alert-error', 'Cập nhật bộ môn thất bại!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            DB::beginTransaction();

            $department = Department::findOrFail($id);

            if ($department->users->count() > 0) {
                return redirect()->back()->with('alert-error', 'Xóa bộ môn thất bại! Bộ môn '.$department->name.' đang có tài khoản.');
            }

            $department->destroy($id);
            DB::commit();

            return redirect()->route('departments.index')->with('alert-success', 'Xóa bộ môn thành công!');
        } catch (Exception $e) {
            DB::rollback();

            return redirect()->back()->with('alert-error', 'Xóa bộ môn thất bại!');
        }
    }
}
