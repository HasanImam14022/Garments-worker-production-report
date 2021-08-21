

function Form_Validation()
{


		if(document.getElementById("machine_name").value.trim()=="")
		{
      		alert("Please Provide Machine Name");
      		document.getElementById("machine_name").focus();
      		return false;
		}
		else if(document.getElementById("process_name").value=="select")
		{
      		alert("Please Select Process Name");
      		document.getElementById("process_name").focus();
      		return false;
		}

}

