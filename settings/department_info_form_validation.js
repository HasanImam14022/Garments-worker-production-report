

function Form_Validation()
{


		if(document.getElementById("location").value.trim()=="")
		{
      		alert("Please Provide Location");
      		document.getElementById("location").focus();
      		return false;
		}
		else if(document.getElementById("department_name").value.trim()=="")
		{
      		alert("Please Provide Department Name");
      		document.getElementById("department_name").focus();
      		return false;
		}
		else if(document.getElementById("section_name").value.trim()=="")
		{
      		alert("Please Provide Section Name");
      		document.getElementById("section_name").focus();
      		return false;
		}
		else if(document.getElementById("contact_person_name").value.trim()=="")
		{
      		alert("Please Provide Contact Person Name");
      		document.getElementById("contact_person_name").focus();
      		return false;
		}
		else if(document.getElementById("contact_no").value.trim()=="")
		{
      		alert("Please Provide Contact No");
      		document.getElementById("contact_no").focus();
      		return false;
		}
		else if(document.getElementById("email").value.trim()=="")
		{
      		alert("Please Provide Email");
      		document.getElementById("email").focus();
      		return false;
		}

}

