@extends('layouts.app')

@section('content')
    <div class="container">
	 <h1 class="text-center"><span>Vehicle Booking</span></h1>
        @if(session()->has('msg'))
            <div class="alert alert-success">
                {{ session()->get('msg') }}
            </div>
        @endif
	 <form method="post" class="form-horizontal">
         {{ csrf_field() }}
	 	<div class="col-sm-6 col-sm-offset-3">
	 		<div class="form-group">
		      <label class="control-label col-sm-3">Select Vehicle:</label>
		      <div class="col-sm-9">
		        <select class="form-control" name="vehicle_id">
		        	<option>-- Select --</option>
                    @foreach ($vehicles as $vehicle)
                        <option value="{{$vehicle->id}}">{{$vehicle->name}}</option>
                    @endforeach
		        </select>
		      </div>
		    </div>

		    <div class="form-group">
		      <label class="control-label col-sm-3">Select Date:</label>
		      <div class="col-sm-9">
		        <input type="date" class="form-control" placeholder="date" name="date">
		      </div>
		    </div>

		    <div class="form-group">
		      <label class="control-label col-sm-3">Booking For:</label>
		      <div class="col-sm-9">
		        <select class="form-control" id="book_for" name="type">
		        	<option>-- Select --</option>
		        	<option value="full">Full Day</option>
		        	<option value="half">Half Day</option>
		        </select>
		      </div>
		    </div>

		    <div class="form-group" id="bk_session" style="display:none">
		      <label class="control-label col-sm-3">Booking session:</label>
		      <div class="col-sm-9">
		        <select class="form-control" name="booking_session">
		        	<option value="morning">Morning</option>
		        	<option value="evening">Evening</option>
		        </select>
		      </div>
		    </div>

		    <div class="form-group">
		      <label class="control-label col-sm-3">Name:</label>
		      <div class="col-sm-9">
		        <input type="text" class="form-control" placeholder="Enter Name" name="name">
		      </div>
		    </div>

		    <div class="form-group">
		      <label class="control-label col-sm-3">Email:</label>
		      <div class="col-sm-9">
		        <input type="text" class="form-control" placeholder="Enter Email" name="email">
		      </div>
		    </div>

		    <div class="form-group">
		      <label class="control-label col-sm-3">Phone:</label>
		      <div class="col-sm-9">
		        <input type="text" class="form-control" placeholder="Enter Phone Number" name="contact">
		      </div>
		    </div>

		    <div class="form-group">
		      <label class="control-label col-sm-3">Date Of Birth:</label>
		      <div class="col-sm-9">
		        <input type="text" class="form-control" placeholder="DD\MM\YYYY" name="dob">
		      </div>
		    </div>

		    <div class="form-group">
		      <label class="control-label col-sm-3">Address:</label>
		      <div class="col-sm-9">
		        <input type="text" class="form-control" placeholder="Address" name="address">
		      </div>
		    </div>


		    <div class="form-group">
		      <label class="control-label col-sm-3">ZIP:</label>
		      <div class="col-sm-9">
		        <input type="text" class="form-control" placeholder="ZIP Code" name="zip">
		      </div>
		    </div>

		    <div class="form-group">
		      <label class="control-label col-sm-3">City:</label>
		      <div class="col-sm-9">
		        <input type="text" class="form-control" placeholder="City" name="city">
		      </div>
		    </div>

		    <div class="form-group">
		      <label class="control-label col-sm-3">State:</label>
		      <div class="col-sm-9">
		        <input type="text" class="form-control" placeholder="State" name="state">
		      </div>
		    </div>

		    <button type="submit" class="btn btn-default">Submit</button>

	 	</div>
	 </form>
    </div>

@endsection

@section('script')
<script type="text/javascript">
	 	$("#book_for").change(function() {
        	if($(this).val()=="half"){
				$("#bk_session").show();
			}else{
				$("#bk_session").hide();
			}
		});
	</script>
@endsection
