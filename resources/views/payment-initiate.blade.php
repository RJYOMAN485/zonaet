
       @extends('layouts.app')

        @section('title')
        
        Renew Subscription : Zonet TV

       @endsection

       @section('content')


           
      

       @section('footer_scripts')


            <script type="text/javascript">
              
              function setAmount() {
                //console.log(window.document.getElementById('name').value);
                const interval = window.document.getElementById('interval');
                const duration = window.document.getElementById('duration');
                const amount = window.document.getElementById('amount');
                if(interval.value == 'months')
                  amount.value = duration.value * 500;
                else 
                  amount.value = duration.value * 6000;

                
              }
              

              
            </script>
      
       
       @endsection

       <div class="container card">
            <div class="card-body">
                <div class="login-card-body">
                  <h2 class="text-center">Subscription Form</h2>
                    <form action="{{url('/payment-initiate-request')}}" method="POST">
                        <div class="form-group">
                            <input type="hidden" value="{{csrf_token()}}" name="_token" />
                            <label form-group="name"></label> 
                            <input type="text" value="{{$user->name}}" class="form-control" id="name"  name="name">
                        </div>
                        <div class="form-group">
                            <label form-group="email"></label> 
                            <input type="text" value="{{$user->email}}" class="form-control" id="email" name="email">
                        </div>
                        <div class="form-group">
                            <label form-group="contactNumber">Your Phone Number</label> 
                            <input type="text" class="form-control" required id="contactNumber" name="contactNumber">
                        </div>

                        <div class="form-group">
                          <label for="Duratform-group">Duration</label> 
                          <input type="number" onkeyup="setAmount()" required min="1" max="5" class="form-control" id="duration" name="duration">
                        </div>

                        <div class="form-group">
                          <label for="interval">Interval</label>
                          <select onchange="setAmount()" class="form-select form-control" id="interval" name="interval" aria-label="interval">
                            <option value="months" selected>Months</option>
                            <option value="years">Years</option>
                          </select>
                        </div>

                        <div class="form-group">
                            <label for="amount">Amount</label>
                            <input type="text" class="form-control" readonly id="amount" name="amount">
                        </div>

                        <div class="form-group form-check">
                          <input type="checkbox" required class="form-check-input" id="checkbox">
                          <label class="form-check-label" for="checkbox">I agree the <a href="">terms and conditions</a></label>
                        </div>

                        <button type="submit" style="background-color: #d32f2f!important; border-radius:4px;" class="btn btn-raised btn-danger"><i class="fa fa-check" aria-hidden="true"></i>
                          Subscribe</button>
                    </form>                    
                </div>
            </div>
        </div>

        {{-- <script>
          const duration = document.body.form.duration;
          const amount = document.body.form.amount;
 
         function updateAmount(){
            amount.value = duration.value * 6000;
            console.log("clicked");
          }
          
        </script> --}}

      @endsection


    