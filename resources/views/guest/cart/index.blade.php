@extends('guest/layouts/app')

@section('page-styles')
    <link rel="stylesheet" href="{{ asset('front-end/css/wishlist_styles.css') }}">
    <link rel="stylesheet" href="{{ asset('front-end/css/select2.min.css') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
@endsection

@section('content')
    <!-- header -->


@php
$total_price = 0;
@endphp
    <!-- section wishes -->
    <div class="row pt-7 bg-light">
      <div class="col-md-8 mx-auto">

          <div class=" p-3 my-5">
             <div class=" d-flex">
              <p class="text-gray"> Cart</p>
              <!--rounded-circle-left rounded-circle-right btn btn-outline-light text-success border-0 p-2 text-uppercase ms-auto"-->
              {{-- <a href="#" class="rounded-circle-left rounded-circle-right btn btn-outline-light text-success border-0 p-2 text-uppercase ms-auto" style="font-weight: 600;">Payment Dashboard ></a> --}}
             </div>
              <div class="pb-2 bg-white rounded-bottom">
                  <div class="d-flex border-bottom border-1 border-gray ">
                    <table class="table">
                      <thead class="thead-dark">
                      <tr>
                            <th scope="col"></th>
                            <th scope="col">Item Name</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Unit Price</th>
                            <th scope="col">Items Total</th>
                            <th scope="col">Action</th>
                         </tr>
                      </thead>
                      <tbody>
                        @foreach ($cartItems as $item)
                         <tr>
                            <td><img src="{{ $item->associatedModel->image }}" width="80" height="80" /></td>
                            <td>{{$item->name}}</td>
                            <td>
                               <form method='post' action='{{route('cart.update')}}'>
                                @csrf
                                  <input type='hidden' name='id' value="{{ $item->id }}" />
                                  <div class="row">
                                     <div class="col"><input name='quantity' class='quantity' type="number" value="{{ $item->quantity }}"></div>
                                     <div class="col"><button type="submit" class="btn btn-secondary">Change</button></div>
                                  </div>
                               </form>
                            </td>
                            <td> {{"$".$item["price"] }}</td>
                            <td> {{"$".$item["price"]*$item["quantity"] }} </td>
                            <td>
                               <!-- <form method="post" action=""> -->
                               <form action="{{route('cart.remove')}}" method="post">
                                  @csrf
                                  <input type="hidden" name="id" value="{{ $item->id }}" />
                                  <button type="submit" class="btn btn-danger">Remove</button>
                               </form>
                            </td>
                            </tr>
                               @php
                                  $total_price += ($item["price"]*$item["quantity"]);
                               @endphp
                            @endforeach
                            <tr>
                               <td colspan="2" style="align:right">
                                  <div class="p-2 mb-2 bg-info text-white">
                                     <strong>TOTAL:  {{  "$".$total_price }} </strong>
                                  </div>
                               </td>
                               <td></td>
                               <td></td>
                               <td></td>
                               <td style="align:right">

                                <form method='post' action='{{route('cart.checkout')}}'>
                                  @csrf
                                    <input type='hidden' name='amount' value="{{ $total_price }}" />
                                    <button type="submit" class="btn btn-success">Checkout</button>
                                 </form>
                               </td>
                            </tr>
                      </tbody>
                   </table>
                   </div>
              </div>
          </div>
      </div>
  </div>

@endsection

@section('page-scripts')

@endsection
