<?php

// Obtener las variables
$userid = $_POST['userid'];
$courseid = $_POST['courseid'];


// Inicializar Moodle
require_once('../../config.php');
global $DB;

// Definimos la variable que almacenaremos en DB
$newrecord = new \stdClass();
$newrecord->id = ''; // Creo que actualmente no haría falta
$newrecord->eventname = '\core\event\course_viewed';
$newrecord->component = 'core';
$newrecord->action = 'exit';
$newrecord->target = 'course';
$newrecord->objecttable = null;
$newrecord->objectid = null;
$newrecord->crud = 'r';
$newrecord->edulevel = '0';
$newrecord->contextid = '2';
$newrecord->contextlevel = '50';
$newrecord->contextinstanceid = '1';
$newrecord->userid = $userid;
$newrecord->courseid = $courseid;
$newrecord->relateduserid = null;
$newrecord->anonymous = '0';
$newrecord->other = 'null';
$newrecord->timecreated = time();
$newrecord->origin = 'web';
$newrecord->ip = $_SERVER['REMOTE_ADDR'];
$newrecord->realuserid = null;

// Realizamos el insert
$DB->insert_record('logstore_standard_log', $newrecord);
