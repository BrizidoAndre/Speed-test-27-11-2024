<?php
$user;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $users = json_decode(file_get_contents('users.json'));
    $registerUsername = $_POST['register_username'] ?? null;
    $registerPassword = $_POST['register_password'] ?? null;
    $loginUsername = $_POST['login_username'] ?? null;
    $loginPassword = $_POST['login_password'] ?? null;
    if ($registerUsername && $registerPassword) {
        $users[] = [
            'username' => $registerUsername,
            'password' => hash('sha256', $registerPassword)
        ];
        file_put_contents('users.json', json_encode($users));
    }
    if ($loginUsername && $loginPassword) {
        $user = array_filter($users, function ($user) use ($loginUsername, $loginPassword) {
            return $user->username === $loginUsername && $user->password === hash('sha256', $loginPassword);
        });
        $user = end($user) ?? false;
    }
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sistema de login usando arquivo JSON</title>
</head>
<body>
<h2>Registrar</h2>
<form action="" method="post">
    <label for="username">Username</label>
    <input type="text" id="username" name="register_username" required>
    <label for="password">Password</label>
    <input type="password" id="password" name="register_password" required>
    <button>Submit</button>
</form>
<h2>Login</h2>
<form action="" method="post">
    <label for="username">Username</label>
    <input type="text" id="username" name="login_username" required>
    <label for="password">Password</label>
    <input type="password" id="password" name="login_password" required>
    <button>Submit</button>
</form>
<?php if ($user): ?>
    <p>'Login realizado com sucesso!'</p>
    <button>Logout</button>
<?php endif ?>
<?php if ($user === false): ?>
    <p>Erro no login</p>
<?php endif ?>
</body>
</html>