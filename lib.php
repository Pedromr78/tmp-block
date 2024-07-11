<?php
// This file is part of the Navigation buttons plugin for Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * Moodle API functions
 *
 * @copyright Davo Smith <moodle@davosmith.co.uk>
 * @package block_navbuttons
 * @license http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

/**
 * Serve requested files
 * @param object $course
 * @param object $birecordorcm
 * @param context $context
 * @param string $filearea
 * @param array $args
 * @param bool $forcedownload
 * @throws coding_exception
 */

/**
 * Output the navigation buttons before the page footer.
 * @return string
 */


function block_tmp_before_footer() {
    global $PAGE, $OUTPUT, $CFG, $COURSE, $USER;
   
    $PAGE->requires->js_call_amd('block_tmp/save', 'init', [
        $USER->id,
        $COURSE->id,
        $CFG->wwwroot
    ]);



    // $PAGE->requires->js_init_code("alert('before_footer');");
    // $PAGE->requires->js('guardar_salida.js');
    // $PAGE->requires->js_init_call('M.guardarSalida.init', array($USER->id, $scorm->course), true);

   
}