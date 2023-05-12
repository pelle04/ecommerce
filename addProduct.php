<?php
session_start();
include_once("global.php");
global $conn;


$idUtente = $_SESSION["idUtente"];

$admin = false;
if (isset($_SESSION["idUtente"])) {
    $utente = $conn->query("SELECT * FROM utenti WHERE ID = " . $_SESSION["idUtente"])->fetch_all(MYSQLI_ASSOC)[0];
    if ($utente['Admin'] == 1) {
        $admin = true;
    }
}

if ($admin != true) {
    header("Location: prodotti.php?err=errore");

}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!isset($_POST["Titolo"]) || !isset($_POST["Prezzo"]) || !isset($_POST["Descrizione"]) || !isset($_POST["Marca"]) || !isset($_POST["Quantita"]) || !isset($_FILES["Img"])) {
        header("Location: addProduct.php?err=errore");
        exit;
    }
    
    
    $target_dir = "img/products/";
$target_file = $target_dir . basename($_FILES["Img"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
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
if ($_FILES["fileToUpload"]["size"] > 500000) {
  echo "Sorry, your file is too large.";
  $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
  echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
  $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["Img"]["tmp_name"], $target_file)) {
    echo "The file ". htmlspecialchars( basename( $_FILES["Img"]["name"])). " has been uploaded.";
  } else {
    echo "Sorry, there was an error uploading your file.";
  }
}

    $Titolo = $_POST["Titolo"];
    $Prezzo = $_POST["Prezzo"];
    $Descrizione = $_POST["Descrizione"];
    $Marca = $_POST["Marca"];
    $Quantita = $_POST["Quantita"];
    $img = $target_file;


    try {
        $conn->begin_transaction();
        $conn->query("INSERT INTO articoli (Titolo, Prezzo, Descrizione, Marca, Quantita) VALUES ('" . $Titolo . "', " . $Prezzo . ", '" . $Descrizione . "', '" . $Marca . "', " . $Quantita . ")");
        $prodid = $conn->insert_id;
        

        $conn->commit();
    } catch (Exception $e) {
        $conn->rollback();
        header("Location: addProduct.php?err=errore");
        exit;
    }
}


?>

<!doctype html>
<html lang="en">

<head>
    <title>PageTitle</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">

    <!--Convert to an external stylesheet-->
    <style>
        html,
        body {
            height: 100%;
        }

        body {
            background: black;
            /* fallback for old browsers */
            background: -webkit-linear-gradient(to right, rgb(0, 0, 0), rgb(50, 50, 50));
            /* Chrome 10-25, Safari 5.1-6 */
            background: linear-gradient(to right, rgb(0, 0, 0), rgb(50, 50, 50));
            /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
            color: white;
            display: flex;
            align-items: center;
            padding-top: 40px;
            padding-bottom: 40px;
        }

        .form-signin {
            width: 100%;
            max-width: 330px;
            padding: 15px;
            margin: auto;
            color: #212121;
            border: 4px solid #ff993b;
            border-radius: 25px;
        }

        .form-signin .checkbox {
            font-weight: 400;
        }

        .form-signin .form-floating:focus-within {
            z-index: 2;
        }

        .form-signin input[type="email"] {
            margin-bottom: -1px;
            border-bottom-right-radius: 0;
            border-bottom-left-radius: 0;
        }

        .form-signin input[type="password"] {
            margin-bottom: 10px;
            border-top-left-radius: 0;
            border-top-right-radius: 0;
        }
    </style>

</head>

<body class="text-center">
    <div class="form-signin bg-light">
        <form method="post" enctype="multipart/form-data">
            <h1 class="h3 mb-3 fw-normal">Nuovo articolo</h1>

            <div class="form-floating">
                <input type="text" class="form-control" id="Titolo" name="Titolo" placeholder="Titolo*">
                <label for="Titolo">Titolo*</label>
            </div>
            <div class="form-floating">
                <input type="text" class="form-control" id="Marca" name="Marca" placeholder="Marca*">
                <label for="Marca">Marca*</label>
            </div>
            <div class="form-floating">
                <input type="number" step="0.01" class="form-control" id="Prezzo" name="Prezzo" placeholder="Prezzo*">
                <label for="Prezzo">Prezzo*</label>
            </div>
            <div class="form-floating">
                <input type="text" class="form-control" id="Descrizione" name="Descrizione" placeholder="Descrizione*">
                <label for="Descrizione">Descrizione*</label>
            </div>
            <div class="form-floating">
                <input type="number" class="form-control" id="Quantita" name="Quantita" placeholder="Quantita*">
                <label for="Quantita">Quantita*</label>
            </div>
            <div class="form-floating">
                <input type="file" class="form-control" id="Img" name="Img" placeholder="Img*">
                <label for="Img">Img*</label>
            </div>

            <button class="w-100 btn btn-lg btn-dark" type="submit">Aggiungi</button>
        </form>
    </div>


    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous">
        </script>
</body>

</html>