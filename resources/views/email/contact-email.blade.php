<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Fiombonan'ny Malagasy Eto Torkia</title>
    <style>
        body {
            font-family: 'Google Sans', Roboto, RobotoDraft, Helvetica, Arial, sans-serif;
        }

        .container {
            width: 60%;
            margin: 0;
            background-color: #fafafa !important;
            padding: 30px;
            border-radius: 10px;
            color: #3c4043;
            box-shadow: 0 1px 2px 0 rgb(60 64 67 / 30%), 0 1px 3px 1px rgb(60 64 67 / 15%);
        }

        img {
            width: 400px;
            display: none;
            height: 400px;
        }

        .title-section {
            display: flex;
            justify-content: space-between;
        }

        .message-body {
            white-space: pre-wrap;
        }

    </style>
</head>

<body>

    @php
        // $data = App\ContactUs::OrderBy('id', 'desc')->first();
    @endphp
    <div class="container">
        <div class="title-section">
            <h2>{{ $data->subject != null ? $data->subject . ' | ' : '' }} Fiombonan'ny Malagasy Eto Torkia</h2>
        </div>

        <div class="message-header">
            <h4>{{ $data->name }} {{ $data->surname }} vous a envoyé une message:</h4>
        </div>

        <div class="message-body">
            <p>{{ $data->message }}</p>
        </div>

        <div class="message-footer">
            <h4>A propos de l'expéditeur:</h4>
            <p><small>Nom et prénom : {{ $data->name }} {{ $data->surname }}</small></p>
            <p><small>Email : {{ $data->email }}</small></p>
            <p><small>Numero de telephone : {{ $data->phone }}</small></p>
        </div>
    </div>
</body>

</html>
