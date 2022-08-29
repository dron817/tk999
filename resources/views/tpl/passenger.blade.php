<div class="person-data-outer row" id="pd_{{ $num }}"
    @if($num <> 1)
    style="display: none;"
    @endif
    >
    <b class="col-12">Пассажир №{{ $num }} - Тариф:
        <span id="tarif_{{ $num }}">взрослый</span>
    </b>
    <div class="data-group col-12 col-lg-3 col-md-6">
        <label for="fio_{{ $num }}">Фамилия Имя Отчество</label>
        <input type="text" id="fio_{{ $num }}">
    </div>
    <div class="data-group col-12 col-lg-3 col-md-6" id="phone-outer_{{ $num }}">
        <label for="phone_{{ $num }}">Телефон</label>
        <input type="text" id="phone_{{ $num }}">
        <script>
            $('#phone_'+{{ $num }}).mask('79999999999');
        </script>
    </div>
    <div class="data-group col-12 col-lg-3 col-md-6">
        <label for="doc_{{ $num }}">Номер документа</label>
        <input type="text" id="doc_{{ $num }}">
        <div class="checkbox-group">
            <div class="checkbox">
                <input type="checkbox" class="checkbox-input" id="withOutDoc_{{ $num }}">
                <label for="withOutDoc_{{ $num }}" class="checkbox-label"></label><span>Не указывать</span>
            </div>
        </div>
    </div>
    <div class="data-group col-12 col-lg-3 col-md-6">
        <label for="address_{{ $num }}">Адрес сбора</label>
        @switch($trip_id)
            @case(1)
            <select id="address_{{ $num }}">
                <option disabled selected>Выберите остановку</option>
                <option>01.Сибирь (05:15)</option>
                <option>02.Гимназия (05:17)</option>
                <option>03.Церковь (05:19)</option>
                <option>04.ГК Нефтяник 1 (05:21)</option>
                <option>05.Аэропорт (05:23)</option>
                <option>06.Звёзды Югры (05:25)</option>
                <option>07.Трансагенство - пристань (05:27)</option>
                <option>08.Почта (05:29)</option>
                <option>09.ТЦ Юбилейный (05:31)</option>
                <option>10.Соц.Защита (05:33)</option>
                <option>11.Горбольница (05:35)</option>
                <option>12.ТПП Урайнефтегаз (05:35)</option>
                <option>13.Молодежная (05:39)</option>
                <option>14.Музей (05:41)</option>
                <option>15.Дом Ребенка (05:43)</option>
                <option>16.Архив (05:45)</option>
                <option>17.Типография (05:47)</option>
                <option>18.Гармония (05:49)</option>
                <option>19.Электросети (05:51)</option>
            </select>
            @break
            @case(2)
            <select id="address_{{ $num }}">
                <option disabled selected>Выберите остановку</option>
                <option>01.Сибирь (14:45)</option>
                <option>02.Гимназия (14:47)</option>
                <option>03.Церковь (14:49)</option>
                <option>04.ГК Нефтяник 1 (14:51)</option>
                <option>05.Аэропорт (14:53)</option>
                <option>06.Звёзды Югры (14:55)</option>
                <option>07.Трансагенство - пристань (14:57)</option>
                <option>08.Почта (14:59)</option>
                <option>09.ТЦ Юбилейный (15:01)</option>
                <option>10.Соц.Защита (15:03)</option>
                <option>11.Горбольница (15:05)</option>
                <option>12.ТПП Урайнефтегаз (15:07)</option>
                <option>13.Молодежная (15:09)</option>
                <option>14.Музей (15:11)</option>
                <option>15.Дом Ребенка (15:13)</option>
                <option>16.Архив (15:15)</option>
                <option>17.Типография (15:17)</option>
                <option>18.Гармония (15:19)</option>
                <option>19.Электросети (15:21)</option>
            </select>
            @break
            @case(3)
            <select id="address_{{ $num }}">
                <option selected>Ж/Д Вокзал</option>
            </select>
            @break
            @case(4)
            <select id="address_{{ $num }}">
                <option selected>Ж/Д Вокзал</option>
            </select>
            @break
            @case(8)
            <select id="address_{{ $num }}">
                <option disabled selected>Выберите остановку</option>
                <option>Трансагенство</option>
                <option>Окружная клиническая больница</option>
            </select>
            @break
            @case(10)
            <select id="address_{{ $num }}">
                <option disabled selected>Выберите остановку</option>
                <option>Трансагенство</option>
                <option>Окружная клиническая больница</option>
            </select>
            @break
            @default
            <input id="address_{{ $num }}" type="text">
        @endswitch

        @if($num == 1)
            <div class="checkbox-group" id="together-outer" style="display: none;">
                <div class="checkbox">
                    <input type="checkbox" id="together" class="checkbox-input" onclick="together()"/>
                    <label for="together"
                           class="checkbox-label"></label><span>Одинаковый для всех</span>
                </div>
            </div>
        @endif
    </div>
</div>
