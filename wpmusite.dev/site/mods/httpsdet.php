<?php
/**
 * Get the WP_HOME from the incoming server parameters
 */

function _get_proto() {
    // Enhanced version of is_ssl() for proxied/loadbalanced https detection
    if (!empty($_SERVER['HTTPS']) && ('off' !== strtolower($_SERVER['HTTPS']))) {
            return 'https';
    }
    if (!empty($_SERVER['SERVER_PORT']) && ('443' == $_SERVER['SERVER_PORT'])) {
        return 'https';
    }
    if (!empty($_SERVER['HTTP_X_FORWARDED_PROTO']) && ('https' == strtolower($_SERVER['HTTP_X_FORWARDED_PROTO']))) {
        return 'https';
    }
    if (!empty($_SERVER['HTTP_X_FORWARDED_SSL']) && ('on' == strtolower($_SERVER['HTTP_X_FORWARDED_SSL']))) {
        return 'https';
    }
    if (!empty($_SERVER['HTTP_X_FORWARDED_PORT']) && ('443' == $_SERVER['HTTP_X_FORWARDED_PORT']) ) {
        return 'https';
    }

    return 'http';
}

function _get_dynvhost() {
    // Enhanced version of is_ssl() for proxied/loadbalanced https detection
    if (!empty($_SERVER['HTTP_HOST'])) {
        return $_SERVER['HTTP_HOST'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_HOST'])) {
        return $_SERVER['HTTP_X_FORWARDED_HOST'];
    }

    if (!empty($_SERVER['HTTP_X_FORWARDED_SERVER'])) {
        return $_SERVER['HTTP_X_FORWARDED_SERVER'];
    } elseif (!empty($_SERVER['SERVER_NAME'])) {
        return $_SERVER['SERVER_NAME'];
    }

    return ROOT_DOMAIN;
}

!defined('WP_PROTO') && define('WP_PROTO', _get_proto());
