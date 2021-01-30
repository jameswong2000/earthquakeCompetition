<script type="text/javascript" src="jquery.js">
 setInterval("yourAjaxCall()",1000);
 function yourAjaxCall()
 {

        $.ajax({                                      
          url: 'json.txt',          //the script to call to get data          
    data: "id=1", //you can insert url argumnets here to pass to api.php
                                           //for example "id=5&parent=6"
          dataType: 'json',                //data format
          success: function(data)          //on recieve of reply
          { 
            var id1 = data[0];              // get id of first row
            var vcolor1 = data[1];              //get color of first row            
            $("#square").css({"background-color" : vcolor1});   
            $color1 = vcolor1; //saving value
            var $color1;

            //HERE I WANT TO BE ABLE TO GET NEXT ROW OF MY JSON ARRAY. HOW?

          } 

 </script>
