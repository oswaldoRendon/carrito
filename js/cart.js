// A $( document ).ready() block.
$(document).on('keyup mouseup', '.apuntadorcarro', function() {    

    var totalconcepto=parseInt($('#totalservicios').val(),10);
    var acumulado=0;
    for(var t=1;t<totalconcepto;t++){   
        if($('#cantservicio'+(t)).val()==''){
            $('#cantservicio'+(t)).val(0);
        }   
        var cant=parseFloat($('#cantservicio'+(t)).val());

        var idcart=$('#num'+(t)).val(); 
        var cant=parseFloat($('#cantservicionav'+(t)).val());
        $.post('updateCart.php', {evento:'cantidad',cant_cart: cant, idCart: idcart}, function(data){
         
         });
        /* nav */
        $('#cantservicionav'+(t)).val(cant);


        var subtotal=parseFloat($('#subtotal'+(t)).val())*cant;
        acumulado+=(subtotal);
    }
    $('#montopagar').val("€ "+acumulado);
    $('#totalaPagar').text("€ "+acumulado);

    $('#montopagar').val("€ "+acumulado);
    $('#totalNav').text("€ "+acumulado);
    
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
        $.post('updateCart.php', {evento:'cantidad',cant_cart: cant, id_cart: cart_id}, function(data){
         
         });
        /* nav */
        $('#cantservicio'+(t)).val(cant);


        var subtotal=parseFloat($('#subtotal'+(t)).val())*cant;
        acumulado+=(subtotal);
    }
    $('#montopagar').val("€ "+acumulado);
    $('#totalaPagar').text("€ "+acumulado);

    $('#montopagar').val("€ "+acumulado);
    $('#totalNav').text("€ "+acumulado);
    
    
    
    
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
          $('#total').val(json.price);
          $('#DescuentoNav').text(json.price);
          $('#totalDescuentos').val(json.price);
         
          var id=json.id;
          var totalconcepto=parseInt($('#totalservicios').val(),10);
          var idcart;
          var categ;
          $('#descuento').val(totalconcepto-json.price);

          for(var t=1;t<totalconcepto;t++){   
               idcart=parseInt($('#num'+t).val());
              
               categ=$('#categoria'+t).val();
              if(categ=='1' || categ=='2' || categ=='3' || categ=='4' ){
                 aplicar=true;    
                          
              }            
          }
         

          if(aplicar==true){
            var res;
          $.post('apply_discount.php', {idcoupon: id, idCart: idcart}, function(data){
           t=(totalconcepto-1);
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

