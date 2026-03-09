<?php
// ============================================
//  CONFIG.PHP — Configuration générale du site
// ============================================

define('SITE_NAME', 'TEST PHP');
define('SITE_VERSION', '2.0');
define('SITE_AUTHOR', 'CHRAIBI AYA');
define('BASE_URL', 'http://localhost/tp_include_v2/');

// Couleurs du thème (utilisées dans le CSS dynamique)
define('COLOR_PRIMARY', '#6C63FF');
define('COLOR_SECONDARY', '#FF6584');
define('COLOR_DARK', '#1a1a2e');

// Paramètres de la base de données (non utilisés ici, mais bonne pratique)
define('DB_HOST', 'localhost');
define('DB_NAME', 'tp_php');
define('DB_USER', 'root');
define('DB_PASS', '');

// Fuseau horaire
date_default_timezone_set('Africa/Casablanca');

// Démarrage de session
session_start();
?>