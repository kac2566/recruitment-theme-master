<?php 

if ($block['name'] !== 'acf/link-boxes') {
    return $content;
}

$block_id = 'link-boxes-' . $block['id'];
$fields = get_fields();

$context = array(
    'block_id' => $block_id,
    'fields' => $fields,
);

if(isset($block['className'])) {
    $block_classes = $block['className'];

    $context['block_classes'] = $block_classes;
}

return render_block_template('', 'block-view.twig', $context);