<!-- app/views/header.php -->

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title><?php echo isset($title) ? $title : "PhotonPHP"; ?></title>
    <!-- Include your CSS and other meta tags here -->
    <link rel="stylesheet" href="/assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

</head>

<body>
    <header>
        <nav>
            <div class="container">
                <h1 class="logo">PhotonPHP</h1>
            </div>
        </nav>
    </header>

    <!-- The rest of the content will be inserted dynamically -->