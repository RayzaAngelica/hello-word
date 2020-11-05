<?php 
/*
Plugin Name: Test Plugin
Plugin URL: http://solodata.es
Description: Este es un plugin de pruebas
Version: 0.0.1
*/

function Activar (){
	global $wpdb;

	$sql ="CREATE TABLE IF NOT EXISTS {$wpdb->prefix}encuestas(
	
  		`EncuestaId` INT NOT NULL AUTO_INCREMENT,
  		`Nombre` VARCHAR(45) NULL,
  		`ShortCode` VARCHAR(45) NULL,
  		PRIMARY KEY (`EncuestaId`)	);";
	
	$wpdb->query($sql);

	$sql2= "CREATE TABLE IF NOT EXISTS {$wpdb->prefix}encuestas_detalle (
  		`DetalleId` INT NOT NULL AUTO_INCREMENT,
  		`EncuestaId` INT NULL,
  		`Pregunta` VARCHAR(145) NULL,
  		`Tipo` VARCHAR(45) NULL,
  		PRIMARY KEY (`DetalleId`));	";
  	$wpdb->query($sql2);


  	$sql3= "CREATE TABLE IF NOT EXISTS {$wpdb->prefix}encuestas_respuestas (
  		`RespuestaId` INT NOT NULL AUTO_INCREMENT,
  		`DetalleId` INT NULL,
  		`Respuesta` VARCHAR(45) NULL,
  		PRIMARY KEY (`RespuestaId`)); ";	
	$wpdb->query($sql3);
}

function Desactivar(){

	flush_rewrite_rules();
}

register_activation_hook(__FILE__,'Activar');
register_deactivation_hook(__FILE__,'Desactivar');
add_action('admin_menu','CrearMenu');

function CrearMenu(){
	add_menu_page(
		'SUPER ENCUENTAS TITULO',// Titulo de la pagina
		'Super Encuentas Menu',// Titulo del menu
		'manage_options',// Capability
		plugin_dir_path(__FILE__).'admin/lista_encuestas.php',// slug
		null,//function del contenido
		plugin_dir_url(__FILE__).'admin/img/icon.png', //icono
		'1' //priority
	);
}

function MostrarContenido(){

	echo "<h1>Contenido de la pagina</h1>";
}

//encolar bootstrap

function EncolarBootstrapJS($hook){
	//echo "<script>console.log('$hook')</script>";
	if($hook != "testplugin/admin/lista_encuestas.php"){
		return;
	}

	wp_enqueue_script('bootstrapJs',plugins_url('admin/bootstrap/js/bootstrap.min.js',__FILE__),array('jquery'));
}
add_action('admin_enqueue_scripts','EncolarBootstrapJS');


function EncolarBootstrapCSS($hook){
	if($hook != "testplugin/admin/lista_encuestas.php"){
		return;
	}

	wp_enqueue_style('bootstrapCSS',plugins_url('admin/bootstrap/css/bootstrap.min.css',__FILE__));
}
add_action('admin_enqueue_scripts','EncolarBootstrapCSS');

//encolar js propio

function EncolarJS($hook){
	if($hook != "testplugin/admin/lista_encuestas.php"){
		return;
	}

	wp_enqueue_script('JsExterno',plugins_url('admin/js/lista_encuestas.js',__FILE__),array('jquery'));
}
add_action('admin_enqueue_scripts','EncolarJS');