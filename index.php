<?php

require('classes/Request.php');

$dirPath = 'root';
$folder = Request::request('folder');
$folderText = '';

$files = scandir($dirPath);
$combinedContent = '';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Txt File Manager PHP</title>
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link href="css/styles.css" rel="stylesheet" />
</head>
<body class="">
    <div class="">
        <header class="row sticky-top bg-dark align-items-center pb-4 pt-4 m-0">
            <div class="col-2 d-flex justify-content-center">
                <img class="logo" src="img/logo.png" alt="logo">
            </div>
            <div class="col-8 text-center">
                <h1 class="white headingTitle">File Manager PHP</h1>
            </div>
            <div class="col-2 d-flex justify-content-end">
                <img class="logoZV" src="img/IesZV.png" alt="">
            </div>
        </header>
    </div>
    <div class="container-fluid">
    <div class="row">
        <div class="col-lg-12 bg-dark">
            <div class="row justify-content-center">
                <aside id="sidebar" class="col-lg-3 text-white p-4 h-100 fullHeight">
                    <h4 class="mb-4 p-2">Options</h4>
                    <form class="m-auto" action="upload.php" method="post" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="file"></label>
                            <input type="file" required id="file" name="file">
                        </div>
                        <div class="mb-3">
                            <label for="send"></label>
                            <button class="btn btn-primary " type="submit" id="send" value="Send">Upload</button>
                        </div>
                    </form>
                    <form action="viewall.php" method="get" target="_blank">
                        <input type="hidden" name="folder" value="<?php echo $folder; ?>">
                        <button type="submit" class="btn btn-success">View All</button>
                    </form>
                    <?= $folderText ?>
                </aside>
                <main id="files" class="col-lg-3 bg-dark text-white p-4 text-center">
                    <h4 class="p2">File List</h4>
                    <ul class="bg-white text-black shadow rounded liststyle mt-4 h-75 pt-3">
                        <?php
                        foreach ($files as $file) {
                            $filePath = $dirPath . '/' . $file;
                            if (is_file($filePath) && pathinfo($file, PATHINFO_EXTENSION) === 'txt') {
                                $fileContent = file_get_contents($filePath);
                                echo "<li>";
                                echo  substr($file, 15) . " ";
                                echo "<a href='view.php?folder=" . $folder . "&file=" . $file . "' target='viewnormal'>View</a>";
                                echo " ";
                                echo "<a href='delete.php?file=$filePath'>delete</a>";
                                echo "";
                                echo "</li>";
                            }
                        }
                        ?>
                    </ul>
                </main>
            </div>
        </div>
    </div>
</div>

    <footer class="">
        <div class="p-4 bg-footer white d-flex pb-2">
            <p class="col-2">Copyright &copy 2023 J.David Zaidin Vergeles</p>
            <p class="col-10 text-end">Desarrollo Entorno Cliente</p>
        </div>
    </footer>
</body>
</html>