<?php
require_once "Admin/Config/config.php";
require_once "Class/Core.php";
require_once "Class/config.php";
require_once "Class/Index.php";
require_once "Class/Errors.php";
$err=new Errors();
$config=new config();
$url = $_SERVER['REQUEST_URI'];
foreach ($config->get_routes() as $url_adress) {
        foreach ($config->get_errors() as $errors) {
            $brand = "/" . $url_adress;
            $error = $brand."/". $errors;
            if ($url === "/") {
                break;
            } elseif ($url == $brand) {
                include "brands.php";
                exit();
            } elseif (strcasecmp($url,$error)==0) {
                include "errors.php";
                exit();
            }
        }
}

if (($url !=="/")) {
    http_response_code(404);
    include_once '404.php';
    exit();
}
 ?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="Про ошибки авто">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="icon" href="/favicon.png" type="image/png">
    <title>Коды ошибок посудомоечных машин известных брендов</title>
<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-8745570220712762"
     crossorigin="anonymous"></script>
	 <!-- Yandex.RTB -->
<script>window.yaContextCb=window.yaContextCb||[]</script>
<script src="https://yandex.ru/ads/system/context.js" async></script>
</head>
<body class="body">
<?php
$obj=new Index();
$obj->get_body();
$obj->get_adv_content();
?>
<section>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 pretext text-center">
                <h1>Расшифровка кода ошибки посудомойки</h1>
                <p>*Выберите свою марку посудомоечной машины и ознакомьтесь со списком ошибок.</p>
            </div>
            <div class="col-lg-12">
                <div class="row text-center car-menu">
                    <?php foreach ($obj->get_brand_index() as $index_brands) {?>
                <div class="col-3 col-lg-3  col-sm-3 col-md-3">
                    <a target="_blank" href="<?php echo INDEX."/".$index_brands['url_brands']?>"> <img src="images/brands/<?php echo $index_brands['img_brands']?>" class="car-icon" alt="иконка <?php echo $index_brands['brand_name']?>">
                    <p class="text-menu"><?php echo $index_brands['brand_name']?></p>
                    </a>
                </div>
                    <?php } ?>

                </div>
            </div>
        </div>
    </div>
</section>

<section class="statistic">
    <div class="container">
    <div class="row">
        <div class="col-lg-12">
            <h2 class="text-center">Посудомоечная машина выдает ошибку? - Ҏosudoᛖoyky.ru Вам поможет</h2>
        </div>
        <div class="col-lg-6">
            <div class="col-lg-12 text-center">
                <img src="./images/config/logo.webp" alt="Портал проверки кодов ошибки посудомоек" width="100" height="100">
            </div>

            <p>"Сайт Ҏosudoᛖoyky.ru - это база всех кодов ошибок популярных марок посудомоечных машин.</p>
            <p>Материалы портала нацеленны помочь Вам в решении большинства проблем с поломкой или некачественной работой Вашей посудомойки.</p>
            <p>Сведения собраны и систематизированы таким образом, чтобы Вам было удобно смотреть и находить тот или иной код ошибки конкретной марки.</p>
            <p>Мы рассчитываем на то, что площадка станет полезной и поможет множеству владельцев подобных устройств, вовремя обнаружить неисправность и понять, что можно сделать, чтобы пользоваться им в полной мере.</p>

        </div>
        <div class=" video-promo d-none d-lg-block d-xl-blockcol-lg-6 text-center">
            <video class="promo-video" controls poster = "./images/video/what-servis.webp">
                <source src = "<?php echo INDEX?>/images/video/disher-code.mp4" type = 'video/mp4; codecs="avc1.42E01E, mp4a.40.2"'>
                <source src = "<?php echo INDEX?>/images/video/disher-code.ogg" type = 'video/ogg; codecs="theora, vorbis"'>
                <source src="<?php echo INDEX?>/images/video/disher-code.webm" type='video/webm; codecs="vp8, vorbis"'>
            </video>
        </div>
    </div>
    </div>
