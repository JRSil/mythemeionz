<?php
/**
 * Template Name: Projeto
 * 
 * @package WordPress
 * @subpackage Íonz
 */

$post = get_post();

$title = get_field("title_home");
$subtitle = get_field("subtitle_home");
$category = get_field("categoria");
$catcolor = get_field("category_color");

$bgcolor = get_field("background_color");
$imgbanner = get_field("imagem_banner");
$logocliente = get_field("logo_cliente");

$url = get_home_url();

$next_post_url = get_permalink( get_adjacent_post(false,'',false)->ID );
$previous_post_url = get_permalink( get_adjacent_post(false,'',true)->ID );

get_header();
?> 

<style>
    body{
        padding-top:0px;
    }
</style>

<div class="container-fluid single-proj padding-none">
    <header class="banner" style="background:<?php echo $bgcolor ?> url('<?php echo $imgbanner ?>') center center no-repeat;">
        <img class="logo-interna" src="<?php echo $logocliente; ?>" alt="<?php echo $title; ?>">
        <div class="grade-nav">
            <a href="<?php echo $previous_post_url; ?>">
                <div class="esquerda txt-hover">
                    <p>Trabalho<br/>anterior</p>
                </div>
                <div class="esquerda item-nav">
                    <img src="<?php echo $url; ?>/wp-content/uploads/2018/10/prev_proj.png" alt="Trabalho Anterior">
                </div>
            </a>
            <a href="<?php echo $url ?>/projetos">
                <div class="centro txt-hover">
                    <p>Trabalhos</p>
                    <div>
                        <img src="<?php echo $url; ?>/wp-content/uploads/2018/10/cases.png" alt="Trabalhos">
                    </div>
                </div>
            </a>
            <a href="<?php echo $next_post_url; ?>">
                <div class="direita txt-hover">
                    <p>Próximo<br/>trabalho</p>
                </div>
                <div class="direita item-nav">
                    <img src="<?php echo $url; ?>/wp-content/uploads/2018/10/next_proj.png" alt="Próximo Trabalho">
                </div>
            </a>
        </div>
    </header>

    <section class="bloco-projeto">
        <?php 
            foreach(get_field('conteudo') as $conteudo){
                echo $conteudo['html'];
            } 
        ?>
    </section>

    <section class="container veja-tambem">
        <div class="row">
            <div class="col-xs-12 txt-veja-tambem">
                <h3>Veja também</h3>
                <span class="glyphicon glyphicon-chevron-down" aria-hidden="true"></span>
            </div>
        </div>
        <div class="row">
            <div class="grade-relacionado">
            <?php 
                foreach(get_field('relacionados') as $relacionado){
                    $title = get_field("title_home", $relacionado['projeto']->ID);
                    $subtitle = get_field("subtitle_home", $relacionado['projeto']->ID);
                    $bgcolor = get_field("background_color", $relacionado['projeto']->ID);
                    $category = get_field("categoria", $relacionado['projeto']->ID);
                    $catcolor = get_field("category_color", $relacionado['projeto']->ID);
                    $img = get_field("imagem_home", $relacionado['projeto']->ID);
                    $saibamais = get_field("saiba_mais", $relacionado['projeto']->ID);

                    $url = get_post_permalink($relacionado['projeto']->ID);

                    $last = get_field("ultimo_trabalho", $relacionado['projeto']->ID);

                    $mostraCategoria = ($last == 0) ? $category : "<p>Último trabalho</p>";

                    echo '<div class="proj-relacionado '.$title.'" style="background: '.$bgcolor.' url(\''.$img.'\') center center no-repeat">';
                        echo "<a href=".$url." style=\"color: ".$catcolor."\">".$mostraCategoria."</a>";
                        echo "<h3><a href=".$url.">".$title."</a></h3>";
                        echo "<h4><a href=".$url.">".$subtitle."</a></h4>";
                        echo "<a href=".$url." class=\"saiba-mais\" style=\"color: ".$catcolor."\">".$saibamais."</a>";
                    echo '</div>';
                } 
            ?>
            </div>
        </div>
        <div class="row">
            <a href="<?php echo $url ?>/projetos">
                <div class="centro txt-hover">
                    <p>Trabalhos</p>
                    <div>
                        <img src="<?php echo get_home_url(); ?>/wp-content/uploads/2018/10/cases.png" alt="Trabalhos">
                    </div>
                </div>
            </a>
        </div>
    </section>

    <section class="form-contato">
        <div class="container relative">
            <img src="<?php echo get_home_url(); ?>/wp-content/uploads/2018/10/form-sobre-nos.png" class="img-responsive chat-icon" />
            <div class="row">
                <div class="col-xs-12">
                    <?php echo getForm(get_field('form_html')); ?>
                </div>
            </div>
        </div>
    </section>
</div>

<?php get_footer(); ?>