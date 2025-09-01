<?php
$pageTitle = 'Projects'; // Set the title for this page
require_once 'header.php'; // Include the header
?>

<div class="flex justify-between items-center mb-6">
    <h1 class="text-3xl font-bold">Projects</h1>
    <button id="add-project-btn" class="bg-[var(--primary-color)] text-white px-4 py-2 rounded-lg font-semibold hover:opacity-90">
        Add New Project
    </button>
</div>

<div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-md">
    <div class="overflow-x-auto">
        <table class="w-full text-left">
            <thead class="border-b dark:border-gray-700">
                <tr>
                    <th class="p-3">Project Title</th>
                    <th class="p-3">Client</th>
                    <th class="p-3">Status</th>
                    <th class="p-3">Value</th>
                    <th class="p-3">Date</th>
                    <th class="p-3">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($mockProjects as $project): ?>
                <tr class="border-b dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-700">
                    <td class="p-3 font-medium"><?php echo htmlspecialchars($project['title']); ?></td>
                    <td class="p-3"><?php echo htmlspecialchars(getContactNameById($mockContacts, $project['contactId'])); ?></td>
                    <td class="p-3">
                        <span class="px-2 py-1 text-xs font-semibold rounded-full <?php echo ($project['status'] === 'In Progress') ? 'bg-blue-100 text-blue-800' : 'bg-yellow-100 text-yellow-800'; ?>">
                            <?php echo htmlspecialchars($project['status']); ?>
                        </span>
                    </td>
                    <td class="p-3">£<?php echo number_format($project['value']); ?></td>
                    <td class="p-3"><?php echo date("d M Y", strtotime($project['date'])); ?></td>
                    <td class="p-3">
                        <a href="view-project.php?id=<?php echo htmlspecialchars($project['id']); ?>" class="text-[var(--primary-color)] hover:underline">View</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<div id="project-modal" class="fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center hidden">
    <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-xl w-full max-w-lg">
        <div class="flex justify-between items-center border-b dark:border-gray-700 pb-3 mb-4">
            <h2 class="text-xl font-bold">Add New Project</h2>
            <button id="close-modal-btn" class="text-gray-500 hover:text-gray-800 dark:hover:text-gray-300">&times;</button>
        </div>
        <form id="add-project-form" class="space-y-4">
            </form>
        <div class="flex justify-end space-x-4 mt-6 border-t dark:border-gray-700 pt-4">
            <button id="cancel-btn" type="button" class="bg-gray-200 dark:bg-gray-600 px-4 py-2 rounded-lg font-semibold hover:bg-gray-300">Cancel</button>
            <button id="save-btn" type="submit" form="add-project-form" class="bg-[var(--primary-color)] text-white px-4 py-2 rounded-lg font-semibold hover:opacity-90">Save Project</button>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const addProjectBtn = document.getElementById('add-project-btn');
    const projectModal = document.getElementById('project-modal');
    const closeModalBtn = document.getElementById('close-modal-btn');
    const cancelBtn = document.getElementById('cancel-btn');
    if(addProjectBtn) {
        const openModal = () => projectModal.classList.remove('hidden');
        const closeModal = () => projectModal.classList.add('hidden');
        addProjectBtn.addEventListener('click', openModal);
        closeModalBtn.addEventListener('click', closeModal);
        cancelBtn.addEventListener('click', closeModal);
        projectModal.addEventListener('click', (event) => {
            if (event.target === projectModal) closeModal();
        });
    }
});
</script>

<?php require_once 'footer.php'; // Include the footer ?>