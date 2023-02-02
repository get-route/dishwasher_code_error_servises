<?php
session_start();
require_once "Class/CoreA.php";
require_once "Class/Add.php";
require_once "Class/Editor.php";
require_once "Class/InControl.php";
if ((!$_COOKIE['User'])){
    http_response_code(404);
    header('Location:  ../404.php ');
    exit();
}
$add=new Add();
$editor=new Editor();
//Для заполнения блока категории берем данные по бренду и делим массив на заголовок категории и ее урл.
$kategory=explode("|",$_POST['models-cat']);
$url_cat_brand=$kategory[0];
$title_cat_brand=$kategory[1];
if (isset($_POST['brand_add'])) {
    $add->get_add_brand_bd($_POST['brand-title'], $_POST['brand-description'], $_POST['brand-h1'], $_POST['brand-img'], $_POST['brand-deviz'], $_POST['brand-translate'], $_POST['brand-autor'], $_POST['brand-director'], $_POST['brand-data'], $_POST['brand-country'], $_POST['brand-themes'], $_POST['editor8'], $_POST['editor9'], $_POST['brand-video'], $_POST['brand-name'], $_POST['url_brands']);

   header('Location: /Admin/panel_control.php?class=Brands_Admin');
}
if (isset($_POST['models_add'])) {
    $add->get_add_model_bd($_POST['title'], $_POST['uniq-lable'], $_POST['description'],$url_cat_brand,$title_cat_brand, $_POST['h1'],$_POST['url-models'], $_POST['img-model1'], $_POST['altimg-model1'], $_POST['img-model2'], $_POST['altimg-model2'], $_POST['img-model3'], $_POST['altimg-model3'], $_POST['img-model4'], $_POST['altimg-model4'], $_POST['class-model'], $_POST['kuzov-model'], $_POST['years-model'], $_POST['editor10'],$_POST['editor11']);

    header('Location: /Admin/panel_control.php?class=Models_Admin');
}

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
    <title>Добавление новой страницы <?php echo $_GET['Добавить']?></title>

