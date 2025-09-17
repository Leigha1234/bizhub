<?php
// We only start a session if one hasn't already been started
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once 'data.php';

// Initialize each piece of session data independently
// This prevents errors when new features are added.
if (!isset($_SESSION['projects'])) {
    $_SESSION['projects'] = $mockProjects;
}
if (!isset($_SESSION['contacts'])) {
    $_SESSION['contacts'] = $mockContacts;
}
if (!isset($_SESSION['invoices'])) {
    $_SESSION['invoices'] = $mockInvoices;
}
if (!isset($_SESSION['contentPlanner'])) {
    $_SESSION['contentPlanner'] = $contentPlanner;
}
if (!isset($_SESSION['primary_color'])) {
    $_SESSION['primary_color'] = '#4f46e5';
}

// Get the primary color from the session, providing a default if it's not set
$primaryColor = htmlspecialchars($_SESSION['primary_color'] ?? '#4f46e5');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biz-Hub - <?php echo $pageTitle ?? 'Dashboard'; ?></title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700;900&display=swap" rel="stylesheet">
    <style>
        :root { 
            --primary-color: <?php echo $primaryColor; ?>; 
        }
        body { font-family: 'Inter', sans-serif; }
        .sidebar-link.active { background-color: var(--primary-color); color: white; }
        .sidebar-link.active svg { color: white; }
    </style>
</head>
<body class="bg-gray-100 dark:bg-gray-900 text-gray-900 dark:text-gray-100">

<div class="flex min-h-screen">
    <aside class="w-64 bg-white dark:bg-gray-800 shadow-lg fixed h-full flex flex-col">
        <div class="p-6">
            <h1 class="text-2xl font-bold text-[var(--primary-color)]">Biz-Hub</h1>
        </div>
        <nav class="flex-grow p-4">
            <ul class="space-y-2">
                <?php foreach ($navItems as $url => $item): ?>
                    <li>
                        <a href="<?php echo $url; ?>" class="sidebar-link flex items-center px-4 py-3 rounded-lg text-gray-700 dark:text-gray-300 hover:bg-gray-200 dark:hover:bg-gray-700 <?php echo (basename($_SERVER['PHP_SELF']) == $url) ? 'active' : ''; ?>">
                            <span class="mr-3 h-6 w-6"><?php echo getIcon($item['icon']); ?></span>
                            <?php echo $item['label']; ?>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </nav>
    </aside>

    <main class="flex-1 ml-64 p-8">