/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

var formulario = $("#formulario");

$.ajax({
        url: "webservice/ldap.php?action='login'",
        type: "POST",
        data: formulario.serialize(),
        success : function(data){
              //php script returns filename
              //we apply this filename as the value for the hidden field in form2
              
              obj = JSON.parse(data);

              if (obj["disponible"]!=0){
                alert("Usuario logeado!!! User: "+oForm.elements["user"].value);  
              }
              else{
                $('#login').append( "<p style='background:red'>Usuario no existe</p>" );
              }
              
              // $('#form2 #filename').val(filename);
        }
      });