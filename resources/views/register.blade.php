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

$('#regform').alpaca({
    "schema": {
        "type": "object",
        "required": false,
        "properties": {
            "new1473775962508": {
                "readonly": false,
                "required": true,
                "type": "string",
                "disallow": [],
                "enum": [],
                "maxLength": 50,
                "properties": {}
            },
            "new1473775904717": {
                "readonly": false,
                "required": true,
                "type": "string",
                "disallow": [],
                "enum": [],
                "properties": {}
            },
            "new1473776219812": {
                "type": "string",
                "required": true,
                "properties": {}
            },
            "new1473776197643": {
                "type": "string",
                "required": true,
                "properties": {}
            },
            "check": {
                "type": "boolean",
                "required": false,
                "default": true,
                "properties": {}
            }
        }
    },
    "options": {
         "form":{
            "attributes":{
                        "action":"register/",
                        "method":"post"
                    },
                    "buttons":{
                        "submit":{
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
        "focus": true,
        "type": "object",
        "helpers": [],
        "validate": true,
        "disabled": false,
        "showMessages": true,
        "collapsible": false,
        "legendStyle": "button",
        "fields": {
            "new1473775962508": {
                "type": "text",
                "size": 100,
                "validate": false,
                "showMessages": true,
                "disabled": false,
                "hidden": false,
                "label": "First Name",
                "helpers": [
                    "Enter your first name."
                ],
                "hideInitValidationError": false,
                "focus": true,
                "optionLabels": [],
                "typeahead": {},
                "allowOptionalEmpty": true,
                "data": {},
                "autocomplete": false,
                "disallowEmptySpaces": false,
                "disallowOnlyEmptySpaces": false,
                "readonly": false,
                "renderButtons": true,
                "attributes": {},
                "fields": {}
            },
            "new1473775904717": {
                "type": "text",
                "size": 100,
                "validate": false,
                "showMessages": true,
                "disabled": false,
                "hidden": false,
                "label": "Last Name",
                "helpers": [
                    "Enter your last name."
                ],
                "hideInitValidationError": false,
                "focus": true,
                "optionLabels": [],
                "typeahead": {},
                "allowOptionalEmpty": true,
                "data": {},
                "autocomplete": false,
                "disallowEmptySpaces": false,
                "disallowOnlyEmptySpaces": false,
                "readonly": false,
                "renderButtons": true,
                "attributes": {},
                "fields": {}
            },
            "new1473776219812": {
                "type": "text",
                "size": 100,
                "validate": false,
                "showMessages": true,
                "disabled": false,
                "hidden": false,
                "label": "Gender",
                "helpers": [],
                "hideInitValidationError": false,
                "focus": true,
                "optionLabels": [],
                "typeahead": {},
                "allowOptionalEmpty": true,
                "data": {},
                "autocomplete": false,
                "disallowEmptySpaces": false,
                "disallowOnlyEmptySpaces": false,
                "renderButtons": true,
                "attributes": {},
                "fields": {}
            },
            "new1473776197643": {
                "type": "date",
                "size": 100,
                "validate": false,
                "showMessages": true,
                "disabled": false,
                "hidden": false,
                "label": "Date of Birth",
                "helpers": [],
                "hideInitValidationError": false,
                "focus": true,
                "optionLabels": [],
                "typeahead": {},
                "allowOptionalEmpty": true,
                "data": {},
                "autocomplete": false,
                "disallowEmptySpaces": false,
                "disallowOnlyEmptySpaces": false,
                "renderButtons": true,
                "attributes": {},
                "fields": {}
            },
            "check": {
                "type": "checkbox",
                "rightLabel": "Sign me up for the News Letter!",
                "label": "Newsletter",
                "helpers": [],
                "validate": true,
                "disabled": false,
                "showMessages": true,
                "renderButtons": true,
                "fields": {}
            }
        }
    },
    "data": {
        "check": true
    }
  });


</script>


</div>
</div>
@endsection



