<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 24px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            <div class="content">
                <p class="title m-b-md">Пользователь {{$user_name}} совершил заказ:</p>
                @if(isset($product->name))
                <p class="title m-b-md">{{$product->name}}</p>
                @else
                    @foreach($products as $product)
                        <p class="title m-b-md">{{$product->name}}</p>
                    @endforeach
                @endif
                @if(isset($full_price))
                    <p class="title m-b-md">Цена: {{$full_price}} р.</p>
                @else
                    <p class="title m-b-md">{{$product->price}}</p>
                @endif
                <p class="title m-b-md">Контактный email: {{$user_email}}</p>
            </div>
        </div>
    </body>
</html>
