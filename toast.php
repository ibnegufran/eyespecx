<?php
if (isset($message)) {
    foreach ($message as $msg) {
        echo "
        <div class='toast'>
            <p>$msg</p>
        </div>
        ";
    }
}
?>
