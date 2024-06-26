@extends('app')
@section('content')
<div class="container">
    <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Client Name</th>
            <th scope="col">Client Email</th>
            {{-- <th scope="col">item</th> --}}
            {{-- <th scope="col">Description</th> --}}
            <th scope="col">quantity</th>
            <th scope="col">Unit Price</th>
            <th scope="col">Total Price </th>
            <th scope="col">Actions </th>
          </tr>
        </thead>
        <tbody>
            @foreach ( $invoices as $invoice)
            <tr>
                <td >{{$invoice->id}}</td>
                <td>{{$invoice->client_name}}</td>
                <td>{{$invoice->client_email}}</td>
                {{-- <td>{{$invoice->item}}</td> --}}
                {{-- <td>{{$invoice->description}}</td> --}}
                <td>{{$invoice->quantity}}</td>
                <td>{{$invoice->unit_price}}</td>
                <td>{{$invoice->item_price}}</td>
                <td>
                    <a type="button" class="btn btn-primary d-inline" href="{{route('invoice.preview', $invoice)}}" > Show PDf</a>
                    <a type="button" class="btn btn-secondary d-inline" href="{{route('invoice.send', $invoice)}}"">Send</a>
                    <a type="button" class="btn btn-success d-inline">Success</a>
                </td>
              </tr>
            @endforeach
          
          
        </tbody>
      </table>
</div>

@endsection