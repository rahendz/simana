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
 
class Assets
{
	protected $_ci;
	protected $_config;
	protected $_theme_url;
	protected $_cache_file;
	protected $_css_path;
	protected $_js_path;
	protected $_img_path;
	protected $_cache_path;
	
	public function __construct()
	{
		$this->_ci =& get_instance();
		$this->_ci->load->library(array('vendor/lessc'));
		$this->_ci->load->helper(array('file', 'url', 'date'));
		
		include(__DIR__ . '/vendor/jsmin.php');
		
		$this->_config 		= config_item('theme');
		$theme 				= $this->_config['path'].'/'.$this->_config['theme'].'/';
		
		$this->_theme_url 	= site_url($this->_config['path'].'/'.$this->_config['theme']).'/';
		$this->_theme_url 	= str_replace('index.php/', '', $this->_theme_url);
		$this->_css_path 	= $theme.$this->_config['css'].'/';
		$this->_js_path 	= $theme.$this->_config['js'].'/';
		$this->_img_path 	= $theme.$this->_config['img'].'/';
		$this->_cache_path 	= $theme.$this->_config['cache'].'/';
		
		if(!class_exists('cache'))
		{
			$this->_ci->load->library('cache');
		}
		
		$this->_cache_file 	= $this->_ci->cache->get('theme_assets');
	}
	
	/*
	|--------------------------------------------------------------------------
	| CSS
	|--------------------------------------------------------------------------
	*/
	public function css($input = NULL, $output = NULL)
	{
		// Cache
		$cache = isset($this->_cache_file['css']) ? $this->_cache_file['css'] : NULL;
		
		// No cache?
		if(!$cache)
		{
			$this->_generate('css', $input, $output);	
		}
		
		// No CSS?
		if(!read_file($this->_cache_path.$output))
		{
			$this->_generate('css', $input, $output);
		}
		
		// Files?
		if($cache['files'] != $input)
		{
			$this->_generate('css', $input, $output);	
		}
		
		// Update?
		foreach($input as $in)
		{
			if(filemtime($this->_css_path.$in) > $cache['last_activity'])
			{
				$this->_generate('css', $input, $output);	
				break;
			}
		}

		return $this->_theme_url.$this->_config['cache'].'/'.$output;
	}
	
	/*
	|--------------------------------------------------------------------------
	| JS
	|--------------------------------------------------------------------------
	*/
	public function js($input = NULL, $output = NULL)
	{
		// Cache
		$cache = isset($this->_cache_file['js']) ? $this->_cache_file['js'] : NULL;
		
		// No cache?
		if(!$cache)
		{
			$this->_generate('js', $input, $output);	
		}
		
		// No CSS?
		if(!read_file($this->_cache_path.$output))
		{
			$this->_generate('js', $input, $output);
		}
		
		// Files?
		if($cache['files'] != $input)
		{
			$this->_generate('js', $input, $output);	
		}
		
		// Update?
		foreach($input as $in)
		{
			if(filemtime($this->_js_path.$in) > $cache['last_activity'])
			{
				$this->_generate('js', $input, $output);	
				break;
			}
		}

		return $this->_theme_url.$this->_config['cache'].'/'.$output;
	}
	
	/*
	|--------------------------------------------------------------------------
	| Generate
	|--------------------------------------------------------------------------
	*/
	public function _generate($type = NULL, $input = array(), $output = NULL)
	{
		$cache_file = $this->_ci->cache->get('theme_assets') ? $this->_ci->cache->get('theme_assets') : array();
		$_cache		= array();
		
		// CSS
		if($type == 'css')
		{
			$this->_ci->lessc->setFormatter("compressed");
			
			$css = NULL;
			foreach($input as $value)
			{
				$css .= $this->_ci->lessc->compileFile($this->_css_path.$value);
			}
			
			write_file($this->_cache_path.$output, $css);
			
			$_cache['css']['files']			= $input;
			$_cache['css']['output']		= $output;
			$_cache['css']['last_activity']	= now();
		}
		
		// JS
		if($type == 'js')
		{
			$js = NULL;
			foreach($input as $value)
			{
				$js .= read_file($this->_js_path.$value);
			}
			
			$js = trim(JSMin::minify($js));
			write_file($this->_cache_path.$output, $js);
			
			$_cache['js']['files']			= $input;
			$_cache['js']['output']			= $output;
			$_cache['js']['last_activity']	= now();
			
		}
		
		$this->_ci->cache->write(array_merge($cache_file, $_cache), 'theme_assets');
		return TRUE;
	}
}