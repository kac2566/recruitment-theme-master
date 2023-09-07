<?php 

if ($block['name'] !== 'acf/cta-block') {
    return $content;
}

$block_id = 'cta-' . $block['id'];
$fields = get_fields();

$context = array(
    'block_id' => $block_id,
    'fields' => $fields,
);

if(isset($block['className'])) {
    $block_classes = $block['className'];

    $context['block_classes'] = $block_classes;
}

return render_block_template('', 'cta-block.twig', $context);