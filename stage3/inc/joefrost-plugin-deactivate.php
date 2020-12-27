<?php

/*
* @package JoeFrostPlugin
*/

class JoeFrostPluginDeactivate {
    public static function deactivate() {
        flush_rewrite_rules();
    }
}
