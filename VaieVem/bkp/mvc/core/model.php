<?php

class model {
    protect $db;

    public function_construct() {
        global $db;
        $this->db = $db;
    }
}