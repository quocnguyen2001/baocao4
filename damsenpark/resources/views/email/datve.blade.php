<style>
    h1{
        color:red;
    }
</style>
<h1>Bạn đã đặt thành công vé</h1>
<li>Họ Tên :{{$data['hoten']}}</li>
<li>Số điện thoại : {{$data['sdt']}}</li>

<hr>
<h3>Tất cả các vé</h3>
@foreach($data['vedat'] as $v)
            
                                            <div class="col-md-3" style="float:left">
                                                <div class="card mb-2">
                                                    <div class="img-qr"> 
                                                        <img class="card-img-top"
                                                        src="https://i.upanh.org/2021/12/26/qr.png" width="100px"
                                                            alt="Card image cap">
                                                       </div>
                                                    <div class="card-body text-center">
                                                        <h4 class="card-title">{{$v->mave}}</h4>
                                                        <p class="vecong mb-0">Vé cổng</p>  
                                                        <p class="dot my-0 font-weight-bold">---</p>
                                                        
                                                        <div class="mt-3">
                                                            <img src="images/tick.png" width="40px" alt="">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach