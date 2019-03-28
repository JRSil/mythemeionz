<?php
/**
 * @package WordPress
 * @subpackage Íonz
 */


/***
* CSS e JS
**/
function add_my_script() {
	//JS
	//wp_enqueue_script('main', get_template_directory_uri() . "/files/min/js/all.min.js",'','',true); 
	//CSS
	//wp_enqueue_style('menu', get_template_directory_uri() . "/files/min/css/main.css");
}   
add_action( 'wp_enqueue_scripts', 'add_my_script' );




/***
* Tipos de Conteúdo
**/
add_action( 'init', 'create_post_type' );
function create_post_type() {
	
	register_post_type( 'projeto',
	    array(
	      'labels' => array(
	        'name' => __( 'Projeto' ),
	        'singular_name' => __( 'projeto' ),
	        'menu_name' => __( 'Projetos' )
	      ),
	      'public' => true,
	      'has_archive' => false,
	      'supports' => array('title','editor')
	    )
	);


 }

/***
* Categorias
**/
add_action( 'init', 'create_taxonomies' );
function create_taxonomies() {
	
	register_taxonomy('categoria_projeto',
		array('projeto'),
		array(
			'label' => __('Categoria projeto'),
			'labels' =>  array('menu_name' => __( 'Categorias' )),
			'rewrite' => array( 'slug' => 'categoria_projeto' ),
			'hierarchical' => true,
			'show_ui' => true,
			'show_in_menu' => true,
			'show_in_admin_bar'   => true,
			'show_in_nav_menus' => true,
			'public' =>true,
		)
	);

}


/***
* Menu do site
**/
register_nav_menu('main-menu', 'Main Menu');

// Register Custom Navigation Walker
require_once('services/wp_bootstrap_navwalker.php');

//menu principal 
function mainMenu(){
	$args = array( 
		'menu'              => 'main-menu',
	    'container'         => false,
	    'container_class'   => false,
	    'container_id'      => false,
	    'menu_class'        => '',
		'menu_id'           => 'main-menu-ul',
	    'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
	    'walker'            => new wp_bootstrap_navwalker()
	);
  	wp_nav_menu($args);
}

function getForm($string){
        
    $returnVars = array();

    //verifica se existe alguma variavel configurada
    if(strstr($string, '[formidable id=')) {

        preg_match_all("#\[formidable id=(.*)\]#i", $string, $results);

        if(count($results)==2){
        	$htmlForm = FrmFormsController::show_form($results[1][0], $key = false, $title=false, $description=true);
        	$string = str_replace($results[0], $htmlForm, $string);
        }

    }
  	
  	return $string;
}