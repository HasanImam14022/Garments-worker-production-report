

function User_Info_Form_Validation()
{


		if(document.getElementById("user_name").value.trim()=="")
		{
      		alert("Please Provide User Name");
      		document.getElementById("user_name").focus();
      		return false;
		}
		else if(document.getElementById("user_id").value.trim()=="")
		{
      		alert("Please Provide User Id");
      		document.getElementById("user_id").focus();
      		return false;
		}
		else if(document.getElementById("password").value.trim()=="")
		{
      		alert("Please Provide Password");
      		document.getElementById("password").focus();
      		return false;
		}
		else if(document.getElementById("confirm_password").value.trim()=="")
		{
      		alert("Please Provide Confirm Password");
      		document.getElementById("confirm_password").focus();
      		return false;
		}
		else if(document.getElementById("user_type").value=="select")
		{
      		alert("Please Select User Type");
      		document.getElementById("user_type").focus();
      		return false;
		}
		else if(document.getElementById("status").value=="select")
		{
      		alert("Please Select Status");
      		document.getElementById("status").focus();
      		return false;
		}
		else if(document.getElementById("email").value.trim()=="")
		{
      		alert("Please Provide Email");
      		document.getElementById("email").focus();
      		return false;
		}
		else if(document.getElementById("contact_no").value.trim()=="")
		{
      		alert("Please Provide Contact No");
      		document.getElementById("contact_no").focus();
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
		

}

