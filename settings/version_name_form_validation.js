

function Form_Validation()
{


		if(document.getElementById("version_name").value.trim()=="")
		{
      		alert("Please Provide Version Name");
      		document.getElementById("version_name").focus();
      		return false;
		}

}

