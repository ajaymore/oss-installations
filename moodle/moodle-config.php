<?php
unset($CFG);
global $CFG;
$CFG = new stdClass();
$CFG->dbtype    = 'pgsql';
$CFG->dblibrary = 'native';
$CFG->dbhost    = getenv('DB_HOST');
$CFG->dbname    = getenv('DB_NAME');
$CFG->dbuser    = getenv('DB_USER');
$CFG->dbpass    = getenv('DB_PASSWORD'); 
$CFG->prefix    = 'mdl_'; 
$CFG->dboptions = array(
    'dbpersist' => false,
    'dbsocket'  => false,
    'dbport'    => getenv('DB_PORT'),
    'dbhandlesoptions' => false,
    'dbcollation' => 'utf8mb4_unicode_ci',
    'ssl' => array('mode' => 'require')
);
$CFG->wwwroot   = getenv('MOODLE_URL');
$CFG->dataroot  = '/var/moodledata';
$CFG->directorypermissions = 02777;
$CFG->admin = 'admin';
if ( getenv('SSL_PROXY') == "true" ) {
    $CFG->sslproxy = true;
}
require_once(dirname(__FILE__) . '/lib/setup.php'); // Do not edit