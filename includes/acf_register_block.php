<?php
defined('ABSPATH') || exit;

$blocksDirectory = THEME_DIR . '/includes/blocks/';
$blockDirectories = glob($blocksDirectory . '*', GLOB_ONLYDIR);

function acf_register_blocks_init() {
    global $blockDirectories;

    foreach ($blockDirectories as $blockDirectory) {
        $blockFile = $blockDirectory . '/' . 'block.json';
        $fieldsFile = $blockDirectory . '/configuration' . '/fields.php';

        if (file_exists($blockFile) && function_exists('register_block_type')) {
            register_block_type($blockFile);
        }

        if (file_exists($fieldsFile)) {
            require_once $fieldsFile;
        }
    }
}

add_action('acf/init', 'acf_register_blocks_init');