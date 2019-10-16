
<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="content-type" content="text/html; charset=UTF-8">
  <title></title>
  <meta http-equiv="content-type" content="text/html; charset=UTF-8">
  <meta name="robots" content="noindex, nofollow">
  <meta name="googlebot" content="noindex, nofollow">
  <meta name="viewport" content="width=device-width, initial-scale=1">

<!-- 
<script type="text/javascript" src="//code.jquery.com/jquery-1.8.3.js"></script>

<script type="text/javascript" src="http://ajax.microsoft.com/ajax/jquery.validate/1.8/jquery.validate.min.js"></script> -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

</head>
<body>
  <table>
    <tr>
      <td><input type="text"  class="element_name" id="element_name_0" ></td>
      <td><input type="text"  class="element_name" id="datapoint_G_0_year" ></td>
    </tr>
    <tr>
      <td><input type="text" class="element_name" id="element_name_1"></td>
      <td><input type="text" class="element_name" id="datapoint_G_1_year" ></td>
    </tr>
    <tr>
      <td><input type="text" class="element_name" id="element_name_2" ></td>
      <td><input type="text" class="element_name" id="datapoint_G_2_year" ></td>
    </tr>
  </table>
    
  <input type="button" id="save_data_button" class="button" value="Save DataPoints">
 

  <script type="text/javascript">
$('#save_data_button').click(function (){
    $.each($('.element_name'), function(i) {
        var grade =  $('#element_name_' +i).val();
        var grade1 =  $('#datapoint_G_' +i+ '_year').val();
        var res = grade+grade1;
        console.log(res);
     
    });
});



</script> 

</body>
</html>
