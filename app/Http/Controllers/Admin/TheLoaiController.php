<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\TheLoai;
use App\Http\Requests\TheLoaiRequest;

class TheLoaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $theloai = TheLoai::all();

        return view('admin.theloai.index', compact('theloai'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.theloai.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(TheLoaiRequest $request)
    {
        $TenKhongDau = changeTitle($request->Ten);
        $request->request->add(['TenKhongDau' => $TenKhongDau]);

        $theloai = new TheLoai;

        if ($theloai->create($request->all())) {
            return back()->with('thongbao', 'Thêm thể loại thành công!');
        } else {
            return back()->with('thongbaoloi', 'Thêm không thành công!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
            $theloai = TheLoai::findOrFail($id);
        } catch (\Exception $e) {
            return redirect()->route('theloai.index')->with('thongbaoloi', 'Lỗi không truy cập được!');
        }
        return view('admin.theloai.edit', compact('theloai'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(TheLoaiRequest $request, $id)
    {
        $TenKhongDau = changeTitle($request->Ten);
        $request->request->add(['TenKhongDau' => $TenKhongDau]);

        $theloai = TheLoai::find($id);

        if ($theloai->update($request->all())) {
            return redirect()->route('theloai.edit', [$id])->with('thongbao', 'Sửa thể loại thành công!');
        } else {
            return redirect()->route('theloai.edit', [$id])->with('thongbaoloi', 'Sửa không thành công!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $theloai = TheLoai::find($id);
        $theloai->delete();

        return redirect()->route('theloai.index')->with('thongbao', 'Xóa thể loại thành công!');
    }
}
