<?php

/*
Plugin Name: Devolucion Plugin
Plugin URI: http://devoluciondatos.es
Description: Este es un plugin para las devoluciones de ventas
Version: 0.0.1
*/

function Activar(){
	global $wpdb;

	$sql ="CREATE TABLE IF NOT EXISTS {$wpdb->prefix}productos(
	
  		`ProductoId` INT NOT NULL AUTO_INCREMENT,
  		`NombreProducto` VARCHAR(45) NULL,
  		`Precio` FLOAT NULL,
  		`Stock` INT NULL,
  		PRIMARY KEY (`ProductoId`));";

	
	$wpdb->query($sql);

	$sql2= "CREATE TABLE IF NOT EXISTS {$wpdb->prefix}venta (
  		
  		`VentaId` INT NOT NULL AUTO_INCREMENT,
  		`NombreCliente` VARCHAR(45) NULL,
  		`ProductoId` INT NULL,
  		`Total` FLOAT NULL,
  		PRIMARY KEY (`VentaId`));";

  	$wpdb->query($sql2);


}
function Desactivar(){
	flush_rewrite_rules();
}


register_activation_hook(__FILE__,'Activar');
register_deactivation_hook(__FILE__,'Desactivar');

add_action('admin_menu','CrearMenu');

function CrearMenu(){
	add_menu_page(
		'DEVOLUCION VENTA',// Titulo de la pagina
		'Devolucion Venta',// Titulo del menu
		'manage_options',// Capability
		plugin_dir_path(__FILE__).'admin/lista_ventas.php',// slug
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
	if($hook != "devolucionplugin/admin/lista_ventas.php"){
		return;
	}

	wp_enqueue_script('bootstrapJs',plugins_url('admin/bootstrap/js/bootstrap.min.js',__FILE__),array('jquery'));
}
add_action('admin_enqueue_scripts','EncolarBootstrapJS');


function EncolarBootstrapCSS($hook){
	if($hook != "devolucionplugin/admin/lista_ventas.php"){
		return;
	}

	wp_enqueue_style('bootstrapCSS',plugins_url('admin/bootstrap/css/bootstrap.min.css',__FILE__));
}
add_action('admin_enqueue_scripts','EncolarBootstrapCSS');

//encolar js propio

function EncolarJS($hook){
	if($hook != "devolucionplugin/admin/lista_ventas.php"){
		return;
	}

	wp_enqueue_script('JsExterno',plugins_url('admin/js/lista_ventas.js.js',__FILE__),array('jquery'));
}
add_action('admin_enqueue_scripts','EncolarJS');