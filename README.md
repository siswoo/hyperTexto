Instrucciones de primer uso:
------------------------------
*Requisitos previos*
* Contar con mysql (ya que es el gestor de base de datos que utiliza dicho proyecto)
-----------------------------

1._ Clonar el repositorio con 
git clone https://github.com/siswoo/hyperTexto.git

2._ dentro de la carpeta ejecutar por cmd el siguiente comando "composer install"

3._ luego ejecutar por cmd el siguiente comando "cp .env.example .env" para replicar el ejemplo del .env (configurar de ser necesario colocando clave y usuario de su mysql)

4._ ejecutar por cmd el siguiente comando "php artisan key:generate"

5._ luego correr el programa con el comando "php artisan serve"

6._ desde el navegador dirigirse a http://127.0.0.1:8000 para correr la aplicación

7._ le aparecerá un navbar el cual contiene cada CRUD y requisito solicitado en la prueba siendo el CRUD de "Notas" el resultado final, aparte en la sección de "Usuarios aleatorios" el siguiente ejercicio
de la prueba "Validación de conocimientos sobre API’s" 

Nota: no tengo conocimientos en Vue ni en React por ende lo desarrolle con bootstrap, no tengo conocimientos en magento. Aunque debo aclarar que estoy abierto al aprendizaje.
