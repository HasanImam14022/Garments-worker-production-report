

function Form_Validation()
{


		if(document.getElementById("style_name").value.trim()=="")
		{
      		alert("Please Provide Style Name");
      		document.getElementById("style_name").focus();
      		return false;
		}

}

