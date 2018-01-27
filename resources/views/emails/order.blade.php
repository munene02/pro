

@extends('beautymail::templates.ark')

@section('content')

    @include('beautymail::templates.ark.heading', [
		'heading' => 'Hello World!',
		'level' => 'h1'
	])

    @include('beautymail::templates.ark.contentStart')

        <h4 class="secondary"><strong>Hello World</strong></h4>
        <p>This is a test</p>

    @include('beautymail::templates.ark.contentEnd')

    @include('beautymail::templates.ark.heading', [
		'heading' => 'Another headline',
		'level' => 'h2'
	])

    @include('beautymail::templates.ark.contentStart')

        <h4 class="secondary"><strong>Your Order</strong></h4>

            <table class="table table-hover">
{{--               <thead>
                <tr>
                  <th scope="col">No.</th>
                  <th scope="col">Buyer Details</th>
                  <th scope="col">Order Details</th>
                  <th scope="col"> <span style="float: right;">Action</span></th>
                </tr>
              </thead> --}}
              <tbody>
              @foreach(Session::get('items') as $item)
                <tr>
                  <td>
                  	ODR_
					<?php date_default_timezone_set('Africa/Nairobi'); $time = date("y"); echo $time; ?>_
                  	{{ $order->id }}</td>
                  <td>
                  	<img src="{{ asset($item['image']) }}" height="150" width="150">
                  </td>
                  <td> 
                    @foreach($order->item as $item)
                        <big style="color:#800088;">{{$loop->iteration}}. {{$item->size->product->product}}</big>
                        <br><strong> Qty:</strong> {{$item->quantity}} 
                        <br><strong> Pack:</strong> {{$item->size->size}} @ {{number_format($item->size->price,2)}} 
                        <br><strong> Sub Total:</strong> {{number_format($item->min_total, 2)}} 
                        <br><br>
                    @endforeach
                    <span style="float: right;"><strong > Order Total:</strong> {{number_format($order->sub_total, 2)}} </span>
                    <br><span style="float: right;"><strong > VAT:</strong> {{number_format($order->vat, 2)}} </span>
                    <br><span style="float: right;"><strong > Order Total + VAT:</strong> {{number_format($order->total, 2)}}</span>
                    <br><br>
                  </td>
                </tr>
              @endforeach
              </tbody>
            </table>

    @include('beautymail::templates.ark.contentEnd')

@stop