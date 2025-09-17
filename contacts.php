<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Handle ADDING a new contact
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_contact'])) {
    $newContact = [
        'id' => 'c' . (count($_SESSION['contacts']) + 1), // Simple unique ID
        'name' => $_POST['contact-name'] ?? 'Unnamed Contact',
        'company' => $_POST['contact-company'] ?? '',
        'email' => $_POST['contact-email'] ?? '',
    ];
    $_SESSION['contacts'][] = $newContact;
    header('Location: contacts.php');
    exit;
}

$pageTitle = 'Contacts';
require_once 'header.php';
?>

<div class="flex justify-between items-center mb-6">
    <h1 class="text-3xl font-bold">Contacts</h1>
    <button id="add-contact-btn" class="bg-[var(--primary-color)] text-white px-4 py-2 rounded-lg font-semibold hover:opacity-90">
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
                <?php foreach ($_SESSION['contacts'] as $contact): ?>
                <tr class="border-b dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-700">
                    <td class="p-3 font-medium"><?php echo htmlspecialchars($contact['name']); ?></td>
                    <td class="p-3"><?php echo htmlspecialchars($contact['company']); ?></td>
                    <td class="p-3 text-gray-500"><?php echo htmlspecialchars($contact['email']); ?></td>
                    <td class="p-3">
                        <a href="view-contact.php?id=<?php echo htmlspecialchars($contact['id']); ?>" class="text-[var(--primary-color)] hover:underline">Details</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<div id="contact-modal" class="fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center hidden">
    <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-xl w-full max-w-lg">
        <div class="flex justify-between items-center border-b dark:border-gray-700 pb-3 mb-4">
            <h2 class="text-xl font-bold">Add New Contact</h2>
            <button id="close-modal-btn" class="text-gray-500 hover:text-gray-800 dark:hover:text-gray-300 text-2xl">&times;</button>
        </div>
        
        <form id="add-contact-form" class="space-y-4" method="POST" action="contacts.php">
            <div>
                <label for="contact-name" class="block text-sm font-medium">Full Name</label>
                <input type="text" id="contact-name" name="contact-name" required class="mt-1 block w-full bg-gray-100 dark:bg-gray-700 border-gray-300 dark:border-gray-600 rounded-md shadow-sm p-2">
            </div>
            <div>
                <label for="contact-company" class="block text-sm font-medium">Company</label>
                <input type="text" id="contact-company" name="contact-company" required class="mt-1 block w-full bg-gray-100 dark:bg-gray-700 border-gray-300 dark:border-gray-600 rounded-md shadow-sm p-2">
            </div>
            <div>
                <label for="contact-email" class="block text-sm font-medium">Email</label>
                <input type="email" id="contact-email" name="contact-email" required class="mt-1 block w-full bg-gray-100 dark:bg-gray-700 border-gray-300 dark:border-gray-600 rounded-md shadow-sm p-2">
            </div>

            <div class="flex justify-end space-x-4 mt-6 border-t dark:border-gray-700 pt-4">
                <button id="cancel-btn" type="button" class="bg-gray-200 dark:bg-gray-600 px-4 py-2 rounded-lg font-semibold hover:bg-gray-300">Cancel</button>
                <button name="add_contact" type="submit" class="bg-[var(--primary-color)] text-white px-4 py-2 rounded-lg font-semibold hover:opacity-90">Save Contact</button>
            </div>
        </form>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const addBtn = document.getElementById('add-contact-btn');
    const modal = document.getElementById('contact-modal');
    const closeBtn = document.getElementById('close-modal-btn');
    const cancelBtn = document.getElementById('cancel-btn');
    if(addBtn) {
        const openModal = () => modal.classList.remove('hidden');
        const closeModal = () => modal.classList.add('hidden');
        addBtn.addEventListener('click', openModal);
        closeBtn.addEventListener('click', closeModal);
        cancelBtn.addEventListener('click', closeModal);
        modal.addEventListener('click', (event) => {
            if (event.target === modal) closeModal();
        });
    }
});
</script>

<?php require_once 'footer.php'; ?>