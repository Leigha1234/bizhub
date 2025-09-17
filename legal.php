<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Handle CREATING a new document
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['create_document'])) {
    $newDocument = [
        'title' => $_POST['document-name'] ?? 'Untitled Document',
        'type' => $_POST['template-select'] ?? 'General',
        'date' => date('Y-m-d'),
    ];
    $_SESSION['legalDocuments'][] = $newDocument;
    header('Location: legal.php');
    exit;
}

// Handle DELETING a document
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete_document'])) {
    $docIndexToDelete = $_POST['doc_index'];
    if (isset($_SESSION['legalDocuments'][$docIndexToDelete])) {
        // Remove the element from the array
        unset($_SESSION['legalDocuments'][$docIndexToDelete]);
        // Re-index the array to prevent gaps
        $_SESSION['legalDocuments'] = array_values($_SESSION['legalDocuments']);
    }
    header('Location: legal.php');
    exit;
}

$pageTitle = 'Legal Hub';
require_once 'header.php';
?>

<div class="flex justify-between items-center mb-6">
    <h1 class="text-3xl font-bold">Legal Hub</h1>
    <button id="upload-btn" class="bg-[var(--primary-color)] text-white px-4 py-2 rounded-lg font-semibold hover:opacity-90">
        Upload Document
    </button>
</div>

<div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

    <div class="lg:col-span-1">
        <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-md">
            <h2 class="text-xl font-bold mb-4">Create New Document</h2>
            <p class="text-sm text-gray-600 dark:text-gray-400 mb-6">Start with a professionally written template.</p>
            
            <form class="space-y-4" method="POST" action="legal.php">
                <div>
                    <label for="template-select" class="block text-sm font-medium">Choose a Template</label>
                    <select id="template-select" name="template-select" class="mt-1 block w-full bg-gray-50 dark:bg-gray-700 rounded-md p-2">
                        <option>Agreement</option>
                        <option>Policy</option>
                        <option>Form</option>
                        <option>Terms & Conditions</option>
                    </select>
                </div>
                <div>
                    <label for="document-name" class="block text-sm font-medium">Document Name</label>
                    <input type="text" id="document-name" name="document-name" required placeholder="e.g., 'Agreement with Brand X'" class="mt-1 block w-full bg-gray-50 dark:bg-gray-700 rounded-md p-2">
                </div>
                <button type="submit" name="create_document" class="w-full bg-green-500 text-white px-4 py-2 rounded-lg font-semibold hover:bg-green-600">
                    Create Document
                </button>
            </form>
        </div>
    </div>
    <div class="lg:col-span-2">
        <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-md">
            <h2 class="text-xl font-bold mb-4">My Documents</h2>
            <div class="overflow-x-auto">
                <table class="w-full text-left">
                    <thead class="border-b dark:border-gray-700">
                        <tr><th class="p-3">Title</th><th class="p-3">Type</th><th class="p-3">Date</th><th class="p-3">Actions</th></tr>
                    </thead>
                    <tbody>
                        <?php if (empty($_SESSION['legalDocuments'])): ?>
                            <tr><td colspan="4" class="p-3 text-center text-gray-500">No documents yet.</td></tr>
                        <?php else: ?>
                            <?php foreach ($_SESSION['legalDocuments'] as $index => $doc): ?>
                            <tr class="border-b dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-700">
                                <td class="p-3 font-medium"><?php echo htmlspecialchars($doc['title']); ?></td>
                                <td class="p-3 text-gray-500"><?php echo htmlspecialchars($doc['type']); ?></td>
                                <td class="p-3 text-gray-500"><?php echo date("d M Y", strtotime($doc['date'])); ?></td>
                                <td class="p-3 flex items-center space-x-4">
                                    <a href="view-document.php?index=<?php echo $index; ?>" class="text-[var(--primary-color)] hover:underline font-semibold">View</a>
                                    <form method="POST" action="legal.php" onsubmit="return confirm('Are you sure you want to delete this document?');">
                                        <input type="hidden" name="doc_index" value="<?php echo $index; ?>">
                                        <button type="submit" name="delete_document" class="text-red-500 hover:underline font-semibold bg-transparent border-none p-0 cursor-pointer">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div id="upload-modal" class="fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center hidden">
    <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-xl w-full max-w-lg">
        <div class="flex justify-between items-center border-b dark:border-gray-700 pb-3 mb-4">
            <h2 class="text-xl font-bold">Upload Document</h2>
            <button id="close-modal-btn" class="text-gray-500 hover:text-gray-800 dark:hover:text-gray-300 text-2xl">&times;</button>
        </div>
        <form class="space-y-4">
            <div>
                <label for="upload-name" class="block text-sm font-medium">Document Name</label>
                <input type="text" id="upload-name" name="upload-name" required placeholder="e.g., 'Signed Contract'" class="mt-1 block w-full bg-gray-100 dark:bg-gray-700 rounded-md p-2">
            </div>
            <div>
                <label for="upload-file" class="block text-sm font-medium">File</label>
                <input type="file" id="upload-file" name="upload-file" required class="mt-1 block w-full text-sm">
            </div>
            <div class="flex justify-end space-x-4 mt-6 border-t dark:border-gray-700 pt-4">
                <button id="cancel-btn" type="button" class="bg-gray-200 dark:bg-gray-600 px-4 py-2 rounded-lg font-semibold hover:bg-gray-300">Cancel</button>
                <button type="submit" class="bg-[var(--primary-color)] text-white px-4 py-2 rounded-lg font-semibold hover:opacity-90">Upload</button>
            </div>
        </form>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const uploadBtn = document.getElementById('upload-btn');
    const modal = document.getElementById('upload-modal');
    const closeBtn = document.getElementById('close-modal-btn');
    const cancelBtn = document.getElementById('cancel-btn');
    if (uploadBtn) {
        const openModal = () => modal.classList.remove('hidden');
        const closeModal = () => modal.classList.add('hidden');
        uploadBtn.addEventListener('click', openModal);
        closeBtn.addEventListener('click', closeModal);
        cancelBtn.addEventListener('click', closeModal);
    }
});
</script>

<?php require_once 'footer.php'; ?>