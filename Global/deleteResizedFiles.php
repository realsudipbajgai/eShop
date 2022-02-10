<?php
$mask = 'Uploads/Resized/*.*';
array_map('unlink', glob($mask));
?>