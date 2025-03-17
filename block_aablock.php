<?php
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
 * Block definition class for the block_aablock plugin.
 *
 * @package   block_aablock
 * @copyright 2025 Antonio Augusto (http://obawp.com)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

class block_aablock extends block_base
{

    /**
     * Initialises the block.
     *
     * @return void
     */
    public function init()
    {
        $this->title = get_string('pluginname', 'block_aablock');
    }

    function has_config()
    {
        return true;
    }

    function instance_allow_multiple()
    {
        return false;
    }

    /**
     * Gets the block contents.
     *
     * @return string The block HTML.
     */
    public function get_content()
    {
        global $DB;

        if ($this->content !== null) {
            return $this->content;
        }

        $this->content = new stdClass;

        // Retrieve admin settings
        $show_courses = get_config('block_aablock', 'show_courses');
        $show_users = get_config('block_aablock', 'showusers');


        if ($show_users) {
            $users = $DB->get_records('user');
            foreach ($users as $user) {
                $this->content->text .= $user->username . ' -  ' . $user->firstname . ' ' . $user->lastname . '<br>';
            }
        }

        if ($show_courses) {
            $courses = $DB->get_records('course');
            foreach ($courses as $course) {
                $this->content->text .= $course->fullname . '<br>';
            }
        }

        // $this->content->text = get_string('text','block_aablock');
        // $this->content->footer = get_string('footer', 'block_aablock');

        return $this->content;
    }

    /**
     * Defines in which pages this block can be added.
     *
     * @return array of the pages where the block can be added.
     */
    public function applicable_formats()
    {
        return [
            'admin' => false,
            'site-index' => true,
            'course-view' => true,
            'mod' => false,
            'my' => true,
        ];
    }
}