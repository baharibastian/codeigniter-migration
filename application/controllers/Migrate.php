<?php 

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Migrate extends CI_Controller {


	public function __construct()
    {
        parent::__construct();
        $this->load->library('migration');
    }

    public function index()
    {
    	/**
    	 * this function for migrate to latest version
    	 * @var [type]
    	 */
    	$migration_okay = $this->migration->latest();
        $data['title'] = 'Migrate to latest';
        $data['messsages'] = '';
        if (!$migration_okay)
        {
            //show_error($this->migration->error_string());
            $data['messages'] = $this->migration->error_string();
        }
        else
        {
            //echo 'Migrated to latest version';
            $data['messages'] = 'Migrated to latest version successfully';
            #$this->session->sess_destroy();
        }
        $this->load->view('welcome_message', $data);
    }

    public function version()
    {
    	/**
    	 * this function for rollback migration to specific version
    	 * @var [type]
    	 */
    	$version = $this->uri->segment(3);
        $migration_okay = $this->migration->version($version);
        $data['title'] = 'Migrate to version : '.$version;
        $data['messages'] = '';
        if (!$migration_okay)
        {
            //show_error($this->migration->error_string());
            $data['messages'] = $this->migration->error_string();
        }
        else
        {
            //echo 'Migrated to version: ' . $version;
            $data['messages'] = 'Migrated successfully';
            #$this->session->sess_destroy();
        }
        $this->load->view('welcome_message', $data);
    }
}

?>