@extends('layouts.master')

@section('Title')
Register
@endsection

@section('Content')
<br>


<div class="row">
	<div class="col-lg-2">
	</div>
	<div class="col-lg-10">
		<h3>Register Your Child</h3>
	</div>
</div>
<br>
@endsection

@section('Form')
<div class="row">
  <div class="col-lg-2">
  </div>
  <div class="col-lg-10">


<form class="form-horizontal" action="{{ url('/registration/') }}" method="post">
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
      <label for="inputGender" class="col-lg-2 control-label">Gender</label>
      <div class="col-lg-10">
        <input type="text" name="gender" class="form-control" id="inputGender" placeholder="F">
      </div>
        <br>
      </div>
    <div class="form-group">
      <label for="inputDob" class="col-lg-2 control-label">Date of Birth</label>
      <div class="col-lg-10">
        <input type="date" name="dob" class="form-control" id="inputDob" placeholder="14-09-2010">
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
    <div class="col-lg-2">
    </div>
    <div class="col-lg-10">
            <table class="table">
                <thead>
                    <tr>
                        <th>Child ID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Gender</th>
                        <th>Date of Birth</th>
                    </tr>
                </thead>
                <tbody id="child-list" name="child-list">
                    @foreach ($children as $child)
                    <tr id="child{{$child->child_id}}">
                        <td>{{$child->child_id}}</td>
                        <td>{{$child->f_name}}</td>
                        <td>{{$child->l_name}}</td>
                        <td>{{$child->gender}}</td>
                        <td>{{$child->dob}}</td>
                        <td>
                            <button class="btn btn-warning btn-xs btn-detail open-modal" value={{$child->child_id}}>Edit</button>
                            <button class="btn btn-danger btn-xs btn-delete delete-child" value={{$child->child_id}}>Delete</button>
                        </td>
                    </tr>
                    @endforeach 
                </tbody>
            </table>
          </div>
          </div>
@endsection

@section('Modal')
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                            <h4 class="modal-title" id="myModalLabel">Amend Details</h4>
                        </div>
                        <div class="modal-body">
                            <form id="frmchilds" action="{{ route('put.services.updateRegistrationPage') }}" method="post" name="frmchilds" class="form-horizontal" novalidate="">
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
                                    <label for="gender" class="col-sm-3 control-label">Gender</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="gender" name="gender" placeholder="gender" value="">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="dob" class="col-sm-3 control-label">Date of Birth</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="dob" name="dob" placeholder="Date of Birth" value="">
                                    </div>
                                </div>
                                <input type="hidden" id="child_id" name="child_id">
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" id="btn-save">Save changes</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection

