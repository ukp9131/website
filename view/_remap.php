<!DOCTYPE html>
<html lang="<?php echo $global["lang"]; ?>">

<head>
    <!-- 문서 설정 meta -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- title -->
    <title><?php echo $global["title"]; ?></title>
    <!-- preconnect -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <!-- css -->
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+KR:wght@100;400;700&display=swap" rel="stylesheet">
    <!-- js -->
    <script src="_.php?file=_.js&v=1"></script>
    <!-- SEO meta, favicon -->
    <!-- style -->
    <link rel="stylesheet" href="_.php?file=_remap.css&v=1">
</head>

<body>
    <div class="ukpb__wrap">
        <div class="content">
            <?php require_once "{$global["dir_view"]}/{$global["base"]}"; ?>
        </div>
    </div>
    <!-- script -->
    <script src="_.php?file=_remap.js&v=1"></script>
</body>

</html>