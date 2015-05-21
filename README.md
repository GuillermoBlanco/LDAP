# LDAP

El modelo de información de LDAP se basa en entradas, entendiendo por entrada un conjunto de atributos identificados por un nombre global único (Distinguished Name – DN), que se utiliza para identificarla de forma específica. Las entradas se organizan de forma lógica y jerárquica mediante un esquema de directorio, que contiene la definición de los objetos que pueden formar parte del directorio.

Cada entrada del directorio representa un objeto, que puede ser abstracto o real: una persona, un mueble o una función en la estructura de una empresa, etc

Cada atributo de una entrada tendrá un tipo y un valor con el formato atributo/valor que permite caracterizar un aspecto del objeto que define la entrada. Estos atributos tienen nombres que hacen referencia a su contenido y pueden ser de dos tipos:

Atributos normales: Son los atributos que identifican al objeto (nombre, apellidos, etc.).
Atributos operativos: Son los atributos que utiliza el servidor para administrar el directorio (fecha de creación, tamaño, etc.).
Las entradas se indexan mediante el nombre completo (dn), que facilita la identificación singular a cada elemento del árbol. El nombre completo se formará con una serie de pares atributo/valor, separados por comas, que reflejan la ruta inversa desde la posición lógica del objeto hasta la raíz del árbol.

Para referirse al nombre completo suelen utilizarse las siglas RDN, que provienen del inglés Relative Distinguished Name.

Entre los atributos que suelen emplearse habitualmente, encontramos los siguientes, aunque puede haber muchos más:

uid (user id): Identificación única de la entrada en el árbol.
objectClass: Indica el tipo de objeto al que pertenece la entrada.
cn (common name): Nombre de la persona representada en el objeto.
givenname: Nombre de pila.
sn (surname): Apellido de la persona.
o (organization): Entidad a la que pertenece la persona.
u (organizational unit): El departamento en el que trabaja la persona.
mail: dirección de correo electrónico de la persona.
Obviamente, los atributos anteriores hacen referencia a un tipo de objeto que representa a los miembros de una empresa. Para representar a otros tipos de objetos, necesitaríamos atributos diferentes.

De esta forma, una entrada almacenada en el directorio LDAP podría tener el siguiente aspecto:

dn: uid=jlopez, ou=medio, dc=somebooks, dc=es objectClass: person cn: Juan Lopez givenname: Juan sn: Lopez o: somebooks u: medio
mail: juanlopez@somebooks.es
Como hemos dicho antes, las diferentes entradas se organizan a modo de árbol jerárquico que, normalmente, representa una estructura organizativa o geográfica en particular. Así, las entradas que representan comunidades autónomas aparecerán en la parte superior del árbol, debajo estarán las que representan provincias, después las ciudades, los departamentos, los usuarios, etc.

 

En la actualidad, las implementaciones de LDAP suelen utilizar DNS (Domain Name Service) para la estructura de los niveles superiores del árbol. En los niveles inferiores, sin embargo, las entradas representarán otro tipo de unidades organizativas, usuarios o recursos.

Por otra parte, gracias al uso de un atributo especial llamado objectClass, podemos controlar qué atributos son válidos y cuáles imprescindibles en una entrada. Los valores de objectClass establecen las reglas que debe seguir el valor de una entrada.

Lógicamente, LDAP establece operaciones para consultar o actualizar el directorio. Éstas nos permiten crear o eliminar entradas y modificar entradas existentes.

La mayor parte del tiempo, LDAP se utiliza para diversas consultas sobre la información que contiene, por lo que es común que la estructura de su base de datos se encuentre optimizada para la lectura en detrimento de la escritura.

Como vemos, LDAP puede utilizarse para organizar de forma unificada el acceso a la información representativa de una red. Sin embargo, es muy frecuente que también almacene la información de autenticación para los usuarios y/o recursos. De esta forma, se facilita el control de acceso sobre los datos contenidos en el servidor.

Aunque ya hemos visto al principio un esquema de funcionamiento mucho más detallado, podríamos representar el funcionamiento de LDAP de una forma más abstracta con el siguiente esquema:

 

Por último, LDAP incluye servicios de integridad y confidencialidad de los datos que contiene.


Extraido de: http://somebooks.es/?p=3444
