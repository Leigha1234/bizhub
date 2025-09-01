<?php
$pageTitle = 'Dashboard'; // Set the title for this page
require_once 'header.php'; // Include the header
?>

<h1 class="text-3xl font-bold mb-6">Dashboard</h1>

<!-- Stat Cards Grid -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
    <?php foreach ($dashboardStats as $stat): ?>
        <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-md">
            <h2 class="text-gray-500 dark:text-gray-400 text-sm font-medium"><?php echo $stat['label']; ?></h2>
            <p class="text-3xl font-bold mt-2"><?php echo $stat['value']; ?></p>
        </div>
    <?php endforeach; ?>
</div>

<?php require_once 'footer.php'; // Include the footer ?>