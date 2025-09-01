<?php
$pageTitle = 'View Project'; // Set the title for this page
require_once 'header.php'; // Include the header

// Get the project ID from the URL, or set it to null if not provided
$projectId = $_GET['id'] ?? null;

// Find the project data using the helper function
$project = getProjectById($mockProjects, $projectId);

?>

<?php if ($project): ?>
    
    <div class="mb-6">
        <a href="projects.php" class="text-[var(--primary-color)] hover:underline">&larr; Back to All Projects</a>
        <h1 class="text-3xl font-bold mt-2"><?php echo htmlspecialchars($project['title']); ?></h1>
        <p class="text-gray-500 dark:text-gray-400">Client: <?php echo htmlspecialchars(getContactNameById($mockContacts, $project['contactId'])); ?></p>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <div class="lg:col-span-2 bg-white dark:bg-gray-800 p-6 rounded-lg shadow-md">
            <h2 class="text-xl font-bold mb-4">Project Details</h2>
            <div class="space-y-4">
                <div>
                    <h3 class="font-semibold">Status</h3>
                    <p class="text-gray-600 dark:text-gray-300"><?php echo htmlspecialchars($project['status']); ?></p>
                </div>
                <div>
                    <h3 class="font-semibold">Description</h3>
                    <p class="text-gray-600 dark:text-gray-300">A full UI/UX overhaul for their new company website, focusing on a modern aesthetic and improved user flow.</p>
                </div>
                 <div>
                    <h3 class="font-semibold">Files</h3>
                    <ul class="list-disc list-inside text-gray-600 dark:text-gray-300">
                        <li>Spring_Brief.pdf</li>
                        <li>Moodboard.jpg</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="lg:col-span-1 bg-white dark:bg-gray-800 p-6 rounded-lg shadow-md">
             <h2 class="text-xl font-bold mb-4">Financials</h2>
             <div class="space-y-4">
                <div>
                    <h3 class="font-semibold">Project Value</h3>
                    <p class="text-gray-600 dark:text-gray-300">£<?php echo number_format($project['value'], 2); ?></p>
                </div>
                <div>
                    <h3 class="font-semibold">Due Date</h3>
                    <p class="text-gray-600 dark:text-gray-300"><?php echo date("F d, Y", strtotime($project['date'])); ?></p>
                </div>
             </div>
        </div>
    </div>

<?php else: ?>
    
    <div class="text-center py-10">
        <h1 class="text-3xl font-bold text-red-500">Project Not Found</h1>
        <p class="mt-4 text-gray-500">The project you are looking for does not exist or the ID is incorrect.</p>
        <a href="projects.php" class="mt-6 inline-block bg-[var(--primary-color)] text-white px-6 py-2 rounded-lg font-semibold hover:opacity-90">
            Return to Projects
        </a>
    </div>

<?php endif; ?>

<?php require_once 'footer.php'; // Include the footer ?>