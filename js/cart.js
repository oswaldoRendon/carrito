// A $( document ).ready() block.
$(document).on('keyup mouseup', '.apuntadorcarro', function() {    

    var totalconcepto=parseInt($('#totalservicios').val(),10);
    var acumulado=0;
    for(var t=1;t<totalconcepto;t++){   
        if($('#cantservicio'+(t)).val()==''){
            $('#cantservicio'+(t)).val(0);
        }   
        var cant=parseFloat($('#cantservicio'+(t)).val());
        $('#cantservicionav'+(t)).val(cant);
        var idcart=$('#num'+(t)).val(); 
        var cant=parseFloat($('#cantservicionav'+(t)).val());
        $.post('updateCart.php', {evento:'cantidad',cant_cart: cant, idCart: idcart}, function(data){
         
         });
        /* nav */
       


        var subtotal=parseFloat($('#subtotal'+(t)).val())*cant;
        acumulado+=(subtotal);
    }
    var descuento=$('#descuento').val().replace('€ ','');
    if(descuento==''){

      $('#montopagar').val("€ "+acumulado);
      $('#totalaPagar').text("€ "+acumulado);
      $('#Subtotal').val("€ "+acumulado);      
      $('#subtotalnav').text("€ "+acumulado);      
      $('#totalNav').text("€ "+acumulado);
    }else{
      $('#Subtotal').val("€ "+acumulado);
      $('#subtotalnav').text("€ "+acumulado);
      var sbtotal=$('#Subtotal').val().replace('€ ','');
      $('#montopagar').val("€ "+(sbtotal-descuento));
      $('#totalaPagar').text("€ "+(sbtotal-descuento));
  
      $('#montopagar').val("€ "+(sbtotal-descuento));
      $('#totalNav').text("€ "+(sbtotal-descuento));
    }
   
    
  });

  $(document).on('keyup mouseup', '.apuntadorcarronav', function() {    

    var totalconcepto=parseInt($('#totalservicios').val(),10);
    var acumulado=0;
    for(var t=1;t<totalconcepto;t++){   
        if($('#cantservicionav'+(t)).val()==''){
            $('#cantservicionav'+(t)).val(0);
        }  
        
        var cart_id=$('#num'+(t)).val(); 
        
        var cant=parseFloat($('#cantservicionav'+(t)).val());
        $('#cantservicio'+(t)).val(cant);
        $.post('updateCart.php', {evento:'cantidad',cant_cart: cant, id_cart: cart_id}, function(data){
         
         });
        /* nav */
     

        
        var subtotal=parseFloat($('#subtotal'+(t)).val())*cant;
        acumulado+=(subtotal);
    }

    var dsct=$('#DescuentoNav').text().replace('€0',''); 
   
    if(dsct=="  "){

      $('#montopagar').val("€ "+acumulado);
      $('#totalaPagar').text("€ "+acumulado);
      $('#Subtotal').val("€ "+acumulado);      
      $('#subtotalnav').text("€ "+acumulado);      
      $('#totalNav').text("€ "+acumulado);
    }else{
      $('#Subtotal').val("€ "+acumulado);
      $('#subtotalnav').text("€ "+acumulado);
      var sbtotal=$('#Subtotal').val().replace('€ ','');
      $('#montopagar').val("€ "+(sbtotal-dsct));
      $('#totalaPagar').text("€ "+(sbtotal-dsct));
  
      $('#montopagar').val("€ "+(sbtotal-dsct));
      $('#totalNav').text("€ "+(sbtotal-dsct));
    }
  
    
  });
 
  var aplicar=false;
  $(document).on('click','#activate', function(){
     
    var coupon = $('#coupon').val();
    var price = $('#price').val();
   
    if(coupon == ""){
        $('#result').html("<h4 class='pull-right text-danger'>Invalid Coupon Code!</h4>");
    }else{
     
      $.post('get_discount.php', {coupon: coupon, price: price}, function(data){
       
        if(data.trim() == "error"){

            $('#coupon').val("");
            $('#result').html("<h4 class='pull-right text-danger'>Invalid Coupon Code!</h4>");
        
         
          //$('#total').val(price);
         // $('#result').html('');
        }else{
          var json = JSON.parse(data);
          
          $('#result').html("<h4 class='pull-right text-primary'>"+json.discount+"% Off</h4>");
          
         
        
         console.log(json);
          var id=json.id;
          var totalconcepto=parseInt($('#totalservicios').val(),10);
          var idcart;
          var categ;
       

          for(var t=1;t<totalconcepto;t++){   
               idcart=parseInt($('#num'+t).val());              
               categ=$('#categoria'+t).val();
              if(categ=='1' || categ=='2' || categ=='3' || categ=='4' ){
              var sb=$('#subtotal'+t).val().replace('€ ','');
               $('#descuento').val("€ "+((sb*json.discount)/100));
               $('#DescuentoNav').text("€ "+((sb*json.discount)/100));
               var totalMonto=$('#montopagar').val().replace('€ ','');
               $('#montopagar').val("€ "+(totalMonto-$('#descuento').val().replace('€ ','')));
               $('#totalNav').text($('#montopagar').val());
                 aplicar=true;  
                 break;                            
              }            
          }
         

          if(aplicar==true){
            var res;
          $.post('apply_discount.php', {idcoupon: id, idCart: idcart}, function(data){
           
          });
          
        }


        }
      });
    }
  });



  $( document ).ready(function() {
    aplicado=false;
    var totalconcepto=parseInt($('#totalservicios').val(),10);
    var acumuladonav=0;
    for(var t=1;t<totalconcepto;t++){   
        if($('#cantservicionav'+(t)).val()==''){
            $('#cantservicionav'+(t)).val(0);
        }   
        var cant=parseFloat($('#cantservicionav'+(t)).val());
        /* nav */
        $('#cantservicio'+(t)).val(cant);


        var subtotal=parseFloat($('#subtotal'+(t)).val())*cant;
        acumuladonav+=(subtotal);
    }
   
    $('#totalaPagar').text("€ "+acumuladonav);
   
});




  
//btnStriper

