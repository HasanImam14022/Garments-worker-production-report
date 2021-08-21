function swing_line_and_position_wise_production_info_form_validation()
{
		
	    if(document.getElementById("line_number").value=="select")
		{
      		alert("Please Select Line Number");
      		document.getElementById("line_number").focus();
      		return false;
		}
		else if(document.getElementById("position_in_line").value=="select")
		{
      		alert("Please Select Position In Line");
      		document.getElementById("position_in_line").focus();
      		return false;
		}

}