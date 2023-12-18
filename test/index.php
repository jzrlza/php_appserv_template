<?php

$config = parse_ini_file( __DIR__ .'\config.ini', true);

$shellPY = $config['python']['pathw'];
$phpScriptPath = __DIR__ . '\index.php';  // Adjust the path accordingly
$pythonScriptPath = __DIR__ . '\pytest.py';  // Adjust the path accordingly
//$pythonScript = 'pytest.py';

// Use exec to run the Python script and capture its output
exec($shellPY . " " . $pythonScriptPath, $output);

echo $shellPY . " <br> " . $output[0];

$decode_outputs = json_decode($output[0], true);
//$keys = array_keys($decode_outputs);

foreach ($decode_outputs as $decode_output) {
	echo "<br>";
	foreach ($decode_output as $key => $value) {
		echo $value . " ";
	}
	echo ";";
}

?>