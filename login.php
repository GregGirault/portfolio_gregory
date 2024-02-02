<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <script src="https://cdn.tailwindcss.com"></script>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap">
        <title>Connexion Portfolio</title>
    </head>
    <body class="bg-gray-100 font-poppins">
        <div class="flex justify-center items-center h-screen">
            <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-sm">
                <h1 class="text-2xl font-semibold text-center text-gray-800 mb-6">Connexion</h1>

                <form action="verification.php" method="POST">
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="username">Nom d'utilisateur</label>
                        <input type="text" id="username" name="username" placeholder="Entrer le nom d'utilisateur" required class="shadow-sm appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                    </div>

                    <div class="mb-6">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="password">Mot de passe</label>
                        <input type="password" id="password" name="password" placeholder="Entrer le mot de passe" required class="shadow-sm appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                    </div>

                    <div class="flex items-center justify-between">
                        <input type="submit" value="LOGIN" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    </div>

                    <?php
                    if (isset($_GET['erreur'])) {
                        $err = $_GET['erreur'];
                        if ($err == 1 || $err == 2)
                            echo "<p class='mt-4 text-center text-red-500 text-sm'>Utilisateur ou mot de passe incorrect</p>";
                    }
                    ?>
                </form>
            </div>
        </div>
    </body>
</html>

