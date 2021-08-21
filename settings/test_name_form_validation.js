

function Form_Validation()
{


		if(document.getElementById("test_name").value.trim()=="")
		{
      		alert("Please Provide Test Name");
      		document.getElementById("test_name").focus();
      		return false;
		}

}

