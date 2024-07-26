<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Alerta de Asociacion Virtual</title>
    <style>
        .badge {
            display: inline-block;
            padding: 0.1em 0.5em;
            font-size: 1em;
            font-weight: bold;
            color: #fff;
            background-color: #007bff;
            border-radius: 0.25em;
            text-align: center;
            white-space: nowrap;
        }

        .badge.bg-primary {
            background-color: #007bff;
        }

        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f5f5f5;
        }
        .container {
            width: 490px;
            margin: 20px auto;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        h1 {
            color: #005E56;
            font-size: 28px;
            margin-top: 0;
            text-align: center;
        }
        p {
            color: #333333;
            font-size: 18px;
            line-height: 1.5;
        }
        .logo {
            text-align: center;
            margin-bottom: 20px;
        }
        .logo img {
            max-width: 250px;
            height: auto;
        }
        .footer {
            margin-top: 20px;
            text-align: center;

        }
        .footer p {
            color: #999999;
            font-size: 14px;

        }
    </style>
</head>
<body>

    <div class="container">

        <div class="logo">
            <img src="https://porritacoopserp.com/img/LogoCoopserp2014-PNG.png" alt="Coopserp.icono" width="250px" height="120px" class="navbar-brand mb-2 mt-2">
        </div>
        <h1>¡Asociación Virtual Exitosa!</h1>


        <p style="color: black; text-align: justify;">Sr(a) <strong>{{$nombrecompleto}}</strong>
            Su solicitud de Vinculación con radicado <span class='badge bg-primary fw-bold'>{{$id}}</span>, fecha <strong>{{$fecha}}</strong> y lugar: <strong>{{$escribe}}</strong> se ha generado de manera exitosa y remitido a la Agencia <strong>{{$agencia}}.</strong>
            En un tiempo aproximado de <strong>24</strong> horas será contactado por el Director de Agencia.
            <br><br><span style="font-size: 20px">
                <strong>{{$director}}</strong><br>
                Director de Agencia - <strong>{{$agencia}}</strong><br>
                {{$direccion}}<br>
                {{$telefonofijo}}<br>
                (+57) {{$celularcorp}}<br></span>
                <span style="font-size: 20px">{{$correo}}</span>
        </p>

    </div>
    <div class="footer">
        <p>Este correo electrónico fue enviado automáticamente. Por favor, no responder a este mensaje.</p>
    </div>
</body>
</html>

