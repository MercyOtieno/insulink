@extends('core/base::layouts.master')
@section('content')
<div class="table-wrapper">
    <div class="card light bordered card-no-padding">
        <div class="card-header">
            <div class="row">
                <div class="col-sm-6"><h4>List of Underwriters</h4></div>
                <div class="col-sm-6">
                    <div class="dt-buttons btn-group float-right">
                        <a class="btn btn-primary action-item" href="{{route('underwriters.create')}}">Add New Underwriter</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table uk-table-striped uk-table-hover uk-table uk-table-responsive uk-table-justify" id="datatable">
                    <thead>
                        <th>COMPANY NAME</th>
                        <th></th>
                        <th>PHONE</th>
                        <th>PAYMENT METHODS</th>
                        <th>ADDRESS</th>
                        <th>STATUS</th>
                        <th style="width: 100px">ACTIONS</th>
                    </thead>
                    <tbody>
                        @foreach ($underwriters as $item)
                        <tr>
                            <td><img src="{{$item->logo}}" alt="{{$item->company}}" style="max-width: 100px"></td>
                            <td>{{$item->company}}</td>
                            <td>{{$item->phone}}</td>
                            <td>
                                @if ($item->paymentmethod)
                                <div class="uk-margin-small-right" data-toggle="tooltip" data-placement="top" title="Paybill Number is - {{$item->paymentmethod->paybill}}">
                                    {{$item->paymentmethod->method}}
                                </div>
                                    
                                @else
                                    <button class="uk-button uk-button-default uk-margin-small-right" type="button"
                                        uk-toggle="target: #modal-example-{{$item->id}}">Add <svg class="inline-flex" width="24" height="24" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                                        </svg>
                                    </button>
                                    @include('plugins/quotation::underwriters.partials.addpayments')
                                @endif
                            </td>
                            <td>{{$item->address}}</td>
                            <td>
                                @if ($item->status =='active')
                                    <span class="label-success status-label">{{$item->status}}</span>
                                @else
                                    <span class="label-danger status-label">{{$item->status}}</span>
                                @endif
                            
                            </td>
                            <td>
                                <a class="btn btn-primary btn-mini" href="{{route('underwriters.edit', $item->id)}}" data-toggle="tooltip" data-placement="top" title="edit item">
                                    <svg width="20" height="20" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="text-white">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                    </svg>
                                </a>
                                <form action="{{ route('underwriters.destroy', $item->id)}}" method="post" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-mini" type="submit" data-toggle="tooltip" data-placement="top" title="delete item">
                                        <svg width="20" height="20" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="text-white">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


@endsection
<style>
    .status-label {
    display: inline-block;
    padding: 3px 15px;
    border-radius: 30px; 
    color: #ffffff !important;
    }
    .dt-buttons {
    padding: 10px;
    }
    .dt-buttons .btn {
    padding: 5px 10px;
    font-size: 12px;
    line-height: 1.5;
    background: #36c6d3;
    border-color: #36c6d3;
    color: #ffffff !important;
    }
</style>