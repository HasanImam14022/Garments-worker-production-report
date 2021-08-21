

function Form_Validation()
{


		if(document.getElementById("warp_yarn_count").value.trim()=="")
		{
      		alert("Please Provide Warp Yarn Count");
      		document.getElementById("warp_yarn_count").focus();
      		return false;
		}
		else if(isNaN(document.getElementById("warp_yarn_count").value.trim()))
		{
      		alert("Warp Yarn Count should be Numeric");
			document.getElementById("warp_yarn_count").value="";
      		document.getElementById("warp_yarn_count").focus();
      		return false;
		}
		else if(document.getElementById("no_of_ply_for_warp_yarn").value=="select")
		{
      		alert("Please Select No Of Ply For Warp Yarn");
      		document.getElementById("no_of_ply_for_warp_yarn").focus();
      		return false;
		}
		else if(document.getElementById("uom_of_warp_yarn").value=="select")
		{
      		alert("Please Select Uom Of Warp Yarn");
      		document.getElementById("uom_of_warp_yarn").focus();
      		return false;
		}
		else if(document.getElementById("weft_yarn_count").value.trim()=="")
		{
      		alert("Please Provide Weft Yarn Count");
      		document.getElementById("weft_yarn_count").focus();
      		return false;
		}
		else if(isNaN(document.getElementById("weft_yarn_count").value.trim()))
		{
      		alert("Weft Yarn Count should be Numeric");
			document.getElementById("weft_yarn_count").value="";
      		document.getElementById("weft_yarn_count").focus();
      		return false;
		}
		else if(document.getElementById("no_of_ply_for_weft_yarn").value=="select")
		{
      		alert("Please Select No Of Ply For Weft Yarn");
      		document.getElementById("no_of_ply_for_weft_yarn").focus();
      		return false;
		}
		else if(document.getElementById("uom_of_weft_yarn").value=="select")
		{
      		alert("Please Select Uom Of Weft Yarn");
      		document.getElementById("uom_of_weft_yarn").focus();
      		return false;
		}
		else if(document.getElementById("no_of_threads_per_inch_in_warp").value.trim()=="")
		{
      		alert("Please Provide No Of Threads Per Inch In Warp");
      		document.getElementById("no_of_threads_per_inch_in_warp").focus();
      		return false;
		}
		else if(isNaN(document.getElementById("no_of_threads_per_inch_in_warp").value.trim()))
		{
      		alert("No Of Threads Per Inch In Warp should be Numeric");
			document.getElementById("no_of_threads_per_inch_in_warp").value="";
      		document.getElementById("no_of_threads_per_inch_in_warp").focus();
      		return false;
		}
		else if(document.getElementById("warp_insertion").value=="select")
		{
      		alert("Please Select Warp Insertion");
      		document.getElementById("warp_insertion").focus();
      		return false;
		}
		else if(document.getElementById("no_of_threads_per_inch_in_weft").value.trim()=="")
		{
      		alert("Please Provide No Of Threads Per Inch In Weft");
      		document.getElementById("no_of_threads_per_inch_in_weft").focus();
      		return false;
		}
		else if(isNaN(document.getElementById("no_of_threads_per_inch_in_weft").value.trim()))
		{
      		alert("No Of Threads Per Inch In Weft should be Numeric");
			document.getElementById("no_of_threads_per_inch_in_weft").value="";
      		document.getElementById("no_of_threads_per_inch_in_weft").focus();
      		return false;
		}
		else if(document.getElementById("weft_insertion").value=="select")
		{
      		alert("Please Select Weft Insertion");
      		document.getElementById("weft_insertion").focus();
      		return false;
		}

}

