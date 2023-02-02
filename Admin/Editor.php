<?php
session_start();
require_once "Class/CoreA.php";
require_once "Class/Editor.php";
require_once "Class/InControl.php";
if ((!$_COOKIE['User'])){
    http_response_code(404);
    header('Location:  ../404.php ');
    exit();
}
$editor=new Editor();
?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="icon" href="/favicon.png" type="image/png">
    <meta name="robots" content="noindex">
    <script src="./ckeditor/ckeditor.js"></script>
    <title>Редактирование страницы <?php echo $_GET['Страницы']?></title>

</head>
<body>
<?php if ($_GET['editor']=="brand") {
    foreach ($editor->get_brand_select($_GET['url']) as $brands_kontent){
    ?>
<div class="container">
<form method="post" class="admin_form_update" action="">
    <div class="row">
        <h2 class="col-lg-12 text-center">Мета-теги для СЕО</h2>
        <div class="mb-3 w-50 form-field-admin">
        <label for="exampleInputEmail" class="form-label">Заголовок Бренда</label>
        <input name="brand-title" type="text" class="form-control" id="exampleInputEmail" aria-describedby="emailHelp" value="<?php echo $brands_kontent['title']?>">
        <div id="emailHelp" class="form-text">*Title страницы бренда</div>
    </div>
    <div class="mb-3 w-25 form-field-admin">
        <label for="exampleInputEmail" class="form-label">Аббревиатура Бренда</label>
        <input name="brand-name" type="text" class="form-control" id="exampleInputEmail" aria-describedby="emailHelp" value="<?php echo $brands_kontent['brand_name']?>">
        <div id="emailHelp" class="form-text">*На анг.языке. Например BMW</div>
    </div>
        <hr class="hr-info">
        <div class="mb-3 w-50 form-field-admin">
            <label for="exampleInputEmail" class="form-label">Описание страницы (Descriptions)</label>
            <input name="brand-description" type="text" class="form-control" id="exampleInputEmail" aria-describedby="emailHelp" value="<?php echo $brands_kontent['description']?>">
            <div id="emailHelp" class="form-text">*Мета-тег описания страницы</div>
        </div>
        <div class="mb-3 w-25 form-field-admin">
            <label for="exampleInputEmail" class="form-label">Девиз компании</label>
            <input name="brand-deviz" type="text" class="form-control" id="exampleInputEmail" aria-describedby="emailHelp" value="<?php echo $brands_kontent['deviz']?>">
            <div id="emailHelp" class="form-text">*Фирменный слоган</div>
        </div>
        <hr class="hr-info">

        <div class="mb-3 w-50 form-field-admin">
            <label for="exampleInputEmail" class="form-label">H1 заголовок</label>
            <input name="brand-h1" type="text" class="form-control" id="exampleInputEmail" aria-describedby="emailHelp" value="<?php echo $brands_kontent['h1']?>">
            <div id="emailHelp" class="form-text">*Нужен для поиска. Обязателен.</div>
        </div>
        <hr class="hr-info">
        <h2 class="col-lg-12 text-center">Дополнительная информация</h2>
        <div class="mb-3 w-25 form-field-admin">
            <label for="exampleInputEmail" class="form-label">Название в рус.переводе</label>
            <input name="brand-translate" type="text" class="form-control" id="exampleInputEmail" aria-describedby="emailHelp" value="<?php echo $brands_kontent['translate']?>">
            <div id="emailHelp" class="form-text">*Для уникализации страницы. Перевод на русском.</div>
        </div>
        <div class="mb-3 w-25 form-field-admin">
            <label for="exampleInputEmail" class="form-label">ФИО основателя</label>
            <input name="brand-autor" type="text" class="form-control" id="exampleInputEmail" aria-describedby="emailHelp" value="<?php echo $brands_kontent['autor']?>">
            <div id="emailHelp" class="form-text">*Кто основал компанию</div>
        </div>
        <div class="mb-3 w-25 form-field-admin">
            <label for="exampleInputEmail" class="form-label">Директор нынешний</label>
            <input name="brand-director" type="text" class="form-control" id="exampleInputEmail" aria-describedby="emailHelp" value="<?php echo $brands_kontent['director']?>">
            <div id="emailHelp" class="form-text">*Кто управляет на данный момент.</div>
        </div>
        <hr class="hr-info">
        <div class="mb-3 w-25 form-field-admin">
            <label for="exampleInputEmail" class="form-label">Дата основания </label>
            <input name="brand-data" type="text" class="form-control" id="exampleInputEmail" aria-describedby="emailHelp" value="<?php echo $brands_kontent['date_in']?>">
            <div id="emailHelp" class="form-text">*Когда была основана.</div>
        </div>
        <div class="mb-3 w-25 form-field-admin">
            <label for="exampleInputEmail" class="form-label">Страна производства</label>
            <input name="brand-country" type="text" class="form-control" id="exampleInputEmail" aria-describedby="emailHelp" value="<?php echo $brands_kontent['country']?>">
            <div id="emailHelp" class="form-text">*Где главный офис.</div>
        </div>
        <div class="mb-3 w-25 form-field-admin">
            <label for="exampleInputEmail" class="form-label">Продукция</label>
            <input name="brand-themes" type="text" class="form-control" id="exampleInputEmail" aria-describedby="emailHelp" value="<?php echo $brands_kontent['themes']?>">
            <div id="emailHelp" class="form-text">*Список что производят еще.</div>
        </div>
        <hr class="hr-info">
        <div class="mb-3 w-50 form-field-admin">
            <label for="exampleInputEmail" class="form-label">Видео</label>
            <input name="brand-video" type="text" class="form-control" id="exampleInputEmail" aria-describedby="emailHelp" value="<?php echo $brands_kontent['video']?>">
            <div id="emailHelp" class="form-text">*Укажите ID YouTube видео.</div>
        </div>

        <div class="mb-3 w-25 form-field-admin">
            <label for="exampleInputEmail" class="form-label">Лого (512х512px)</label>
            <select name="brand-img" id="exampleInputEmail" class=" form-select form-select-lg" aria-label=".form-select-lg example">
                <option value="<?php echo $brands_kontent['img_brands']?>"><?php echo $brands_kontent['img_brands']?></option>
                <?php
                foreach ($editor->scandir_img("../images/brands") as $img_brands=>$url_brands){
                ?>
                <option value="<?php echo $url_brands; ?>"><?php echo $url_brands; ?></option>
                <?php } ?>
            </select>
        </div>
        <hr class="hr-info">
        <h2 class="col-lg-12 text-center">История бренда</h2>
        <div class="mb-3 w-100 form-field-admin">
            <label for="exampleInputEmail" class="form-label">История бренда. На 1-2т знаков</label>
            <textarea name="editor1" type="text" class="form-control" id="editor1" aria-describedby="emailHelp" ><?php echo $brands_kontent['history_brands']?></textarea>
            <div id="emailHelp" class="form-text">*Основная информация о компании.</div>
        </div>
        <hr class="hr-info">
        <h2 class="col-lg-12 text-center">Как найти ошибки и неисправности</h2>
        <div class="mb-3 w-100 form-field-admin">
            <label for="exampleInputEmail" class="form-label">Чем искать ошибки. Где и т.д. На 1-2т знаков</label>
            <textarea name="editor2" type="text" class="form-control" id="editor2" aria-describedby="emailHelp"><?php echo $brands_kontent['error_brands']?></textarea>
            <div id="emailHelp" class="form-text">*Основная информация о том где и как находить ошибку.</div>
        </div>
<?php } ?>
        <div class="w-100">

    <button name="brand_update" type="submit" class="btn btn-primary">Обновить</button>
            <?php if (isset($_POST['brand_update'])){
                $editor->get_brand_update($_POST['brand-title'],$_POST['brand-description'],$_POST['brand-h1'],$_POST['brand-img'],$_POST['brand-deviz'],$_POST['brand-translate'],$_POST['brand-autor'],$_POST['brand-director'],$_POST['brand-data'],$_POST['brand-country'],$_POST['brand-themes'],$_POST['editor1'],$_POST['editor2'],$_POST['brand-video'],$_POST['brand-name'],$_GET['url']);?>
                <script type="text/javascript">
                    setTimeout(function(){
                        location = ''
                },100)
            </script>
         <?php   } ?>
    </div>
    </div>
</form>
</div>
<?php } ?>
<?php if ($_GET['editor']=="error"){
foreach ($editor->all_errors_engine($_GET['url']) as $errors_kontent){
?>
    <div class="container">
<form method="post" class="admin_form_update" action="">
<div class="row">
    <h2>Форма редактирования страницы ошибки</h2>
    <p>Метаданные страниц ошибок обрабатываются и формируются автоматически.</p>
    <div class="mb-3 w-100 form-field-admin">
        <label for="exampleInputEmail" class="form-label">Русский перевод</label>
        <textarea name="editor5" type="text" class="form-control" id="editor5" aria-describedby="emailHelp" ><?php echo $errors_kontent['rus_error']?></textarea>
        <div id="emailHelp" class="form-text">*Перевод на русском.</div>
    </div>
    <div class="mb-3 w-100 form-field-admin">
        <label for="exampleInputEmail" class="form-label">Английский перевод</label>
        <textarea name="editor6" type="text" class="form-control" id="editor6" aria-describedby="emailHelp" ><?php echo $errors_kontent['eng_error']?></textarea>
        <div id="emailHelp" class="form-text">*Перевод на английском.</div>
    </div>
    <div class="mb-3 w-100 form-field-admin">
        <label for="exampleInputEmail" class="form-label">Как сбросить ошибку</label>
        <textarea name="editor7" type="text" class="form-control" id="editor7" aria-describedby="emailHelp" ><?php echo $errors_kontent['eng_error']?></textarea>
        <div id="emailHelp" class="form-text">*Как можно сбросить ошибку.</div>
    </div>
    <div class="mb-3 w-25 form-field-admin">
        <label for="exampleInputEmail" class="form-label">Выбрать категорию</label>
        <select name="errors_cat" id="exampleInputEmail" class=" form-select form-select-lg" aria-label=".form-select-lg example">
            <option value="<?php echo $errors_kontent['categ_error']?>"><?php echo $errors_kontent['categ_error']?></option>
            <?php
            foreach ($editor->brand_category_inmodels() as $inmodels){
                ?>
                <option value="<?php echo $inmodels['url_brands']; ?>"><?php echo $inmodels['brand_name']; ?></option>
            <?php } ?>
        </select>
        <div id="emailHelp" class="form-text">*Например БМВ</div>
    </div>
    <div class="mb-3 w-25 form-field-admin">
        <label for="exampleInputEmail" class="form-label">Код ошибки</label>
        <input name="code_error" type="text" class="form-control" id="exampleInputEmail" aria-describedby="emailHelp" value="<?php echo $errors_kontent['code_error']?>">
        <div id="emailHelp" class="form-text">*Укажите код, отвечающий за ошибку</div>
    </div>
    <hr class="hr-info">

    <div class="w-100">
        <button name="errors_update" type="submit" class="btn btn-primary">Обновить</button>
    </div>
    <?php
    if (isset($_POST['errors_update'])){
        $editor->get_update_errors($_POST['editor5'],$_POST['editor6'],$_POST['editor7'],$_POST['errors_cat'],$_POST['code_error'],$_GET['url']);?>
        <script type="text/javascript">
            setTimeout(function(){
                location = ''
            },100)
        </script>
    <?php }

} }?>
</div>
</form>
    </div>

<footer>
    <script>
        // Replace the <textarea id="editor1"> with a CKEditor 4
        // instance, using default configuration.
        CKEDITOR.replace( 'editor1' );
        CKEDITOR.replace( 'editor2' );
        CKEDITOR.replace( 'editor3' );
        CKEDITOR.replace( 'editor4' );
        CKEDITOR.replace( 'editor5' );
        CKEDITOR.replace( 'editor6' );
        CKEDITOR.replace( 'editor7' );
    </script>
    <script src="<?php echo INDEX;?>/js/jquery-3.5.1.min.js"></script>
    <script src="<?php echo INDEX;?>/js/popper.min.js"></script>
    <script src="<?php echo INDEX;?>/js/bootstrap.min.js"></script>
</footer>
</body>
</html>