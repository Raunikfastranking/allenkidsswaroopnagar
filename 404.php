<?php
if (http_response_code() !== 404) {
    http_response_code(404);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>404 Not Found</title>
    <meta name="robots" content="noindex, follow">
</head>
<body>
    <h1>404 Not Found</h1>
    <p>The page you requested could not be found.</p>
</body>
</html>
