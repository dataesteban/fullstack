<!DOCTYPE html>
<html>
<head>
    <title>Mensaje Recibido</title>
</head>
<body>
    
    Contenido del Email

    <p>Recibiste un mensaje de: {{$msg['name']}}</p>
    <p><strong>Asunto: </strong> {{$msg['subject']}}</p>
    <p><strong>Contenido: </strong>{{$msg['content']}}</p>


</body>
</html>
