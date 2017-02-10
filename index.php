<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pruebas</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

</head>
<body>

<div class="container">
    <form class="form-horizontal" role="form">
        <div class="form_test user_">Please, fill in the form with the correct information.</div>
        <div class="form-group">
            <label for="name" class="col-lg-2 control-label">Nombre</label>
            <div class="col-lg-10">
                <input type="text" class="form-control" id="name"
                       placeholder="name">
            </div>
        </div>
        <div class="form-group">
            <label for="secondname" class="col-lg-2 control-label">Apellido</label>
            <div class="col-lg-10">
                <input type="text" class="form-control" id="secondname"
                       placeholder="secondname">
            </div>
        </div>
        <div class="form-group">
            <label for="nick" class="col-lg-2 control-label">Nick</label>
            <div class="col-lg-10">
                <input type="text" class="form-control" id="nick"
                       placeholder="Nick">
            </div>
        </div>
        <div class="form-group">
            <label for="pass" class="col-lg-2 control-label">Contraseña</label>
            <div class="col-lg-10">
                <input type="password" class="form-control" id="pass"
                       placeholder="Contraseña">
            </div>
        </div>
        <div class="form-group">
            <label for="pass2" class="col-lg-2 control-label"> Confirma tu Contraseña</label>
            <div class="col-lg-10">
                <input type="password" class="form-control" id="pass2"
                       placeholder="Contraseña">
            </div>
        </div>
        <div class="form-group">
            <label for="email" class="col-lg-2 control-label">Correo</label>
            <div class="col-lg-10">
                <input type="email" class="form-control" id="email"
                       placeholder="email">
            </div>
        </div>
        <div class="form-group">
            <label for="country" class="col-lg-2 control-label">Pais</label>
            <div class="col-lg-10">
                <input type="text" class="form-control" id="country"
                       placeholder="country">
            </div>
        </div>
        <div class="form-group">
            <label for="phone" class="col-lg-2 control-label">Telefono</label>
            <div class="col-lg-10">
                <input type="text" class="form-control" id="phone"
                       placeholder="phone">
            </div>
        </div>


        <div class="form-group">
            <div class="col-lg-offset-2 col-lg-10">
                <button type="submit" class="btn btn-default">Entrar</button>
            </div>
        </div>
    </form>
</div>


<script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
<script src="js/main.js"></script>
</body>
</html>