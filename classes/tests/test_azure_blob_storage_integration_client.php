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

namespace tool_objectfs\tests;

use tool_objectfs\local\store\azure_blob_storage\client;

/**
 * Client used for integration testing azure blob storage client
 *
 * @package   tool_objectfs
 * @author    Matthew Hilton <matthewhilton@catalyst-au.net>
 * @copyright 2024 Catalyst IT
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class test_azure_blob_storage_integration_client extends client {
    /**
     * @var string
     */
    private $runidentifier;

    /**
     * construct
     * @param mixed $config
     * @return void
     */
    public function __construct($config) {
        parent::__construct($config);
        $time = microtime();
        $this->runidentifier = md5($time);
    }

    /**
     * get_filepath_from_hash
     * @param mixed $contenthash
     *
     * @return string
     */
    protected function get_filepath_from_hash($contenthash): string {
        $l1 = $contenthash[0] . $contenthash[1];
        $l2 = $contenthash[2] . $contenthash[3];
        $runidentifier = $this->runidentifier;
        return "test/$runidentifier/$l1/$l2/$contenthash";
    }

}

