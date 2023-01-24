<?php
// Inclure le fichier header.php
include 'includes/header.php';
// Inclure le fichier sidebar.php
include 'includes/sidebar.php';
?>
<style>
    .left {
        float: left;
        width: 60%;
    }

    .right {
        float: left;
        width: 40%;
    }

    .right img {
        height: 140px;
        width: 150px;
    }
</style>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Mettre à jour le titre et la description du site</h2>
        <!--            For Update website Title & Logo-->
        <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $title = $format->validation($_POST['title']);
            
            if ($title == NULL) {
                echo "<span style='color:red;font-size:18px;'>ERROR remplir le title</span>";
            } 
            else {
                $target_dir = "uploads/";
                $target_file = $target_dir . basename($_FILES["logo"]["name"]);
                $uploadOk = 1;
                $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

                // Check if image file is a actual image or fake image
                if(isset($_POST["submit"])) {
                    $check = getimagesize($_FILES["logo"]["tmp_name"]);
                        if($check !== false) {
                            echo "File is an image - " . $check["mime"] . ".";
                            $uploadOk = 1;
                        } else {
                        echo "File is not an image.";
                        $uploadOk = 0;
                    }
                }   

                // Check if file already exists
                if (file_exists($target_file)) {
                    echo "Sorry, file already exists.";
                    $uploadOk = 0;
                }

                // Check file size
                if ($_FILES["logo"]["size"] > 1048567) {
                    echo "Sorry, your file is too large.";
                    $uploadOk = 0;
                }

                // Allow certain file formats
                if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                    && $imageFileType != "gif" ) {
                    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                    $uploadOk = 0;
                }
                if ($uploadOk == 0 && $title != null) {
                    echo "Sorry, your file was not uploaded.";
                    // if everything is ok, try to upload file
                }
                else {
                    if (move_uploaded_file($_FILES["logo"]["tmp_name"], $target_file)) {
                        echo "The file ". htmlspecialchars( basename( $_FILES["logo"]["name"])). " has been uploaded.";
                    } 
                    else {
                        echo "Sorry, there was an error uploading your file.";
                    }
                }
            } 
            $image = "uploads/" . $_FILES["logo"]["name"];
            if($title == null && $uploadOk != 0){
                echo "erreur";
            } else {
                $query = "UPDATE title SET title = '$title', logo = '$image'";
                $result = $db->update($query);
            }


        }
        // Si la méthode de requête est POST
        // Alors
        //     Récupérer la valeur de title
        //     Récupérer la valeur de logo
        //     Si title est vide
        //         Alors
        //             Afficher un message d'erreur
        //         Sinon
        //             Si logo est vide
        //                 Alors
        //                     Mettre à jour le titre dans la table title_slogan
        //                     Si le titre est mis à jour
        //                         Alors
        //                             Afficher un message de succès
        //                         Sinon
        //                             Afficher un message d'erreur
        //                 Sinon
        //                     Si l'extension du logo est permise
        //                         Alors
        //                             Si la taille du logo est inférieure à 1 Mo
        //                                 Alors
        //                                     Déplacer le logo dans le dossier uploads
        //                                     Mettre à jour le titre et le logo dans la table title_slogan
        //                                     Si le titre et le logo sont mis à jour
        //                                         Alors
        //                                             Afficher un message de succès
        //                                         Sinon
        //                                             Afficher un message d'erreur
        //                                 Sinon
        //                                     Afficher un message d'erreur
        //                             Sinon
        //                                 Afficher un message d'erreur
        //                     Sinon
        //                         Afficher un message d'erreur
        ?>


        <!--               For show blog title  & logo from database-->
        <?php
        // Récupérer les données de la table title_slogan
        // Tant que les données sont récupérées
        //     Afficher les données
        ?>
        <div class="block sloginblock">
            <div class="left">
                <form action="" method="post" enctype="multipart/form-data">
                    <table class="form">
                        <tr>
                            <td>
                                <label>Titre du site Web</label>
                            </td>
                            <td>
                                <input type="text" value="" name="title" class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Télécharger le logo</label>
                            </td>
                            <td>
                                <input type="file" name="logo" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                            </td>
                            <td>
                                <input type="submit" name="submit" Value="Modifier" />
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
            <div class="right">
                <img src="<?php echo $image ?>" alt="logo">
            </div>
        </div>
    </div>
</div>
<div class="clear">
</div>
</div>
<?php
// Inclure le fichier footer.php
include 'includes/footer.php';
?>