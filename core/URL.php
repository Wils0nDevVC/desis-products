<?php
    class URL {
        public static function base() {
            $base_dir = rtrim(dirname($_SERVER["SCRIPT_NAME"]), '/') . '/';
            $baseURL = (isset($_SERVER["HTTPS"]) ? "https" : "http") . "://{$_SERVER["HTTP_HOST"]}{$base_dir}";
            return trim($baseURL, "/");
        }
        public static function to($url) {
            $url = trim($url, "/");
            return self::base() . "/{$url}";
        }
    }
    