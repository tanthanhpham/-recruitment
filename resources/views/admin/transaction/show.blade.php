@extends('admin.transaction.layout', [
    'title' => ( $title ?? 'Orders Management' )
])

@section('content')
<div class="invoice">
    <!-- <div class="invoice-action">
        <a class="btn btn-icon btn-lg btn-white btn-dim btn-outline-primary" href="html/invoice-print.html" target="_blank"><em class="icon ni ni-printer-fill"></em></a>
    </div> -->
    <div class="invoice-wrap">
        <div class="invoice-brand text-center">
            <img src="./images/logo-dark.png" srcset="./images/logo-dark2x.png 2x" alt="">
        </div>
        <div class="invoice-head">
            <div class="invoice-contact">
                <span class="overline-title">Invoice To</span>
                <div class="invoice-contact-info">
                    <h4 class="title">{{$trans->name}}</h4>
                    <ul class="list-plain">
                        <li><em class="icon ni ni-map-pin-fill"></em><span>{{$trans->address}}<br></span></li>
                        <li><em class="icon ni ni-call-fill"></em><span>{{$trans->phone_number}}</span></li>
                    </ul>
                </div>
            </div>
            <div class="invoice-desc">
                <h3 class="title">Invoice</h3>
                <ul class="list-plain">
                    <li class="invoice-id"><span>Invoice ID</span>:<span>{{$trans->id}}</span></li>
                    <li class="invoice-date"><span>Date</span>:<span>{{$trans->created_at}}</span></li>
                </ul>
            </div>
        </div><!-- .invoice-head -->
        <div class="invoice-bills">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th class="w-150px">Item ID</th>
                            <th class="w-60">Product name</th>
                            <th>Price</th>
                            <th>Size</th>
                            <th>Qty</th>
                            <th>Amount</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($trans->orders as $item)
                        <tr>
                            <td>
                                {{$item->id}}
                            </td>
                            <td>
                                @foreach($products as $product)
                                    @if($product->id == $item->product_id)
                                        {{$product->name}}
                                    @endif
                                @endforeach
                                <td> <?php echo number_format($item->price)."đ"; ?></td>
                            <td>
                                @foreach($sizes as $size)
                                    @if($size->id == $item->size_id)
                                        {{$size->name}}
                                    @endif
                                @endforeach
                            </td>
                            <td>
                                {{$item->orders->number}}
                            </td>
                            <td>
                                @php
                                    $price=$item->price*$item->orders->number
                                @endphp
                                <?php echo number_format($price)."đ"; ?>
                            </td>
                        </tr>
                        @endforeach

                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="2"></td>
                            <td colspan="3">Subtotal</td>
                            <td><?php echo number_format($trans->total)."đ"; ?></td>
                        </tr>
                    </tfoot>
                </table>
                <div class="nk-notes ff-italic fs-12px text-soft"> Invoice was created on a computer and is valid without the signature and seal. </div>
            </div>
        </div><!-- .invoice-bills -->
    </div><!-- .invoice-wrap -->
</div>
@endsection