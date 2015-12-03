<?php
if (!defined('DS')) {
    define('DS', DIRECTORY_SEPARATOR);
}

class Amara_Controller {
    var $config = null;
    /*Name Of Action Class in $_GET or $_POST $_GET >> $_POST*/
    var $noac = 'act';
    var $action = null;
    var $ac = null;
    var $directory = array(
        'action'        => 'app/Action',
        'view'          => 'app/View',
        'model'         => 'app/Model',
        'app'           => 'app',
        'plugin'        => 'plugin',
        'etc'           => 'etc',
        'log'           => 'log',
        'template'      => 'template',
        'tmp'           => 'tmp',
    );
    var $class = array(
        'action'        => 'Amara_Action.php',
        'action_form'   => 'Amara_ActionForm.php',
        'view'          => 'Amara_ViewClass.php',
        'backend'       => 'Amara_Backend.php',
    );
    /**
     * 
     */
    function __construct() {
        require_once $this->directory['etc'] . DS . 'Config.php';
        $this->config = $config;
    }
    /**
     * 
     * @param String $action
     * @param String $default_action
     */
    function main($action, $default_action) {
        self::initAction($action, $default_action);
    }
    /**
     * return config value
     * @return Class
     */
    function getConfig($name) { return $this->config[$name]; }
    function getActionName() { return $this->action; }
    function getDefaultActionName() { return $this->default_action; }
    /**
     * $string
     * @param String $action
     * @param String $default_action
     */
    function initAction($action, $default_action) {
        if(isset($_GET[$this->noac])) {
            $this->action = $_GET[$this->noac];
        } elseif(isset($_POST[$this->noac])) {
            $this->action = $_POST[$this->noac];
        } elseif($action) {
            $this->action = $action;
        } else {
            $this->action = $default_action;
        }
        if(!$this->action) {
            trigger_error("Amara core could not be found action name. ", E_USER_ERROR);
        }
    }
    /**
     * 
     */
    function getActionClass() {
        if(!$this->action) return null;
        
    }
}