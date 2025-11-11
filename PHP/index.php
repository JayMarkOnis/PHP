<!DOCTYPE html>
<html>
<head>
    <title>Bubble Sort in PHP</title>
</head>
<body>

<form method="post">
    <label>Enter numbers (comma-separated):</label><br>
    <input type="text" name="numbers" placeholder="e.g. 9,2,7,4,3" required><br><br>

    <label>Select Order:</label><br>
    <select name="order">
        <option value="asc">Ascending</option>
        <option value="desc">Descending</option>
    </select><br><br>

    <button type="submit">Sort Numbers</button>
</form>

<?php

function bubbleSort($arr, $order) {
    $n = count($arr);
    $swapCount = 0;

    // Bubble Sort
    for ($i = 0; $i < $n - 1; $i++) {
        for ($j = 0; $j < $n - $i - 1; $j++) {

            // Ascending
            if ($order == "asc" && $arr[$j] > $arr[$j + 1]) {
                $temp = $arr[$j];
                $arr[$j] = $arr[$j + 1];
                $arr[$j + 1] = $temp;
                $swapCount++;
            }

            // Descending
            if ($order == "desc" && $arr[$j] < $arr[$j + 1]) {
                $temp = $arr[$j];
                $arr[$j] = $arr[$j + 1];
                $arr[$j + 1] = $temp;
                $swapCount++;
            }
        }
    }

    return ["sortedArray" => $arr, "swaps" => $swapCount];
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Convert user input into an array of integers
    $numbers = array_map('intval', explode(",", $_POST["numbers"]));
    $order = $_POST["order"];

    $original = $numbers; // store original array

    // Call sorting function
    $result = bubbleSort($numbers, $order);

    echo "<hr>";
    echo "<strong>Original Array:</strong> [" . implode(", ", $original) . "]<br>";
    echo "<strong>Sorted ($order):</strong> [" . implode(", ", $result["sortedArray"]) . "]<br>";
    echo "<strong>Total Swaps:</strong> " . $result["swaps"] . "<br>";
}

?>

</body>
</html>
