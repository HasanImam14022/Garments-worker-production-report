

function Form_Validation()
{


		if(document.getElementById("trolley_no").value.trim()=="")
		{
      		alert("Please Provide Trolley No");
      		document.getElementById("trolley_no").focus();
      		return false;
		}

}

