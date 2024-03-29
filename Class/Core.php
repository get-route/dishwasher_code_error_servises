<?php
require_once "Admin/Config/config.php";
abstract class Core
{
    protected $db;
    public $footer_brands;
    public $footer_model;
    public $footer_errors;
    public $adv_blok;
    public $adv_bloks;
    protected $num_brands;
    protected $num_models;
    protected $num_errors;
    protected $num_comments;


    public function __construct()
    {
        try {
            $this->db = new PDO("mysql:host=localhost;dbname=" . DBNAME, USER, PASS);
        } catch (PDOException $e) {
            die('Подключение не удалось: ' . $e->getMessage());
        }
    }
    //Количество брендов
    public function get_num_brands(){
        $this->num_brands=$this->db->query("SELECT id FROM brands");
        return $this->num_brands->rowCount();
    }
    //Количество брендов
    public function get_num_models(){
        $this->num_models=$this->db->query("SELECT id FROM models");
        return $this->num_models->rowCount();
    }
    //Количество брендов
    public function get_num_errors(){
        $this->num_errors=$this->db->query("SELECT id_error FROM errors");
        return $this->num_errors->rowCount();
    }
    //Количество брендов
    public function get_num_comments(){
        $this->num_comments=$this->db->query("SELECT id FROM comments");
        return $this->num_comments->rowCount();
    }
    //Получаем данные по рекламным блокам из БД
    public function get_adv_content(){
        $this->adv_blok=$this->db->prepare("SELECT * FROM adv_code");
        $this->adv_blok->execute();
        $this->adv_bloks=$this->adv_blok->fetchAll(PDO::FETCH_ASSOC);
        return $this->adv_bloks;
    }
    //Получаем бренды для футера
    protected function get_rand_footer_brand(){
        $this->footer_brands=$this->db->query("SELECT img_brands,url_brands,brand_name FROM brands WHERE `public`='yes' ORDER BY RAND() LIMIT 2 ");
        return $this->footer_brands;
}
//Случайные модели для футера
    protected function get_rand_footer_model($brand_yes){
        $this->footer_model=$this->db->prepare("SELECT img_model1,altimg_model1,uniq_lable,url_models,brand_category FROM models WHERE `public_model`='yes' AND `brand_category`=:brand_yes ORDER BY RAND() LIMIT 9");
        $this->footer_model->execute(array('brand_yes'=>$brand_yes));
        return $this->footer_model;
    }
    //Случайные ошибки для футера
    protected function get_rand_footer_error(){
        $this->footer_errors=$this->db->query("SELECT categ_error,code_error,url_errors FROM errors ORDER BY RAND() LIMIT 8");
        return $this->footer_errors;
    }

//Заголовок страницы с меню и плюшками
    public function get_header()
    {
        ?>
        <header>
            <div class="container">
                <nav class="navbar navbar-expand-lg navbar-light ">
                   <?php if ($_SERVER['REQUEST_URI']!=="/"){ ?>
                    <a class="navbar-brand" href="<?php echo INDEX ?>">
                           <img src="/images/config/logo.webp" alt="Коды ошибок авто" width="100" height="100">Ҏosudoᛖoyky.ru</a><?php  } else {?>
                       <p class="navbar-brand" href="">
                           <img src="/images/config/logo.webp" alt="Коды ошибок посудомоечных машин" width="100" height="100">Ҏosudoᛖoyky.ru</p>
                   <?php } ?>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo"
                            aria-controls="navbarTogglerDemo" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarTogglerDemo">
                        <ul class="navbar-nav justify-content-center w-100">
                            <?php
                            $nav = "SELECT * FROM brands WHERE `public` ='yes'";
                            $navigate = $this->db->query($nav);
                            ?>

                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button"
                                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Бренды
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <?php
                                    foreach ($navigate as $navigate_menu) { ?>
                                        <div class="dropdown-divider"></div>
                                        <a class="nav-link active" aria-current="page"
                                           href="<?php echo INDEX . "/" . $navigate_menu['url_brands'] ?>"><?php echo $navigate_menu['brand_name'] ?></a>
                                        <div class="dropdown-divider"></div>
                                    <?php } ?>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php INDEX ?>/#otzyv">Отзывы</a>
                            </li>
                        </ul>
                    </div>

                </nav>
            </div>
        </header>
    <?php }

//Футер
    public function get_footer()
    {?>
<div class="col-lg-12">
    <div class="row">

        <div class= "col-lg-4 text-center">
            <h4>Бренды:</h4>
            <?php
            if (!empty($this->get_rand_footer_brand()))
            {

            foreach ($this->get_rand_footer_brand() as $rand_brand){
            ?>
                <div class="col-lg-12 ">
                    <a target="_blank" href="<?php echo INDEX."/".$rand_brand['url_brands']?>"><img class="footer_img" src="<?php echo INDEX."/images/brands/".$rand_brand['img_brands']?>">
                    <h4><?php echo $rand_brand['brand_name']?></h4></a>
                </div>
                <?php }  }?>
        </div>
        <div class="col-lg-4 text-center">
            <h4>Наши соц.сети:</h4>
            <noindex><a target="_blank" href="https://vk.com/posuda_errors"><img src="/images/config/vk-footer.webp" width="100" height="100"></a>
            </noindex>
        </div>
        <div class="col-lg-4 text-center">
            <h4>Последние коды ошибок:</h4>
                        <?php
            if (!empty($this->get_rand_footer_error()))
            {                 foreach ($this->get_rand_footer_error() as $rand_error){
                            ?>
            <div class="col-lg-12">
               <h4><?php echo $rand_error['code_error']?></h4>
            </div>
            <?php }} ?>
        </div>
        <div class="col-lg-12 text-center">
            <p>Материалы сайта носят информационный характер. Просьба оставлять ссылку на исходник при копировании.</p>
        </div>
        <div class="col-lg-12 text-center">
            <?php
            //Коды счетчиков
            echo $this->adv_bloks[0]['footer_advcode'];
            ?>
        </div>
    </div>
    </div>
    <script src="<?php echo INDEX;?>/js/jquery-3.5.1.min.js"></script>
    <script src="<?php echo INDEX;?>/js/popper.min.js"></script>
    <script src="<?php echo INDEX;?>/js/bootstrap.min.js"></script>
    <?php }

    public function get_body()
    {
        $this->get_header();
    }


}