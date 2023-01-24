﻿<?php
// Inclure le fichier header.php
include '../includes/header.php';
// Inclure le fichier sidebar.php
include '../includes/sidebar.php';
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Mettre à jour le texte du droit d'auteur</h2>
        <!--   For update copyright media -->
        <?php
        // Si la méthode de requête est POST
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            
            // Alors
            //     Récupérer la valeur de copyright
            $copyright = $format->validation($_POST['copyright']);
        //     Si copyright est vide
            if($copyright == NULL){

            //         Alors
            //             Afficher un message d'erreur
            echo "<span style='color:red;font-size:18px;'>ERROR BITCH YOURE WRONG</span>";
            } 
            //         Sinon
            //             Mettre à jour le copyright dans la table footer
            else {
                $query = "UPDATE footer SET copyright = '$copyright'";
                $result = $db->update($query);
            }
        }   
        //             Si le copyright est mis à jour
        //                 Alors
        //                     Afficher un message de succès
        //                 Sinon
        //                     Afficher un message d'erreur
        
        ?>

        <div class="block copyblock">
            <!--    For show social link from database-->
            <?php
            // Récupérer le copyright de la table footer
            // Tant que le copyright est récupéré
            //     Afficher le copyright
            ?>
            <form action="" method="post">
                <table class="form">
                    <tr>
                        <td>
                            <input type="text" value="" name="copyright" class="large" />
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
include "../includes/footer.php"
?>