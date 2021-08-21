

function Form_Validation()
{


		if(document.getElementById("test_name").value=="select")
		{
      		alert("Please Select Test Name");
      		document.getElementById("test_name").focus();
      		return false;
		}
		else if(document.getElementById("test_method_name").value.trim()=="")
		{
      		alert("Please Provide Test Method Name");
      		document.getElementById("test_method_name").focus();
      		return false;
		}
		else if(document.getElementById("criteria_or_testing_lab").value=="select")
		{
      		alert("Please Select Criteria Or Testing Lab");
      		document.getElementById("criteria_or_testing_lab").focus();
      		return false;
		}

}

