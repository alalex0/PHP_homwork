<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

<form action="form_handler.php" method="post"
      enctype="multipart/form-data"> <!-- атрибут, необходимый при загрузке файлов -->
    <p><input type="text" name="login" placeholder="логин"></p>
    <p><input type="file" name="picture[]" multiple accept="image/*"></p>
    <p><input type="submit" value="Отправить"></p>
</form>

</body>
</html>