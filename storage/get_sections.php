<?php
$html = file_get_contents('resources/views/welcome.blade.php');
preg_match_all('/<!--\s*(.*?)\s*-->/', $html, $matches);
foreach ($matches[1] as $match) {
    echo "- $match\n";
}
