<?php
if ($_POST['admin_password'] === '1122') {
    header('Location: index.html');  // Points back to this dashboard
    exit();
} else {
    echo "❌ Incorrect Password. <a href='index.html'>Go back</a>";
}
?>
