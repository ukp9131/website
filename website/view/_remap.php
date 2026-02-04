<!DOCTYPE html>
<html lang="<?php echo $data["remap_lang"]; ?>">

<head>
    <!-- 문서 설정 meta -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- title -->
    <title><?php echo $data["remap_title"]; ?></title>
    <!-- preconnect -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <!-- css -->
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+KR:wght@100;400;700&display=swap" rel="stylesheet">
    <!-- js -->
    <script src="asset/js/ukp.js"></script>
    <!-- SEO meta, favicon -->
    <!-- style -->
    <style><?php echo file_get_contents("{$global["dir_css"]}/_remap.css"); ?></style>
</head>

<body>
    <div class="ukpb__wrap">
        <div class="content">
            <?php require_once "{$global["dir_view"]}/{$data["remap_base"]}"; ?>
        </div>
    </div>
    <!-- script -->
    <script type="module"><?php echo file_get_contents("{$global["dir_js"]}/_remap.js"); ?></script>
</body>

</html>