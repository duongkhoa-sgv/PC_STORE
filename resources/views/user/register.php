<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
    <link rel="stylesheet" href="/website-linhkien-pc/public/assets/css/style.css">
</head>
<body class="auth-page">

<div class="container">
    <h2>Register</h2>

    <?php if (!empty($_GET['error'])): ?>
        <div class="error"><?= htmlspecialchars($_GET['error']) ?></div>
    <?php endif; ?>

    <form method="POST" action="/website-linhkien-pc/public/?action=register">
        <input type="text" name="last_name" placeholder="Họ" required>
        <input type="text" name="name" placeholder= "Tên" required>
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit">Register</button>
    </form>

    <a href="/website-linhkien-pc/public/?page=login">
        Already have an account? Login
    </a>
</div>

</body>
</html>