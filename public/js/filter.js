// var id = 1;

// function changela(value) 
// {
// 	var my_url = "/absence";
// 	id = value;
// 	console.log('Id is ' + id);

// 	xmlhttp = new XMLHttpRequest();

// 	xmlhttp.onreadystatechange = function() {
// 		if (this.readyState == 4 && this.status == 200){
// 			document.getElementById("#fillable").innerHTML(this.responseText);
// 		}
// 	};
// 	xmlhttp.open("GET","getschools.php?q="+value,true);
// 	xmlhttp.send();

// 	return id;
//  };

function changela(value) {
		var request = $.ajax({
			url: {!! URL::route('get.services.getAbsencePage')!!},
			type: "GET",			
			dataType: "html"
		});

		request.done(function(msg) {
			$("#mybox").html(msg);			
		});

		request.fail(function(jqXHR, textStatus) {
			alert( "Request failed: " + textStatus );
		});
	}