<?php
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>chewcheck</title>
</head>
<body>
<h2>Chew Check</h2>
<form method="post">
    <label for="food">Makanan: </label>
    <select name="food" id="food">
        <option value="makanan1">Makanan 1</option>
        <option value="makanan2">Makanan 2</option>
        <option value="makanan3">Makanan 3</option>
    </select>
    <br>
    <label for="grams">Grams: </label>
    <input type="number" name="grams" id="grams" min="1" step="1">
    <br>
    <input type="submit" value="Hitung Kalori">
</form>
<p>-----Hasilnya-----</p>

</body>
</html>
