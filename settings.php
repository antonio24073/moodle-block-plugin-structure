<?php
// This file is part of Moodle - https://moodle.org/
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
 * Adds admin settings for the plugin.
 *
 * @package     block_aablock
 * @category    admin
 * @copyright   2025 Antonio Augusto (http://obawp.com)
 * @license     https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

if ($hassiteconfig) {
    if ($ADMIN->fulltree) {
        $settingspage = new admin_settingpage(
            'managelocalblock_aablock',
            new lang_string(
                'settings_page_manage',
                'block_aablock'
            )
        );
        $settings->add(new admin_setting_configcheckbox(
            'block_aablock/show_courses',
            get_string('setting_show_courses_visiblename', 'block_aablock'),
            get_string('setting_show_courses_description', 'block_aablock'),
            defaultsetting: 0
        ));
        $settings->add(new admin_setting_configcheckbox(
            'block_aablock/showusers',
            get_string('setting_show_users_visiblename', 'block_aablock'),
            get_string('setting_show_users_description', 'block_aablock'),
            0
        ));
    }

}