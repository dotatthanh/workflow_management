<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreLabelRequest;
use App\Models\Label;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LabelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $labels = Label::paginate(10);

        if ($request->search) {
            $labels = Label::where('name', 'like', '%'.$request->search.'%')->paginate(10);
            $labels->appends(['search' => $request->search]);
        }

        $data = [
            'labels' => $labels,
        ];

        return view('admin.label.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.label.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreLabelRequest $request)
    {
        try {
            DB::beginTransaction();

            Label::create([
                'name' => $request->name,
                'color' => $request->color,
            ]);

            DB::commit();

            return redirect()->route('labels.index')->with('alert-success', 'Thêm nhãn dán thành công!');
        } catch (Exception $e) {
            DB::rollback();

            return redirect()->back()->with('alert-error', 'Thêm nhãn dán thất bại!');
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
        $label = Label::findOrFail($id);

        $data = [
            'data_edit' => $label,
        ];

        return view('admin.label.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreLabelRequest $request, $id)
    {
        try {
            DB::beginTransaction();

            Label::findOrFail($id)->update([
                'name' => $request->name,
                'color' => $request->color,
            ]);

            DB::commit();

            return redirect()->route('labels.index')->with('alert-success', 'Cập nhật nhãn dán thành công!');
        } catch (Exception $e) {
            DB::rollback();

            return redirect()->back()->with('alert-error', 'Cập nhật nhãn dán thất bại!');
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

            $label = Label::findOrFail($id);
            $label->destroy($id);

            DB::commit();

            return redirect()->route('labels.index')->with('alert-success', 'Xóa nhãn dán thành công!');
        } catch (Exception $e) {
            DB::rollback();

            return redirect()->back()->with('alert-error', 'Xóa nhãn dán thất bại!');
        }
    }
}
