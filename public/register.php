<?php

require_once __DIR__ . '/../vendor/autoload.php';

use App\Controller\AuthController;

$authController = new AuthController();
$result = $authController->register();

$message = $result['message'];
$error = $result['error'];
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Inscription</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f4f4f4; display: flex; justify-content: center; align-items: center; height: 100vh; }
        .register-container { background: white; padding: 20px; border-radius: 8px; box-shadow: 0 0 10px rgba(0,0,0,0.1); width: 300px; }
        input, select { width: 100%; padding: 10px; margin: 10px 0; border: 1px solid #ddd; border-radius: 4px; box-sizing: border-box; }
        button { width: 100%; padding: 10px; background-color: #28a745; border: none; color: white; border-radius: 4px; cursor: pointer; }
        button:hover { background-color: #218838; }
        .message { color: green; text-align: center; }
        .error { color: red; text-align: center; }
    </style>
</head>
<body>

<div class="register-container">
    <h2>Inscription</h2>

    <?php if ($message): ?>
        <p class="message"><?php echo $message; ?></p>
    <?php endif; ?>

    <?php if ($error): ?>
        <p class="error"><?php echo $error; ?></p>
    <?php endif; ?>

    <form method="POST" action="">
        <input type="text" name="nom" placeholder="Votre nom" required>
        <input type="email" name="email" placeholder="Votre email" required>
        <input type="password" name="password" placeholder="Votre mot de passe" required>
        
        <label for="role_id">Vous êtes :</label>
        <select name="role_id" id="role_id" required>
            <option value="2">Candidat</option>
            <option value="3">Entreprise</option>
        </select>

        <button type="submit">S'inscrire</button>
    </form>
    
    <p style="text-align: center; margin-top: 15px;">
        Déjà inscrit ? <a href="login.php">Connectez-vous</a>
    </p>
</div>

</body>
</html>
