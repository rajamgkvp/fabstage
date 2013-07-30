
<!-- saved from url=(0156)file:///C:/Documents%20and%20Settings/Vish/Desktop/How%20to%20add%20%20%20remove%20textbox%20dynamically%20with%20jQuery_files/jQuery-add-remove-textbox.htm -->
<html><head><meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<title>jQuery add / remove textbox example</title>
 
<script type="text/javascript" src="./jQuery add   remove textbox example_files/jquery-1.3.2.min.js"></script>

<style type="text/css">
	div{
		padding:8px;
	}
</style></head>

<body>

<h1>jQuery add / remove textbox example</h1>

<script type="text/javascript">

    $(document).ready(function(){

	    var counter = 2;
		
	    $("#addButton").click(function () {
				
			if(counter>10){
		        alert("Only 10 textboxes allow");
		        return false;
		    }   
			
			var newTextBoxDiv = $(document.createElement('div')).attr("id", 'TextBoxDiv' + counter);
                newTextBoxDiv.after().html('<label>Textbox #'+ counter + ' : </label>' +
				'<input type="text" name="textbox' + counter + 
				'" id="textbox' + counter + '" value="" >');
            
			newTextBoxDiv.appendTo("#TextBoxesGroup");
				
		    counter++;
	    });

	    $("#removeButton").click(function () {
		    if(counter==1){
		        alert("No more textbox to remove");
		        return false;
		    }   
	        counter--;
			
	        $("#TextBoxDiv" + counter).remove();
		});
		
		$("#getButtonValue").click(function () {
		
			var msg = '';
			for(i=1; i<counter; i++){
				msg += "\n Textbox #" + i + " : " + $('#textbox' + i).val();
			}
		   	alert(msg);
		});
		
  });
</script>


<div id="TextBoxesGroup">
	
<div id="TextBoxDiv1"><label>Textbox #1 : </label><input type="text" name="textbox1" id="textbox1" value=""></div><div id="TextBoxDiv2"><label>Textbox #2 : </label><input type="text" name="textbox2" id="textbox2" value=""></div><div id="TextBoxDiv2"><label>Textbox #2 : </label><input type="text" name="textbox2" id="textbox2" value=""></div><div id="TextBoxDiv3"><label>Textbox #3 : </label><input type="text" name="textbox3" id="textbox3" value=""></div></div>
<input type="button" value="Add Button" id="addButton">
<input type="button" value="Remove Button" id="removeButton">
<input type="button" value="Get TextBox Value" id="getButtonValue">



