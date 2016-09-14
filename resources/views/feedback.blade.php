@extends('layouts.master')

@section('Title')
Report Feedback
@endsection



@section('Form')
<br>
<br>
<div class="row">
	<div class="col-lg-2">
	</div>
	<div class="col-lg-10">
		<h3>User Feedback</h3>
	</div>
</div>
<br>
<form method = "POST" action = "('route' => 'post.services.postRegisterPage')" class="form-horizontal">
  <fieldset>
    <div class="form-group">
      <label for="inputFirstName" class="col-lg-2 control-label">First Name</label>
      <div class="col-lg-10">
        <input type="text" class="form-control" id="inputFirstName" placeholder="First Name">
      </div>
    </div>
    <div class="form-group">
      <label for="inputLastName" class="col-lg-2 control-label">Last Name</label>
      <div class="col-lg-10">
        <input type="text" class="form-control" id="inputLastName" placeholder="Last Name">
      </div>
    </div>
       <div class="form-group">
      <label for="select" class="col-lg-2 control-label">Service</label>
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
      <label for="select" class="col-lg-2 control-label">Rating</label>
      <div class="col-lg-10">
        <select class="form-control" id="select">
          <option>Excellent</option>
          <option>Good</option>
          <option>Average</option>
          <option>Poor</option>
        </select>
        <br>
      </div>
    </div>
    <div class="form-group">
      <label for="textArea" class="col-lg-2 control-label">Feedback</label>
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

@endsection


 <?php // echo Form::model($feedback, ['route' => ['feedback.update', $feedback->id]])?>
