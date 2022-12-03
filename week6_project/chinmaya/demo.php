$bytes = random_bytes(5);
$token=  bin2hex($bytes);

session_start();
$_SESSION['token'] = $token;
$_SESSION['user_id'] = $result[0]['id'];

// unset($_SESSION);
// session_destroy();

$data = [
    "token" => $token,
    "username" => $result[0]['id'],
    "last_login_at" => date("Y-m-d H:i:s")
];

// update query for save token no



localStorage.setItem("token", data.token);
                localStorage.setItem("name", data.name);
                localStorage.setItem("last_login_at", data.last_login_at);
                $('#error').text(data.message).removeClass('text-danger').addClass('text-success');
                window.location.replace("index.php");