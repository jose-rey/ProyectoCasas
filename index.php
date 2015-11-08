<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Ejemplo Parse</title>
    </head>
    <body>
        <?php
        require 'vendor/autoload.php';

        use Parse\ParseClient;

        ParseClient::initialize('ve3SsAciKVt8GwhmLDCzW9rQ6EkPj8ai3pWcp3Is', 
                'zt0dVKAQwyRTAOFkfFj5d9jzDWAH9fjaJsUR5fhD', 
                'QpnJBJkOEp3VmEbcaAX8r6HDixj2wCUNQ42e1c4N');

        use Parse\ParseObject;
        use Parse\ParseUser;

        /* Insertar en
          $testObject = ParseObject::create("TestObject");
          $testObject->set("foo", "bar2");
          $testObject->save(); */

        // Login
        try {
            $user = ParseUser::logIn("Jose Alfredo Rey Mendez", "1234");
            echo "Usuario: " . $user->getUsername() . "<br>";
        } catch (ParseException $ex) {
            // error in $ex->getMessage();
        }

        // Current user
        $user = ParseUser::getCurrentUser(); //Usuario Actual

        $testObject = ParseObject::create("Inmueble");
        $testObject->set("descripcion", "Esto es un ejemplo demasiado prendido para este planeta");
        $testObject->set("idUsuario", $user); //Le damos como puntero el usuario actual
        $testObject->save();
        echo "Se creo el nuevo objeto";
        ?>
    </body>
</html>
