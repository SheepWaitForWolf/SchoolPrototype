$(document).ready(function(){

    var url = "/enrol";

    //display modal form for child editing
    $('.open-modal-enrolment').click(function(){
        var enrol_id = $(this).val();

        $.get(url + '/' + enrol_id, function (data) {
            //success data
            // console.log(data);
            $('#enrol_id').val(data.enrol_id);
            $('#f_name').val(data.f_name);
            $('#l_name').val(data.l_name);
            // $('#btn-save').val("update");

            $('#myModal').modal('show');
        }) 
    });

    //delete child and remove it from list
    $('.delete-enrolment').click(function(){
        
    
    $.ajaxPrefilter(function(options, originalOptions, xhr) { // this will run before each request
        var token = $('meta[name="csrf-token"]').attr('content'); // or _token, whichever you are using

        if (token) {
            return xhr.setRequestHeader('X-CSRF-TOKEN', token); // adds directly to the XmlHttpRequest Object
        }
    });
        $.ajax({

            type: "DELETE",
            url: url + "/" + enrol_id,
            success: function (data) {
                console.log(data);

                $("#enrol" + enrol_id).remove();
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
    });

    //create new child / update existing child
    $("#btn-save-enrolment").click(function (e) {
        console.log($(this));
        var enrol_id = $(this).val();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        })

        e.preventDefault(); 

        var formData = {
            enrol_id: $('#enrol_id').val(),
            f_name: $('#f_name').val(),
            l_name: $('#l_name').val(),
            gender: $('#gender').val(),
            dob: $('#dob').val()
        }

        //used to determine the http verb to use [add=POST], [update=PUT]
        var state = $('#btn-save-enrolment').val();
        var type = "POST"; //for creating new resource
   
        var my_url = url + '/' +  enrol_id;

        
        console.log(enrol_id);
        console.log(my_url);

        $.ajax({

            type: "PUT",
            url: my_url,
            data: formData,
            dataType: 'json',
            success: function (data) {
                console.log(data);

                var enrol = '<tr id="enrol' + data.id + '"><td>' + data.id + '</td><td>' + data.enrol + '</td><td>' + data.l_name + '</td><td>' + data.created_at + '</td>';
                enrol += '<td><button class="btn btn-warning btn-xs btn-detail open-modal-enrolment" value="' + data.enrol_id + '">Edit</button>';
                enrol += '<button class="btn btn-danger btn-xs btn-delete delete-enrolment" value="' + data.enrol_id + '">Delete</button></td></tr>';

                if (state == "add"){ //if user added a new record
                    $('#enrolment-list').append(enrol);
                }else{ //if user updated an existing record

                    $("#enrol" + enrol_id).replaceWith( enrol );
                }

                $('#frmchilds').trigger("reset");

                $('#myModal').modal('hide')
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
    });
});