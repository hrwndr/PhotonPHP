<!-- app/views/layout.php -->
<?php
ob_start();
// header component file
require_once 'components/header.php';
$headerContent = ob_get_clean();
// content from controllers
$content = $content ?? '';
// footer component file
require_once 'components/footer.php';
$footerContent = ob_get_clean();

// Concatenate the final output
echo $headerContent;
echo $content;
echo $footerContent;
?>