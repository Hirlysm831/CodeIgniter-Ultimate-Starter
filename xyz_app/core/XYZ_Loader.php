<?php
/***************************************************************************
*
* @subpackage		develbar
* @access			Public
* @return			Methods in loader hooks for custom profiling(develbar)
* @review			go back to this class and understand deeper values in the property and method
*
***************************************************************************/
class XYZ_Loader extends CI_Loader
{



	private $_javascript = array();
	private $_css = array();
	private $_inline_scripting = array("infile"=>"", "stripped"=>"", "unstripped"=>"");
	private $_sections = array();
	private $_cached_css = array();
	private $_cached_js = array();

    /**
     * List of loaded views
     *
     * @return array
     */
    protected $_ci_views = array();

	public function __construct(){

		if(!defined('SPARKPATH'))
		{
			define('SPARKPATH', 'sparks/');
		}

		parent::__construct();
	}
	
	function css(){
		$css_files = func_get_args();

		foreach($css_files as $css_file){
			$css_file = substr($css_file,0,1) == '/' ? substr($css_file,1) : $css_file;

			$is_external = false;
			if(is_bool($css_file))
				continue;

			$is_external = preg_match("/^https?:\/\//", trim($css_file)) > 0 ? true : false;

			if(!$is_external)
				if(!file_exists($css_file))
					show_error("Cannot locate stylesheet file: {$css_file}.");

			$css_file = $is_external == FALSE ? base_url() . $css_file : $css_file;

			if(!in_array($css_file, $this->_css))
				$this->_css[] = $css_file;
		}
		return;
	}

	function js(){
		$script_files = func_get_args();

		foreach($script_files as $script_file){
			$script_file = substr($script_file,0,1) == '/' ? substr($script_file,1) : $script_file;

			$is_external = false;
			if(is_bool($script_file))
				continue;

			$is_external = preg_match("/^https?:\/\//", trim($script_file)) > 0 ? true : false;

			if(!$is_external)
				if(!file_exists($script_file))
					show_error("Cannot locate javascript file: {$script_file}.");

			$script_file = $is_external == FALSE ?  base_url() . $script_file : $script_file;

			if(!in_array($script_file, $this->_javascript))
				$this->_javascript[] = $script_file ;

		}

		return;
	}

	function start_inline_scripting(){
		ob_start();
	}

	function end_inline_scripting($strip_tags=true, $append_to_file=true){
		$source = ob_get_clean();

		 if($strip_tags){
			 $source = preg_replace("/<script.[^>]*>/", '', $source);
			 $source = preg_replace("/<\/script>/", '', $source);
		 }

		 if($append_to_file){

		 	$this->_inline_scripting['infile'] .= $source;

		 }else{

		 	if($strip_tags){
		 		$this->_inline_scripting['stripped'] .= $source;
		 	}else{
		 		$this->_inline_scripting['unstripped'] .= $source;
		 	}
		 }
	}

	function get_css_files(){
		return $this->_css;
	}

	function get_cached_css_files(){
		return $this->_cached_css;
	}

	function get_js_files(){
		return $this->_javascript;
	}

	function get_cached_js_files(){
		return $this->_cached_js;
	}

	function get_inline_scripting(){
		return $this->_inline_scripting;
	}

	/**
	 * Loads the requested view in the given area
	 * <em>Useful if you want to fill a side area with data</em>
	 * <em><b>Note: </b> Areas are defined by the template, those might differs in each template.</em>
	 *
	 * @param string $area
	 * @param string $view
	 * @param array $data
	 * @return string
	 */
	function section($area, $view, $data=array()){
		if(!array_key_exists($area, $this->_sections))
			$this->_sections[$area] = array();

		$content = $this->view($view, $data, true);

		$checksum = md5( $view . serialize($data) );

		$this->_sections[$area][$checksum] = $content;

		return $checksum;
	}

	function get_section($section_name)
	{
		$section_string = '';
		if(isset($this->_sections[$section_name]))
			foreach($this->_sections[$section_name] as $section)
				$section_string .= $section;

		return $section_string;
	}
	/**
	 * Gets the declared sections
	 *
	 * @return object
	 */
	function get_sections(){
		return (object)$this->_sections;
	}

