<!DOCTYPE html>
<html>
<head>
    <title>Invoice Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        .outer{
            position: relative;
            z-index:1;
            overflow:hidden;
            border: 1px solid black;
        }
        .outer:before{
            z-index:-1;
            position:absolute;
            left:150px;
            top:0;
            width: 60%;
            content: url('../assets/img/ticket-bus.jpg');
            opacity:0.3;
        }
        .top-line{
            border-top: 1px solid black;
        }
        .bottom-line{
            border-bottom: 3px solid black;
        }
    </style>
</head>
<body>
<div class="outer" style="width: 100%; max-width: 960px; margin: auto; ">
    <table width="100%">
        <tr class="bottom-line">
            <td><h2>Билет на автобус</h2></td>
            <td style="text-align: right"><strong>Заказ №{{ $data->order_id }}</strong></td>
        </tr>
        <tr>
            <td style="padding-bottom: 16px;">
                <strong>Пассажир:</strong><br>
                {{ $data->fio }}<br><br>
                <strong>Документ:</strong><br>
                @if($data->doc==0) Не указан @else {{ $data->doc }} @endif
                <br><br>
                <strong>Место:</strong> {{ $data->place }}<br><br>
                <b>Тариф:</b> @if($data->tariff==0) Полный @else Детский @endif
            </td>
            <td style="text-align: right; padding-bottom: 16px;">
                <strong>Маршрут:</strong><br>
                {{ $trip_info->from }} - {{ $trip_info->to }}<br><br>
                <b>Отправление:</b> <br> {{ $trip_info->from_time }} {{ $data->date }}<br><br>
                <b>Прибытие:</b> <br> {{ $trip_info->to_time }} {{ $data->date }}<br><br>
                <b>Цена:</b> {{ $trip_info->price }} рублей
            </td>
        </tr>
        <tr style="border-top: 2px solid black;">
            <td>ИП Аднакулов Г.В.<br>ОГРН 304860630800061 Лицензия АСС-86-154006 от 25.11.2014г.</td>
        </tr>
    </table>
</div>
</body>
</html>