</section>
<section class="sliders">
    <div class="container">
    <div class="row">
        <div class="col-lg-12">
            <h2 id="otzyv" class="text-center col-lg-12">Отзывы владельцев</h2>
        </div>
        <div class="col-lg-2">
            <img src="images/config/avto-bacground.webp" class="sliders-avto" alt="Проверка неисправности посудомоечной машины">
        </div>
        <div class="col-lg-10 text-center slider">
            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner text-center">
                    <div class="carousel-item active">
                        <h3>Случай №1. Даже в мастерской отказали</h3>
                        <p>"Расскажу, как Ваш сайт мне помог решить проблему запуска своей посудомоечной машины.</p>
                        <p>Я купила ее в рассрочку и отдала приличные на то время деньги. Прошло 2 года где-то и посудомойка отказалась работать.</p>
                        <p>Вызываю значит мастера на дом. Он приходит, говорит надо на диагностику забрать. Согласилась.</p>
                        <p>Продержали они ее там 2 недели, а потом позвонили и сказали, что скорее всего вышел из строя основной модуль и лучше мне купить новую мойку, нежели чинить старую.</p>
                        <p>Я расстроилась естественно, но из мастерской забрала ее домой. Включались в питание как-то и на экране увидела код ошибки.</p>
                        <p>Расшифровала его у Вас и поняла, что причина в сливном шланге.</p>
                        <p>Открутила заднюю крышку и просто поменяла его, купив аналог за 120 рублей.</p>
                        <p>Посудомойка заработала, как часы. Я была просто на седьмом небе от счастья.</p>
                        <p>Не знаю, как там эти мастера ее смотрели, но благодаря Вам и своей упрямости, все сама устранила. Спасибо."</p>
                    </div>
                    <div class="carousel-item">
                        <h3>Случай №2. Чуть не испортил подарок</h3>
                        <p>"Купил я как-то посудомойку немецкую. Марку называть не буду. </p>
                        <p>Рассчитывал на качество, выбирал по отзывам. Принес домой, подарил жене, она была очень рада. </p>
                        <p>Когда стал подключать, то увидел на экране несколько ошибок. Хорошо, что сразу решил их расшифровать. </p>
                        <p>Как оказалось после всех процедур диагностики и созвона с сервисным центром, у меня приключился заводской брак.</p>
                        <p>Посудомойку конечно заменили, но осадок остался небольшой. Благо все решилось очень быстро, в течении недели где-то.</p>

                        <p>Хорошо, что я наткнулся на Ваш ресурс, иначе просто бы потерял свои деньги, когда это чудо перестало бы работать спустя гарантийный срок."</p>
                    </div>
                    <div class="carousel-item v">
                        <h3>Случай №3. Заметила снижение качества воды, благодаря коду ошибки.</h3>
                        <p>Свою посудомойку я покупала давно. Она уже со мной лет 5 наверное. Работает исправно."</p>
                        <p>Как-то стала показывать на экране странные символы и сигналить без умолку.</p>
                        <p>Я записала все. Пошла в интернет и нашла Вам сайт. </p>
                        <p>Как оказалось, у меня в квартире резко снизилось качество водопроводной воды. Обратилась в управляющую компанию и независимую экспертизу.</p>
                        <p>Все подтвердилось. Вовремя обнаружила проблему, иначе бы оборудование могло выйти из строя.</p>
                        <p>Спасибо Вам за старания. Я бы не додумалась сама. Да и в инструкции к посудомойке ничего про это не было сказано."</p>
                    </div>
                </div>
            </div>
        </div>

    </div>
    </div>
</section>
<section class="stat-numbers">
    <div class="container">
        <div class="row icon-statistic text-center">
            <div class="col-lg-4 ">
                <h3>Расшифровали:</h3>
                <img src="images/statistic/number1.webp" alt="Сколько кодов опубликовано" class="number1">
                <p><?php echo $config->get_num_errors(); ?> код</p>
            </div>
            <div class="col-lg-4">
                <h3>Производителей:</h3>

                <img src="images/statistic/number2.webp" alt="Сколько брендов на сайте" class="number1">
                <p><?php echo $config->get_num_brands(); ?></p>
            </div>
            <div class="col-lg-4">
                <h3>Решили проблему:</h3>
                <img src="images/statistic/number4.webp" alt="Уже помогли" class="number1">
                <p><?php echo $config->get_num_comments(); ?> раз</p>
            </div>
        </div>
    </div>
</section>
<footer>
    <?php $obj->get_footer(); ?>
</footer>
</body>
</html>