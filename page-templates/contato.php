<?php
/**
 * Template Name: Contato
 *
 * @package WordPress
 * @subpackage Íonz
 */

get_header();
?> 

<div class="container-fluid contato padding-none">
    <header>
        <a href="<?php echo get_home_url() ?>">
            <img src="<?php echo get_home_url() ?>/wp-content/uploads/2018/10/logo-ionz-contato.png" alt="Íonz" class="img-responsive logo-contato" />
        </a>
    </header>
    
    <section class="contato-form">
        <div class="container relative">
            <div class="row">
                <div class="col-xs-10 col-sm-5 txt-contato relative">
                    <h3>Oi!</h3>
                    <h4>vamos bater<br/>um papo?</h4>
                    <img src="<?php echo get_home_url() ?>/wp-content/uploads/2018/10/form-contato.png" alt="Íonz" class="img-responsive" />
                    <p>contato@ionz.com.br</p>
                    <p>(11) 2184.8140</p>
                </div>
                <div class="col-xs-10 col-sm-5 box-contato-form">
                <?php 
                    echo getForm(get_field('form_html'));
                ?>
                </div>
            </div>
        </div>
    </section>

    <section class="localizacao">
        <div class="container relative">
            <div class="row">
                <div class="col-xs-10 col-sm-5 txt-localizacao">
                    <h3>
                        <strong>Onde</strong><br>
                        estamos
                    </h3>
                    <p>Rua George Ohm, 230</p>
                    <p>Torre A • Conj. 21 e 22</p>
                    <p>Brooklin • São Paulo - SP</p>
                    <p>04576-020</p>
                </div>
                <div class="col-xs-10 col-sm-5 box-maps relative">
                    <img src="<?php echo get_home_url() ?>/wp-content/uploads/2018/10/localizacao.png" alt="Íonz" class="img-responsive" />
                    <a href="https://goo.gl/maps/m2vFxh8vVBt" target="_blank">Abrir mapa <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span></a>
                </div>
            </div>
        </div>
    </section>

    <footer>
        <a href="<?php echo get_home_url() ?>">
            <img src="<?php echo get_home_url() ?>/wp-content/uploads/2018/10/logo-ionz-menor.png" alt="Íonz" class="img-responsive" />
        </a>
        <p>© 2019 Íonz</p>
    </footer>
</div>
<script async="async" src="<?php echo get_template_directory_uri(); ?>/files/js/all.min.js"></script>
<script src="https://unpkg.com/scrollreveal"></script>
<?php wp_footer(); ?>
</body>
</html>