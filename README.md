# Flow de pruebas en desarrollo

1. Hacer los cambios en astro.
2. Si intentas enviar los emails con `npm run dev` no va a funcionar.
3. usar `npm run build`
4. Hacer `npm run build`
5. Se crea el _/dist_
6. Dentro del _dist/services/email_ tienen que estar:
    * enviar.php
    * Exception.php
    * PHPMailer.php
    * SMTP.php
7. `sudo docker compose up`
8. Si los tenias corriento `sudo docker compose down`
9. Subir el _dist_ a un server que soporte `php`

## Como cofigurar email y password para smtp email (envio de correro)

Si vamos a `dist/services/email/enviar.php` vamos a ver esta config:

```php
$SMTP_SERVER="smtp.gmail.com";
$SMTP_USER="some@gmail.com";
$SMTP_PASSWORD="some";
```

1. Primero necesitmamos una cuenta de gmail a la  cual tengamos acceso.
2. Esta cuenta tiene que tener activada la autenticacion en dos pasos.
3. En la parte de seguridad de la cuenta tenemos que ir a *Contraseñas de aplicaciones*
4. Nos va a pedir que le pongamos un nombre para reconocerla en el futuro, podemos uno
y nos la dara. la copiamos y la pegamos en `$SMTP_PASSWORD=`
5. Fin.

> Nota: El email que tengamos en `$SMTP_USER` es el que le llegara al destinatario
> independientemente de lo que hayamos puesto en `$mail->setFrom('elqueenvia@example.com', 'enviador');`
> El receptor podra ver la palabra *enviador* ( o lo que quieras ponerle) pero al momento de ver 
> el email, siempre vera que el remitente es el email que hayas puesto en `$SMTP_USER=`.