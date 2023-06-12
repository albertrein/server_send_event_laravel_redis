<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Testando o Server-Send Event</title>
</head>
<body>
    <div>
        <input type="text" placeholder="Digite alguma coisa" id="entradaUsuario">
        <button onclick="enviaDados()">Enviar </button>
    </div>
    <div class="container">
        <h1>Mensagem do servidor:</h1>
        <p id="mensagemServidor"></p>
    </div>
    <script>
        const eventSource = new EventSource('http://localhost:8080/stream');
        try{
            eventSource.addEventListener('ping', dadosDoServidor => {
                console.log('Pingou')
                console.log(dadosDoServidor.data)
                document.getElementById('mensagemServidor').textContent = JSON.parse(dadosDoServidor.data).info;
            })
        }catch(e){
            console.log('erro')
        }

        function enviaDados(){
            let informacao = document.getElementById('entradaUsuario').value;
            fetch('http://localhost:8080/api/stream/send_info?info='+encodeURI(informacao))
            alert('Enviado:'+informacao)
        }
    </script>
</body>
</html>