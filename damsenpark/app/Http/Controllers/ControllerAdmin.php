<?php

namespace App\Http\Controllers;
use App\Models\envent;
use Illuminate\Http\Request;

class ControllerAdmin extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.index');
    }
    public function ve()
    {
        return view('admin.ve.quanlyve');
    }
    public function thanhtoan()
    {
        return view('admin.thanhtoan.lichsuthanhtoan');
    }
    public function users()
    {
        return view('admin.thanhvien.thanhvien');
    }
    public function sukien()
    {   
        $list_entvents=envent::all();
        return view('admin.sukien.sukien',['envent'=>$list_entvents]);
    }
    public function add_sukien()
    {   
        return view('admin.sukien.add_sukien');
    }
    public function add_sukien_db(Request $req)
    {   
        //thêm ảnh
        if ($req-> has('file')) {
            $file = $req-> file; 
            $file_name = $file-> getClientOriginalName();
            $file->move(base_path('public/uploads'),$file_name);
            }
        // thêm vào db
        envent::create([
            'sk_name' => $req->sk_name,
            'sk_price' => $req->sk_price,
            'sk_address' => $req->sk_address,
            'sk_img' => $file_name,
            'sk_detail' => $req->sk_detail,
            'sk_time' => $req->sk_time,
            'sk_status' => '1'
        ]);
        return redirect()->route('admin_sukien');
    }
    public function edit_sukien($id)
    {   
        $envent=envent::find($id);
        return view('admin.sukien.edit_sukien',['envent'=>$envent]);
    }
    public function edit_sukien_db($id ,Request $req )
    {   
        if ($req-> has('file')) {
            $file = $req-> file; 
            $file_name = $file-> getClientOriginalName();
            $file->move(base_path('public/uploads'),$file_name);
            }
        else{
            $envent =envent::find($id);
            $file_name=$envent->sk_img;
        }
        envent::find($id)->update([
            'sk_name' => $req->sk_name,
            'sk_price' => $req->sk_price,
            'sk_address' => $req->sk_address,
            'sk_img' => $file_name,
            'sk_detail' => $req->sk_detail,
            'sk_time' => $req->sk_time,
            'sk_status' => '1'
            
        ]);
        return redirect()->route('admin_sukien');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function delete_sukien($id)
    {
        envent::destroy($id);
        return redirect()->route('admin_sukien');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
