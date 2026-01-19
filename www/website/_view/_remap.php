<!DOCTYPE html>
<html lang="<?php echo $data["remap_lang"]; ?>">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+KR:wght@100;400;700&display=swap" rel="stylesheet">
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