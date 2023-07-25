@switch($trip_id)
    @case(1)
    <select id="address_{{ $num }}">
        <option disabled selected>Выберите остановку</option>
        <option>Сибирь (05:15)</option>
        <option>Гимназия (05:17)</option>
        <option>Церковь (05:19)</option>
        <option>ГК Нефтяник 1 (05:21)</option>
        <option>Аэропорт (05:23)</option>
        <option>Трансагенство - пристань (05:27)</option>
        <option>Почта (05:29)</option>
        <option>ТЦ Юбилейный (05:31)</option>
        <option>Соц.Защита (05:33)</option>
        <option>Горбольница (05:35)</option>
        <option>ТПП Урайнефтегаз (05:35)</option>
        <option>Молодежная (05:39)</option>
        <option>Музей (05:41)</option>
        <option>Дом Ребенка (05:43)</option>
        <option>Архив (05:45)</option>
        <option>Типография (05:47)</option>
        <option>Гармония (05:49)</option>
        <option>Электросети (05:51)</option>
    </select>
    @break
    @case(2)
    <select id="address_{{ $num }}">
        <option disabled selected>Выберите остановку</option>
        <option>Сибирь (14:45)</option>
        <option>Гимназия (14:47)</option>
        <option>Церковь (14:49)</option>
        <option>ГК Нефтяник 1 (14:51)</option>
        <option>Аэропорт (14:53)</option>
        <option>Звёзды Югры (14:55)</option>
        <option>Трансагенство - пристань (14:57)</option>
        <option>Почта (14:59)</option>
        <option>ТЦ Юбилейный (15:01)</option>
        <option>Соц.Защита (15:03)</option>
        <option>Горбольница (15:05)</option>
        <option>ТПП Урайнефтегаз (15:07)</option>
        <option>Молодежная (15:09)</option>
        <option>Музей (15:11)</option>
        <option>Дом Ребенка (15:13)</option>
        <option>Архив (15:15)</option>
        <option>Типография (15:17)</option>
        <option>Гармония (15:19)</option>
        <option>Электросети (15:21)</option>
    </select>
    @break
    @case(3)
    <select id="address_{{ $num }}">
        <option disabled selected>Ж/Д Вокзал</option>
    </select>
    @break
    @case(3)
    <select id="address_{{ $num }}">
        <option disabled selected>Ж/Д Вокзал</option>
    </select>
    @break
    @default
    <input id="address_{{ $num }}" type="text">
@endswitch
