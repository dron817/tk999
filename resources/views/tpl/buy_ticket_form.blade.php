<div class="row">
    <div id="aside" class="col-12 col-lg-3">
        <h2 class="section-heading"><p>Тарифы</p></h2>
        <div id="peoples">
            <div id="adult-outer">
                <label for="tentacles">Взрослый</label>
                <input type="number" id="adult" readonly value="0" min="1" max="20">
            </div>

            <div id="kids-outer">
                <label for="tentacles">Детский</label>
                <input type="number" id="kids" readonly value="0" min="1" max="20">
                <div id="kids-arrows">
                    <div id="kids-up" onclick="kidsPlus()">&#8743;</div>
                    <div id="kids-down" onclick="kidsMinus()">&#8744;</div>
                </div>
            </div>
        </div>

        <h2 class="section-heading"><p>Способ оплаты</p></h2>
        <div id="payments">
            {{--                        <div onclick="clickHider()" id="hider">&#8744;</div>--}}
            <div onclick="choseCard()" id="card-outer" class="payment">
                <img src="{{ asset('assets/img/payments/card.png') }}" alt=""> <label for="card">Картой
                    онлайн</label> <input checked name="payment" id="card" type="radio">
            </div>
        </div>
    </div>
    <div id="passengers-outer" class="col-12 col-lg-9">
        <h2 class="section-heading"><p>Данные пассажиров</p></h2>
        @for ($i = 1; $i <= 20; $i++)
            @include('tpl.passenger', array('num' => $i))
        @endfor
    </div>
    <div class="col-12">
        <div class="order-data-outer row">
            <div class="data-group col-12 col-lg-6 col-md-6">
                <label for="comment">Комментарий к заказу</label>
                <input type="text" id="comment" placeholder="необязательно">
            </div>
            <div class="data-group col-12 col-lg-6 col-md-6">
                <label for="email">Электронная почта для отправки билетов</label>
                <input type="text" id="email" placeholder="функция тестируется">
            </div>
        </div>
    </div>
    <div class="col-12">
        <div class="sum-outer">
            <p>Общая стоимость: <span id="price">{{ $trip_count }} р.</span></p>
            @csrf
            <input id="count" type="hidden" value="{{ $trip_count }}">
            <input id="count_kids" type="hidden" value="{{ $trip_count_kids }}">
            <input id="trip_id" type="hidden" value="{{ $trip_id }}">
            <input id="date" type="hidden" value="{{ $clear_date }}">
            {{--                        @guest--}}
            {{--                        <p>Бронирование временно доступно только через диспетчера: <p><a href="tel:79088962999">8 (908) 89-62-999</p></a></p>--}}
            {{--                        @endguest--}}
            {{--                        @auth--}}
            {{--                            <button id="send" class="progress-button" data-style="rotate-angle-bottom" data-perspective data-horizontal>Оплатить</button>--}}
            {{--                        @endauth--}}
            <button id="send" class="progress-button" data-style="rotate-angle-bottom" data-perspective data-horizontal>Оплатить</button>
        </div>
    </div>
</div>
