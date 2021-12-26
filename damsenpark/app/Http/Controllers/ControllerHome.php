<?php

namespace App\Http\Controllers;
use App\Models\envent;
use Illuminate\Http\Request;
use Illuminate\Routing\UrlGenerator;
class ControllerHome extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   

        $url= url()->current();
        return view('nguoidung.index',['url'=>$url]);
    }
    public function lienhe()
    {   
        $url= url()->current();
        return view('nguoidung.contact',['url'=>$url]);
    }
    public function sukien()
    {   
        $envent=envent::all();
        $url= url()->current();
        return view('nguoidung.envent',['url'=>$url,'envent'=>$envent]);
    }
    public function thanhtoan()
    {
        return view('nguoidung.thanhtoan');
    }
    public function thanhcong()
    {
        return view('nguoidung.thanhcong');
    }
    public function sukienct()
    {   
        $url= url()->current();
        return view('nguoidung.sukien-chitiet',['url'=>$url]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
