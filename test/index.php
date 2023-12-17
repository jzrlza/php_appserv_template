<?php

$shellPY = "C:\Users\JBCOM\AppData\Local\Programs\Python\Python311\python";
$phpScriptPath = __DIR__ . '\index.php';  // Adjust the path accordingly
$pythonScriptPath = __DIR__ . '\pytest.py';  // Adjust the path accordingly
//$pythonScript = 'pytest.py';

// Use exec to run the Python script and capture its output
exec($shellPY . " " . $pythonScriptPath, $output);

echo $pythonScriptPath . " <br> " . $output[0];

?>