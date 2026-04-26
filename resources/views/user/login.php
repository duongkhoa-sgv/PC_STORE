<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="/website-linhkien-pc/public/assets/css/style.css">
</head>
<body class="auth-page">

<div class="container">
    <h2>Login</h2>

    <?php if (!empty($_GET['error'])): ?>
        <div class="error"><?= htmlspecialchars($_GET['error']) ?></div>
    <?php endif; ?>

    <form method="POST" action="/website-linhkien-pc/public/?action=login">
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Password" required>

        <button type="submit">Login</button>
    </form>

    <a href="/website-linhkien-pc/public/?page=register">
        Don't have an account? Register
    </a>
</div>

</body>
</html>