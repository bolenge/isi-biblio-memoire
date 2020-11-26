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