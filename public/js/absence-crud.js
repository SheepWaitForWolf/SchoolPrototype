$(document).ready(function(){

    var url = "/absence";

    //display modal form for absence editing
    $('.open-modal-absence').click(function(){
        var absence_id = $(this).val();

        $.get(url + '/' + absence_id, function (data) {
            //success data
            // console.log(data);
            $('#absence_id').val(data.absence_id);
            $('#f_name').val(data.f_name);
            $('#l_name').val(data.l_name);
            $('#btn-save-absence').val("update");

            $('#myAbsenceModal').modal('show');
        }) 
    });

    //display modal form for creating new absence
    $('#btn-add-absence').click(function(){
        $('#btn-save-absence').val("add");
        $('#frmabsence').trigger("reset");
        $('#myAbsenceModal').modal('show');
    });

    //delete absence and remove it from list
    $('.delete-absence').click(function(){
        console.log($(this));
        var absence_id = $(this).val();
        // console.log(absence_id);
    
    $.ajaxPrefilter(function(options, originalOptions, xhr) { // this will run before each request
        var token = $('meta[name="csrf-token"]').attr('content'); // or _token, whichever you are using

        if (token) {
            return xhr.setRequestHeader('X-CSRF-TOKEN', token); // adds directly to the XmlHttpRequest Object
        }
    });
        $.ajax({

            type: "DELETE",
            url: url + "/" + absence_id,
            success: function (data) {
                console.log(data);

                $("#absence" + absence_id).remove();
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
    });

    //create new absence / update existing absence
    $("#btn-save-absence").click(function (e) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        })

        e.preventDefault(); 

        var formData = {
            absence: $('#absence').val(),
            l_name: $('#l_name').val(),
        }

        //used to determine the http verb to use [add=POST], [update=PUT]
        var state = $('#btn-save-absence').val();

        var type = "POST"; //for creating new resource
        var absence_id = $('#absence_id').val();;
        var my_url = url;

        if (state == "update"){
            type = "PUT"; //for updating existing resource
            my_url += '/' + absence_id;
        }

        console.log(formData);

        $.ajax({

            type: type,
            url: my_url,
            data: formData,
            dataType: 'json',
            success: function (data) {
                console.log(data);

                var absence = '<tr id="absence' + data.id + '"><td>' + data.id + '</td><td>' + data.absence + '</td><td>' + data.l_name + '</td><td>' + data.created_at + '</td>';
                absence += '<td><button class="btn btn-warning btn-xs btn-detail open-modal-absence" ' + data.absence_id + '">Edit</button>';
                absence += '<button class="btn btn-danger btn-xs btn-delete delete-absence" ' + data.absence_id + '">Delete</button></td></tr>';

                if (state == "add"){ //if user added a new record
                    $('#absence-list').append(absence);
                }else{ //if user updated an existing record

                    $("#absence" + absence_id).replaceWith( absence );
                }

                $('#frmabsence').trigger("reset");

                $('#myAbsenceModal').modal('hide')
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
    });
});