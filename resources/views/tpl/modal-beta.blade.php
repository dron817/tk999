<div id="modal-beta">
    <p>Дорогие пассажиры, наш сайт находится в процессе разработки и некоторые функции могут работать некорректно.</p>
    <p>Если вы столкнулись с трудностями при покупке билетов, свяжитесь с диспетчером и опишите ситуацию.</p>
    <p>Мы постараемся помочь вам в кратчайшие сроки.</p>
    <button id="hide-modal-beta">Продолжить пользоваться сайтом</button>
</div>
<script>
    function getCookie(name) {
        let matches = document.cookie.match(new RegExp(
            "(?:^|; )" + name.replace(/([\.$?*|{}\(\)\[\]\\\/\+^])/g, '\\$1') + "=([^;]*)"
        ));
        return matches ? decodeURIComponent(matches[1]) : undefined;
    }

    if (getCookie('modal')==='hide') $( "#modal-beta" ).remove();

        $( "#hide-modal-beta" ).click(function() {
        document.cookie = "modal=hide; max-age=604800";
        $( "#modal-beta" ).remove();
    });
</script>
