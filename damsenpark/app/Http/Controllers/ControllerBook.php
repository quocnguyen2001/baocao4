<?php

namespace App\Http\Controllers;
use App\Models\book;
use App\Models\pay;
use App\Models\ve;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
class ControllerBook extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function booking(Request $req)
    {
        //dd($req->all());
        $id_ve=mt_rand(1, 100);
        $tien=($req->soluong)*($req->loaive);
        //$req->session()->put('thanhtoan', $tien);
        $data=$req->all();
        book::create([
            'loaive' => $req->loaive,
            'ngaydung' => $req->ngaydung,
            'soluong' => $req->soluong,
            'hoten' => $req->hoten,
            'sdt' => $req->sdt,
            'email' => $req->email,
            'id_ve' => $id_ve,
            
        ]);
        //$value = $req->session()->get('thanhtoan');
        //echo $value;
        //return redirect()->route('thanhtoan' );
        return view('nguoidung.thanhtoan',['data'=>$data,'tien'=>$tien,'id_ve'=>$id_ve,'sl'=>$req->soluong,'sdt'=>$req->sdt,'email'=>$req->email]);
        //print_r($data['soluong']);
    }
    public function pay(Request $req)
    {
        
        //dd($req->all());
        pay::create([
            'name_order' => $req->name_order,
            'stk_payment' => $req->stk_payment,
            'hsd_the' => $req->hsd_the,
            'codeCVV' => $req->codeCVV,
            'id_ve' => $req->id_ve,
            'status' => '1',
            
        ]);
        for($i=0;$i<($req->sl);$i++){
            $mave='DSVE'.''.mt_rand(1,1000);
            ve::create([
                'id_ve' => $req->id_ve,
                'mave' => $mave,
                
                
            ]);
        }
        //$vedat=ve::find($req->id_ve);
        $vedat = DB::table('ve')->where('id_ve',$req->id_ve)->get();
        $data=['hoten'=>$req->name_order,'sdt'=>$req->sdt,'vedat'=>$vedat];
        Mail::send('email.datve',['data'=>$data],function($message){
            $message->from('quocnguyenfpt01@gmail.com',"ĐẦM SEN PARK - ĐẶT VÉ");
            $message->to('quocnguyenfpt01@gmail.com')->subject("Đặt vé thành công");
        });
        $vedat = DB::table('ve')->where('id_ve',$req->id_ve)->get();
        return view('nguoidung.thanhcong',['vedat'=>$vedat]);
        //return redirect()->route('tc');
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
