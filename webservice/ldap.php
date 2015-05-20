<?php
$host="52.24.210.244:389";

$ds=ldap_connect($host);
ldap_set_option($ds, LDAP_OPT_PROTOCOL_VERSION, 3);

$response;


        
//$ldap_user="user1@toca.cat";
//$ldap_pass="Platano123$";

if ($ds) { 

    switch ($_GET["action"]) {
        case "login":
            $ldap_user = $_POST["user"];
            $ldap_pass = $_POST["password"];
            
            $r=ldap_bind($ds, $ldap_user, $ldap_pass);
            
            $response=$r;
            break;
        case "search":
            $ldap_user = $_POST["user"];
            $ldap_pass = $_POST["password"];
            
            $r=ldap_bind($ds, $ldap_user, $ldap_pass);
            
            $sr=ldap_search($ds, "DC=toca,DC=cat", "objectClass=group");  
            
            echo "El resultado de la búsqueda es " . $sr . "<br />";

            echo "El número de entradas devueltas es " . ldap_count_entries($ds, $sr) . "<br />";

            echo "Obteniendo entradas ...<p>";
            $info = ldap_get_entries($ds, $sr);
            echo "Los datos para " . $info["count"] . " objetos devueltos:<p>";

            for ($i=0; $i<$info["count"]; $i++) {
                echo "El dn es: " . $info[$i]["dn"] . "<br />";
                echo "El mo es: " . $info[$i]["memberof"][1] . "<br />";
                echo "La primera entrada cn es: " . $info[$i]["cn"][0] . "<br /><hr />";
            }
            break;

        default:
            break;
    }
    
    
    ldap_close($ds);
    
} else {
    $response= "Error";
}

return $response;
?>