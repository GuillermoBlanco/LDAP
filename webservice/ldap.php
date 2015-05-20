<?php
$host="52.24.210.244";
$puerto = "389";
$ds=ldap_connect($host,$puerto);
ldap_set_option($ds, LDAP_OPT_PROTOCOL_VERSION, 3);
ldap_set_option($ds, LDAP_OPT_REFERRALS,0);

$response;


        
$ldap_user="user1@toca.cat";
$ldap_pass="Platano123$";

if ($ds) { 

    switch ($_GET["action"]) {
        case "login":
//            $ldap_user = $_POST["user"];
//            $ldap_pass = $_POST["password"];
            
            $r=ldap_bind($ds, $ldap_user, $ldap_pass);
            if($r){
                $_SESSION['user']=$ldap_user;
                $_SESSION['password']=$ldap_pass;
            }
            $response=$r;

            break;
        case "searchGroups":
//            $ldap_user = $_SESSION['user'];
//            $ldap_pass = $_SESSION['password'];
            
            $r=ldap_bind($ds, $ldap_user, $ldap_pass);
            
            $sr=ldap_search($ds, "DC=toca,DC=cat", "objectClass=group");  
            
            if ($sr){
                
                
//            echo "El número de entradas devueltas es " . ldap_count_entries($ds, $sr) . "<br />";
                $info = ldap_get_entries($ds, $sr);
//                for ($i=0; $i<$info["count"]; $i++) {
//                    echo "El dn es: " . $info[$i]["dn"] . "<br />";
//                    echo "El mo es: " . $info[$i]["memberof"][1] . "<br />";
//                    echo "La primera entrada cn es: " . $info[$i]["cn"][0] . "<br /><hr />";
//                }
//                $response=  array();
//                array_push($response, $info[$i]);
                $response=$info;
            }
            $response="PIPO";
            break;

        default:
            break;
    }
    
    
    ldap_close($ds);
    
} else {
    $response= "Error";
}

echo json_encode($response);
?>