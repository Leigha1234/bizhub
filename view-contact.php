<?php
$pageTitle = 'View Contact'; // Set the title for this page
require_once 'header.php'; // Include the header

// Get the contact ID from the URL
$contactId = $_GET['id'] ?? null;

// Find the contact data using our new helper function
$contact = getContactById($_SESSION['contacts'], $contactId);

// Find projects associated with this contact
$associatedProjects = [];
if ($contact) {
    foreach ($_SESSION['projects'] as $project) {
        if ($project['contactId'] === $contact['id']) {
            $associatedProjects[] = $project;
        }
    }
}
?>

<?php if ($contact): ?>

    <div class="mb-6">
        <a href="contacts.php" class="text-[var(--primary-color)] hover:underline">&larr; Back to All Contacts</a>
        <div class="flex items-center mt-2">
            <h1 class="text-3xl font-bold"><?php echo htmlspecialchars($contact['name']); ?></h1>
        </div>
        <p class="text-gray-500 dark:text-gray-400"><?php echo htmlspecialchars($contact['company']); ?></p>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <div class="lg:col-span-1 bg-white dark:bg-gray-800 p-6 rounded-lg shadow-md">
            <h2 class="text-xl font-bold mb-4">Contact Information</h2>
            <div class="space-y-4">
                <div>
                    <h3 class="font-semibold text-gray-500 dark:text-gray-400">Email Address</h3>
                    <p class="text-gray-800 dark:text-gray-200"><?php echo htmlspecialchars($contact['email']); ?></p>
                </div>
                 <div>
                    <h3 class="font-semibold text-gray-500 dark:text-gray-400">Contact ID</h3>
                    <p class="text-gray-800 dark:text-gray-200"><?php echo htmlspecialchars($contact['id']); ?></p>
                </div>
            </div>
        </div>

        <div class="lg:col-span-2 bg-white dark:bg-gray-800 p-6 rounded-lg shadow-md">
            <h2 class="text-xl font-bold mb-4">Associated Projects</h2>
            <?php if (!empty($associatedProjects)): ?>
                <ul class="space-y-3">
                    <?php foreach ($associatedProjects as $project): ?>
                        <li class="flex justify-between items-center p-3 bg-gray-50 dark:bg-gray-700 rounded-md">
                            <span class="font-medium"><?php echo htmlspecialchars($project['title']); ?></span>
                            <a href="view-project.php?id=<?php echo $project['id']; ?>" class="text-sm text-[var(--primary-color)] hover:underline font-semibold">View Project</a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            <?php else: ?>
                <p class="text-gray-500">No projects are currently associated with this contact.</p>
            <?php endif; ?>
        </div>
    </div>

<?php else: ?>

    <div class="text-center py-10">
        <h1 class="text-3xl font-bold text-red-500">Contact Not Found</h1>
        <p class="mt-4 text-gray-500">The contact you are looking for does not exist or the ID is incorrect.</p>
        <a href="contacts.php" class="mt-6 inline-block bg-[var(--primary-color)] text-white px-6 py-2 rounded-lg font-semibold hover:opacity-90">
            Return to Contacts
        </a>
    </div>

<?php endif; ?>

<?php require_once 'footer.php'; ?>