   /*
    * Can load a view file from an absolute path and
    * relative to the CodeIgniter index.php file
    * Handy if you have views outside the usual CI views dir
    */
    function viewfile($viewfile, $vars = array(), $return = FALSE)
    {
		return $this->_ci_load(
            array('_ci_path' => $viewfile,
                '_ci_vars' => $this->_ci_object_to_array($vars),
                '_ci_return' => $return)
        );
    }


    	/**
    	 * Specific Autoloader (99% ripped from the parent)
    	 *
    	 * The config/autoload.php file contains an array that permits sub-systems,
    	 * libraries, and helpers to be loaded automatically.
    	 *
    	 * @access	protected
    	  * @param	array
    	  * @return	void
    	  */
   function _ci_autoloader($basepath = NULL)
   {
    	  if($basepath !== NULL)
    	  {
    	  $autoload_path = $basepath.CONFIG_FOLDER. DIRECTORY_SEPARATOR . ENVIRONMENT . DIRECTORY_SEPARATOR . '/autoload.php';
    }
    else
    {
    $autoload_path = APPPATH.CONFIG_FOLDER. DIRECTORY_SEPARATOR . ENVIRONMENT . DIRECTORY_SEPARATOR . '/autoload.php';
    }

    	 if(! file_exists($autoload_path))
    	 {
    	 	return FALSE;
    	 }

    	 	include_once($autoload_path);

    	 	if ( ! isset($autoload))
    		{
    			return FALSE;
    	 	}

    	 	// Autoload packages
    	 		if (isset($autoload['packages']))
    		{
    			foreach ($autoload['packages'] as $package_path)
    	 		{
    				$this->add_package_path($package_path);
    	 		}
    	 		}

    	 		// Autoload sparks
    	 		if (isset($autoload['sparks']))
    	 		{
    	 			foreach ($autoload['sparks'] as $spark)
    	 			{
    	 			$this->spark($spark);
    	 }
    		}

    			if (isset($autoload['config']))
    			{
    			// Load any custom config file
    			if (count($autoload['config']) > 0)
    			{
    			$CI =& get_instance();
                    foreach ($autoload['config'] as $key => $val)
    			{
    			$CI->config->load($val);
    			}
    			}
    			}

    			// Autoload helpers and languages
    			foreach (array('helper', 'language') as $type)
    				{
    			if (isset($autoload[$type]) AND count($autoload[$type]) > 0)
    				{
    					$this->$type($autoload[$type]);
    			}
    			}

    			// A little tweak to remain backward compatible
    			// The $autoload['core'] item was deprecated
    			if ( ! isset($autoload['libraries']) AND isset($autoload['core']))
    			{
    			$autoload['libraries'] = $autoload['core'];
    }

    			// Load libraries
    			if (isset($autoload['libraries']) AND count($autoload['libraries']) > 0)
    			{
    			// Load the database driver.
    			if (in_array('database', $autoload['libraries']))
    			{
    			$this->database();
    			$autoload['libraries'] = array_diff($autoload['libraries'], array('database'));
    }

    			// Load all other libraries
    			foreach ($autoload['libraries'] as $item)
    			{
    			$this->library($item);
    }
    }

    			// Autoload models
    			if (isset($autoload['model']))
    			{
    			$this->model($autoload['model']);
    			}
    }
	
	
	
    /**
     * List of loaded helpers
     *
     * @return array
     */
    public function get_helpers()
    {
        return $this->_ci_helpers;
    }

    /**
     * List of loaded views
     *
     * @return array
     */
    public function get_views()
    {
        return $this->_ci_views;
    }

    /**
     * List of loaded models
     *
     * @return mixed
     */
    public function get_models(){
        return $this->_ci_models;
    }

