<?php
if (!empty($errors)) {
    foreach ($errors as $error) {
        echo "<p style='color:red;'>$error</p>";
    }
}

if ($success) {
    echo "<p style='color:green;'>$success</p>";
}
?>
