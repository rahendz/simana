<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Ained
 *
 * Theme library for Codeigniter
 *
 * @author		Wahyu Kristianto (w.kristoies@gmail.com)
 * @copyright	Copyright (c) 2012, Wahyu Kristianto
 * @license		http://creativecommons.org/licenses/by-sa/3.0/deed.en_US
 * @link		http://uzaklab.com
 * @version		Version 0.0.1
 */
 
class Theme
{
	protected $_ci;
	protected $_config;
	
	protected $_theme		= 'default';
	protected $_layout		= 'index';
	protected $_block		= NULL;
	protected $_data		= array();
	
	public function __construct()
	{
		$this->_ci =& get_instance();
		$this->_ci->load->add_package_path(APPPATH . 'third_party/Theme/');
		$this->_ci->config->load('theme');
		$this->_ci->load->library('assets');
		
		$this->_config = config_item('theme');
	}
	
	/*
	|--------------------------------------------------------------------------
	| View
	|--------------------------------------------------------------------------
	*/
	public function view($input)
	{
		$this->_initialize();

		// Partial
		if(count($this->_block) > 0)
		{
			extract($this->_data);
			foreach($this->_block as $key => $val)
			{
				ob_start();
				include($val);
				$block = ob_get_contents();
				ob_end_clean();
				$this->_data[$key] = $block;
			}
		}
		
		// View
        $view = $this->_ci->load->view($input, $this->_data, TRUE);

		// Data
		$this->_data['content'] = $view;

		// Layout
		extract($this->_data);
		ob_start();
        include($this->_config['path'].'/'.$this->_config['theme'].'/'.$this->_config['layout'].EXT);
        $output = ob_get_contents();
        ob_end_clean();
		
		$this->_ci->output->set_output($output);
	}
	
	/*
	|--------------------------------------------------------------------------
	| Set Theme
	|--------------------------------------------------------------------------
	*/
	public function set_theme($input = NULL)
	{
		$this->_theme = $input;
		return $this;
	}
	
	/*
	|--------------------------------------------------------------------------
	| Set Layout
	|--------------------------------------------------------------------------
	*/
	public function set_layout($input = NULL)
	{
		$this->_layout = $input;
		return $this;
	}
	
	/*
	|--------------------------------------------------------------------------
	| Set
	|--------------------------------------------------------------------------
	*/
	public function set($var = NULL, $input = NULL)
	{
		$this->_data[$var] = $input;
		return $this;
	}
	
	/*
	|--------------------------------------------------------------------------
	| Block
	|--------------------------------------------------------------------------
	*/
	public function block($var = NULL, $input = NULL)
	{
		if($input)
		{
			$block = NULL;
			
			if(file_exists(APPPATH.'views/'.$input.EXT))
			{
				$block = APPPATH.'views/'.$input.EXT;
			}
			elseif(file_exists($this->_config['path'].'/'.$this->_config['theme'].'/blocks/'.$input.EXT))
			{
				$block = $this->_config['path'].'/'.$this->_config['theme'].'/blocks/'.$input.EXT;
			}
			
			$this->_block[$var] = $block;
		}
		
		return $this;
	}
	
	/*
	|--------------------------------------------------------------------------
	| CSS
	|--------------------------------------------------------------------------
	*/
	public function css($input = array(), $output = 'css.css')
	{
		$css = $this->_ci->assets->css($input, $output);
		return $css;
	}
	
	/*
	|--------------------------------------------------------------------------
	| JS
	|--------------------------------------------------------------------------
	*/
	public function js($input = array(), $output = 'js.js')
	{
		$js = $this->_ci->assets->js($input, $output);
		return $js;
	}
	
	/*
	|--------------------------------------------------------------------------
	| Initialize
	|--------------------------------------------------------------------------
	*/
	public function _initialize()
	{
		// Theme
		$this->_theme = $this->_theme ? $this->_theme : $this->_config['theme'];
		$this->_layout = $this->_layout ? $this->_layout : $this->_config['layout'];
		return $this;
	}
}