    /**
     * Internal CI Data Loader
     *
     * Used to load views and files.
     *
     * Variables are prefixed with _ci_ to avoid symbol collision with
     * variables made available to view files.
     *
     * @used-by    CI_Loader::view()
     * @used-by    CI_Loader::file()
     *
     * @param    array $_ci_data Data to load
     *
     * @return    object
     */
    protected function _ci_load($_ci_data)
    {
        // Set the default data variables
        foreach (array('_ci_view', '_ci_vars', '_ci_path', '_ci_return') as $_ci_val) {
            $$_ci_val = isset($_ci_data[$_ci_val]) ? $_ci_data[$_ci_val] : false;
        }

        $file_exists = false;

        // Set the path to the requested file
        if (is_string($_ci_path) && $_ci_path !== '') {
            $_ci_x = explode('/', $_ci_path);
            $_ci_file = end($_ci_x);
        } else {
            $_ci_ext = pathinfo($_ci_view, PATHINFO_EXTENSION);
            $_ci_file = ($_ci_ext === '') ? $_ci_view . '.php' : $_ci_view;

            foreach ($this->_ci_view_paths as $_ci_view_file => $cascade) {
                if (file_exists($_ci_view_file . $_ci_file)) {
                    $_ci_path = $_ci_view_file . $_ci_file;
                    $file_exists = true;
                    break;
                }

                if (!$cascade) {
                    break;
                }
            }
        }

        if (!$file_exists && !file_exists($_ci_path)) {
            show_error('Unable to load the requested file: ' . $_ci_file);
        }

        // This allows anything loaded using $this->load (views, files, etc.)
        // to become accessible from within the Controller and Model functions.
        $_ci_CI =& get_instance();
        foreach (get_object_vars($_ci_CI) as $_ci_key => $_ci_var) {
            if (!isset($this->$_ci_key)) {
                $this->$_ci_key =& $_ci_CI->$_ci_key;
            }
        }

        /*
         * Extract and cache variables
         *
         * You can either set variables using the dedicated $this->load->vars()
         * function or via the second parameter of this function. We'll merge
         * the two types and cache them so that views that are embedded within
         * other views can have access to these variables.
         */
        if (is_array($_ci_vars)) {
            $this->_ci_cached_vars = array_merge($this->_ci_cached_vars, $_ci_vars);
        }

        extract($this->_ci_cached_vars);

        /*
         * Buffer the output
         *
         * We buffer the output for two reasons:
         * 1. Speed. You get a significant speed boost.
         * 2. So that the final rendered template can be post-processed by
         *	the output class. Why do we need post processing? For one thing,
         *	in order to show the elapsed page load time. Unless we can
         *	intercept the content right before it's sent to the browser and
         *	then stop the timer it won't be accurate.
         */
        ob_start();

        // If the PHP installation does not support short tags we'll
        // do a little string replacement, changing the short tags
        // to standard PHP echo statements.
        if (!is_php('5.4') && !ini_get('short_open_tag') && config_item('rewrite_short_tags') === true && function_usable('eval')) {
            echo eval('?>' . preg_replace('/;*\s*\?>/', '; ?>', str_replace('<?=', '<?php echo ', file_get_contents($_ci_path))));
        } else {
            include($_ci_path); // include() vs include_once() allows for multiple views with the same name
        }

        // New : Add the the loaded view file to the list
        $this->_ci_views[$_ci_path] = isset($_ci_vars) ? $_ci_vars : array();;

        log_message('info', 'File loaded: ' . $_ci_path);

        // Return the file data if requested
        if ($_ci_return === true) {
            $buffer = ob_get_contents();
            @ob_end_clean();

            return $buffer;
        }

        /*
         * Flush the buffer... or buff the flusher?
         *
         * In order to permit views to be nested within
         * other views, we need to flush the content back out whenever
         * we are beyond the first level of output buffering so that
         * it can be seen and included properly by the first included
         * template and any subsequent ones. Oy!
         */
        if (ob_get_level() > $this->_ci_ob_level + 1) {
            ob_end_flush();
        } else {
            $_ci_CI->output->append_output(ob_get_contents());
            @ob_end_clean();
        }

        return $this;
    }
}