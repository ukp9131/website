<!DOCTYPE html>
<html lang="<?php echo $data["remap_lang"]; ?>">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $data["remap_title"]; ?></title>
    <!-- css -->
    <link rel="stylesheet" href="_css/_remap.css">
</head>

<body>
    <div class="ukpb__wrap">
        <div class="content">
            <?php require_once dirname(__FILE__) . "/" . $data["remap_base"]; ?>
        </div>
    </div>
    <!-- js -->
    <script type="module" src="_js/_remap.js"></script>
</body>

</html>