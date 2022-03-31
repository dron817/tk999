@extends('layouts.general')

@section('title', 'Выбор мест')
@section('custom-css')
    <link rel="stylesheet" type="text/css" href="{{ asset('/assets/css/progress-button/component.css') }}"/>
@endsection
@section('custom-js-before')
    <script src="{{ asset('/assets/js/progress-button/modernizr.custom.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.maskedinput.min.js') }}"></script>
@endsection
@section('custom-js-after')
    <script src="{{ asset('/assets/js/progress-button/classie.js') }}"></script>
    <script src="{{ asset('/assets/js/progress-button/progressButton.js') }}"></script>
    <script src="{{ asset('/assets/js/place-picker.js') }}"></script>
    <script>
        [].slice.call( document.querySelectorAll( 'button.progress-button' ) ).forEach( function( bttn ) {
            new ProgressButton( bttn, {
                callback : function( instance ) {
                    let progress = 0,
                        interval = setInterval( function() {
                            progress = Math.min( progress + Math.random() * 0.1, 1 );
                            instance._setProgress( progress );

                            if( progress === 1 ) {
                                instance._stop(1);
                                clearInterval( interval );
                            }
                        }, 200 );
                }
            } );
        } );
    </script>
@endsection
@section('content')
    <section id="places-section">
        <div class="container">
            <h2 class="section-heading"><p>Выбор мест |</p>
                <p>{{ $from }} - {{ $to }} |</p>
                <p>{{ $date }}</p></h2>
            <div id="place-piker-outer">
                @if ($tong==1)
                    <div id="place-piker" class="tong">
                        <table>
                            <tr>
                                <td><input type="checkbox" onclick="pickPlace(1)" @if ($ticket_buy[1]==1) disabled @endif id="1" value="1"><label for="1">1</label></td>
                                <td><input type="checkbox" onclick="pickPlace(3)" @if ($ticket_buy[3]==1) disabled @endif id="3" value="3"><label for="3">3</label></td>
                                <td><input type="checkbox" onclick="pickPlace(5)" @if ($ticket_buy[5]==1) disabled @endif id="5" value="5"><label for="5">5</label></td>
                                <td><input type="checkbox" onclick="pickPlace(7)" @if ($ticket_buy[7]==1) disabled @endif id="7" value="7"><label for="7">7</label></td>
                                <td><input type="checkbox" onclick="pickPlace(9)" @if ($ticket_buy[9]==1) disabled @endif id="9" value="9"><label for="9">9</label></td>
                                <td><input type="checkbox" onclick="pickPlace(11)" @if ($ticket_buy[11]==1) disabled @endif id="11" value="11"><label for="11">11</label></td>
                                <td><input type="checkbox" onclick="pickPlace(13)" @if ($ticket_buy[13]==1) disabled @endif id="13" value="13"><label for="13">13</label></td>
                                <td><input type="checkbox" onclick="pickPlace(15)" @if ($ticket_buy[15]==1) disabled @endif id="15" value="15"><label for="15">15</label></td>
                                <td><input type="checkbox" onclick="pickPlace(17)" @if ($ticket_buy[17]==1) disabled @endif id="17" value="17"><label for="17">17</label></td>
                                <td><input type="checkbox" onclick="pickPlace(19)" @if ($ticket_buy[19]==1) disabled @endif id="19" value="19"><label for="19">19</label></td>
                                <td><input type="checkbox" onclick="pickPlace(21)" @if ($ticket_buy[21]==1) disabled @endif id="21" value="21"><label for="21">21</label></td>
                                <td><input type="checkbox" onclick="pickPlace(23)" @if ($ticket_buy[23]==1) disabled @endif id="23" value="23"><label for="23">23</label></td>
                                <td><input type="checkbox" onclick="pickPlace(25)" @if ($ticket_buy[25]==1) disabled @endif id="25" value="25"><label for="25">25</label></td>
                                <td><input type="checkbox" onclick="pickPlace(27)" @if ($ticket_buy[27]==1) disabled @endif id="27" value="27"><label for="27">27</label></td>
                            </tr>
                            <tr>
                                <td><input type="checkbox" onclick="pickPlace(2)" @if ($ticket_buy[2]==1) disabled @endif id="2" value="2"><label for="2">2</label></td>
                                <td><input type="checkbox" onclick="pickPlace(4)" @if ($ticket_buy[4]==1) disabled @endif id="4" value="4"><label for="4">4</label></td>
                                <td><input type="checkbox" onclick="pickPlace(6)" @if ($ticket_buy[6]==1) disabled @endif id="6" value="6"><label for="6">6</label></td>
                                <td><input type="checkbox" onclick="pickPlace(8)" @if ($ticket_buy[8]==1) disabled @endif id="8" value="8"><label for="8">8</label></td>
                                <td><input type="checkbox" onclick="pickPlace(10)" @if ($ticket_buy[10]==1) disabled @endif id="10" value="10"><label for="10">10</label></td>
                                <td><input type="checkbox" onclick="pickPlace(12)" @if ($ticket_buy[12]==1) disabled @endif id="12" value="12"><label for="12">12</label></td>
                                <td><input type="checkbox" onclick="pickPlace(14)" @if ($ticket_buy[14]==1) disabled @endif id="14" value="14"><label for="14">14</label></td>
                                <td><input type="checkbox" onclick="pickPlace(16)" @if ($ticket_buy[16]==1) disabled @endif id="16" value="16"><label for="16">16</label></td>
                                <td><input type="checkbox" onclick="pickPlace(18)" @if ($ticket_buy[18]==1) disabled @endif id="18" value="18"><label for="18">18</label></td>
                                <td><input type="checkbox" onclick="pickPlace(20)" @if ($ticket_buy[20]==1) disabled @endif id="20" value="20"><label for="20">20</label></td>
                                <td><input type="checkbox" onclick="pickPlace(22)" @if ($ticket_buy[22]==1) disabled @endif id="22" value="22"><label for="22">22</label></td>
                                <td><input type="checkbox" onclick="pickPlace(24)" @if ($ticket_buy[24]==1) disabled @endif id="24" value="24"><label for="24">24</label></td>
                                <td><input type="checkbox" onclick="pickPlace(26)" @if ($ticket_buy[26]==1) disabled @endif id="26" value="26"><label for="26">26</label></td>
                                <td><input type="checkbox" onclick="pickPlace(28)" @if ($ticket_buy[28]==1) disabled @endif id="28" value="28"><label for="28">28</label></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td><input type="checkbox" onclick="pickPlace(29)"@if ($ticket_buy[29]==1) disabled @endif  id="29" value="29"><label for="29">29</label></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td><input type="checkbox" onclick="pickPlace(52)" @if ($ticket_buy[52]==1) disabled @endif id="52" value="52"><label for="52">52</label></td>
                                <td><input type="checkbox" onclick="pickPlace(50)" @if ($ticket_buy[50]==1) disabled @endif id="50" value="50"><label for="50">50</label></td>
                                <td><input type="checkbox" onclick="pickPlace(48)" @if ($ticket_buy[48]==1) disabled @endif id="48" value="48"><label for="48">48</label></td>
                                <td><input type="checkbox" onclick="pickPlace(46)" @if ($ticket_buy[46]==1) disabled @endif id="46" value="46"><label for="46">46</label></td>
                                <td><input type="checkbox" onclick="pickPlace(44)" @if ($ticket_buy[44]==1) disabled @endif id="44" value="44"><label for="44">44</label></td>
                                <td><input type="checkbox" onclick="pickPlace(42)" @if ($ticket_buy[42]==1) disabled @endif id="42" value="42"><label for="42">42</label></td>
                                <td></td>
                                <td><input type="checkbox" onclick="pickPlace(40)" @if ($ticket_buy[40]==1) disabled @endif id="40" value="40"><label for="40">40</label></td>
                                <td><input type="checkbox" onclick="pickPlace(38)" @if ($ticket_buy[38]==1) disabled @endif id="38" value="38"><label for="38">38</label></td>
                                <td><input type="checkbox" onclick="pickPlace(36)" @if ($ticket_buy[36]==1) disabled @endif id="36" value="36"><label for="36">36</label></td>
                                <td><input type="checkbox" onclick="pickPlace(34)" @if ($ticket_buy[34]==1) disabled @endif id="34" value="34"><label for="34">34</label></td>
                                <td><input type="checkbox" onclick="pickPlace(32)" @if ($ticket_buy[32]==1) disabled @endif id="32" value="32"><label for="32">32</label></td>
                                <td><input type="checkbox" onclick="pickPlace(30)" @if ($ticket_buy[30]==1) disabled @endif id="30" value="30"><label for="30">30</label></td>

                            </tr>
                            <tr>
                                <td><input type="checkbox" id="0" value="0" disabled><label for="0">В</label></td>
                                <td><input type="checkbox" onclick="pickPlace(53)" @if ($ticket_buy[53]==1) disabled @endif id="53" value="53"><label for="53">53</label></td>
                                <td><input type="checkbox" onclick="pickPlace(51)" @if ($ticket_buy[51]==1) disabled @endif id="51" value="51"><label for="51">51</label></td>
                                <td><input type="checkbox" onclick="pickPlace(49)" @if ($ticket_buy[49]==1) disabled @endif id="49" value="49"><label for="49">49</label></td>
                                <td><input type="checkbox" onclick="pickPlace(47)" @if ($ticket_buy[47]==1) disabled @endif id="47" value="47"><label for="47">47</label></td>
                                <td><input type="checkbox" onclick="pickPlace(45)" @if ($ticket_buy[45]==1) disabled @endif id="45" value="45"><label for="45">45</label></td>
                                <td><input type="checkbox" onclick="pickPlace(43)" @if ($ticket_buy[43]==1) disabled @endif id="43" value="43"><label for="43">43</label></td>
                                <td></td>
                                <td><input type="checkbox" onclick="pickPlace(41)" @if ($ticket_buy[41]==1) disabled @endif id="41" value="41"><label for="41">41</label></td>
                                <td><input type="checkbox" onclick="pickPlace(39)" @if ($ticket_buy[39]==1) disabled @endif id="39" value="39"><label for="39">39</label></td>
                                <td><input type="checkbox" onclick="pickPlace(37)" @if ($ticket_buy[37]==1) disabled @endif id="37" value="37"><label for="37">37</label></td>
                                <td><input type="checkbox" onclick="pickPlace(35)" @if ($ticket_buy[35]==1) disabled @endif id="35" value="35"><label for="35">35</label></td>
                                <td><input type="checkbox" onclick="pickPlace(33)" @if ($ticket_buy[33]==1) disabled @endif id="33" value="33"><label for="33">33</label></td>
                                <td><input type="checkbox" onclick="pickPlace(31)" @if ($ticket_buy[31]==1) disabled @endif id="31" value="31"><label for="31">31</label></td>
                            </tr>

                        </table>
                    </div>
                @else
                    <div id="place-piker">
                        <table>
                            <tr>
                                <td><input type="checkbox" onclick="pickPlace(20)" @if ($ticket_buy[20]==1) disabled @endif id="20" value="20"><label
                                        for="20">20</label></td>
                                <td></td>
                                <td><input type="checkbox" onclick="pickPlace(3)" @if ($ticket_buy[3]==1) disabled @endif id="3" value="3"><label for="3">3</label>
                                </td>
                                <td><input type="checkbox" onclick="pickPlace(6)" @if ($ticket_buy[6]==1) disabled @endif id="6" value="6"><label for="6">6</label>
                                </td>
                                <td><input type="checkbox" onclick="pickPlace(9)" @if ($ticket_buy[9]==1) disabled @endif id="9" value="9"><label for="9">9</label>
                                </td>
                                <td><input type="checkbox" onclick="pickPlace(12)" @if ($ticket_buy[12]==1) disabled @endif id="12" value="12"><label
                                        for="12">12</label></td>
                                <td><input type="checkbox" onclick="pickPlace(15)" @if ($ticket_buy[15]==1) disabled @endif id="15" value="15"><label
                                        for="15">15</label></td>
                            </tr>
                            <tr>
                                <td><input type="checkbox" onclick="pickPlace(19)" @if ($ticket_buy[19]==1) disabled @endif id="19" value="19"><label
                                        for="19">19</label></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td><input type="checkbox" onclick="pickPlace(16)" @if ($ticket_buy[16]==1) disabled @endif id="16" value="16"><label
                                        for="16">16</label></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td><input type="checkbox" onclick="pickPlace(1)" @if ($ticket_buy[1]==1) disabled @endif id="1" value="1"><label for="1">1</label>
                                </td>
                                <td><input type="checkbox" onclick="pickPlace(4)" @if ($ticket_buy[4]==1) disabled @endif id="4" value="4"><label for="4">4</label>
                                </td>
                                <td><input type="checkbox" onclick="pickPlace(7)" @if ($ticket_buy[7]==1) disabled @endif id="7" value="7"><label for="7">7</label>
                                </td>
                                <td><input type="checkbox" onclick="pickPlace(10)" @if ($ticket_buy[10]==1) disabled @endif id="10" value="10"><label
                                        for="10">10</label></td>
                                <td><input type="checkbox" onclick="pickPlace(13)" @if ($ticket_buy[13]==1) disabled @endif id="13" value="13"><label
                                        for="13">13</label></td>
                                <td><input type="checkbox" onclick="pickPlace(17)" @if ($ticket_buy[17]==1) disabled @endif id="17" value="17"><label
                                        for="17">17</label></td>
                            </tr>
                            <tr>
                                <td><input type="checkbox" id="0" value="0" disabled><label for="0">В</label></td>
                                <td><input type="checkbox" onclick="pickPlace(2)" @if ($ticket_buy[2]==1) disabled @endif id="2" value="2"><label for="2">2</label>
                                </td>
                                <td><input type="checkbox" onclick="pickPlace(5)" @if ($ticket_buy[5]==1) disabled @endif id="5" value="5"><label for="5">5</label>
                                </td>
                                <td><input type="checkbox" onclick="pickPlace(8)" @if ($ticket_buy[8]==1) disabled @endif id="8" value="8"><label for="8">8</label>
                                </td>
                                <td><input type="checkbox" onclick="pickPlace(11)" @if ($ticket_buy[11]==1) disabled @endif id="11" value="11"><label
                                        for="11">11</label></td>
                                <td><input type="checkbox" onclick="pickPlace(14)" @if ($ticket_buy[14]==1) disabled @endif id="14" value="14"><label
                                        for="14">14</label></td>
                                <td><input type="checkbox" onclick="pickPlace(18)" @if ($ticket_buy[18]==1) disabled @endif id="18" value="18"><label
                                        for="18">18</label></td>
                            </tr>
                        </table>
                    </div>
                @endif
            </div>
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
                        <div onclick="clickHider()" id="hider">&#8744;</div>
                        <form>
                            <div onclick="choseCard()" id="card-outer" class="payment">
                                <img src="{{ asset('assets/img/payments/card.png') }}" alt=""> <label for="card">Картой
                                    онлайн</label> <input  name="payment" id="card" type="radio">
                            </div>
                            <div onclick="choseCash()" id="cash-outer" class="payment">
                                <img src="{{ asset('assets/img/payments/cash.png') }}" alt=""> <label for="cash">Наличными
                                    водителю</label> <input checked name="payment" id="cash" type="radio">
                            </div>
                        </form>
                    </div>
                </div>
                <div id="passengers-outer" class="col-12 col-lg-9">
                    <h2 class="section-heading"><p>Данные пассажиров</p></h2>
                    <div class="person-data-outer row" id="pd_1">
                        <b class="col-12">Пассажир №1 -
                            Тариф: <span id="tarif_1">взрослый</span></b>
                        <div class="data-group col-12 col-lg-3 col-md-6">
                            <label for="fio_1">Фамилия Имя Отчество</label>
                            <input id="fio_1" type="text">
                        </div>
                        <div class="data-group col-12 col-lg-3 col-md-6">
                            <label for="phone_1">Телефон</label>
                            <input id="phone_1" type="text">
                        </div>
                        <div class="data-group col-12 col-lg-3 col-md-6">
                            <label for="doc_1">Номер документа</label>
                            <input id="doc_1" type="text">
                            <div class="checkbox-group">
                                <div class="checkbox">
                                    <input type="checkbox" id="withOutDoc_1" class="checkbox-input"/>
                                    <label for="withOutDoc_1" class="checkbox-label"></label><span>Не указывать</span>
                                </div>
                            </div>
                        </div>
                        <div class="data-group col-12 col-lg-3 col-md-6">
                            <label for="address_1">Адрес сбора</label>
                            <input id="address_1" type="text">
                            <div class="checkbox-group" id="together-outer" style="display: none;">
                                <div class="checkbox">
                                    <input type="checkbox" id="together" class="checkbox-input" onclick="together()"/>
                                    <label for="together"
                                           class="checkbox-label"></label><span>Одинаковый для всех</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="person-data-outer row" id="pd_2" style="display: none;"><b class="col-12">Пассажир №2 -
                            Тариф: <span id="tarif_2">взрослый</span></b>
                        <div class="data-group col-12 col-lg-3 col-md-6"><label for="fio_2">Фамилия Имя Отчество</label><input
                                type="text" id="fio_2"></div>
                        <div class="data-group col-12 col-lg-3 col-md-6" id="phone-outer_2"><label
                                for="phone_2">Телефон</label><input type="text" id="phone_2"></div>
                        <div class="data-group col-12 col-lg-3 col-md-6"><label for="doc_2">Номер
                                документа</label><input type="text" id="doc_2">
                            <div class="checkbox-group">
                                <div class="checkbox"><input type="checkbox" class="checkbox-input"
                                                             id="withOutDoc_2"><label for="withOutDoc_2"
                                                                                      class="checkbox-label"></label><span>Не указывать</span>
                                </div>
                            </div>
                        </div>
                        <div class="data-group col-12 col-lg-3 col-md-6"><label for="address_2">Адрес
                                сбора</label><input type="text" id="address_2"></div>
                    </div>
                    <div class="person-data-outer row" id="pd_3" style="display: none;"><b class="col-12">Пассажир №3 -
                            Тариф: <span id="tarif_3">взрослый</span></b>
                        <div class="data-group col-12 col-lg-3 col-md-6"><label for="fio_3">Фамилия Имя Отчество</label><input
                                type="text" id="fio_3"></div>
                        <div class="data-group col-12 col-lg-3 col-md-6" id="phone-outer_3"><label
                                for="phone_3">Телефон</label><input type="text" id="phone_3"></div>
                        <div class="data-group col-12 col-lg-3 col-md-6"><label for="doc_3">Номер
                                документа</label><input type="text" id="doc_3">
                            <div class="checkbox-group">
                                <div class="checkbox"><input type="checkbox" class="checkbox-input"
                                                             id="withOutDoc_3"><label for="withOutDoc_3"
                                                                                      class="checkbox-label"></label><span>Не указывать</span>
                                </div>
                            </div>
                        </div>
                        <div class="data-group col-12 col-lg-3 col-md-6"><label for="address_3">Адрес
                                сбора</label><input type="text" id="address_3"></div>
                    </div>
                    <div class="person-data-outer row" id="pd_4" style="display: none;"><b class="col-12">Пассажир №4 -
                            Тариф: <span id="tarif_4">взрослый</span></b>
                        <div class="data-group col-12 col-lg-3 col-md-6"><label for="fio_4">Фамилия Имя Отчество</label><input
                                type="text" id="fio_4"></div>
                        <div class="data-group col-12 col-lg-3 col-md-6" id="phone-outer_4"><label
                                for="phone_4">Телефон</label><input type="text" id="phone_4"></div>
                        <div class="data-group col-12 col-lg-3 col-md-6"><label for="doc_4">Номер
                                документа</label><input type="text" id="doc_4">
                            <div class="checkbox-group">
                                <div class="checkbox"><input type="checkbox" class="checkbox-input"
                                                             id="withOutDoc_4"><label for="withOutDoc_4"
                                                                                      class="checkbox-label"></label><span>Не указывать</span>
                                </div>
                            </div>
                        </div>
                        <div class="data-group col-12 col-lg-3 col-md-6"><label for="address_4">Адрес
                                сбора</label><input type="text" id="address_4"></div>
                    </div>
                    <div class="person-data-outer row" id="pd_5" style="display: none;"><b class="col-12">Пассажир №5 -
                            Тариф: <span id="tarif_5">взрослый</span></b>
                        <div class="data-group col-12 col-lg-3 col-md-6"><label for="fio_5">Фамилия Имя Отчество</label><input
                                type="text" id="fio_5"></div>
                        <div class="data-group col-12 col-lg-3 col-md-6" id="phone-outer_5"><label
                                for="phone_5">Телефон</label><input type="text" id="phone_5"></div>
                        <div class="data-group col-12 col-lg-3 col-md-6"><label for="doc_5">Номер
                                документа</label><input type="text" id="doc_5">
                            <div class="checkbox-group">
                                <div class="checkbox"><input type="checkbox" class="checkbox-input"
                                                             id="withOutDoc_5"><label for="withOutDoc_5"
                                                                                      class="checkbox-label"></label><span>Не указывать</span>
                                </div>
                            </div>
                        </div>
                        <div class="data-group col-12 col-lg-3 col-md-6"><label for="address_5">Адрес
                                сбора</label><input type="text" id="address_5"></div>
                    </div>
                    <div class="person-data-outer row" id="pd_6" style="display: none;"><b class="col-12">Пассажир №6 -
                            Тариф: <span id="tarif_6">взрослый</span></b>
                        <div class="data-group col-12 col-lg-3 col-md-6"><label for="fio_6">Фамилия Имя Отчество</label><input
                                type="text" id="fio_6"></div>
                        <div class="data-group col-12 col-lg-3 col-md-6" id="phone-outer_6"><label
                                for="phone_6">Телефон</label><input type="text" id="phone_6"></div>
                        <div class="data-group col-12 col-lg-3 col-md-6"><label for="doc_6">Номер
                                документа</label><input type="text" id="doc_6">
                            <div class="checkbox-group">
                                <div class="checkbox"><input type="checkbox" class="checkbox-input"
                                                             id="withOutDoc_6"><label for="withOutDoc_6"
                                                                                      class="checkbox-label"></label><span>Не указывать</span>
                                </div>
                            </div>
                        </div>
                        <div class="data-group col-12 col-lg-3 col-md-6"><label for="address_6">Адрес
                                сбора</label><input type="text" id="address_6"></div>
                    </div>
                    <div class="person-data-outer row" id="pd_7" style="display: none;"><b class="col-12">Пассажир №7 -
                            Тариф: <span id="tarif_7">взрослый</span></b>
                        <div class="data-group col-12 col-lg-3 col-md-6"><label for="fio_7">Фамилия Имя Отчество</label><input
                                type="text" id="fio_7"></div>
                        <div class="data-group col-12 col-lg-3 col-md-6" id="phone-outer_7"><label
                                for="phone_7">Телефон</label><input type="text" id="phone_7"></div>
                        <div class="data-group col-12 col-lg-3 col-md-6"><label for="doc_7">Номер
                                документа</label><input type="text" id="doc_7">
                            <div class="checkbox-group">
                                <div class="checkbox"><input type="checkbox" class="checkbox-input"
                                                             id="withOutDoc_7"><label for="withOutDoc_7"
                                                                                      class="checkbox-label"></label><span>Не указывать</span>
                                </div>
                            </div>
                        </div>
                        <div class="data-group col-12 col-lg-3 col-md-6"><label for="address_7">Адрес
                                сбора</label><input type="text" id="address_7"></div>
                    </div>
                    <div class="person-data-outer row" id="pd_8" style="display: none;"><b class="col-12">Пассажир №8 -
                            Тариф: <span id="tarif_8">взрослый</span></b>
                        <div class="data-group col-12 col-lg-3 col-md-6"><label for="fio_8">Фамилия Имя Отчество</label><input
                                type="text" id="fio_8"></div>
                        <div class="data-group col-12 col-lg-3 col-md-6" id="phone-outer_8"><label
                                for="phone_8">Телефон</label><input type="text" id="phone_8"></div>
                        <div class="data-group col-12 col-lg-3 col-md-6"><label for="doc_8">Номер
                                документа</label><input type="text" id="doc_8">
                            <div class="checkbox-group">
                                <div class="checkbox"><input type="checkbox" class="checkbox-input"
                                                             id="withOutDoc_8"><label for="withOutDoc_8"
                                                                                      class="checkbox-label"></label><span>Не указывать</span>
                                </div>
                            </div>
                        </div>
                        <div class="data-group col-12 col-lg-3 col-md-6"><label for="address_8">Адрес
                                сбора</label><input type="text" id="address_8"></div>
                    </div>
                    <div class="person-data-outer row" id="pd_9" style="display: none;"><b class="col-12">Пассажир №9 -
                            Тариф: <span id="tarif_9">взрослый</span></b>
                        <div class="data-group col-12 col-lg-3 col-md-6"><label for="fio_9">Фамилия Имя Отчество</label><input
                                type="text" id="fio_9"></div>
                        <div class="data-group col-12 col-lg-3 col-md-6" id="phone-outer_9"><label
                                for="phone_9">Телефон</label><input type="text" id="phone_9"></div>
                        <div class="data-group col-12 col-lg-3 col-md-6"><label for="doc_9">Номер
                                документа</label><input type="text" id="doc_9">
                            <div class="checkbox-group">
                                <div class="checkbox"><input type="checkbox" class="checkbox-input"
                                                             id="withOutDoc_9"><label for="withOutDoc_9"
                                                                                      class="checkbox-label"></label><span>Не указывать</span>
                                </div>
                            </div>
                        </div>
                        <div class="data-group col-12 col-lg-3 col-md-6"><label for="address_9">Адрес
                                сбора</label><input type="text" id="address_9"></div>
                    </div>
                    <div class="person-data-outer row" id="pd_10" style="display: none;"><b class="col-12">Пассажир №10
                            - Тариф: <span id="tarif_10">взрослый</span></b>
                        <div class="data-group col-12 col-lg-3 col-md-6"><label for="fio_10">Фамилия Имя
                                Отчество</label><input type="text" id="fio_10"></div>
                        <div class="data-group col-12 col-lg-3 col-md-6" id="phone-outer_10"><label for="phone_10">Телефон</label><input
                                type="text" id="phone_10"></div>
                        <div class="data-group col-12 col-lg-3 col-md-6"><label for="doc_10">Номер
                                документа</label><input type="text" id="doc_10">
                            <div class="checkbox-group">
                                <div class="checkbox"><input type="checkbox" class="checkbox-input"
                                                             id="withOutDoc_10"><label for="withOutDoc_10"
                                                                                       class="checkbox-label"></label><span>Не указывать</span>
                                </div>
                            </div>
                        </div>
                        <div class="data-group col-12 col-lg-3 col-md-6"><label for="address_10">Адрес
                                сбора</label><input type="text" id="address_10"></div>
                    </div>
                    <div class="person-data-outer row" id="pd_11" style="display: none;"><b class="col-12">Пассажир №11
                            - Тариф: <span id="tarif_11">взрослый</span></b>
                        <div class="data-group col-12 col-lg-3 col-md-6"><label for="fio_11">Фамилия Имя
                                Отчество</label><input type="text" id="fio_11"></div>
                        <div class="data-group col-12 col-lg-3 col-md-6" id="phone-outer_11"><label for="phone_11">Телефон</label><input
                                type="text" id="phone_11"></div>
                        <div class="data-group col-12 col-lg-3 col-md-6"><label for="doc_11">Номер
                                документа</label><input type="text" id="doc_11">
                            <div class="checkbox-group">
                                <div class="checkbox"><input type="checkbox" class="checkbox-input"
                                                             id="withOutDoc_11"><label for="withOutDoc_11"
                                                                                       class="checkbox-label"></label><span>Не указывать</span>
                                </div>
                            </div>
                        </div>
                        <div class="data-group col-12 col-lg-3 col-md-6"><label for="address_11">Адрес
                                сбора</label><input type="text" id="address_11"></div>
                    </div>
                    <div class="person-data-outer row" id="pd_12" style="display: none;"><b class="col-12">Пассажир №12
                            - Тариф: <span id="tarif_12">взрослый</span></b>
                        <div class="data-group col-12 col-lg-3 col-md-6"><label for="fio_12">Фамилия Имя
                                Отчество</label><input type="text" id="fio_12"></div>
                        <div class="data-group col-12 col-lg-3 col-md-6" id="phone-outer_12"><label for="phone_12">Телефон</label><input
                                type="text" id="phone_12"></div>
                        <div class="data-group col-12 col-lg-3 col-md-6"><label for="doc_12">Номер
                                документа</label><input type="text" id="doc_12">
                            <div class="checkbox-group">
                                <div class="checkbox"><input type="checkbox" class="checkbox-input"
                                                             id="withOutDoc_12"><label for="withOutDoc_12"
                                                                                       class="checkbox-label"></label><span>Не указывать</span>
                                </div>
                            </div>
                        </div>
                        <div class="data-group col-12 col-lg-3 col-md-6"><label for="address_12">Адрес
                                сбора</label><input type="text" id="address_12"></div>
                    </div>
                    <div class="person-data-outer row" id="pd_13" style="display: none;"><b class="col-12">Пассажир №13
                            - Тариф: <span id="tarif_13">взрослый</span></b>
                        <div class="data-group col-12 col-lg-3 col-md-6"><label for="fio_13">Фамилия Имя
                                Отчество</label><input type="text" id="fio_13"></div>
                        <div class="data-group col-12 col-lg-3 col-md-6" id="phone-outer_13"><label for="phone_13">Телефон</label><input
                                type="text" id="phone_13"></div>
                        <div class="data-group col-12 col-lg-3 col-md-6"><label for="doc_13">Номер
                                документа</label><input type="text" id="doc_13">
                            <div class="checkbox-group">
                                <div class="checkbox"><input type="checkbox" class="checkbox-input"
                                                             id="withOutDoc_13"><label for="withOutDoc_13"
                                                                                       class="checkbox-label"></label><span>Не указывать</span>
                                </div>
                            </div>
                        </div>
                        <div class="data-group col-12 col-lg-3 col-md-6"><label for="address_13">Адрес
                                сбора</label><input type="text" id="address_13"></div>
                    </div>
                    <div class="person-data-outer row" id="pd_14" style="display: none;"><b class="col-12">Пассажир №14
                            - Тариф: <span id="tarif_14">взрослый</span></b>
                        <div class="data-group col-12 col-lg-3 col-md-6"><label for="fio_14">Фамилия Имя
                                Отчество</label><input type="text" id="fio_14"></div>
                        <div class="data-group col-12 col-lg-3 col-md-6" id="phone-outer_14"><label for="phone_14">Телефон</label><input
                                type="text" id="phone_14"></div>
                        <div class="data-group col-12 col-lg-3 col-md-6"><label for="doc_14">Номер
                                документа</label><input type="text" id="doc_14">
                            <div class="checkbox-group">
                                <div class="checkbox"><input type="checkbox" class="checkbox-input"
                                                             id="withOutDoc_14"><label for="withOutDoc_14"
                                                                                       class="checkbox-label"></label><span>Не указывать</span>
                                </div>
                            </div>
                        </div>
                        <div class="data-group col-12 col-lg-3 col-md-6"><label for="address_14">Адрес
                                сбора</label><input type="text" id="address_14"></div>
                    </div>
                    <div class="person-data-outer row" id="pd_15" style="display: none;"><b class="col-12">Пассажир №15
                            - Тариф: <span id="tarif_15">взрослый</span></b>
                        <div class="data-group col-12 col-lg-3 col-md-6"><label for="fio_15">Фамилия Имя
                                Отчество</label><input type="text" id="fio_15"></div>
                        <div class="data-group col-12 col-lg-3 col-md-6" id="phone-outer_15"><label for="phone_15">Телефон</label><input
                                type="text" id="phone_15"></div>
                        <div class="data-group col-12 col-lg-3 col-md-6"><label for="doc_15">Номер
                                документа</label><input type="text" id="doc_15">
                            <div class="checkbox-group">
                                <div class="checkbox"><input type="checkbox" class="checkbox-input"
                                                             id="withOutDoc_15"><label for="withOutDoc_15"
                                                                                       class="checkbox-label"></label><span>Не указывать</span>
                                </div>
                            </div>
                        </div>
                        <div class="data-group col-12 col-lg-3 col-md-6"><label for="address_15">Адрес
                                сбора</label><input type="text" id="address_15"></div>
                    </div>
                    <script>
                        for (let i=1; i<=15; i++)
                            $('#phone_'+i).mask('79999999999');
                    </script>
                </div>
                <div class="col-12">
                    <div class="sum-outer">
                        <p>Общая стоимость: <span id="price">{{ $trip_count }} р.</span></p>
                        @csrf
                        <input id="count" type="hidden" value="{{ $trip_count }}">
                        <input id="trip_id" type="hidden" value="{{ $trip_id }}">
                        <input id="date" type="hidden" value="{{ $clear_date }}">
                        <button id="send" class="progress-button" data-style="rotate-angle-bottom" data-perspective data-horizontal>Оплатить</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
