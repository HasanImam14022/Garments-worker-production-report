

function Machine_Owner_Name_Form_Validation()
{


		if(document.getElementById("machine_owner_name").value.trim()=="")
		{
      		alert("Please Provide Machine Name");
      		document.getElementById("machine_owner_name").focus();
      		return false;
		}
		else if(document.getElementById("machine_name").value=="select")
		{
      		alert("Please Select Process Name");
      		document.getElementById("machine_name").focus();
      		return false;
		}

}

