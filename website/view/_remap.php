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
    <script src="_.php?file=<?php echo urlencode("_.js") ?>"></script>
    <!-- SEO meta, favicon -->
    <!-- style -->
    <link rel="stylesheet" href="_.php?file=<?php echo urlencode("_remap.css") ?>">
</head>

<body>
    <div class="ukpb__wrap">
        <div class="content">
            <?php require_once "{$global["dir_view"]}/{$data["remap_base"]}"; ?>
        </div>
    </div>
    <!-- script -->
    <script src="_.php?file=<?php echo urlencode("_remap.js") ?>"></script>
</body>

</html>