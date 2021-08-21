

function swing_line_wise_production_info_form_validation()
{

        if(document.getElementById("po_number").value=="select")
        {
            alert("Please Select PO Number");
            document.getElementById("po_number").focus();
            return false;
        }

		//var possible_total_line = document.getElementById("possible_line_number").value;
		
		for(var i=1; i<=20; i++) // Looping till all possibles Process Names and Serial No.
		{
            // var flag = true;
			var start_line_id = "start_line_"+i;
            var end_line_id = "end_line_"+i;

            var start_line = document.getElementById(start_line_id);
            var start_line_value = document.getElementById(start_line_id).value;
            var end_line = document.getElementById(end_line_id);
            var end_line_value = document.getElementById(end_line_id).value;


            if (start_line_value != '' || end_line_value != '')
            {

                // alert(start_line);
                // alert(start_line_value);
                // alert(end_line);
                // alert(end_line_value);
               
                if(start_line_value == ''){

                    alert("Start line must not be empty.");
                    document.getElementById(start_line_id).focus();
                    return false;
                }
                else if(end_line_value == '')
                {
                    alert("End line must not be empty.");
                    document.getElementById(end_line_id).focus();
                    return false;
                }
                else if (start_line_value > end_line_value) {

                    alert("Start Line must be lesser than End line.");
                    document.getElementById(start_line_id).focus();
                    return false;
                }
                else if(start_line_value == end_line_value){

                    alert("Start Line must not be equal to End line.");
                    document.getElementById(start_line_id).focus();
                    return false;
                } 

                // flag = false;
            } 
            
            // if(flag == true){
            //     alert("Start and End must not be Empty.");
            //     document.getElementById(start_line_id).focus();
            //     return false;
            // }
				
	    }
		
        // var start_line_1 = document.getElementById('start_line_1').value;
        // var end_line_1 = document.getElementById('end_line_1').value;

        // var start_line_2 = document.getElementById('start_line_2').value;
        // var end_line_2 = document.getElementById('end_line_2').value;

        // var start_line_3 = document.getElementById('start_line_3').value;
        // var end_line_3 = document.getElementById('end_line_3').value;

        // var start_line_4 = document.getElementById('start_line_4').value;
        // var end_line_4 = document.getElementById('end_line_4').value;

        // var start_line_5 = document.getElementById('start_line_5').value;
        // var end_line_5 = document.getElementById('end_line_5').value;

        // var start_line_6 = document.getElementById('start_line_6').value;
        // var end_line_6 = document.getElementById('end_line_6').value;

        // var start_line_7 = document.getElementById('start_line_7').value;
        // var end_line_7 = document.getElementById('end_line_7').value;

        // var start_line_8 = document.getElementById('start_line_8').value;
        // var end_line_8 = document.getElementById('end_line_8').value;

        // var start_line_9 = document.getElementById('start_line_9').value;
        // var end_line_9 = document.getElementById('end_line_9').value;

        // var start_line_10 = document.getElementById('start_line_10').value;
        // var end_line_10 = document.getElementById('end_line_10').value;

        // var start_line_11 = document.getElementById('start_line_11').value;
        // var end_line_11 = document.getElementById('end_line_11').value;

        // var start_line_12 = document.getElementById('start_line_12').value;
        // var end_line_12 = document.getElementById('end_line_12').value;

        // var start_line_13 = document.getElementById('start_line_13').value;
        // var end_line_13 = document.getElementById('end_line_13').value;

        // var start_line_14 = document.getElementById('start_line_14').value;
        // var end_line_14 = document.getElementById('end_line_14').value;

        // var start_line_15 = document.getElementById('start_line_15').value;
        // var end_line_15 = document.getElementById('end_line_15').value;

        // var start_line_16 = document.getElementById('start_line_16').value;
        // var end_line_16 = document.getElementById('end_line_16').value;

        // var start_line_17 = document.getElementById('start_line_17').value;
        // var end_line_17 = document.getElementById('end_line_17').value;

        // var start_line_18 = document.getElementById('start_line_18').value;
        // var end_line_18 = document.getElementById('end_line_18').value;

        // var start_line_19 = document.getElementById('start_line_19').value;
        // var end_line_19 = document.getElementById('end_line_19').value;

        // var start_line_20 = document.getElementById('start_line_20').value;
        // var end_line_20 = document.getElementById('end_line_20').value;
        
        //validation for row 1
        // if(start_line_1){
        //     if((start_line_1=="") || (start_line_1==null)|| (end_line_1=="") || (end_line_1==null)){
        //         alert("Start Line and End line must not be Null or Empty.");
        //         document.getElementById("start_line_1").focus();
        //         return false;
        //     }
        //     else if (start_line_1>end_line_1) {
    
        //         alert("Start Line must be lesser than End line.");
        //         document.getElementById("start_line_1").focus();
        //         return false;
        //     }
        //     else if((start_line_1 == end_line_1)){
        //         alert("Start Line must not be equal to End line.");
        //         document.getElementById("start_line_1").focus();
        //         return false;
        //     }
        // }

        
        
        // //validation for row 2

        // if((start_line_2=="") || (start_line_2==null)|| (end_line_2=="") || (end_line_2==null)){
        //     alert("Start Line and End line must not be Null or Empty.");
        //     document.getElementById("start_line_2").focus();
        //     return false;
        // }
        // else if (start_line_2>end_line_2) {

        //     alert("Start Line must be lesser than End line.");
        //     document.getElementById("start_line_2").focus();
        //     return false;
        // }
        // else if((start_line_2 == end_line_2)){
        //     alert("Start Line must not be equal to End line.");
        //     document.getElementById("start_line_2").focus();
        //     return false;
        // }

        // //validation for row 3
        
        // if((start_line_3=="") || (start_line_3==null)|| (end_line_3=="") || (end_line_3==null)){
        //     alert("Start Line and End line must not be Null or Empty.");
        //     document.getElementById("start_line_3").focus();
        //     return false;
        // }
        // else if (start_line_3>end_line_3) {

        //     alert("Start Line must be lesser than End line.");
        //     document.getElementById("start_line_3").focus();
        //     return false;
        // }
        // else if((start_line_3 == end_line_3)){
        //     alert("Start Line must not be equal to End line.");
        //     document.getElementById("start_line_3").focus();
        //     return false;
        // }

        // //validation for row 4
        
        // if((start_line_4=="") || (start_line_4==null)|| (end_line_4=="") || (end_line_4==null)){
        //     alert("Start Line and End line must not be Null or Empty.");
        //     document.getElementById("start_line_4").focus();
        //     return false;
        // }
        // else if (start_line_4>end_line_4) {

        //     alert("Start Line must be lesser than End line.");
        //     document.getElementById("start_line_4").focus();
        //     return false;
        // }
        // else if((start_line_4 == end_line_4)){
        //     alert("Start Line must not be equal to End line.");
        //     document.getElementById("start_line_4").focus();
        //     return false;
        // }

        // //validation for row 5
        
        // if((start_line_5=="") || (start_line_5==null)|| (end_line_5=="") || (end_line_5==null)){
        //     alert("Start Line and End line must not be Null or Empty.");
        //     document.getElementById("start_line_5").focus();
        //     return false;
        // }
        // else if (start_line_5>end_line_5) {

        //     alert("Start Line must be lesser than End line.");
        //     document.getElementById("start_line_5").focus();
        //     return false;
        // }
        // else if((start_line_5 == end_line_5)){
        //     alert("Start Line must not be equal to End line.");
        //     document.getElementById("start_line_5").focus();
        //     return false;
        // }

}

