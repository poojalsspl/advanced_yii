$(document).ready(function(){
   $('#sidebarCollapse').on('click', function () {
        $('#sidebar').toggleClass('active');
    });
    $(".checkbox-a-search").change(function() {
        if(this.checked) {
            $(this).parent().find('.checkbox-a-search').attr('checked','checked');
        } else {
            $(this).parent().find('.checkbox-a-search').attr('checked',false);
        }
        var values = [];
        
        $('.checkbox-a-search:checkbox:checked').each(function () {
            values.push($(this).val());
        });
        
        var courtIds = values.join(',');
        $('#court_code').val(courtIds);
    });
});

function printChecked(checkboxElem,price){
    var sum = 0;
    var total= 0;
    var total=document.getElementById('total').value;
   if (checkboxElem.checked) {
        sum = Number(total) + Number(price);
    } else {
        sum = Number(total) - Number(price);
    }
    //alert(sum);
    document.getElementById('total').value = sum;
  }

  function calculatetotal(){
     var sum = 0;
     var total= 0;
     var duration=document.getElementById('duration').value;
    // alert(duration);
     var total=document.getElementById('total').value;
    if(duration){
      sum = Number(total) * Number(duration); 
      document.getElementById("ftotal").value =sum;
    }
  } 

    function printChecked1(checkboxElem,price){
    var sum = 0;
    var total= 0;
    var total=document.getElementById('total1').value;

    if (checkboxElem.checked) {
        sum = Number(total) + Number(price);
    } else {
        sum = Number(total) - Number(price);
    }
    //alert(sum);
    document.getElementById('total1').value = sum;
  }  


  function calculatetotal1(){
     var sum = 0;
     var total= 0;
     var duration=document.getElementById('duration1').value;
     //alert(duration);
     var total=document.getElementById('total1').value;
    if(duration){
      sum = Number(total) * Number(duration); 
      document.getElementById("ftotal1").value =sum;
    }
  } 

        function printChecked2(checkboxElem,price){
    var sum = 0;
    var total= 0;
    var total=document.getElementById('total2').value;

    if (checkboxElem.checked) {
        sum = Number(total) + Number(price);
    } else {
        sum = Number(total) - Number(price);
    }
    //alert(sum);
    document.getElementById('total2').value = sum;
  }  

  function calculatetotal2(){
     var sum = 0;
     var total= 0;
     var duration=document.getElementById('duration2').value;
     //alert(duration);
     var total=document.getElementById('total2').value;
    if(duration){
      sum = Number(total) * Number(duration); 
      document.getElementById("ftotal2").value =sum;
    }
  }


  
  