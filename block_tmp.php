
<?php
include_once('time.php');
// This file is part of Moodle - http://moodle.org/
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
 * Block definition class for the block_tmp plugin.
 *
 * @package   block_tmp
 * @copyright Year, You Name <your@email.address>
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

class block_tmp extends block_base {

    /**
     * Initialises the block.
     *
     * @return void
     */
    public function init() {
        
        $this->title = get_string('tmp', 'block_tmp');
     
    }
    function has_config(){
        return true;
    }

    /**
     * Gets the block contents.
     *
     * @return string The block HTML.
     */
    public function get_content() {
       

        if ($this->content !== null) {
            return $this->content;
        }
        ;
       
       
        $this->content = new stdClass();
        $this->content->text .= html_writer::div(get_string('time', 'block_tmp'));
        $this->content->text .= html_writer::div(get_time());
        // $this->content->footer = 'Your footer';

        // Add logic here to define your template data or any other content.
        // $data = ['Soy el data'];

        // $this->content->text = $OUTPUT->render_from_template('block_tmp/content', $data);

        return $this->content;
    }


    /**
     * Defines in which pages this block can be added.
     *
     * @return array of the pages where the block can be added.
     */
    public function applicable_formats() {
        return [
            'admin' => false,
            'site-index' => false,
            'course-view' => true,
            'mod' => false,
            'my' => false,
        ];
    }
   
}
