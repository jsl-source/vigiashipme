$(document).ready(function(){

        $('#consultaguia').submit(function(event){
            
                event.preventDefault();

                var guia=$('#guia').val();
                $.ajax({
                    
                    beforeSend: function(){
                        $('#loader'). css("margin-left", "auto");
                        $('#loader'). css("margin-right", "auto");
                        $('#loader'). css("display", "block");
                        $('#loader').html('<img class="image-fluid rounded mx-auto d-block" style="width:43%" src="./assets/img/modal/Marcador2.gif"/>');
                        $('#exampleModalLabel').text("");
                        $('#nombre').text("");
                        $('#nombre1').text("");
                        $('#nombre15').text("");
                        $('#nombre2').text("");
                        $('#nombre4').text("");
                        $('#nombre6').text("");
                        $('#nombre8').text("");
                        $('#nombre10').text("");
                        $('#nombre12').text("");
                        $('#nombre14').text("");
                        $('.c1'). css("display", "none");
                        $('.c2'). css("display", "none");

                    },
                    url: './seguimiento/valida.php',
                    type: 'GET',
                    data: 'guia='+guia,
                    success:function(resp){

                  

                        var obj = JSON.parse(resp);

                        
                        if(obj.resp){

                            $('#exampleModalLabel').text(obj.resp);

                        }else{

                            $('#loader'). css("display", "none");
                            $('.c1'). css("display", "block");
                            $('.c2'). css("display", "block");
                            $('#exampleModalLabel').text(obj.NRO_GUIA);
                            $('#nombre').text(obj.NOMBRE);
                            $('#nombre1').text(obj.ORDEN);
                            $('#nombre15').text(obj.DIRECCION);
                            $('#nombre2').text(obj.NRO_CAJA);
                            $('#nombre4').text(obj.FECHA_CARGA);
                            $('#nombre6').text(obj.FECHA_ASIGNA_RUTA);
                            $('#nombre8').text(obj.FECHA_ASIGNA_NODE);
                            $('#nombre10').text(obj.FECHA_ESTADO);
                            $('#nombre12').text(obj.ESTADO_RUTA);
                            $('#nombre14').text(obj.TMS_NOVEDADID);
                                           

                        }
                       

                    },
                    error: function(jqXHR,estado,error){

                        console.log(estado);
                        console.log(error);

                    },
                    complete: function(jqXHR,estado){

                        console.log(estado);  
                        
                    },
                    timeout: 10000



                });



         
            }); 
        
});