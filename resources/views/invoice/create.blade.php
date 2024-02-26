@extends('app')
@section('content')
<div class="container">
    <form method="POST" action="{{route('invoices.store')}}">
        @csrf
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="inputEmail4">Item</label>
            <input type="text" class="form-control"  name="item">
            {{-- <label for="inputEmail4">Item slug</label>
            <input type="text" class="form-control"  name="slug"> --}}
          </div>
          <div class="form-group col-md-6">
            <label for="inputPassword4">unit price</label>
            <input type="decimal" class="form-control"  name="unit_price">
            <label for="inputPassword4">items quantity</label>
            <input type="decimal" class="form-control"  name="quantity">

            <label for="inputPassword4">Total price</label>
            <input type="decimal" class="form-control" name="item_price">
          </div>
        </div>
        <div class="form-group">
          <label for="inputAddress">Client</label>
          <input type="text" class="form-control" placeholder="1sam" name="client_name">
        </div>
        <div class="form-group">
          <label for="inputAddress2">Location</label>
          <input type="text" class="form-control" placeholder="kimbo" name="location">
        </div>
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="inputCity">Client email</label>
            <input type="email" class="form-control" name="client_email">
          </div>
         <div class="form-group col-md-4">
            <label for="inputState">description</label>
            <textarea  name="description" class="form-control"></textarea>
          </div> 
          {{-- 
          <div class="form-group col-md-2">
            <label for="inputZip">Zip</label>
            <input type="text" class="form-control" id="inputZip">
          </div>
        </div>
        <div class="form-group">
          <div class="form-check">
            <input class="form-check-input" type="checkbox" id="gridCheck">
            <label class="form-check-label" for="gridCheck">
              Check me out
            </label>
          </div>
        </div> --}}
        <button type="submit" class="btn btn-primary">Sign in</button>
      </form>
</div>
@endsection