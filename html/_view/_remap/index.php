<?php

/**
 * @var array $ukp_g
 */
if (!isset($ukp_g)) {
    exit;
}
?>
<!DOCTYPE html>
<html lang="<?php echo $ukp_g["lang"]; ?>">

<head>
    <!-- 문서 설정 meta -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- title -->
    <title><?php echo $ukp_g["title"]; ?></title>
    <!-- preconnect -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <!-- css -->
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+KR:wght@100;400;700&display=swap" rel="stylesheet">
    <!-- js -->
    <script src="asset/js/ukp.js"></script>
    <!-- SEO meta, favicon -->
    <!-- style -->
    <link rel="stylesheet" href="_view/_remap/style.css">
</head>

<body>
    <div class="ukpb__wrap">
        <div class="content">
            <?php require_once "{$ukp_g["dir_view"]}/{$ukp_g["file"]}/index.php"; ?>
        </div>
    </div>
    <!-- script -->
    <script src="_view/_remap/script.js" type="module"></script>
</body>

</html>
