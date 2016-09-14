@extends('layouts.master')

@section('Title')
Register
@endsection

@section('Content')
<br>
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


<div id="regform"></div>

<script type="text/javascript">

 $("#regform").alpaca({
                    "schema": {
                        "title":"User Feedback",
                        "description":"What do you think of our service?",
                        "type":"object",
                        "properties": {
                            "name": {
                                "type":"string",
                                "title":"Name",
                                "required":true
                            },
                            "feedback": {
                                "type":"string",
                                "title":"Feedback"
                            },
                            "ranking": {
                                "type":"string",
                                "title":"Ranking",
                                "enum":['Excellent','Good','Average', 'Poor'],
                                "required":true
                            }
                        }
                    },
                    "options": {
                        "form":{
                            "attributes":{
                                "action":"/register",
                                "method":"post"
                            },
                            "buttons":{
                                "submit":{
                                    "title": "Send Form Data",
                                    "click": function() {
                                        var val = this.getValue();
                                        if (this.isValid(true)) {
                                            alert("Valid value: " + JSON.stringify(val, null, "  "));
                                            this.ajaxSubmit().done(function() {
                                                alert("Posted!");
                                            });
                                        } else {
                                            alert("Invalid value: " + JSON.stringify(val, null, "  "));
                                        }
                                    }
                                }
                            }
                        },
                        "helper": "Tell us what you think about Alpaca!",
                        "fields": {
                            "name": {
                                "size": 20,
                                "helper": "Please enter your name."
                            },
                            "feedback" : {
                                "type": "textarea",
                                "name": "your_feedback",
                                "rows": 5,
                                "cols": 40,
                                "helper": "Please enter your feedback."
                            },
                            "ranking": {
                                "type": "select",
                                "helper": "Select your ranking.",
                                "optionLabels": ["Awesome!",
                                    "It's Ok",
                                    "Hmm..."]
                            }
                        }
                    },
                    "postRender": function(control) {
                        control.childrenByPropertyId["name"].getFieldEl().css("background-color", "lightgreen");
                    }
                });
            });
        </script>

</div>
</div>
@endsection



