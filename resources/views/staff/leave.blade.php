@extends('layouts.app')

@section('content')

<div class="container">
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
          <h1 class="display-4">Leave Request Form</h1>
        </div>
        
    </div>
    <form action="{{route('staff.store_leave')}}" method="POST">
        @csrf

        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                    <strong class="font-bold">Holy smokes!</strong>
                    <span class="block sm:inline">{{ $error }}</span>
                </div>
            @endforeach
        @endif
    <div class="row">
        <div class="col-sm">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" name="name" id="name" value="{{$user->name}}" disabled>
                <input type="text" class="form-control" name="user_id" id="user_id" value="{{$user->id}}" hidden>
            </div>
        </div>
        <div class="col-sm">
            <div class="form-group">
                <label for="department">Department</label>
                <input type="text" class="form-control" name="department" id="department" value="Test" disabled>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm">
            <div class="form-group">
                <label for="leave_type">Leave Type</label>
                <div class="form-group">
                    <select class="form-control" name="leave_type" id="leave_type" required>
                      <option value="annual_leave">Annual Leave</option>
                      <option value="emergency_leave">Emergency Leave</option>
                      <option value="medical_leave">Medical Leave</option>
                      <option value="unpaid_leave">Unpaid Leave</option>
                      <option value="compassionate_leave">Compassionate Leave</option>
                      <option value="maternity_leave">Maternity/Paternity Leave</option>
                      <option value="others">Others</option>
                    </select>
                </div>
            </div>

            @error('leave_type')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    <div class="row">
        <div class="col-sm">
            <div class="form-group">
                <label for="reason">Reason</label>
                <textarea class="form-control" name="reason" id="reason" rows="3" required></textarea>
            </div>
            @error('reason')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    <div class="row">
        <div class="col-sm">
            <div class="form-group">
                <label for="leave_from">Leave from : </label>
                <input id="leave_from" name="leave_from" required />
            </div>
            @error('leave_from')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="col-sm">
            <div class="form-group">
                <label for="leave_to">To : </label>
                <input id="leave_to" name="leave_to" required />
            </div>
            @error('leave_to')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    <div class="row">
        <div class="col-sm">
            <div class="form-group">
                <label for="days_requested">Days requested</label>
                <input id="days_requested" type="number" class="form-control"  name="days_requested" readonly/>
            </div>
        </div>
        <div class="col-sm mt-4">
            <div class="form-group">
                <button id="calculateDiff" type="button" class="btn btn-primary btn-lg btn-block">Calculate days requested</button>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm">
            <div class="form-group">
                <label for="todayDate">Date</label>
                <input id="todayDate" name="todayDate" required />
            </div>
            @error('todayDate')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    <div class="row">
        <div class="col-sm">
            <button class="btn btn-primary" type="submit">Submit</button>
        </div>
    </div>

    
    </form>
</div>


<script>
    $('#leave_from').datepicker({
        uiLibrary: 'bootstrap'
    });
    $('#leave_to').datepicker({
        uiLibrary: 'bootstrap'
    });
    $('#todayDate').datepicker({
        uiLibrary: 'bootstrap'
    });

    $('#calculateDiff').on('click', function() {
        let leaveFrom = $('#leave_from').val();
        let leaveTo = $('#leave_to').val();
        $('#days_requested').val(calculateDiff(leaveFrom, leaveTo ));
    });
    

    function calculateDiff(date1, date2) {
        dt1 = new Date(date1);
        dt2 = new Date(date2);
        return Math.floor((Date.UTC(dt2.getFullYear(), dt2.getMonth(), dt2.getDate()) - Date.UTC(dt1.getFullYear(), dt1.getMonth(), dt1.getDate()) ) /(1000 * 60 * 60 * 24)) + 1;
    }
</script>
@endsection

