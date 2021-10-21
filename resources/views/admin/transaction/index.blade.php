@extends('admin.transaction.layout', [
    'title' => ( $title ?? 'Orders Management' )
])

@section('content')
<div class="nk-block">
    <div class="card card-bordered card-stretch">
        <div class="card-inner-group">
            <div class="card-inner">
                <div class="card-title-group">
                    <div class="card-title">
                        <h5 class="title">All Orders</h5>
                    </div>
                    <div class="card-tools mr-n1">
                        <ul class="btn-toolbar">
                            
                        </ul><!-- .btn-toolbar -->
                    </div><!-- card-tools -->
                    <div class="card-search search-wrap" data-search="search">
                        <div class="search-content">
                            <a href="#" class="search-back btn btn-icon toggle-search" data-target="search"><em class="icon ni ni-arrow-left"></em></a>
                            <input type="text" class="form-control form-control-sm border-transparent form-focus-none" placeholder="Quick search by order id">
                            <button class="search-submit btn btn-icon"><em class="icon ni ni-search"></em></button>
                        </div>
                    </div><!-- card-search -->
                </div><!-- .card-title-group -->
            </div><!-- .card-inner -->
            <div class="card-inner p-0">
                <table class="table table-tranx">
                    <thead>
                        <tr class="tb-tnx-head">
                            <th class="tb-tnx-id"><span class="">#</span></th>
                            <th class="tb-tnx-info">
                                <span class="tb-tnx-desc d-none d-sm-inline-block">
                                    <span>Bill For</span>
                                </span>
                                <span class="tb-tnx-date d-md-inline-block d-none">
                                    <span class="d-md-none">Date</span>
                                    <span class="d-none d-md-block">
                                        <span>Issue Date</span>
                                        <span>Due Date</span>
                                    </span>
                                </span>
                            </th>
                            <th class="tb-tnx-amount is-alt">
                                <span class="tb-tnx-total">Total</span>
                                <span class="tb-tnx-status d-none d-md-inline-block">Status</span>
                            </th>
                            <th class="tb-tnx-action">
                                <span>&nbsp;</span>
                            </th>
                        </tr><!-- tb-tnx-item -->
                    </thead>
                    <tbody>
                        @foreach($trans as $i => $transaction)
                        <tr class="tb-tnx-item">
                            <td class="tb-tnx-id">
                                <a href="#"><span>{{$i+1}}</span></a>
                            </td>
                            <td class="tb-tnx-info">
                                <div class="tb-tnx-desc">
                                    <span class="title">{{$transaction->name}}</span>
                                </div>
                                <div class="tb-tnx-date">
                                    <span class="date">10-05-2019</span>
                                    <span class="date">10-13-2019</span>
                                </div>
                            </td>
                            <td class="tb-tnx-amount is-alt">
                                <div class="tb-tnx-total">
                                    <span class="amount">{{$transaction->total}}</span>
                                </div>
                                <div class="tb-tnx-status">
                                    @if($transaction->status==0)
                                        <span class="badge badge-dot badge-dim">Chưa xác nhận</span>
                                    @elseif($transaction->status==1)
                                        <span class="badge badge-dot badge-warning">Đã xác nhận</span>
                                    @elseif($transaction->status==2)
                                        <span class="badge badge-dot badge-success">Hoàn thành</span>
                                    @else
                                        <span class="badge badge-dot badge-danger">Huỷ</span>
                                    @endif
                                </div>
                            </td>
                            <td class="tb-tnx-action">
                                <div class="dropdown">
                                    <a class="text-soft dropdown-toggle btn btn-icon btn-trigger" data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-xs">
                                        <ul class="link-list-plain">
                                            <li><a href="{{route('transaction.show',['id' => $transaction->id])}}">View</a></li>
                                            <li><a href="{{route('transaction.edit',['id' => $transaction->id,'key' => 'a'])}}">Approve</a></li>
                                            <li><a href="{{route('transaction.edit',['id' => $transaction->id,'key' => 'c'])}}">Complete</a></li>
                                            <li><a href="{{route('transaction.edit',['id' => $transaction->id,'key' => 'r'])}}">Reject</a></li>
                                            <li><a href="{{route('transaction.delete',['id' => $transaction->id])}}">Remove</a></li>         
                                        </ul>
                                    </div>
                                </div>
                            </td>
                        </tr><!-- tb-tnx-item -->
                        @endforeach
                    </tbody>
                </table>
            </div><!-- .card-inner -->
            <div class="card-inner">
                {!!$trans->links('pagination::bootstrap-4')!!}
            </div><!-- .card-inner -->
        </div><!-- .card-inner-group -->
    </div><!-- .card -->
</div>

@endsection