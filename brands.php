<?php
require_once "Admin/Config/config.php";
require_once "Class/Core.php";
require_once "Class/Brands.php";
$obj2=new Brands();
//Получаем урл страницы бренда
$url_models=$obj2->url_brand();
//Выводим инфу о бренде
foreach ($obj2->get_brand_content($url_models) as $all_info_brand){?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="<?php echo $all_info_brand['description']?>">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="icon" href="/favicon.png" type="image/png">
    <title><?php echo $all_info_brand['title']?></title>
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
$obj->get_adv_content(); ?>
<section>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center h1-brands">
                <h1><?php echo $all_info_brand['h1']?></h1>
            </div>
            <div class="col-lg-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo INDEX ;?>">Главная</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><?php echo $all_info_brand['brand_name']?></li>
                    </ol>
                </nav>
            </div>
            <div class="col-lg-12 text-center">
                <?php
                //Рекламный блок под заголовком.
                echo $obj->adv_bloks[0]['h1adv_brands'];
                ?>
            </div>
        </div>
    </div>
</section>
<section>
    <div class="container">
        <div class="row text-center">
            <div class="col-lg-4">
                <img src="images/brands/<?php echo $all_info_brand['img_brands']?>" class="brands-image">
            </div>
            <div class="col-lg-6">
                <table class="table-brand table-responsive table-hover">
                    <tr>
                        <th>Перевод:</th>
                        <td><?php echo $all_info_brand['translate']?></td>
                    </tr>
                    <tr>
                        <th>Основатель:</th>
                        <td><?php echo $all_info_brand['autor']?></td>
                    </tr>
                    <tr>
                        <th>Председатель:</th>
                        <td><?php echo $all_info_brand['director']?></td>
                    </tr>
                    <tr>
                        <th>Дата основания:</th>
                        <td><?php echo $all_info_brand['date_in']?></td>
                    </tr>
                    <tr>
                        <th>Страна:</th>
                        <td><?php echo $all_info_brand['country']?></td>
                    </tr>
                    <tr>
                        <th>Производят:</th>
                        <td><?php echo $all_info_brand['themes']?></td>
                    </tr>
                    <tr>
                        <th>Кодов ошибок:</th>
                        <td><a href="#errors"> <?php echo $obj2->get_brand_errors($url_models)->rowCount(); ?></a></td>
                    </tr>
                </table>
            </div>
            <div class="col-lg-2">
                <p class="blockquote-p">"<?php echo $all_info_brand['deviz']?>"</p>
            </div>
            <div class="text-center col-lg-12">
                <hr class="hr-info">
                <img src="images/brands/<?php echo $all_info_brand['img_brands']?>" class="brands-image-hr">
            </div>
            <div class="col-lg-12">
                <div class="col-lg-12 text-center">
                    <?php
                    //Рекламный блок.
                    echo $obj->adv_bloks[0]['historyadv_brands'];
                    ?>
                </div>
                <?php echo $all_info_brand['history_brands']?>
                <div class="col-lg-12 text-center">
                    <?php
                    //Рекламный блок.
                    echo $obj->adv_bloks[0]['erroradv_brands'];
                    ?>
                </div>
                <?php echo $all_info_brand['error_brands']?>
            </div>
            <div class="col-lg-12">
                <div class="text-center col-lg-12">
                    <hr class="hr-info">
                    <img src="images/brands/<?php echo $all_info_brand['img_brands']?>" class="brands-image-hr">
                </div>
                <h3>Видео:</h3>
                <div class="text-center video-post">
                    <iframe
                            class="video"
                            width="100%"
                            height=350px
                            src="//www.youtube.com/embed/<?php echo $all_info_brand['video']?>"
                            srcdoc="<style>*{padding:0;margin:0;overflow:hidden}html,body{height:100%}img,span{position:absolute;width:100%;top:0;bottom:0;margin:auto}span{height:1.5em;text-align:center;font:48px/1.5 sans-serif;color:white;text-shadow:0 0 0.5em black}</style><a href=//www.youtube.com/embed/<?php echo $all_info_brand['video']?>?autoplay=1><img src=//img.youtube.com/vi/<?php echo $all_info_brand['video']?>/hqdefault.jpg alt='Видео о проверке подлинности' class='video img-fluid'><span>▶</span></a>"
                            frameborder="0"
                            allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                            allowfullscreen
                            title="Видео-отзыв"
                    ></iframe>
                </div>
            </div>
        </div>
    </div>
</section>
<?php
}
?>
<section class="models-error">
    <div class="container">
        <div class="row">

            <div class="col-lg-12">
                <h2 id="errors" class="text-center">Ошибки <?php echo $all_info_brand['brand_name']?></h2>
                <div class="text-center col-lg-12">
                    <hr class="hr-info">
                    <img src="images/brands/<?php echo $all_info_brand['img_brands']?>" class="brands-image-hr">
                </div>
            </div>
            <div class="col-lg-12 text-center">
                <?php
                //Рекламный блок.
                $obj->adv_bloks[0]['modelsadv_error'];
                ?>

            </div>
            <div class="col-lg-12">
                <div class="form-group">
                    <input type="text" class="form-control  models-search" id="search" placeholder="Укажите в поле код ошибки">
                </div>
            </div>
            <div class="col-lg-8 text-center">
                <table id="mytable" class="table-error table table-bordered table-striped table-Secondary table-responsive">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Код ошибки</th>
                        <th scope="col">Расшифровка</th>
                        <th scope="col">Посмотреть</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    //Узнаем количество строк ошибок для заполнения таблицы номером столбца

                    foreach ($obj2->get_brand_errors($url_models) as $models_error) {
                    $number_tr = $number_tr + 1;
                    ?>
                    <tr>
                        <th scope="row"><?php echo $number_tr;?></th>
                        <td><?php echo $models_error['code_error']?></td>
                        <td><img src="/images/config/plus.png" width="40px" height="50px" alt="Ошибка расшифрована"></td>
                        <td><a class="models-link" target="_blank" href="<?php echo INDEX."/".$models_error['categ_error']."/".$models_error['url_errors'] ?>">Расшифровка</a> </td>
                    </tr>
                    <?php } ?>

                    </tbody>
                </table>
            </div>
            <div class="col-lg-4 models-error-info">
                <div class="col-lg-12 video-promo-error">
                    <video class="promo-video-error" controls poster = "/images/video/what-error.webp">
                        <source src = "<?php echo INDEX?>/images/video/what-error.mp4" type = 'video/mp4; codecs="avc1.42E01E, mp4a.40.2"'>
                        <source src="<?php echo INDEX?>/images/video/what-error.webm" type='video/webm; codecs="vp8, vorbis"'>
                    </video>
                </div>
                <ol>
                    <noindex>
                    <li>Введите код ошибки в поле поиска.</li>
                    <li>Выберите в таблице нужное Вам значение.</li>
                    <li>Нажмите кнопку "Открыть", чтобы увидеть расшифровку.</li>
                    </noindex>
                </ol>
            </div>

        </div>
    </div>
    </div>
</section>


<footer>
    <?php $obj->get_footer();?>
    <script>
        $(document).ready(function(){
            $("#search").keyup(function(){
                _this = this;
                $.each($("#mytable tbody tr"), function() {
                    if($(this).text().toLowerCase().indexOf($(_this).val().toLowerCase()) === -1)
                        $(this).hide();
                    else
                        $(this).show();
                });
            });
        });
    </script>
</footer>
</body>
</html>