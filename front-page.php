<?php
/**
 * Template Name: Home
 *
 * @package WordPress
 * @subpackage Íonz
 */
get_header(); ?>

<div class="container home">
    <div class="grade">
        <?php 
            //print_r(get_field('blocos'));
            foreach(get_field('blocos') as $bloco){
                if($bloco['projeto']){
                    $layout = get_field("layout", $bloco['projeto']->ID);
                    $title = get_field("title_home", $bloco['projeto']->ID);
                    $subtitle = get_field("subtitle_home", $bloco['projeto']->ID);
                    $bgcolor = get_field("background_color", $bloco['projeto']->ID);

                    $category = get_field("categoria", $bloco['projeto']->ID);
                    $category = str_replace("<p>", "", $category);
                    $category = str_replace("</p>", "", $category);

                    $catcolor = get_field("category_color", $bloco['projeto']->ID);
                    $img = get_field("imagem_home", $bloco['projeto']->ID);
                    $saibamais = get_field("saiba_mais", $bloco['projeto']->ID);

                    $htmlMarca = get_field("html_marca", $bloco['projeto']->ID);

                    $url = get_post_permalink($bloco['projeto']->ID);

                    $last = get_field("ultimo_trabalho", $bloco['projeto']->ID);

                    $mostraCategoria = ($last == 0) ? $category : "Último trabalho";

                    echo '<div class="project '.$title.'">';
                        echo '<div class="project-box">';
                            if($layout == 0){
                                echo "<div class=\"box-txt\">";
                                    echo "<a href=".$url." style=\"color: ".$catcolor."\" class=\"categoria\">".$mostraCategoria."</a>";
                                    echo "<h3><a href=".$url.">".$title."</a></h3>";
                                    echo "<h4><a href=".$url.">".$subtitle."</a></h4>";
                                    echo "<a href=".$url." class=\"saiba-mais\" style=\"color: ".$catcolor."\">".$saibamais."</a>";
                                echo "</div>";
                                echo "<div class=\"grade-img-home\">";
                                    echo "<a href=".$url.">";
                                        echo "<img class=\"main-img-box\" src=".$img." alt=".$title." style=\"background-color:".$bgcolor.";\" />";
                                    echo "</a>";
                                echo "</div>";
                            }else{
                                echo "<div class='grade-img-home'><a href=".$url.">";
                                    echo "<img class=\"main-img-box\" src=".$img." alt=".$title." style=\"background-color:".$bgcolor.";\" />";
                                echo "</a></div>";
                                echo "<div class=\"box-txt-2\">";
                                    echo "<a href=".$url." style=\"color: ".$catcolor."\" class=\"categoria\">".$category."</a>";
                                    echo "<h3><a href=".$url.">".$title."</a></h3>";
                                    echo "<h4><a href=".$url.">".$subtitle."</a></h4>";
                                    echo "<a href=".$url." class=\"saiba-mais\" style=\"color: ".$catcolor."\">".$saibamais."</a>";
                                echo "</div>";
                            }
                        echo '</div>';
                        echo $htmlMarca;
                    echo '</div>';
                }else{
                    echo '<div class="forms">';
                        echo getForm($bloco['html']);
                    echo '</div>';
                }
            }
        ?>
    </div>
</div>

<?php get_footer(); ?>