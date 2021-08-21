

function Swing_Production_Info_Form_Validation()
{
		
	    if(document.getElementById("buyer_name").value=="select")
		{
      		alert("Please Select Buyer Name");
      		document.getElementById("buyer_name").focus();
      		return false;
		}
		else if(document.getElementById("style_no").value=="select")
		{
      		alert("Please Select Style No");
      		document.getElementById("style_no").focus();
      		return false;
		}
		else if(document.getElementById("color").value=="select")
		{
      		alert("Please Select Color");
      		document.getElementById("color").focus();
      		return false;
		}
		// else if(document.getElementById("manpower").value.trim()=="")
		// {
      	// 	alert("Please Provide Total Manpower");
      	// 	document.getElementById("manpower").focus();
      	// 	return false;
		// }
		else if(document.getElementById("hourly_target").value.trim()=="")
		{
      		alert("Please Provide Hourly Target");
      		document.getElementById("hourly_target").focus();
      		return false;
		}
		else if(document.getElementById("cumilitive_target").value.trim()=="")
		{
      		alert("Please Give Cumilitive Target");
      		document.getElementById("cumilitive_target").focus();
      		return false;
		}

}

