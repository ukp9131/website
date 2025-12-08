# Create HTML and CSS code in PHP
## Prompt
- Create login page.
- Primary color is red and black.
- Create file ```index.php``` and ```index.css```
## Input
### Data
```php
```
### Class attribute using JavaScript
```
ukpj__content_form: Login form
ukpj__content_check_auto_login: Checkbox to check auto login
```
### Name attribute using JavaScript
```
id: ID
pw: Password
```
### _remap.php
```html
<!DOCTYPE html>
<html lang="<?php echo $data['remap_lang']; ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $data['remap_title']; ?></title>
    <!-- css -->
    <link rel="stylesheet" href="_css/_remap.css">
    <!-- js -->
    <script src="_js/_remap.js"></script>
</head>
<body>
    <div class="ukpb__wrap">
        <?php require_once dirname(__FILE__) . "/" . $data['remap_base']; ?>
    </div>
</body>
</html>
```
### _remap.css
```css
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}
```
## Rule