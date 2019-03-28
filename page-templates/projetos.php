<?php
/**
 * Template Name: Projetos
 *
 * @package WordPress
 * @subpackage Íonz
 */

get_header();
?> 

<div class="container projetos">
    <a href="<?php echo get_home_url() ?>">
        <img src="http://localhost/novoionz/wp-content/uploads/2018/10/logo-ionz-projetos.png" alt="Íonz" class="logo-projetos" />
    </a>

    <div class="row campo-select">
        <div class="col-xs-12 col-sm-4 filtro">
            <select id="clientes">
                <option value="" selected>Clientes</option>
                <?php
                    $clientes = array();
                    foreach(get_field('blocos') as $key => $bloco){
                        $clientes[$key] = get_field("title_home", $bloco['projeto']->ID);
                    }
                    $clientesFiltrado = array_unique($clientes);
                    foreach($clientesFiltrado as $key => $val){
                        echo '<option value="'.$val.'">'.$val.'</option>';
                    }
                ?>
            </select>
        </div>
        <div class="col-xs-12 col-sm-4 filtro">
            <select id="projetos">
                <option value="" selected>Projetos</option>
                <?php
                    $projetos = array();
                    foreach(get_field('blocos') as $key => $bloco){
                        $projetos[$key] = get_field("categoria", $bloco['projeto']->ID);
                        $projetos[$key] = str_replace("<p>", "", $projetos[$key]);
                        $projetos[$key] = str_replace("</p>", "", $projetos[$key]);
                    }
                    $projetosFiltrado = array_unique($projetos);
                    foreach($projetosFiltrado as $key => $val){
                        $valClass = str_replace(" ", "_", $val);
                        $valClass = str_replace("?", "", $valClass);
                        echo '<option value="'.str_replace("#", "", $valClass).'">'.$val.'</option>';
                    }
                ?>
            </select>
        </div>
        <div class="col-xs-12 col-sm-4 filtro">
            <input type="text" placeholder="O que busca?" /><button class="glyphicon glyphicon-search"></button>
        </div>
    </div>

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
                    $categoryClass = str_replace(" ", "_", $category);

                    $catcolor = get_field("category_color", $bloco['projeto']->ID);
                    $img = get_field("imagem_home", $bloco['projeto']->ID);
                    $saibamais = get_field("saiba_mais", $bloco['projeto']->ID);

                    $htmlMarca = get_field("html_marca", $bloco['projeto']->ID);

                    $url = get_post_permalink($bloco['projeto']->ID);

                    echo '<div class="project '.$title.'">';
                        echo '<div class="project-box">';
                            if($layout == 0){
                                echo "<div class=\"box-txt\">";
                                    echo "<a href=".$url." style=\"color: ".$catcolor."\" class=\"categoria ".str_replace("#", "", $categoryClass)."\">".$category."</a>";
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
                                echo "<div class=\"grade-img-home\">";
                                    echo "<a href=".$url.">";
                                        echo "<img class=\"main-img-box\" src=".$img." alt=".$title." style=\"background-color:".$bgcolor.";\" />";
                                    echo "</a>";
                                echo "</div>";
                                echo "<div class=\"box-txt-2\">";
                                    echo "<a href=".$url." style=\"color: ".$catcolor."\" class=\"categoria ".str_replace("#", "", $categoryClass)."\">".$category."</a>";
                                    echo "<h3><a href=".$url.">".$title."</a></h3>";
                                    echo "<h4><a href=".$url.">".$subtitle."</a></h4>";
                                    echo "<a href=".$url." class=\"saiba-mais\" style=\"color: ".$catcolor."\">".$saibamais."</a>";
                                echo "</div>";
                            }
                        echo '</div>';
                        echo $htmlMarca;
                    echo '</div>';
                }
            }
        ?>
    </div>
</div>

<?php get_footer(); ?>