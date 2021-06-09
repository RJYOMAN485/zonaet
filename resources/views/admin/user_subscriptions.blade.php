@extends('admin.layouts.app')

@section('content')
   
  <div class="card">
    <div class="card-body">
      <h5 class="card-title">All subscriptions</h5>

      <table class="table table-responsive">
        <thead>
          <tr>
            <th scope="col">user_id</th>
            <th scope="col">Paid On</th>
            <th scope="col">Amount</th>
            <th scope="col">Status</th>
            <th scope="col">Expires</th>
          </tr>
        </thead>
        <tbody>

          @if($subs !== null)
            
             @foreach($subs as $sub)
                <tr>
                <th>{{$sub->user_id}}</th>
                <td>{{$sub->paid_on}}</td>
                <td>{{$sub->amount}}</td>
                <td @if($sub->status == 'success') class="text-success" @else class="text-danger" @endif>{{$sub->status}}</td>
                <td>{{$sub->expires}}</td>

              </tr>
            @endforeach

          @else 
              
            <tr>
             
            </tr>

          @endif

          
        </tbody>
      </table>

  </div>
</div>

@endsection