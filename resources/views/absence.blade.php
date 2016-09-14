@extends('layouts.master')

@section('Title')
Report an Absence
@stop

<br>
<br>

<div class="row">
	<div class="col-lg-2">
	</div>
	<div class="col-lg-10">
		<h3>Report an Absence</h3>
	</div>
</div>
<br>
<form class="form-horizontal">
  <fieldset>
    <div class="form-group">
      <label for="inputChild" class="col-lg-2 control-label">Child</label>
      <div class="col-lg-10">
        <input type="text" class="form-control" id="inputChild" placeholder="Child">
      </div>
    </div>
       <div class="form-group">
      <label for="select" class="col-lg-2 control-label">School</label>
      <div class="col-lg-10">
        <select class="form-control" id="select">
          <option>Registration</option>
          <option>School Enrolment</option>
          <option>Annual Details Check</option>
          <option>Absence Reporting</option>
          <option>School Meals</option>
          <option>Exam Results</option>
          <option>General Feedback</option>
        </select>
        <br>
      </div>
    </div>
    <div class="form-group">
      <label for="inputUsername" class="col-lg-2 control-label">Date of Absence</label>
      <div class="col-lg-10">
        <input type="date" class="form-control" id="inputAbsenceDate" placeholder="14-09-2015">
      </div>
        <br>
      </div>
    </div>
    <div class="form-group">
      <label for="textArea" class="col-lg-2 control-label">Reason For Absence</label>
      <div class="col-lg-10">
        <textarea class="form-control" rows="3" id="textArea"></textarea>
        <span class="help-block">Please enter your feedback in the space provided.</span>
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