

function Form_Validation()
{


		if(document.getElementById("customer_name").value=="select")
		{
      		alert("Please Select Customer Name");
      		document.getElementById("customer_name").focus();
      		return false;
		}

		else if(document.querySelectorAll('input[id="test_method_name"]:checked').length == 0)
		{
      		alert("Please Select Test Method Name");
      		document.getElementById("test_method_name").focus();
      		return false;
		}

}

