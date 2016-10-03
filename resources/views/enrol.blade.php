@extends('layouts.master')

@section('Title')
School Enrolment
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
      $('#fillable').empty();
      for (var i in msg) {
      $('#fillable').append("<option value=" + msg[i].school_name + ">" + msg[i].school_name + "</option>");
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
		<h3>School Enrolment</h3>
	</div>
</div>
<br>
<form class="form-horizontal" action="{{ url('/enrol/') }}" method="post">
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
          <option value="Choose your Local Authority">Choose your Local Authority</option>
          @foreach($authorities as $authority)
          <option value="{{$authority->local_authority_id}}">{{ $authority->la_name }}</option>
          @endforeach
        </select>
      </div>
    </div>
       <div class="form-group">
      <label for="school" class="col-lg-2 control-label">School</label>
      <div class="col-lg-10">
        <select selected="true" class="form-control" name="school" id="fillable" >
          <option value="Choose your School">Choose your School</option>
        </select>
      </div>
    </div>
    <div class="form-group">
      <label for="yearofstudy" class="col-lg-2 control-label">Year of Study</label>
      <div class="col-lg-10">
        <input type="text" class="form-control" name="yearofstudy" id="yearofstudy" placeholder="">
      </div>
      </div>

    <div class="form-group">
      <label for="textArea" class="col-lg-2 control-label">Academic Year</label>
      <div class="col-lg-10">
        <textarea class="form-control" name="academicyear" rows="3" cols="40" id="textArea" placeholder="2016/2017"></textarea>
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
                        <th>Enrolment ID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Local Authority</th>
                        <th>School</th>
                        <th>Year of Study</th>
                        <th>Academic Year</th>
                    </tr>
                </thead>
                <tbody id="enrolment-list" name="enrolment-list">
                    @foreach ($enrolment as $enrol)               <tr id="enrolment{{$enrolment->enrol_id}}">
                        <td>{{$enrol->enrol_id}}</td>                   
                        <td>{{$enrol->f_name}}</td>
                        <td>{{$enrol->l_name}}</td>
                        <td>{{$enrol->la}}</td>
                        <td>{{$enrol->school}}</td>
                        <td>{{$enrol->year_of_study}}</td>
                        <td>{{$enrol->academic_year}}</td>
                        <td>
                            <button class="btn btn-warning btn-xs btn-detail open-modal-enrolment" value={{$enrolment->enrol_id}}>Edit</button>
                            <button class="btn btn-danger btn-xs btn-delete delete-enrolment" value={{$enrolment->enrol_id}}>Delete</button>
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

