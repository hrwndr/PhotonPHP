<?php
function loadLanguage($lang) {
    $langFile = 'translations/' . $lang . '.php';
    if (file_exists($langFile)) {
        return include $langFile;
    }
    return []; // Return an empty array if the language file doesn't exist
}

// Determine user's preferred language (e.g., from URL parameter or browser settings)
$userLanguage = isset($_GET['lang']) ? $_GET['lang'] : 'en'; // Default to English if no language specified (if changing also change in topbar header.php)

// Load the language file
$language = loadLanguage($userLanguage);

// Translation function
function __($key) {
    global $language;
    return isset($language[$key]) ? $language[$key] : $key; // Return the translated text or the original key if translation not found
}
?>
