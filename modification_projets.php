<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Document</title>
</head>

<body>
    <!-- Formulaire de mise à jour du contenu avec sélection du projet -->
    <div class="bg-white p-8 rounded-lg shadow-lg max-w-4xl mx-auto">
        <h2 class="text-2xl font-semibold mb-5">Mise à jour du contenu</h2>
        <form action="update_content.php" method="POST" enctype="multipart/form-data" class="space-y-4">
            <div class="mb-4">
                <label for="projet_id" class="block text-gray-700 text-sm font-bold mb-2">Choisissez un projet :</label>
                <select name="projet_id" id="projet_id"
                    class="shadow border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    <?php
                    require 'connect.php'; // Assurez-vous d'avoir une connexion valide à votre DB
                    $stmt = $db->query("SELECT ID, titre FROM projets ORDER BY titre ASC");
                    while ($projets = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        echo "<option value=\"{$projets['ID']}\">{$projets['titre']}</option>";
                    }
                    ?>
                </select>
            </div>

            <div class="container mx-auto mt-8">
                <form id="updateForm" action="update_content.php" method="POST" enctype="multipart/form-data"
                    class="bg-white p-6 rounded shadow-md">
                    <div class="mb-4">
                        <label for="section_select" class="block text-gray-700 text-sm font-bold mb-2">Sélectionnez la
                            section à mettre à jour :</label>
                        <input type="hidden" name="projet_id" value="<?= htmlspecialchars($projet_id) ?>">
                        <select name="section" id="section_select"
                            class="shadow border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                            <option value="">--Choisissez une section--</option>
                            <option value="header">Header</option>
                            <option value="intro">Intro</option>
                            <option value="about">À propos</option>
                            <option value="features">Fonctionnalités</option>
                            <option value="galerie">Galerie</option>
                            <option value="lienURL">Lien URL</option>
                            <option value="footer">Footer</option>
                        </select>
                    </div>

                    <div id="dynamic_fields"></div>

                    <button type="submit"
                        class="mt-4 px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Mettre
                        à jour</button>
                        <a href="index.php" class="inline-block align-baseline font-bold text-sm text-zinc-500 hover:text-zinc-700">Retour</a>
                </form>
            </div>
        </form> <!-- Fin du formulaire de mise à jour du contenu avec sélection du projet -->
    </div>
    <script src="ajout.js"></script>
</body>

</html>