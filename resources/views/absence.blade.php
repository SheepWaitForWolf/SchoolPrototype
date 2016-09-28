@extends('layouts.master')

@section('Title')
Report an Absence
@stop


@section('Form')

<script>
function changela(val) {

var request = $.ajax({
      url: "{!! URL::route('get.services.getSchools')!!}",
      type: "GET", 
      data: {d : val},     
      dataType: "json"
    });


    request.done(function(msg) {
      for (var i in msg) {
      console.log(msg[i].school_name);    
      }  
    });

    request.fail(function(jqXHR, textStatus) {
      alert( "Request failed: " + textStatus );
    });
  }
  </script>
<div class="row">
	<div class="col-lg-2">
	</div>
	<div class="col-lg-10">
		<h3>Report an Absence</h3>
	</div>
</div>
<br>
<form class="form-horizontal" action="{{ url('/absence/') }}" method="post">
  <fieldset>
    <div class="form-group">
      <label for="f_name" class="col-lg-2 control-label">First Name</label>
      <div class="col-lg-10">
        <input type="text" class="form-control" name="f_name" id="f_name" placeholder="">
      </div>
    </div>
    <div class="form-group">
      <label for="f_name" class="col-lg-2 control-label">Last Name</label>
      <div class="col-lg-10">
        <input type="text" class="form-control" name="l_name" id="l_name" placeholder="">
      </div>
    </div>
    <div class="form-group">
      <label for="la" class="col-lg-2 control-label">Local Authority</label>
      <div class="col-lg-10">
        <select class="form-control" name="la" id="la" onchange="changela(this.value)">
          @foreach($authorities as $authority)
          <option value="{{$authority->local_authority_id}}">{{ $authority->la_name }}</option>
          @endforeach
        </select>
      </div>
    </div>
       <div class="form-group">
      <label for="school" class="col-lg-2 control-label">School</label>
      <div class="col-lg-10">
        <select class="form-control" name="school" id="school" >
         @foreach($schools as $school)
          <option value"" id="fillable">{{ $school->school_name }}</option>
         @endforeach
        </select>
      </div>
    </div>
    <div class="form-group">
      <label for="doa" class="col-lg-2 control-label">Date of Absence</label>
      <div class="col-lg-10">
        <input type="date" class="form-control" name="doa" id="doa" placeholder="14-09-2015">
      </div>
      </div>

    <div class="form-group">
      <label for="textArea" class="col-lg-2 control-label">Reason For Absence</label>
      <div class="col-lg-10">
        <textarea class="form-control" name="reason_for_absence" rows="3" cols="40" id="textArea" placeholder="Please enter your reason in the space provided"></textarea>
      </div>
    </div>
    <div class="form-group">
      <div class="col-lg-10">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
      </div>
      </div>
    <div class="form-group">
      <div class="col-lg-10 col-lg-offset-2">
        <button type="reset" class="btn btn-default">Cancel</button>
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </div>
  </fieldset>
</form>

@endsection

@section('List')
 <!-- Table-to-load-the-data Part -->
 <div class="row">
    
    <div class="col-lg-12">
            <table class="table">
                <thead>
                    <tr>
                        <th>Absence ID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Local Authority</th>
                        <th>School</th>
                        <th>Date of Absence</th>
                        <th>Reason For Absence</th>
                    </tr>
                </thead>
                <tbody id="absence-list" name="absence-list">
                    @foreach ($absences as $absence)
                    <tr id="absence{{$absence->absence_id}}">
                        <td>{{$absence->absence_id}}</td>                   
                        <td>{{$absence->f_name}}</td>
                        <td>{{$absence->l_name}}</td>
                        <td>{{$absence->la}}</td>
                        <td>{{$absence->school}}</td>
                        <td>{{$absence->doa}}</td>
                        <td>{{$absence->reason_for_absence}}</td>
                        <td>
                            <button class="btn btn-warning btn-xs btn-detail open-modal-absence" value={{$absence->absence_id}}>Edit</button>
                            <button class="btn btn-danger btn-xs btn-delete delete-absence" value={{$absence->absence_id}}>Delete</button>
                        </td>
                    </tr>
                    @endforeach 
                </tbody>
            </table>
          </div>
          </div>
@endsection


@section('Modal')
    <div class="modal fade" id="myAbsenceModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                            <h4 class="modal-title" id="myModalLabel">Amend Details</h4>
                        </div>
                        <div class="modal-body">
                            <form id="frmabsences" name="frmabsences" class="form-horizontal" novalidate="">

                                <div class="form-group error">
                                    <label for="f_name" class="col-sm-3 control-label">First Name</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control has-error" id="f_name" name="f_name" placeholder="First Name" value="">
                                    </div>
                                </div>

                                <div class="form-group error">
                                    <label for="l_name" class="col-sm-3 control-label">Last Name</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control has-error" id="l_name" name="l_name" placeholder="Last Name" value="">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="la" class="col-sm-3 control-label">Local Authority</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="la" name="la" placeholder="Aberdeen City" value="">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="school" class="col-sm-3 control-label">School</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="school" name="school" placeholder="Abbotswell School" value="">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="doa" class="col-sm-3 control-label">Date of Absence</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="doa" name="doa" placeholder="Excellent" value="">
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" id="btn-save-absence" value="add">Save changes</button>
                            <input type="hidden" id="council_id" name="council_id" value="0">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

