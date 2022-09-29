@extends('layouts.general')

@section('title', 'Авторизация - Регистрация')
@section('custom-css')
@endsection
@section('custom-js-before')
@endsection
@section('custom-js-after')
    <meta name="robots" content="None">
@endsection

@section('content')
    <section id="bus-image-section">

    </section>
    <section id="lk-section">
        <div class="container">
            <div class="row">
                <div class="lk-header">
                    <h1>Личный кабинет</h1>
                    <div>
                        @moder
                        <button class="btn btn-warning" onclick="location.href = '{{ route('admin.home') }}';">
                            Панель диспетчера
                        </button>
                        @endmoder
                        <button class="btn btn-block btn-success     btn-logout" href="{{ route('logout') }}"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            Выйти
                        </button>
                    </div>
                </div>
                <p> {{ Auth::user()->email }}</p>
                <h6>Актуальные билеты</h6>

                @php $order_flag = 0; @endphp
                @forelse($tickets_new as $ticket)
                    @php
                        if ($ticket->order_id <> $order_flag){
                            if($order_flag<>0) echo '</div>';
                            echo '
                                <div class="col-12 row order-ticket">
                                    <span>Заказ №'.$ticket->order_id.' -
                                    <b>Рейс: </b> '.$trips{$ticket->trip_id-1}->from.' - '.
                                    $trips{$ticket->trip_id-1}->to.' | '.
                                    $ticket->date.' '.
                                    $trips{$ticket->trip_id-1}->from_time.
                                    '</span>
                            ';
                            $order_flag = $ticket->order_id;
                        }
                    @endphp
                    <div class="col-12 order-ticket">
                            <span class="route">
                                    <p><span class="fa fa-user icon" style="color:rgba(1, 87, 155, 1)"></span>  {{ $ticket->fio }}</p>
                                    <p>{{ $ticket->address }}</p>
                                    <i>@if($ticket->doc<>0) Документ: {{ $ticket->doc }} @else без документа @endif</i>
                            </span>
                        <div class="choose">
                                <span class="price">
                                    <p>Место: {{ $ticket->place }}</p>
                                </span>
                            <span class="buy">
                                        <a href="/print?ticket_id={{ $ticket->id }}">Скачать</a>
                                </span>
                        </div>
                    </div>
                </div>
                @empty
                    <div class="col-12 order-ticket">
                        <span>Нет билетов</span>
                    </div>
                @endforelse

                <p></p>
                <p></p>
                <h6>Прошедшие рейсы</h6>

                @php $order_flag = 0; @endphp
                @forelse($tickets_old as $ticket)
                    @php
                        if ($ticket->order_id <> $order_flag){
                            if($order_flag<>0) echo '</div>';
                            echo '
                                <div class="col-12 row order-ticket">
                                    <span>Заказ №'.$ticket->order_id.' -
                                    <b>Рейс: </b> '.$trips{$ticket->trip_id-1}->from.' - '.
                                    $trips{$ticket->trip_id-1}->to.' | '.
                                    $ticket->date.' '.
                                    $trips{$ticket->trip_id-1}->from_time.
                                    '</span>
                            ';
                            $order_flag = $ticket->order_id;
                        }
                    @endphp
                    <div class="col-12 order-ticket">
                            <span class="route">
                                    <p><span class="fa fa-user icon" style="color:rgba(1, 87, 155, 1)"></span>  {{ $ticket->fio }}</p>
                                    <p>{{ $ticket->address }}</p>
                                    <i>@if($ticket->doc<>0) Документ: {{ $ticket->doc }} @else без документа @endif</i>
                            </span>
                        <div class="choose">
                                <span class="price">
                                    <p>Место: {{ $ticket->place }}</p>
                                </span>
                            <span class="buy">
                                        <a href="/print?ticket_id={{ $ticket->id }}">Скачать</a>
                                </span>
                        </div>
                    </div>
                @empty
                    <div class="col-12 order-ticket">
                        <span>Нет билетов</span>
                    </div>
                @endforelse
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
        </div>
    </section>
@endsection
