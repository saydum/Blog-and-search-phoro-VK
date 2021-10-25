<?php $this->layout('template', ['title' => 'Поиск фото в вк по карте']);?>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/css/bootstrap.min.css" integrity="sha384-DhY6onE6f3zzKbjUPRc2hOzGAdEf4/Dz+WJwBvEYL/lkkIsI3ihufq9hk9K4lVoK" crossorigin="anonymous">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script src="https://api-maps.yandex.ru/2.1/?apikey=56584994-2e4c-42c7-b7f2-35ee54bd01c5&lang=ru_RU" type="text/javascript">
</script>

<!-- CSS only -->
<link rel="stylesheet" href="css/style.maps.css">


</head>
<body>
    <!-- Image and text -->
    <nav class="navbar navbar-light bg-light">
        Поиск Фото Vk

        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
            Как пользоваться ?
        </button>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Как пользоваться ?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <div class="modal-body">
            1 Задайте параметры количество фото и радиус<br />
            2 Поставте на карте отметку <img src="img/ma.png" alt=""><br />
            3 Нажмите на поиск и получите результат фотографии

        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Вернуться назад</button>
        </div>
    </div>
</div>
</div>
</nav>
</div>
<br>
<div class="container">
    <div class="row">
        <div class="divInRange">
            <label class="resaltInRange" for="formControlRange">Количество фото:<b><p class=" result"></p></b></label>
            <input type="range" id="count" class="range1" value="100" max="500" min="1">

            <label class="resaltInRange" for="formControlRange">Радиус:<b><p class=" result2"></p></b></label>
            <input type="range" id="range" class="range2" value="500" max="5000" min="1">
        </div>
        <div class="divInRange">
            <div id="map" class="divMaps border border-secondary"></div><br />
            <button type="submit" id="send" class="btn btn-dark">Искать фото</button>
        </div>
    </div>
</div>
</div>
<hr>





<script type="text/javascript">


    ymaps.ready(init);

    function init() {
        var myPlacemark,
        myMap = new ymaps.Map('map', {
            center: [55.753994, 37.622093],
            zoom: 9
        }, {
            searchControlProvider: 'yandex#search'
        });

    // Слушаем клик на карте.
    myMap.events.add('click', function (e) {
        var coords = e.get('coords');

        // Если метка уже создана – просто передвигаем ее.
        if (myPlacemark) {
            myPlacemark.geometry.setCoordinates(coords);
        }
        // Если нет – создаем.
        else {
            myPlacemark = createPlacemark(coords);
            myMap.geoObjects.add(myPlacemark);
            // Слушаем событие окончания перетаскивания на метке.
            myPlacemark.events.add('dragend', function () {
                getAddress(myPlacemark.geometry.getCoordinates());
            });
        }
        getAddress(coords);
    });

    // Создание метки.
    function createPlacemark(coords) {
        return new ymaps.Placemark(coords, {
            iconCaption: 'поиск...'
        }, {
            preset: 'islands#violetDotIconWithCaption',
            draggable: true
        });
    }

    // Определяем адрес по координатам (обратное геокодирование).
    function getAddress(coords) {
        myPlacemark.properties.set('iconCaption', 'поиск...');
        ymaps.geocode(coords).then(function (res) {
            var firstGeoObject = res.geoObjects.get(0);

            myPlacemark.properties
            .set({
                    // Формируем строку с данными об объекте.
                    iconCaption: [
                        // Название населенного пункта или вышестоящее административно-территориальное образование.
                        firstGeoObject.getLocalities().length ? firstGeoObject.getLocalities() : firstGeoObject.getAdministrativeAreas(),
                        // Получаем путь до топонима, если метод вернул null, запрашиваем наименование здания.
                        firstGeoObject.getThoroughfare() || firstGeoObject.getPremise()
                        ].filter(Boolean).join(', '),
                    // В качестве контента балуна задаем строку с адресом объекта.
                    balloonContent: firstGeoObject.getAddressLine()
                });
        });



        send.onclick = function() {
            var range = document.getElementById('range').value;
            var count = document.getElementById('count').value;

            var urlVk = `https://api.vk.com/method/photos.search.json?lat=${coords[0]}&long=${coords[1]}&count=${count}&radius=${range}&access_token=67fd18409b03790309f38221ff25a26f5ee792a113e0299386b2c33d28f2cd99a1f1f7cf9a66aac8bf2cf&v=5.52`




            $(document).ready(function(){
                var url = window.location.href;


                $.ajax({
                    type:"GET",
                    url:"/prog",
                    data:{urlVk:urlVk},
                    success:function(result){
                        $("#content").html(result);
                    }
                });
            });
        };
    }
}
$('.result').html($('input[class="range1"]').val());

$(document).on('input change', 'input[class="range1"]', function() {
  $('.result').html($(this).val());
});

$('.result2').html($('input[class="range2"]').val());

$(document).on('input change', 'input[class="range2"]', function() {
  $('.result2').html($(this).val());
});
$('.popover-dismiss').popover({
  trigger: 'focus'
});
$(function () {
  $('[data-toggle="popover"]').popover()
})
</script>
<div id="content"></div>
</body>
</html>
