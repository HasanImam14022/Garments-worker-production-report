

function Form_Validation()
{


		if(document.getElementById("process_technique_name").value.trim()=="")
		{
      		alert("Please Provide Process Technique Name");
      		document.getElementById("process_technique_name").focus();
      		return false;
		}

}

