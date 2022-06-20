<table>
    <thead>
    <tr>
        <th><b>{{ $trip_name }}</b></th>
    </tr>
    <tr>
        <th>Место</th>
        <th>ФИО</th>
        <th>Маршрут</th>
        <th>Тариф</th>
        <th>Телефон</th>
        <th>Документ</th>
        <th>Адрес сбора</th>
    </tr>
    </thead>
    <tbody>
    @foreach($invoices as $ticket)
        <tr>
            <td>{{ $ticket->place }}</td>
            <td>{{ $ticket->fio }}</td>
            <td style=""> {{ $ticket->way  }}</td>
            <td style="">@if($ticket->tariff == 0) Взрослый @else Детский @endif</td>
            <td style="">@if($ticket->phone == 0) Не указан @else {{ $ticket->phone }} @endif</td>
            <td style="">@if($ticket->doc == 0) Не указан @else {{ $ticket->doc }} @endif</td>
            <td style="">{{ $ticket->address }} {{ $ticket->comment }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
