<?php
function addPadding($base64String)
{
    if (strlen($base64String) % 4 !== 0) {
        return addPadding($base64String . '=');
    }
    return $base64String;
}
function toBase64($urlString)
{
    return str_replace(['-', '_'], ['+', '/'], $urlString);
}



$user_id = -1;
if (!isset($_COOKIE["session"])) {
    $header = json_encode(['typ' => 'JWT', 'alg' => 'HS256']);
    $payload = json_encode(['user_id' => -1]);
    $base64UrlHeader = str_replace(['+', '/', '='], ['-', '_', ''], base64_encode($header));
    $base64UrlPayload = str_replace(['+', '/', '='], ['-', '_', ''], base64_encode($payload));
    $signature = hash_hmac('sha256', $base64UrlHeader . "." . $base64UrlPayload, 'XBVlRd7LrOPzJFbP', true);
    $base64UrlSignature = str_replace(['+', '/', '='], ['-', '_', ''], base64_encode($signature));
    $jwt = $base64UrlHeader . "." . $base64UrlPayload . "." . $base64UrlSignature;
    setcookie("session", $jwt);
} else {
    $jwt = $_COOKIE["session"];
    list($base64Header, $base64Payload, $base64Signature) = explode(".", $jwt);
    $header = json_decode(base64_decode(addPadding(toBase64($base64Header))));
    $payload = json_decode(base64_decode(addPadding(toBase64($base64Payload))));
    if ($header->alg == "HS256") {
        $sigcheck = hash_hmac('sha256', $base64Header . "." . $base64Payload, 'XBVlRd7LrOPzJFbP', true);
        if (str_replace(['+', '/', '='], ['-', '_', ''], base64_encode($sigcheck)) != $base64Signature) {
            setcookie("session", null);
            die("Invalid signature.");
        } else {
            $user_id = $payload->user_id;
        }
    } elseif ($header->alg == "None" || $header->alg == "none") {
        $user_id = $payload->user_id;
    } else {
        setcookie("session", null);
        die("Invalid JWT alg.");
    }
}
if ($user_id == -1) {
    die("Authentication required.");
} elseif ($user_id != 0) {
    die("Only the Administrator has access to this page.");
} else {
    echo ("flag{n0_s1gn@tur3_r3qu1r3d}");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>boop</title>
</head>

<body>
    <p>the page is working</p>
</body>

</html>