<?php
defined('ABSPATH') or die("No script kiddies please!");

class SBModalAssets {
	public function __construct() {
		add_action('wp_enqueue_scripts', array($this, 'register_frontend_assets'));
	}
	
	public function getAssetsUrl() {
		return SBMODAL_URL . 'assets/';
	}
	
	public function register_frontend_assets() {
		wp_enqueue_script('jquery');

		if ( SBModalOptions::get('sbmodal_bootstrapjs') ) {
			wp_enqueue_script('bootstrap', $this->getAssetsUrl() . 'vendors/javascripts/bootstrap.min.js', array('jquery'), '3.3.6', true);
		}
		
		switch ( SBModalOptions::get('sbmodal_bootstrapcss') ) {
			case 'full':
				wp_enqueue_style('bootstrap',  $this->getAssetsUrl() . 'stylesheets/bootstrap.css', null, '3.3.6');
				break;
			case 'modal':
				wp_enqueue_style('bootstrap.modal',  $this->getAssetsUrl() . 'stylesheets/bootstrap.modal.css', null, '3.3.6');
				break;
			case 'none':
				break;
		}

		wp_enqueue_style('sbmodal_front',  $this->getAssetsUrl() . 'stylesheets/front.css');
	}
}