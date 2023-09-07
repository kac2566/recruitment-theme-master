<?php 
/** 
 * Load TWIG 
 */

global $blockDirectories;

require_once get_template_directory() . '/vendor/autoload.php';

$block_loader = new \Twig\Loader\FilesystemLoader();

foreach ($blockDirectories as $blockDirectory) {
    $viewPath = $blockDirectory . '/views';
    if (is_dir($viewPath)) {
        $block_loader->addPath($viewPath);
    }
    
    $partialsPath = $blockDirectory . '/views/partials';
    if (is_dir($partialsPath)) {
        $block_loader->addPath($partialsPath);
    }

    $partialsViewPath = $blockDirectory . '/views/partials/view';
    if (is_dir($partialsViewPath)) {
        $block_loader->addPath($partialsViewPath);
    }
}

$block_twig = new \Twig\Environment($block_loader, [
    'debug' => true,
]);

$block_twig->addExtension(new \Twig\Extension\DebugExtension());

function render_block_template($block_name, $template_name, $context = array()) {
    global $block_twig;

    echo $block_twig->render("{$block_name}/{$template_name}", $context);
}