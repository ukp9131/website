<?php

/**
 * @var array $data
 */
if (!isset($data)) {
    exit;
}
?>
<link rel="stylesheet" href="_view/index/style.css">
<div class="ukpb__content">
    <?php echo $data["foo"]; ?>
</div>
<script src="_view/index/script.js" type="module"></script>
