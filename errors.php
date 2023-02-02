<?php
require_once "Admin/Config/config.php";
require_once "Class/Core.php";
require_once "Class/Errors.php";

$url_errors=new Errors();
$url_error=$url_errors->url_errors();
foreach ($url_errors->kontent_errors($url_error[1],$url_error[2]) as $kontent_errors){
    //Для формирования уникального тайтла и контента страницы получаем данные по модели и добавляем их к ошибке.

?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="<?php echo "Расшифровка и исправление неподадок с посудомойкой ".$kontent_errors['titlecat_error']. ". Что делать с ошибкой ".$kontent_errors['code_error'].". Как быть если машина не хочет работать."?>">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="icon" href="/favicon.png" type="image/png">
    <link rel="stylesheet" type="text/css" href="/css/jquery.fancybox.min.css">
    <title><?php echo "Расшифровка ошибки ".$kontent_errors['code_error']." посудомоечной машины ".$kontent_errors['titlecat_error']?></title>
<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-8745570220712762"
     crossorigin="anonymous"></script>
	 <!-- Yandex.RTB -->
<script>window.yaContextCb=window.yaContextCb||[]</script>
<script src="https://yandex.ru/ads/system/context.js" async></script>
</head>
<body class="body">
<?php
$obj=new Errors();
$obj->get_body();
$obj->get_adv_content();
?><section>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center h1-brands">
                <h1>Ошибкa <?php echo $kontent_errors['code_error']." посудомойки ".$kontent_errors['titlecat_error']?></h1>
            </div>
            <div class="col-lg-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo INDEX ;?>">Главная</a></li>
                        <li class="breadcrumb-item"><a href="<?php echo INDEX."/".$url_error[1] ;?>"><?php echo $url_error[1]?></a></li>
                        <li class="breadcrumb-item active" aria-current="page"><?php echo $kontent_errors['code_error']?></li>
                    </ol>
                </nav>
            </div>
            <div class="col-lg-12 text-center">
                <?php
                //Рекламный блок.
                echo $obj->adv_bloks[0]['erroradv_h1'];
                ?>
            </div>
        </div>
    </div>
</section>
<section class="models-header">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 text-center">
                <ul class="models-menu">
                    <li><a href="#errors">Расшифровка</a> </li>
                    <li><a href="#reset">Как исправить</a> </li>
                    <li><a href="#comment">Отзывы</a> </li>
                </ul>
            </div>
            <div class="col-lg-9 ">
                <h2 id="errors" class="text-center"><?php echo $kontent_errors['code_error'] ?></h2>
                <table class="errors-table table table-bordered table-striped table-Secondary table-responsive">
                    <thead>
                    <tr>
                        <th scope="col">Перевод</th>
                        <th scope="col">Что означает для </th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>Русский:</td>
                        <td>"Код неисправности посудомойки -  <?php  echo $kontent_errors['code_error'].". ". $kontent_errors['rus_error'] ?>"</td>
                    </tr>
                    <tr>
                        <td>Английский:</td>
                        <td>"<?php echo $kontent_errors['eng_error']?>"</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <?php require_once "social-button.php"?>
    </div>

</section>
<section class="models-table">
    <div class="container">
        <div class="row">
            <div class="text-center col-lg-12">
                <hr class="hr-info">
                <img src="/images/config/dishwasher.webp" class="brands-image-hr">
            </div>
            <h2 id="reset" class="col-lg-12 text-center">Как исправить <?php echo $kontent_errors['code_error'] ?>?</h2>
            <div class="col-lg-12 text-center">
                <?php
                //Рекламный блок.
                echo $obj->adv_bloks[0]['erroradv_reset'];
                ?>
            </div>
            <div class="col-lg-12 text-center">
                <p><?php echo "Сброс ошибки для  осуществляется следующим образом. ".$kontent_errors['reset_error'] ?></p>
            </div>
        </div>
    </div>
</section>
<?php } ?>
<section class="random-errors">
    <div class="container">
        <div class="row text-center">
            <div class="text-center col-lg-12">
                <hr class="hr-info">
                <img src="/images/config/dishwasher.webp" class="brands-image-hr">
            </div>
            <div class="col-lg-12">
                <h3>Просматриваемые ошибки:</h3>
            </div>
            <?php foreach ($url_errors->kontent_errors_rand($url_error[1]) as $rand_error_brand){  ?>
                <div class="col-lg-3 col-3 col-sm-3 col-md-3 col-xl-3">
                    <a href="<?php echo INDEX."/".$url_error[1]."/".$rand_error_brand['url_errors']?>" target="_blank">
                        <h4><?php echo $rand_error_brand['code_error']?></h4></a>
                </div>
            <?php } ?>
        </div>
    </div>
</section>
<section class="comments">
    <div class="text-center col-lg-12">
        <hr class="hr-info">
        <img src="/images/config/dishwasher.webp" class="brands-image-hr">
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2 id="comment" class="text-center">Отзывы владельцев:</h2>
            </div>
            <?php foreach ($url_errors->get_errors_comment_read($url_error[2]) as $comment_error ){
            ?>
            <div class="col-lg-2">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <img src="/images/config/user.png" alt="<?php echo "Аватарка комментатора ".$comment_error['name']?>" class="models-user-img">
                        <p class="models-name-comment"><?php echo $comment_error['name']?></p>
                    </div>
                </div>
            </div>
            <div class="col-lg-10 models-text-coment">
                <p>"<?php echo $comment_error['comment']?>"</p>
            </div>
            <div class="text-center col-lg-12">
                <hr class="hr-info">
                <img src="/images/config/dishwasher.webp" class="brands-image-hr">
            </div>
            <?php } ?>
            <div class="col-lg-12">
                <form class="comment_form" action="#" method="post" name="contact_form">
                    <ul>
                        <li>
                            <h3 class="text-center">Оставить комментарий:</h3>
                            <span class="required_notification">* Обязательные поля</span>
                        </li>
                        <li>
                            <label for="name">Имя*:</label>
                            <input type="text"  placeholder="Иван" name="name" required />
                        </li>
                        <li>
                            <label for="email">Email*:</label>
                            <input type="email" name="email" placeholder="ivan@example.ru" required />
                            <span class="form_hint">Формат почты "name@something.ru"</span>
                        </li>
                        <li>
                            <label for="message">Комментарий*:</label>
                            <textarea name="message" cols="40" rows="6" required ></textarea>
                        </li>
                        <li>
                            <button class="submit" name="submit_komment" type="submit" >Отправить</button>
                        </li>
                    </ul>
                    <?php if (isset($_POST['submit_komment'])){
                        $url_errors->get_public_komment_errors($url_error[2])?>
                        <div class="col-lg-12 text-center">
                            <h4>Комментарий отправлен!...</h4>
                            <p>Спасибо! Ваш комментарий отправлен и появится на сайте после проверки администрацией.</p>
                        </div>
                    <?php } ?>
                </form>
            </div>
        </div>
    </div>
</section>
<footer>
    <?php $obj->get_footer(); ?>
</footer>
</body>
</html>
