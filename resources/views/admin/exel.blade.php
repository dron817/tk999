<table>
    <thead>
    <tr>
        <th><b>{{ $trip_name }}</b></th>
    </tr>
    <tr>
        <th>№ Билета</th>
        <th>Место</th>
        <th>ФИО</th>
        <th>Телефон</th>
        <th>Документ</th>
        <th>Адрес сбора</th>
    </tr>
    </thead>
    <tbody>
    @foreach($invoices as $ticket)
        <tr>
            <td>{{ $ticket->id }}</td>
            <td>{{ $ticket->place }}</td>
            <td>{{ $ticket->fio }}</td>
            <td style="">@if($ticket->phone == 0) Не указан @else {{ $ticket->phone }} @endif</td>
            <td style="">@if($ticket->doc == 0) Не указан @else {{ $ticket->doc }} @endif</td>
            <td style="">{{ $ticket->address }} {{ $ticket->comment }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
