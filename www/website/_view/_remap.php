<!DOCTYPE html>
<html lang="<?php echo $data["remap_lang"]; ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $data["remap_title"]; ?></title>
    <!-- css -->
    <link rel="stylesheet" href="_css/_remap.css">
    <!-- js -->
    <script src="_js/_remap.js"></script>
</head>
<body>
    <div class="ukpb__wrap">
        
        <?php require_once dirname(__FILE__) . "/" . $data["remap_base"]; ?>
    </div>
</body>
</html>