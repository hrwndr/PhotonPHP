<?php require_once("app/views/components/header.php") ?>

<main>
    <section class="hero">
        <div class="container">
            <h2><?= $title ?></h2>
            <p><?= __("A lightweight PHP framework for building web applications.") ?></p>
        </div>
    </section>

    <section class="features">
        <div class="container">
            <div class="feature">
                <i class="fa fa-code"></i>
                <h3><?= __("Simple & Lightweight") ?></h3>
                <p><?= __("PhotonPHP is designed to be easy to use and lightweight, making it ideal for small to medium-sized projects.") ?></p>
            </div>
            <div class="feature">
                <i class="fa fa-cogs"></i>
                <h3><?= __("Powerful Features") ?></h3>
                <p><?= __("Despite its simplicity, PhotonPHP provides essential features like routing, user authentication, and more.") ?></p>
            </div>
            <div class="feature">
                <i class="fa fa-rocket"></i>
                <h3><?= __("Fast & Efficient") ?></h3>
                <p><?= __("With minimal overhead, PhotonPHP ensures your web applications perform well and respond quickly.")?></p>
            </div>
        </div>
    </section>
</main>

<?php require_once("app/views/components/footer.php") ?>
