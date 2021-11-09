<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body{
            font-size: 18px;
        }
        table td {
            font-size: 17px;
            padding-left: 10px;
        }

        .th{
            font-size: 18px;
            font-weight: bold;
        }
        h5 {
            margin-bottom: 0;
            font-size: 18px;
        }
        #footer{
            margin-left: 10px;
            margin-top: 0;
            font-style: italic;
        }

        #p{
            margin: 1px;
            margin-left: 10px;
            
        }
    </style>
</head>
<body>
<p>Chào anh chị, <br>Cảm ơn Anh/chị đã mua hàng tại Boong Store <br>@if($trans->status == 1) Đơn hàng trong quá trình vận chuyển, thời gian nhận hàng sau 3 - 4 ngày kể từ hôm nay.
@else 
    Nhân viên của chúng tôi sẽ gọi điện xác nhận đơn hàng trong thời gian sớm nhất, nhờ anh/chị chú ý đến điện thoại.
@endif</p>
<table>
    <tr>
        <td class="th">
            Thông tin khác hàng
        </td>
        <td  class="th">
            Địa chỉ nhận hàng
        </td>
    </tr>
    <tr>
        <td>
        {{$trans->name}}
        </td>
        <td rowspan="3">
        {{$trans->address}}
        </td>
    </tr>
    <tr>
        <td>
        {{$trans->email}}
        </td>
    </tr>
    <tr>
        <td>
        {{$trans->phone_number}}
        </td>
    </tr>
</table>
<table >
    <tr>
        <td  class="th">
            Hình thức thanh toán
        </td>
       
    </tr>
    <tr>
        <td>
        {{$trans->payment}}
        </td>
    </tr>
</table>
<table>
    <tbody>
        @foreach($trans->orders as $item)
        <tr>
            <td>
                @foreach($products as $product)
                    @if($product->id == $item->product_id)
                        {{$product->name}}
                    @endif
                @endforeach
               <br>
                &nbsp;&nbsp;&nbsp;&nbsp;x  {{$item->orders->number}}
            <td>
                @foreach($sizes as $size)
                    @if($size->id == $item->size_id)
                        {{$size->name}}
                    @endif
                @endforeach
            </td>
            <td>
                @php
                    $price=$item->price*$item->orders->number
                @endphp
                {{$price}}
            </td>
        </tr>
        @endforeach
    </tbody>
    <tfoot>
        <tr>
            <td></td>
            <td >Thành tiền</td>
            <td>{{$trans->total}}</td>
        </tr>
    </tfoot>
</table>
<h5>Ghi chú:</h5>
<p id="p">
    Nếu Anh/chị có bất kỳ câu hỏi nào, xin liên hệ với chúng tôi tại phamtanthanh.it@gmail.com
<br>
<p id="footer">Trân trọng,</p>
    
</body>
</html>
