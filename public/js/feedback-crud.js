$(document).ready(function(){

    var url = "/feedback";

    //display modal form for feedback editing
    $('.open-modal-feedback').click(function(){
        var feedback_id = $(this).val();

        $.get(url + '/' + feedback_id, function (data) {
            //success data
            // console.log(data);
            $('#feedback_id').val(data.feedback_id);
            $('#f_name').val(data.f_name);
            $('#l_name').val(data.l_name);
            $('#btn-save-feedback').val("update");

            $('#myFeedbackModal').modal('show');
        }) 
    });

    //display modal form for creating new feedback
    $('#btn-add-feedback').click(function(){
        $('#btn-save-feedback').val("add");
        $('#frmfeedback').trigger("reset");
        $('#myFeedbackModal').modal('show');
    });

    //delete feedback and remove it from list
    $('.delete-feedback').click(function(){
        console.log($(this));
        var feedback_id = $(this).val();
        // console.log(feedback_id);
    
    $.ajaxPrefilter(function(options, originalOptions, xhr) { // this will run before each request
        var token = $('meta[name="csrf-token"]').attr('content'); // or _token, whichever you are using

        if (token) {
            return xhr.setRequestHeader('X-CSRF-TOKEN', token); // adds directly to the XmlHttpRequest Object
        }
    });
        $.ajax({

            type: "DELETE",
            url: url + "/" + feedback_id,
            success: function (data) {
                console.log(data);

                $("#feedback" + feedback_id).remove();
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
    });

    //create new feedback / update existing feedback
    $("#btn-save-feedback").click(function (e) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        })

        e.preventDefault(); 

        var formData = {
            feedback: $('#feedback').val(),
            l_name: $('#l_name').val(),
        }

        //used to determine the http verb to use [add=POST], [update=PUT]
        var state = $('#btn-save-feedback').val();

        var type = "POST"; //for creating new resource
        var feedback_id = $('#feedback_id').val();;
        var my_url = url;

        if (state == "update"){
            type = "PUT"; //for updating existing resource
            my_url += '/' + feedback_id;
        }

        console.log(formData);

        $.ajax({

            type: type,
            url: my_url,
            data: formData,
            dataType: 'json',
            success: function (data) {
                console.log(data);

                var feedback = '<tr id="feedback' + data.id + '"><td>' + data.id + '</td><td>' + data.feedback + '</td><td>' + data.l_name + '</td><td>' + data.created_at + '</td>';
                feedback += '<td><button class="btn btn-warning btn-xs btn-detail open-modal-feedback" value="' + data.feedback_id + '">Edit</button>';
                feedback += '<button class="btn btn-danger btn-xs btn-delete delete-feedback" value="' + data.feedback_id + '">Delete</button></td></tr>';

                if (state == "add"){ //if user added a new record
                    $('#feedback-list').append(feedback);
                }else{ //if user updated an existing record

                    $("#feedback" + feedback_id).replaceWith( feedback );
                }

                $('#frmfeedback').trigger("reset");

                $('#myFeedbackModal').modal('hide')
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
    });
});