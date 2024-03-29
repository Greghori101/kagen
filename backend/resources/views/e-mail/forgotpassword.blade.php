<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,600;0,700;0,800;1,300;1,400;1,600;1,700;1,800&display=swap" rel="stylesheet">
    <style>
        * {
            font-family: 'Open Sans', sans-serif;
        }

        .container {
            max-width: 500px;
            margin: auto;
            padding: 20px;
        }

        img {
            width: 150px;
            height: 150px;
            border-radius: 100%;
        }


        a {
            color: #007bff;
            text-decoration: none;
        }

        .header {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 100%;
            flex-direction: column;
        }

        .logo {
            font-size: 30px;
            font-weight: 900;
            display: flex;
            align-items: center;
        }

        strong {
            font-size: 30px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <div class="logo">
                <img src="{{asset('img/png/primary.png') }}">Numidia
            </div>
            <h2>Welcome to Numidia The Place to Learn</h2>
        </div>
        <p style="text-transform:capitalize;">Dear {{ $data['name']}},</p>

        <p>We received a request to reset your password for your account with us. If you did not make this request, simply ignore this email.</p>
        <p>To reset your password, we generate for you a code to change your password:</p>
        <h2>{{$data['code']}}</h2>
        <p>If you need further assistance, please feel free to reach out to us at support@example.com.</p>
        <p>Best regards,</p>
        <p>The Support Team</p>
    </div>
</body>

</html>