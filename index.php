<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Preload</title>
    <style>
        body, html {
            height: 100%;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #EA1A23;
        }
        .loader {
            border: 8px solid #fff;
            border-radius: 50%;
            border-top: 8px solid #003A90;
            width: 80px;
            height: 80px;
            animation: spin 2s linear infinite;
        }
        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
    </style>
</head>
<body>
    <div class="loader"></div>
    <script>
        setTimeout(function(){
            window.location.href = "login.php"; // Redireciona para a segunda página
        }, 5000); // 3 segundos de delay
    </script>
</body>
</html>
