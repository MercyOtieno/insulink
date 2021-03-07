@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">{{ __('Quotations') }}</div>

    <div class="card-body">
        @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
        @endif
       
        <table class="table table-stripe">
            <thead>
                <th>#</th>
                <th>Product</th>
                <th>Date</th>
                <th>Product type</th>
                <th>Price</th>
                <th>Status</th>
                <th>Actions</th>
            </thead>
            <tbody>
                @foreach ($quotations as $item)
                    <tr>
                        <td>{{$item->quotation_number}}</td>
                        <td>{{$item->products->name}}</td>
                        <td>{{$item->created_at->format('d/M/Y')}}</td>
                        <td>{{$item->quotation_type}}</td>
                        <td>{{$item->total_price}}</td>
                       <td>
                        @if ($item->status =='paid')
                        <span class="label-success status-label">{{$item->status}}</span>
                        @else
                        <span class="label-danger status-label">{{$item->status}}</span>
                        @endif
                    
                        </td>
                        <td>
                            {{-- <a class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                                data-toggle="modal" data-target="#paymentModal-{{$item->id}}" data-toggle="tooltip" data-placement="top"
                                title="Add Payment">
                                <svg width="20" height="20" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z" />
                                </svg>
                            </a>
                        
                            @include('plugins/quotation::quotations.addpayment') --}}
                        
                            {{-- <a class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500"
                                href="{{route('quotation.edit', $item->id)}}" data-toggle="tooltip" data-placement="top" title="Edit Quotation">
                        
                                <svg width="20" height="20" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor" class="text-white">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                </svg>
                            </a> --}}
                            <button type="button"
                                class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 delete"
                                data-id="{{ $item->id }}" data-action="{{ route('quotation.destroy',$item->id) }}" data-toggle="tooltip"
                                data-placement="top" title="Delete Quotation" style="display: inline-block">
                                <svg width="20" height="20" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor" class="text-white">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                </svg>
                            </button>
                        
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection