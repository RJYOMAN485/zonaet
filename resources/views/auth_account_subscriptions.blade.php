@extends('layouts.app')

@section('content')
   
  <div class="card">
    <div class="card-body">
      <h5 class="card-title">Current subscriptions</h5>

      @if($subs == null)

        <div class="float-right">
          <a href="{{route('payment.initiate')}}" class="btn btn-danger bg-danger text-white">START SUBSCRIPTION</a>  
        </div>   
       @else 
        <div class="float-right">
          <a href="{{route('payment.initiate')}}" class="btn btn-success bg-danger text-white">RENEW SUBSCRIPTION</a>  
        </div>  
      @endif
       

      <table class="table table-responsive">
        <thead>
          <tr>
            <th scope="col">from</th>
            <th scope="col">To</th>
            <th scope="col">Paid On</th>
            <th scope="col">Amount</th>
            <th scope="col">Status</th>
            <th scope="col">Reference</th>
            <th scope="col">Expires</th>
          </tr>
        </thead>
        <tbody>

          @if($subs !== null)
            
            {{-- @foreach($subs as $sub) --}}
                <tr>
                <th>{{$subs->from}}</th>
                <td>Razorpay</td>
                <td>{{$subs->paid_on}}</td>
                <td>{{$subs->amount}}</td>
                <td @if($subs->status == 'success') class="text-success" @else class="text-danger" @endif>{{$subs->status}}</td>
                <td>{{$subs->references}}</td>
                <td>{{$subs->expires}}</td>

              </tr>
            {{-- @endforeach --}}

          @else 
              
            <tr>
             
            </tr>

          @endif

          
        </tbody>
      </table>


      <p>
        <a class="btn btn-primary" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
          Show recent transaction
        </a>
        
      </p>
      <div class="collapse" id="collapseExample">
        {{-- <div class="card card-body"> --}}
          <table class="table table-responsive">
            <thead>
              <tr>
                <th scope="col">amount</th>
                <th scope="col">paid on</th>
                <th scope="col">status</th>
                <th scope="col">expires</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($transactions as $transaction)
                <tr>
                  <td>{{ $transaction->amount }}</td>
                  <td>{{ $transaction->paid_on }}</td>
                  <td>{{ $transaction->status }}</td>
                  <td>{{ $transaction->expires }}</td>
                </tr>
              @endforeach
            </tbody>
          </table>
        {{-- </div> --}}
      </div>

  </div>
</div>

@endsection