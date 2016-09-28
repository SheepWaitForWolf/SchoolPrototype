@extends('layouts.master')

@section('Title')
Report Feedback
@endsection


@section('Form')
<br>

<div class="row">
  <div class="col-lg-2">
  </div>
  <div class="col-lg-10">


<form class="form-horizontal" action="{{ url('/feedback/') }}" method="post">
  <fieldset>
    <div class="form-group">
      <label for="inputFirstName" class="col-lg-2 control-label">First Name</label>
      <div class="col-lg-10">
        <input type="text" name="f_name" class="form-control" id="inputFirstName" placeholder="First Name">
      </div>
    </div>
    <div class="form-group">
      <label for="inputLastName" class="col-lg-2 control-label">Last Name</label>
      <div class="col-lg-10">
        <input type="text" name="l_name" class="form-control" id="inputLastName" placeholder="Last Name">
      </div>
    </div>
    <div class="form-group">
      <label for="inputService" class="col-lg-2 control-label">Select Service</label>
      <div class="col-lg-10">
        <select name="service" class="form-control" id="inputService">
            <option value="Registration">Registration</option>
            <option value="School Enrolment">School Enrolment</option>
            <option value="Annual Details Check">Annual Details Check</option>
            <option value="Report an Absence">Report an Absence</option>
            <option value="School Meals">School Meals</option>
            <option value="View Exam Results">View Exam Results</option>
        </select>
      </div>
        <br>
      </div>
    <div class="form-group">
      <label for="inputRating" class="col-lg-2 control-label">Rating</label>
      <div class="col-lg-10">
        <select name="rating" class="form-control" id="inputRating">
            <option value="Excellent">Excellent</option>
            <option value="Good">Good</option>
            <option value="Average">Average</option>
            <option value="Poor">Poor</option>
            <option value="Very Poor">Very Poor</option>
        </select>
      </div>
        <br>
      </div>
      <div class="form-group">
      <label for="inputMessage" class="col-lg-2 control-label">Message</label>
      <div class="col-lg-10">
        <textarea rows="4" cols="50" name="message" class="form-control" id="inputMessage" placeholder="Type your message here">
        </textarea>
        <!-- <input type="textarea" rows="4" cols="50" name="message" class="form-control" id="inputMessage" placeholder="Type your message here"> -->
      </div>
        <br>
      </div>
       <div class="form-group">
      <div class="col-lg-10">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
      </div>
        <br>
      </div>
    <div class="form-group">
      <div class="col-lg-10 col-lg-offset-2">
        <button type="reset" class="btn btn-default">Cancel</button>
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </div>
  </fieldset>
</form>



</div>
</div>
@endsection

@section('List')
 <!-- Table-to-load-the-data Part -->
 <div class="row">

    <div class="col-lg-12">
            <table class="table">
                <thead>
                    <tr>
                        <th>Feedback ID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Service</th>
                        <th>Rating</th>
                        <th>Message</th>
                    </tr>
                </thead>
                <tbody id="feedback-list" name="feedback-list">
                    @foreach ($feedbacks as $feedback)
                    <tr id="feedback{{$feedback->feedback_id}}">
                        <td>{{$feedback->feedback_id}}</td>
                        <td>{{$feedback->f_name}}</td>
                        <td>{{$feedback->l_name}}</td>
                        <td>{{$feedback->service}}</td>
                        <td>{{$feedback->rating}}</td>
                        <td>{{$feedback->message}}</td>
                        <td>
                            <button class="btn btn-warning btn-xs btn-detail open-modal-feedback" value={{$feedback->feedback_id}}>Edit</button>
                            <button class="btn btn-danger btn-xs btn-delete delete-feedback" value={{$feedback->feedback_id}}>Delete</button>
                        </td>
                    </tr>
                    @endforeach 
                </tbody>
            </table>
          </div>
          </div>
@endsection

@section('Modal')
    <div class="modal fade" id="myFeedbackModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                            <h4 class="modal-title" id="myModalLabel">Amend Details</h4>
                        </div>
                        <div class="modal-body">
                            <form id="frmfeedbacks" name="frmfeedbacks" class="form-horizontal" novalidate="">

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
                                    <label for="service" class="col-sm-3 control-label">Service</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="service" name="service" placeholder="Registration" value="">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="rating" class="col-sm-3 control-label">Rating</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="rating" name="rating" placeholder="Excellent" value="">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="message" class="col-sm-3 control-label">Message</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="message" name="message" placeholder="Excellent" value="">
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" id="btn-save-feedback" value="add">Save changes</button>
                            <input type="hidden" id="feedback_id" name="feedback_id" value="0">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection