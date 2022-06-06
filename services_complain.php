<?php
include 'API/API_get_List.php';
if (!isset($_SESSION['user_ID']) && !isset($_SESSION['user_Type']) && !isset($_SESSION['barangay_ID'])) {
    header("location:index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<script>
    function includeHTML() {
        var z, i, elmnt, file, xhttp;
        /*loop through a collection of all HTML elements:*/
        z = document.getElementsByTagName("*");
        for (i = 0; i < z.length; i++) {
            elmnt = z[i];
            /*search for elements with a certain atrribute:*/
            file = elmnt.getAttribute("w3-include-html");
            if (file) {
                /*make an HTTP request using the attribute value as the file name:*/
                xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function() {
                    if (this.readyState == 4) {
                        if (this.status == 200) {
                            elmnt.innerHTML = this.responseText;
                        }
                        if (this.status == 404) {
                            elmnt.innerHTML = "Page not found.";
                        }
                        /*remove the attribute, and call this function once more:*/
                        elmnt.removeAttribute("w3-include-html");
                        includeHTML();
                    }
                }
                xhttp.open("GET", file, true);
                xhttp.send();
                /*exit the function:*/
                return;
            }
        }
    };
</script>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="img/Logo_192.png">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/js/bootstrap-multiselect.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/css/bootstrap-multiselect.css">
    <link rel="stylesheet" href="CSS/services_complain.css">

    <title>Services</title>
</head>

<body>

    <div w3-include-html="navbar.php"></div>
    <div class="collection">
        <div class="card" id="holder">
            <label id="tab" for="#holder">Complaint Form</label>
            <form action="API/API_send_complaint.php" method="POST">
                <label for="reason">Reason:<span>*</span></label>
                <select id="reason" name="txt_Reason" required style="overflow: auto;">
                    <option value="Threat">Threat</option>
                    <option value="Physical Injury">Physical Injury</option>
                    <option value="Theft">Theft</option>
                    <option value="Alarms and Scandal">Alarms and Scandal</option>
                    <option value="Trespassing">Trespassing</option>
                    <option value="Swindling or Estafa">Swindling or Estafa</option>
                    <option value="Vandalism ">Vandalism</option>
                    <option value="Drinking session in Street">Drinking session in Street</option>
                    <option value="Curfew">Curfew</option>
                    <option value="Coercion">Coercion</option>
                </select>
                <label for="current_select">Respondent/s:<span>*</span><small style="color: red;"> [You can select multiple person.]</small></label><br>
                <input name="current_select_values" type="hidden" value="" id="current_select_values" required/>
						<select name="current_select[]" multiple="multiple" id="current_select" required>
                            <?php echo $list; ?>
						</select>
                <div class="field_wrapper">
                <label for="specific">Action/s done by the respondent/s:<span>*</span><small style="color: red;"> [Max: 10]</small></label>
                    <div id="specific">
                        <input type="text" name="field_name[]" value="" placeholder="Action/s done by the respondent/s" required/>
                        <a href="javascript:void(0);" class="add_button" title="Add field"><img src="img/add-icon.png" /></a>
                    </div>
                </div>
                <input class="btn btn-success" type="submit" name="submit" id="submit" value="Submit" style="margin-top:200px; padding:10px"/>
            </form>
        </div>
    </div>
    <script>
        includeHTML();
    </script>

</body>

</html>
<script type="text/javascript">

    $(document).ready(function() {
        var maxField = 10; //Input fields increment limitation
        var addButton = $('.add_button'); //Add button selector
        var wrapper = $('.field_wrapper'); //Input field wrapper
        var fieldHTML = '<div><input type="text" name="field_name[]" value="" placeholder="Action/s done by the respondent/s" required/><a href="javascript:void(0);" class="remove_button"> <img src="img/remove-icon.png"/></a></div>'; //New input field html 
        var x = 1; //Initial field counter is 1

        //Once add button is clicked
        $(addButton).click(function() {
            //Check maximum number of input fields
            if (x < maxField) {
                x++; //Increment field counter
                $(wrapper).append(fieldHTML); //Add field html
            }
        });

        //Once remove button is clicked
        $(wrapper).on('click', '.remove_button', function(e) {
            e.preventDefault();
            $(this).parent('div').remove(); //Remove field html
            x--; //Decrement field counter
        });
    });
</script>


<script>
	$(document).ready(function() {
		$('#current_select').multiselect({
			nonSelectedText: 'Select Respondent/s'
		});
	});

	$(function() {
		$('#current_select').multiselect({
			buttonText: function(options, select) {
				var labels = [];
				console.log(options);
				options.each(function() {
					labels.push($(this).val());
				});
				$("#current_select_values").val(labels.join(',') + '');
				return labels.join(', ') + '';
				//}
			}

		});
	});
</script>