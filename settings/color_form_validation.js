

function Form_Validation()
{


		if(document.getElementById("color_name").value.trim()=="")
		{
      		alert("Please Provide Color Name");
      		document.getElementById("color_name").focus();
      		return false;
		}

}

