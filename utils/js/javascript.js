/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$(function(){
    

    
   $("#validar").click(function(){
       
        var formulario = $("#formulario");
        alert(formulario.serialize());
        var datos = formulario.serialize();
        $.post('webservice/ldap.php?action=login',datos, function(respuesta){        
            if (respuesta) {
                $("#content").html("");
                
                $("#content").append("<h2>Todos los Grupos</h2>");
                var selector = $('<select>',{
                                    'id':"groupList"
                                });
                
                for(var i = 0;i<respuesta['todos'].length;i++){
                    var opt = document.createElement('option');
                    opt.innerHTML=respuesta['todos'][i][0];
                    opt.value=respuesta['todos'][i][0];
                    opt.disabled=true;
                    for(var j = 0;j<respuesta['usuario'].length;j++){
                       if(respuesta['usuario'][j][0]==respuesta['todos'][i][0]){
                           opt.disabled=false;
                       }else if(respuesta['usuario'][j][0]== "sysops"){
                           opt.disabled=false;
                       }
                    }
                    selector.append(opt);
                }
                $("#content").append(selector);
                
                $("#groupList").click(function(){
                    $.post('webservice/ldap.php?action=searchUsers',"group="+$("#groupList").val(), function(respuesta){  
                        
                    },'json');                
                });
                
            }
            
        },'json');

   });

    
});


