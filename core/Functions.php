<?php
    /**
     * Ce fichier contient des fonctions rajoutées dans l'application
     * @author Don de Dieu Bolenge <https://github.com/bolenge>
     */

    if (!function_exists('encode_token')) {
        function encode_token (string $token) {
            return base64_encode(config('secure.tokenNumber') * $code);
        }
    }

    if (!function_exists('encode_id')) {
        /**
         * Permet d'encoder un id
         * @param int $id
         * @return string
         */
        function encode_id (int $id) {
            return base64_encode(config('secure.tokenNumber') * $id);
        }
    }

    if (!function_exists('decode_id')) {
        /**
         * Permet d'encoder un id
         * @param string $id_encoded
         * @return string
         */
        function decode_id ($id_encoded) {
            return base64_decode($id_encoded) / config('secure.tokenNumber');
        }
    }

    if (!function_exists('get_active_menu')) {
        /**
         * Permet de renvoyer une classe active pour activer un onglet du menu
         * @param string $page
         * @param string $page_active
         * @param string $class_active
         */
        function get_active_menu (string $page, string $page_active, string $class_active = "active") {
            return $page == $page_active ? $class_active : "";
        }
    }

    if (!function_exists('get_icon_alert')) {
        /**
         * Permet de renvoyer l'icon pour le message d'alert
         * @param string $type
         * @return string
         */
        function get_icon_alert (string $type = 'info') {

            $icons = [
                "success" => "nc-check-2",
                "danger" => "nc-alert-circle-i",
                "warning" => "nc-alert-circle-i",
                "info" => "nc-alert-circle-i",
            ];

            return $icons[$type];
        }
    }

    if (!function_exists('sub_string')) {
        /**
         * Permet de couper un text long et rajouter de pointillés
         * @param string $string
         * @return string
         */
        function sub_string (string $string, $nbr = 15) {

            return strlen($string) > $nbr ? mb_substr($string, 0, $nbr).'...' : $string;
        }
    }

    if (!function_exists('add_days_in_date')) {
        /**
         * Ajoute de jours dans une date
         * @param \DateTime $date_string La date dans laquelle il faut ajouter les jours
         * @param int $n_day Le nombre de jour à ajouter
         * @return \DateTime
         */
        function add_days_in_date($date_string = null, int $n_day) {
            $date = $date_string ? new \DateTime($date_string) : new \DateTime();
            $date->add(new \DateInterval('P'.$n_day.'D'));

            return $date;
        }
    }