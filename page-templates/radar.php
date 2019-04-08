<?php
/**
 * Template Name: Radar
 *
 * @package WordPress
 * @subpackage Íonz
 */

get_header();
?> 

<div class="container-fluid radar padding-none">
    <header>
        <a href="<?php echo get_home_url() ?>">
            <img src="<?php echo get_home_url() ?>/wp-content/uploads/2019/04/logo-ionz-radar.png" alt="Íonz" class="img-responsive logo-contato" />
        </a>
    </header>

    <section class="chamada">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-12 box-cham">
                    <h3 class="txt-radar relative">
                        Radar<br/><span>Digital</span>
                        <img src="<?php echo get_home_url() ?>/wp-content/uploads/2019/04/graf-radar-logo.png" class="graf-cham" />
                    </h3>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna.
                    </p>
                </div>
                <div class="col-md-6 col-sm-12 box-cham">
                    <img src="<?php echo get_home_url() ?>/wp-content/uploads/2019/04/radar_pg.png" class="img-radar" />
                </div>
            </div>
        </div>
    </section>

    <section class="form-contato">
        <div class="container relative">
            <div class="row">
                <div class="col-xs-6 box-form">
                    <h4>Receba sobre o mercado,<br/>
                    o consumidor e digital!</h4>
                </div>

                <div class="col-xs-6 box-form">
                    <?php echo getForm(get_field('form_html')); ?>
                </div>
            </div>
        </div>
    </section>

    <section class="downloads">
        <div class="container relative">
            <?php 
                foreach(get_field('radar_pdf') as $radar){ 
                    // print_r($radar['arquivo']);
                    if($radar['data'] && $radar['arquivo']){
                        $data = $radar['data'];
                        $arquivo = $radar['arquivo'];

                        echo '<div class="row relative">';
                            echo '<div class="col-xs-9 data">';
                                echo '<img src="'.get_home_url().'/wp-content/uploads/2019/04/graf-radar-left.png" class="graf-esq" />';
                                echo '<p class="upper">'.$data.'</p>';
                            echo '</div>';
                            echo '<a href="'.$arquivo.'">';
                                echo '<div class="col-xs-3 arquivo">';
                                    echo '<img src="'.get_home_url().'/wp-content/uploads/2019/04/graf-radar-right.png" class="graf-dir" />';
                                    echo '<img src="'.get_home_url().'/wp-content/uploads/2019/04/icon_downloads.png" class="img-responsive" />';
                                echo '</div>';
                            echo '</a>';
                        echo '</div>';
                    }
                }
            ?>
        </div>
    </section>
</div>

<?php get_footer(); ?>