<?php
// Inclure le fichier header.php
include 'includes/header.php';
// Inclure le fichier sidebar.php
include 'includes/sidebar.php';
?>
<?php
// Si la méthode de requête est GET
if (isset($_GET['catid'])) {
    $idcat = $_GET['catid'];
    if ($idcat == NULL) {
        header("Location : category_list.php");
    } else {
        $idd = $_GET['catid'];
    }
}
// Alors
//     Récupérer la valeur de catid
//     Si catid est vide
//         Alors
//             Rediriger vers category_list.php
//     Sinon
//         Récupérer la valeur de id
?>


<div class="grid_10">

    <div class="box round first grid">
        <h2>Update Category</h2>
        <div class="block copyblock">
            <!--                Category update query-->
            <?php
             if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $name = $_POST['name'];
                if ($name == NULL) {
                    echo "<span style='color:red;font-size:18px;'> - Attention : Name est vide</span> <br>";
                } else {
                    $query = "UPDATE category SET name = '$name' WHERE category_id = '$idcat'";
                    $result = $db->update($query);
                    if ($result != NULL ) {
                        echo "GG WP";
                    } else {
                        echo "<span style='color:red;font-size:18px;'> - Attention : name non updated</span> <br>";
                    }
                }
             }
            // Si la méthode de requête est POST
            // Alors
            //     Récupérer la valeur de name
            //     Si name est vide
            //         Alors
            //             Afficher un message d'erreur
            //         Sinon
            //             Mettre à jour la catégorie dans la table category
            //             Si la catégorie est mise à jour
            //                 Alors
            //                     Afficher un message de succès
            //                 Sinon
            //                     Afficher un message d'erreur
            ?>
            <!--                Show selected Category -->
            <?php
            // Récupérer les données de la table category
            // Tant que les données sont récupérées
            //     Afficher les données
            ?>
            <form method="post">
                <table class="form">
                    <tr>
                        <td>
                            <input type="text" name="name" value="" class="medium" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="submit" name="submit" Value="Modifier" />
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
</div>
<?php
// Inclure le fichier footer.php
include 'includes/footer.php'
?>