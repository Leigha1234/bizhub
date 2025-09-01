<?php
$pageTitle = 'Contacts'; // Set the title for this page
require_once 'header.php'; // Include the header
?>

<div class="flex justify-between items-center mb-6">
    <h1 class="text-3xl font-bold">Contacts</h1>
    <button class="bg-[var(--primary-color)] text-white px-4 py-2 rounded-lg font-semibold hover:opacity-90">
        Add New Contact
    </button>
</div>

<div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-md">
    <div class="overflow-x-auto">
        <table class="w-full text-left">
            <thead class="border-b dark:border-gray-700">
                <tr>
                    <th class="p-3">Name</th>
                    <th class="p-3">Company</th>
                    <th class="p-3">Email</th>
                    <th class="p-3">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($mockContacts as $contact): ?>
                <tr class="border-b dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-700">
                    <td class="p-3 font-medium"><?php echo htmlspecialchars($contact['name']); ?></td>
                    <td class="p-3"><?php echo htmlspecialchars($contact['company']); ?></td>
                    <td class="p-3 text-gray-500"><?php echo htmlspecialchars($contact['email']); ?></td>
                    <td class="p-3">
                        <a href="#" class="text-[var(--primary-color)] hover:underline">Details</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<?php require_once 'footer.php'; // Include the footer ?>