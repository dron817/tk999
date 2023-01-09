@extends('layouts.general')

@section('title', 'Возврат билета')
@section('content')
    <section id="bus-image-section">

    </section>
    <section id="order-section">
        <div class="container">
            <div class="row">
                <h1>Возврат билета</h1>
                <div class="col-12 col-lg-6 refund-ticket">
                    <b>Билет №{{ $ticket->id }}</b>
                    @if($ticket->payment_status == 'refunded')
                        <b>(Возвращён!)</b>
                    @endif
                    </br></br>
                    {{ $ticket->fio }}</br>
                    Место: {{ $ticket->place }}</br>
                    {{ $ticket->date }} {{ $trip->from_time }}</br>
                    {{ $trip->from }} - {{ $trip->to }}</br>
                </div>
                <div class="col-1"></div>
                <div class="col-12 col-lg-5 refund-ticket refund-ticket-right">
                    <b>Условия онлайн-возврата</b></br>
                    <table>
                        <tr>
                            <th>Время до отправления</th>
                            <th>% возврата</th>
                        </tr>
                        <tr>
                            <td>больше 6 часов</td>
                            <td>100</td>
                        </tr>
                        <tr>
                            <td>менее 6 часов</td>
                            <td>50</td>
                        </tr>
                        <tr>
                            <td>менее часа</td>
                            <td>0</td>
                        </tr>
                    </table>
                    <br>
                    @if($ticket->payment_status == 'refunded')
                        <b>Билет успешно возвращён!</b><br>
                        <b>Деньги поступят в трёх рабочих дней</b><br>
                        <b>В случае ошибки обратитесь к диспетчеру</b>
                    @else
                    <b>Сейчас вы можете вернуть билет за {{ $ref_cost }} р.</b><br>
                    <a class="ref-btn" href="/letRefund?id={{ $ticket->id }}"><img src="assets/img/ref.png" alt=""> Возврат</a>
                    @endif
                </div>
            </div>
        </div>
    </section>
@endsection
