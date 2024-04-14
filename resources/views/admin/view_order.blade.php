@extends('admin_layout');
@section('admin_content')
<div class="table-agile-info">
    <div class="panel panel-default">
        <div class="panel-heading">
        Thông tin khách hàng
        </div>
        <div class="table-responsive">
            <?php
                    $message = session()->get('message');
                    echo '<div style="color: red">',$message,'</div>';
                    Session()->put('message',null);
                    ?>
        <table class="table table-striped b-t b-light">
            <thead>
            <tr>
                <th>Tên khách hàng</th>
                <th>Số điện thoại</th>
                <th>Email</th>
                <th>Hiển thị</th>

                <th style="width:30px;"></th>
            </tr>
            </thead>
            <tbody>

                    <tr>
                        <td>{{$customer->customer_name}}</td>
                        <td>{{$customer->customer_phone}}</td>
                        <td>{{$customer->customer_email}}</td>

                        <td>
                        <a href="{{URL::to('/edit')}}" class="active" ui-toggle-class="">
                            <i class="fa fa-check text-success text-active"></i>
                        </a>
                        <a href="{{URL::to('/delete')}}">
                            <i class="fa fa-times text-danger text " onclick="return confirm('Are you sure?')"></i>
                        </a>
                        </td>
                    </tr>
            </tbody>
        </table>
        </div>
    </div>
</div>
<div class="table-agile-info">
    <div class="panel panel-default">
        <div class="panel-heading">
        Chi tiết hóa đơn
        </div>

        <div class="table-responsive">
            <?php
                    $message = session()->get('message');
                    echo '<div style="color: red">',$message,'</div>';
                    Session()->put('message',null);
                    ?>
        <table class="table table-striped b-t b-light">
            <thead>
            <tr>
                <th style="width:20px;">STT
                </th>
                <th>Ảnh</th>
                <th>Hàng còn</th>
                <th>Tên sản phẩm</th>
                <th>Giá</th>
                <th>Size</th>
                <th>Số lượng</th>
                <th>Thành tiền</th>



            </tr>
            </thead>
            <tbody>
                <?php
                    $i=0;
                    $subtotal=0;
                ?>
               @foreach($order_detailss as$key =>$detail)
               <?php
                    $i++;
                    $total=$detail->product_price*$detail->product_sales_qty;
                    $subtotal +=$total;
                ?>
                    <tr>
                        <td>{{$i}}</td>
                        <td><img src="../upload/product/{{$detail->product->product_image}}" alt="" width="40px" height="50px"></td>
                        <td>{{$detail->product->product_quantity}}</td>
                        <td>{{$detail->product_name}}</td>
                        <td>{{$detail->product_price}}</td>
                        <td>{{$detail->product_size}}</td>
                        <input type="hidden" value="{{$detail->product->product_quantity}}" class="product_quantity_{{$detail->product_id}}">
                        <td><input type="number" name="product_sales_quantity" class="order_qty_{{$detail->product_id}}" value="{{$detail->product_sales_qty}}" min="1" max="{{$detail->product->product_quantity}}">
                        <input type="hidden" name="order_product_id" class="order_product_id" value="{{$detail->product_id}}">
                        <input type="hidden" name="" class="order_code" value="{{$detail->order_code}}">
                        <button class="order_update_btn" data-product_id="{{$detail->product_id}}">Cập nhật</button></td>

                        <td>{{number_format($total,0,',','.')}}đ</td>
                        <td>
                        <a href="{{URL::to('/edit')}}" class="active" ui-toggle-class="">
                            <i class="fa fa-check text-success text-active"></i>
                        </a>
                        <a href="{{URL::to('/delete')}}">
                            <i class="fa fa-times text-danger text " onclick="return confirm('Bạn muốn xóa mục này?')"></i>
                        </a>
                        </td>

                    </tr>

                    @endforeach
                     <tr>
                         <td></td>
                        <td style="color: red;">Tổng tiền:{{number_format($subtotal,0,',','.')}}đ
                        </td>
                        <td colspan="1">
                            @foreach($order as $key=>$or)
                            @if($or->order_status==1)
                                <form>@csrf
                                    <select class="form-control order_details" >
                                        <option value="">Chọn </option>
                                        <option id="{{$or->order_id}}"  value="1">Chưa xử lý</option>
                                        <option id="{{$or->order_id}}" value="2">Đã hoàn thành</option>
                                        <option id="{{$or->order_id}}" value="3">Đã hủy</option>
                                    </select>
                                </form>
                            @elseif($or->order_status==2)
                                <form> @csrf
                                    <select class="form-control order_details" >
                                        <option value="">Chọn </option>
                                        <option id="{{$or->order_id}}" value="1">Chưa xử lý</option>
                                        <option id="{{$or->order_id}}" selected value="2">Đã hoàn thành</option>
                                        <option id="{{$or->order_id}}" value="3">Đã hủy</option>
                                    </select>
                                </form>
                            @else
                                <form>
                                     @csrf
                                    <select class="form-control order_details" >
                                        <option value="">Chọn </option>
                                        <option id="{{$or->order_id}}" value="1">Chưa xử lý</option>
                                        <option id="{{$or->order_id}}"  value="2">Đã hoàn thành</option>
                                        <option id="{{$or->order_id}}" selected value="3">Đã hủy</option>
                                    </select>
                                </form>
                            @endif
                            @endforeach
                        </td>
                    </tr>
            </tbody>
        </table>
        </div>
    </div>
</div>

<div class="table-agile-info">
    <div class="panel panel-default">
        <div class="panel-heading">
        Thông tin vận chuyển
        </div>
        <div class="table-responsive">
            <?php
                    $message = session()->get('message');
                    echo '<div style="color: red">',$message,'</div>';
                    Session()->put('message',null);
                    ?>
        <table class="table table-striped b-t b-light">
            <thead>
            <tr>
                <th style="width:20px;">
                </th>
                <th>Tên Người chuyển</th>
                <th>Điạ chỉ</th>
                <th>Email</th>
                <th>Số điện thoại</th>
                <th>Ghi chú</th>
                <th>Hình thức thanh toán</th>
                <th style="width:30px;"></th>
            </tr>
            </thead>
            <tbody>

                    <tr>
                        <td></td>
                        <td>{{$shipping->shipping_name}}</td>
                        <td>{{$shipping->shipping_address}}</td>
                        <td>{{$shipping->shipping_email}}</td>
                        <td>
                        {{$shipping->shipping_phone}}
                        </td>
                        <td>{{$shipping->shipping_notes}}</td>
                        <td>
                            @php
                                if($shipping->payment_method=2)
                                echo 'Trả tiền mặt';
                            @endphp
                        </td>

                        <td>
                        <a href="{{URL::to('/edit')}}" class="active" ui-toggle-class="">
                            <i class="fa fa-check text-success text-active"></i>
                        </a>
                        <a href="{{URL::to('/delete')}}">
                            <i class="fa fa-times text-danger text " onclick="return confirm('Are you sure?')"></i>
                        </a>
                        </td>
                    </tr>
            </tbody>
        </table>
        </div>
    </div>
</div>
@endsection