</head>
<body>
<?php if ($_GET['Option']=='Brand'){?>
<div class="container">
<form method="post" class="admin_form_update" action="">
    <div class="row">
        <h2 class="col-lg-12 text-center">Мета-теги для СЕО</h2>
        <div class="mb-3 w-50 form-field-admin">
        <label for="exampleInputEmail" class="form-label">Заголовок Бренда</label>
        <input name="brand-title" type="text" class="form-control" id="exampleInputEmail" aria-describedby="emailHelp">
        <div id="emailHelp" class="form-text">*Title страницы бренда</div>
    </div>
    <div class="mb-3 w-25 form-field-admin">
        <label for="exampleInputEmail" class="form-label">Аббревиатура Бренда</label>
        <input name="brand-name" type="text" class="form-control" id="exampleInputEmail" aria-describedby="emailHelp">
        <div id="emailHelp" class="form-text">*На анг.языке. Например BMW</div>
    </div>
        <hr class="hr-info">
        <div class="mb-3 w-50 form-field-admin">
            <label for="exampleInputEmail" class="form-label">Описание страницы (Descriptions)</label>
            <input name="brand-description" type="text" class="form-control" id="exampleInputEmail" aria-describedby="emailHelp" >
            <div id="emailHelp" class="form-text">*Мета-тег описания страницы</div>
        </div>
        <div class="mb-3 w-25 form-field-admin">
            <label for="exampleInputEmail" class="form-label">Девиз компании</label>
            <input name="brand-deviz" type="text" class="form-control" id="exampleInputEmail" aria-describedby="emailHelp" >
            <div id="emailHelp" class="form-text">*Фирменный слоган</div>
        </div>
        <hr class="hr-info">

        <div class="mb-3 w-50 form-field-admin">
            <label for="exampleInputEmail" class="form-label">H1 заголовок</label>
            <input name="brand-h1" type="text" class="form-control" id="exampleInputEmail" aria-describedby="emailHelp">
            <div id="emailHelp" class="form-text">*Нужен для поиска. Обязателен.</div>
        </div>
        <hr class="hr-info">
        <h2 class="col-lg-12 text-center">Дополнительная информация</h2>
        <div class="mb-3 w-25 form-field-admin">
            <label for="exampleInputEmail" class="form-label">Название в рус.переводе</label>
            <input name="brand-translate" type="text" class="form-control" id="exampleInputEmail" aria-describedby="emailHelp">
            <div id="emailHelp" class="form-text">*Для уникализации страницы. Перевод на русском.</div>
        </div>
        <div class="mb-3 w-25 form-field-admin">
            <label for="exampleInputEmail" class="form-label">ФИО основателя</label>
            <input name="brand-autor" type="text" class="form-control" id="exampleInputEmail" aria-describedby="emailHelp">
            <div id="emailHelp" class="form-text">*Кто основал компанию</div>
        </div>
        <div class="mb-3 w-25 form-field-admin">
            <label for="exampleInputEmail" class="form-label">Директор нынешний</label>
            <input name="brand-director" type="text" class="form-control" id="exampleInputEmail" aria-describedby="emailHelp" >
            <div id="emailHelp" class="form-text">*Кто управляет на данный момент.</div>
        </div>
        <hr class="hr-info">
        <div class="mb-3 w-25 form-field-admin">
            <label for="exampleInputEmail" class="form-label">Дата основания </label>
            <input name="brand-data" type="text" class="form-control" id="exampleInputEmail" aria-describedby="emailHelp">
            <div id="emailHelp" class="form-text">*Когда была основана.</div>
        </div>
        <div class="mb-3 w-25 form-field-admin">
            <label for="exampleInputEmail" class="form-label">Страна производства</label>
            <input name="brand-country" type="text" class="form-control" id="exampleInputEmail" aria-describedby="emailHelp">
            <div id="emailHelp" class="form-text">*Где главный офис.</div>
        </div>
        <div class="mb-3 w-25 form-field-admin">
            <label for="exampleInputEmail" class="form-label">Продукция</label>
            <input name="brand-themes" type="text" class="form-control" id="exampleInputEmail" aria-describedby="emailHelp">
            <div id="emailHelp" class="form-text">*Список что производят еще.</div>
        </div>
        <hr class="hr-info">
        <div class="mb-3 w-25 form-field-admin">
            <label for="exampleInputEmail" class="form-label">Видео</label>
            <input name="brand-video" type="text" class="form-control" id="exampleInputEmail" aria-describedby="emailHelp">
            <div id="emailHelp" class="form-text">*Укажите ID YouTube видео.</div>
        </div>

        <div class="mb-3 w-25 form-field-admin">
            <label for="exampleInputEmail" class="form-label">Лого (512х512px)</label>
            <select name="brand-img" id="exampleInputEmail" class=" form-select form-select-lg" aria-label=".form-select-lg example">
<?php

foreach ($editor->scandir_img("../images/brands") as $img_brands=>$url_brands){
    ?>
    <option value="<?php echo $url_brands; ?>"><?php echo $url_brands; ?></option>
<?php } ?>
            </select>
        </div>
        <div class="mb-3 w-25 form-field-admin">
            <label for="exampleInputEmail" class="form-label">УРЛ страницы</label>
            <input name="url_brands" type="text" class="form-control" id="exampleInputEmail" aria-describedby="emailHelp">
            <div id="emailHelp" class="form-text">*Адрес страницы нового бренда.</div>
        </div>
<hr class="hr-info">
<h2 class="col-lg-12 text-center">История бренда</h2>
<div class="mb-3 w-100 form-field-admin">
    <label for="exampleInputEmail" class="form-label">История бренда. На 1-2т знаков</label>
    <textarea name="editor8" type="text" class="form-control" id="editor1" aria-describedby="emailHelp" ></textarea>
    <div id="emailHelp" class="form-text">*Основная информация о компании.</div>
</div>
<hr class="hr-info">
<h2 class="col-lg-12 text-center">Как найти ошибки и неисправности</h2>
<div class="mb-3 w-100 form-field-admin">
    <label for="exampleInputEmail" class="form-label">Чем искать ошибки. Где и т.д. На 1-2т знаков</label>
    <textarea name="editor9" type="text" class="form-control" id="editor2" aria-describedby="emailHelp"></textarea>
    <div id="emailHelp" class="form-text">*Основная информация о том где и как находить ошибку.</div>
</div>
        <div class="w-100">

            <button name="brand_add" type="submit" class="btn btn-primary">Обновить</button>

        </div>
    </div>
</form>
</div>
<?php } ?>
<?php if ($_GET['Option']=='Errors'){?>
    <div class="container">
        <div class="col-lg-12 text-center">
            <h2>Добавление страниц ошибок из Excel файла (XLSX )</h2>
            <p>Файл XLSX для загрузки формируется с учетом следующих столбцов:</p>
            <u>
                <li>Стобец <font color="blue">А</font> - Код ошибки</li>
                <li>Столбец <font color="green">B</font> - Категория (url)</li>
                <li>Столбец <font color="#8b008b">C</font> - Название категории</li>
                <li>Столбец <font color="#6495ed">D</font> - Расшифровка на РУССКОМ</li>
                <li>Столбец <font color="#daa520">E</font> - Оригинальная расшифровка. На английском</li>
                <li>Столбец <font color="#f08080">F</font> - Как сбросить ошибку.</li>
                <li>Столбец <font color="#8b0000">G</font> - Урл адрес. Заполнить через Excel</li>
            </u>
            <p>После загрузки файл автоматически будет отправлен в БД. На загрузку 500стр в среднем уходит около 2 мин. В зависимости от сервера.</p>
        </div>
        <hr class="hr-info">
        <div class="col-lg-12">
        <form method="post" name="form_excel" enctype="multipart/form-data">
            <input name="file_excel" type="file">
            <input type="submit" name="excel_input" value="Отправить Excel в БД">
            <hr class="hr-info">
            <?php

            if (($_FILES['file_excel']['type']!=="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet") && (($_POST['excel_input']!==true))){
                echo "Укажите файл XLSX для загрузки";
            } else{

            ?>

        </form>


        <?php
        require 'vendor/autoload.php';
        $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($_FILES['file_excel']['name']);

        $sheet = $spreadsheet->getActiveSheet();

        // Store data from the activeSheet to the varibale in the form of Array
        $data = array($sheet->toArray(null, true, true, true));
        //var_dump($data[0][1]['A']);
        ?>
            <form method="post" action="">
        <table id="mytable" class="table-error table table-bordered table-striped table-Secondary table-responsive">
            <thead>
            <tr>
                <th scope="col">Код ошибки</th>
                <th scope="col">Категория (url)</th>
                <th scope="col">Название категории</th>
                <th scope="col">На русском</th>
                <th scope="col">На английском</th>
                <th scope="col">Как сбросить</th>
                <th scope="col">Урл</th>
            </tr>
            </thead>
            <tbody>
            <?php
            for ($str_exel = 1; $str_exel <= count(($sheet->toArray(null, true, true, true))); $str_exel++) {?>
                <tr>
                    <td><?php echo $data[0][$str_exel]['A']?></td>
                    <td><?php echo $data[0][$str_exel]['B']?></td>
                    <td><?php echo $data[0][$str_exel]['C']?></td>
                    <td><?php echo $data[0][$str_exel]['D']?></td>
                    <td><?php echo $data[0][$str_exel]['E']?></td>
                    <td><?php echo $data[0][$str_exel]['F']?></td>
                    <td><?php echo $data[0][$str_exel]['A']."-".$data[0][$str_exel]['G']?></td>
                </tr>

            <?php
                if (isset($_POST['excel_input'])){
                    set_time_limit(300);
                    $add->get_add_errors($data[0][$str_exel]['D'],$data[0][$str_exel]['E'],$data[0][$str_exel]['F'],$data[0][$str_exel]['B'],$data[0][$str_exel]['C'],$data[0][$str_exel]['A'],$data[0][$str_exel]['A']."-".$data[0][$str_exel]['G']);
                }
            }
            ?>

            </tbody>
        </table>
        <?php

        } ?>
    </div>
        </form>
    </div>

<?php } ?>

<footer>
    <script>
        // Replace the <textarea id="editor1"> with a CKEditor 4
        // instance, using default configuration.
        CKEDITOR.replace( 'editor8' );
        CKEDITOR.replace( 'editor9' );
        CKEDITOR.replace( 'editor10' );
        CKEDITOR.replace( 'editor11' );
        CKEDITOR.replace( 'editor12' );
        CKEDITOR.replace( 'editor13' );
        CKEDITOR.replace( 'editor14' );
    </script>
    <script src="<?php echo INDEX;?>/js/jquery-3.5.1.min.js"></script>
    <script src="<?php echo INDEX;?>/js/popper.min.js"></script>
    <script src="<?php echo INDEX;?>/js/bootstrap.min.js"></script>
</footer>
</body>