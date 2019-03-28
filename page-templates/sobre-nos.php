<?php
/**
 * Template Name: Sobre Nós
 *
 * @package WordPress
 * @subpackage Íonz
 */

get_header();
?> 
<style>
    body{
        padding-top:0px;
    }
</style>

<div class="container-fluid sobre-nos padding-none">
    <header class="banner-sobre">
        <div class="container">
            <a href="<?php echo get_home_url() ?>">
                <img src="<?php echo get_home_url() ?>/wp-content/uploads/2018/10/logo-ionz-sobre-nos.png" alt="Íonz" class="img-responsive logo-sobre" />
            </a>
            <h3>
                Acreditamos que a comunicação digital<br/>
                <strong>não se limita às redes sociais</strong>
            </h3>
            <img src="<?php echo get_home_url() ?>/wp-content/uploads/2018/10/graf-sobre.png" class="graf-sobre" />
        </div>
    </header>
    <section class="marcas">
        <div class="container">
            <h4>
                Já ajudamos essas marcas<br/>
                <strong>a ter resultados</strong>
            </h4>

            <div class="centraliza">

            <?php
                foreach(get_field('marcas') as $marca){
            ?>
                <div class="grid">
                    <img class="img-responsive logomarca" src="<?php echo $marca['logos']; ?>" />
                </div>
            <?php
                }
            ?>

            </div>

            <a href="<?php echo get_home_url() ?>/projetos">
                Veja alguns cases<br/>
                <span>...</span>
            </a>
        </div>
    </section>
    <section class="solucoes">
        <div class="container relative">
            <h4>
                Agora queremos ver<br/>
                <strong>sua empresa em destaque</strong>
            </h4>
            <h5>Temos várias soluções para sua marca</h5>

            <div class="conversar">
                <p>Vamos conversar</p>
                <span class="glyphicon glyphicon-chevron-down" aria-hidden="true"></span>
            </div>

            <img src="<?php echo get_home_url() ?>/wp-content/uploads/2018/10/Ilustra_sobre.png" class="img-responsive" />
        </div>
    </section>
    <section class="form-sobre">
        <div class="container relative">
            <img src="<?php echo get_home_url() ?>/wp-content/uploads/2018/10/form-sobre-nos.png" class="img-responsive chat-icon" />
            <div class="row">
            <?php 
                echo '<div class="col-xs-12 col-md-6 box-form-sobre">';
                    echo getForm(get_field('form_html'));
                echo '</div>';
            ?>
            </div>
        </div>
    </section>
</div>

<?php get_footer(); ?>