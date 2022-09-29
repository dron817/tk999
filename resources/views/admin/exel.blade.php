<table text-align="left">
    <thead>
    <tr>
        <th width="50px"></th>
        <th colspan="5">Перечень билетов на рейс ТК999</th>
        <th width="50px"></th>
    </tr>
    <tr>
        <th width="50px"></th>
        <th colspan="5"><b>Дата рейса: </b> {{ $trip_date }}</th>
        <th width="50px"></th>
    </tr>
    <tr>
        <th width="50px"></th>
        <th colspan="5"><b>Рейс: </b> {{ $trip_name}}</th>
        <th width="50px"></th>
    </tr>
    <tr>
        <th width="50px"><b>№</b></th>
        <th width="50px"><b>Место</b></th>
        <th width="200px"><b>ФИО</b></th>
        <th width="100px"><b>Телефон</b></th>
        <th width="100px"><b>Номер билета</b></th>
        <th width="250px"><b>Прибытие</b></th>
        <th width="50px"><b>Сумма</b></th>
    </tr>
    </thead>
    <tbody>
    @foreach($invoices as $ticket)
        <tr>
            <td  text-align="left">{{ $ticket->id }}</td>
            <td  text-align="left">{{ $ticket->place }}</td>
            <td  text-align="left">{{ $ticket->fio }}</td>
            <td style=""  text-align="left">@if($ticket->phone == 0) Не указан @else {{ $ticket->phone }} @endif</td>
            <td style=""  text-align="left">@if($ticket->doc == 0) Не указан @else {{ $ticket->doc }} @endif</td>
            <td style=""  text-align="left">{{ $ticket->address }} {{ $ticket->comment }}</td>
            <td style=""  text-align="left">___</td>
        </tr>
    @endforeach
    </tbody>
</table>
