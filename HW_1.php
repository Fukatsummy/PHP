<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HW_1</title>
    
</head>
<body>
<form method="post">
        R: <input type="number" name="r" min="0" max="255"><br>
        G: <input type="number" name="g" min="0" max="255"><br>
        B: <input type="number" name="b" min="0" max="255"><br>
        <button type="submit" name="submit">Accept</button>
    </form>

    <?php
    if (isset($_POST['submit'])) {
        $r = $_POST['r'];
        $g = $_POST['g'];
        $b = $_POST['b'];

        // Проверяем, что введенные значения находятся в диапазоне 0-255
        if ($r >= 0 && $r <= 255 && $g >= 0 && $g <= 255 && $b >= 0 && $b <= 255) {
            $background_color = "rgb($r, $g, $b)";

            // Определяем дополнительный цвет текста на основе противоположного цвета фона
            $text_color = (abs($r - 255) + abs($g - 255) + abs($b - 255)) / 3 < 128 ? "black" : "white";

            echo "<span id='result' style='background-color: $background_color; color: $text_color;'>Some Text</span>";
        } else {
            echo "Please enter valid values for R, G, and B (0-255)";
        }
    }
    ?>
    
</body>
</html>