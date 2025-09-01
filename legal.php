<?php
$pageTitle = 'Legal Hub'; // Set the title for this page
require_once 'header.php'; // Include the header
?>

<div class="flex justify-between items-center mb-6">
    <h1 class="text-3xl font-bold">Legal Hub</h1>
    <button class="bg-[var(--primary-color)] text-white px-4 py-2 rounded-lg font-semibold hover:opacity-90">
        Upload Document
    </button>
</div>

<div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

    <div class="lg:col-span-1">
        <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-md">
            <h2 class="text-xl font-bold mb-4">Create New Document</h2>
            <p class="text-sm text-gray-600 dark:text-gray-400 mb-6">Start with a professionally written template to protect your business.</p>
            
            <div class="space-y-4">
                <div>
                    <label for="template-select" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Choose a Template</label>
                    <select id="template-select" name="template-select" class="mt-1 block w-full bg-gray-50 dark:bg-gray-700 border-gray-300 dark:border-gray-600 rounded-md shadow-sm p-2 text-sm">
                        <option>Collaboration Agreement</option>
                        <option>Privacy Policy</option>
                        <option>Terms & Conditions</option>
                        <option>Media Release Form</option>
                        <option>Subcontractor Agreement</option>
                    </select>
                </div>
                 <div>
                    <label for="document-name" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Document Name</label>
                    <input type="text" id="document-name" name="document-name" placeholder="e.g., 'Agreement with Brand X'" class="mt-1 block w-full bg-gray-50 dark:bg-gray-700 border-gray-300 dark:border-gray-600 rounded-md shadow-sm p-2 text-sm">
                </div>
                <button class="w-full bg-green-500 text-white px-4 py-2 rounded-lg font-semibold hover:bg-green-600">
                    Create Document
                </button>
            </div>
        </div>
    </div>

    <div class="lg:col-span-2">
        <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-md">
            <h2 class="text-xl font-bold mb-4">My Documents</h2>
            <div class="overflow-x-auto">
                <table class="w-full text-left">
                    <thead class="border-b dark:border-gray-700">
                        <tr>
                            <th class="p-3">Title</th>
                            <th class="p-3">Type</th>
                            <th class="p-3">Date Created</th>
                            <th class="p-3">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($legalDocuments as $doc): ?>
                        <tr class="border-b dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-700">
                            <td class="p-3 font-medium"><?php echo htmlspecialchars($doc['title']); ?></td>
                            <td class="p-3 text-gray-500"><?php echo htmlspecialchars($doc['type']); ?></td>
                            <td class="p-3 text-gray-500"><?php echo date("d M Y", strtotime($doc['date'])); ?></td>
                            <td class="p-3 space-x-4">
                                <a href="#" class="text-[var(--primary-color)] hover:underline font-semibold">View</a>
                                <a href="#" class="text-red-500 hover:underline font-semibold">Delete</a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php require_once 'footer.php'; // Include the footer ?>