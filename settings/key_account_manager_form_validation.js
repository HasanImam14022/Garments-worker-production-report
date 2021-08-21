

function key_Account_Manager_Form_Validation()
{


		if(document.getElementById("key_account_manager_name").value.trim()=="")
		{
      		alert("Please Provide Key Account Manager Name");
      		document.getElementById("key_account_manager_name").focus();
      		return false;
		}
		else if(document.getElementById("department").value=="select")
		{
      		alert("Please Select Department");
      		document.getElementById("department").focus();
      		return false;
		}
		else if(document.getElementById("designation").value=="select")
		{
      		alert("Please Select Designation");
      		document.getElementById("designation").focus();
      		return false;
		}
		else if(document.getElementById("phone_number").value.trim()=="")
		{
      		alert("Please Provide Phone Number");
      		document.getElementById("phone_number").focus();
      		return false;
		}

}

