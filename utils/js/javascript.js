/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$(function(){
    

    
   $("#validar").mousedown(function(){
       
        var formulario = $("#formulario");
        alert(formulario.serialize());
        var datos = formulario.serialize();
        $.post('webservice/ldap.php?action=login',datos, function(respuesta){        
            
            if (respuesta) {
                datos = "";
                $.post('webservice/ldap.php?action=searchGroups',datos, function(respuesta2){        
//                    var texto = "";
//                    $.each(respuesta2, function () { 
//                        texto += this; 
//                    });
//                    
//                    alert(texto);
                alert(respuesta2);
                },"json");
            }
            
        },"json");
       
   });

});


