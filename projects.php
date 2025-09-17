<?php
// This block must run before any HTML is output
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Handle ADDING a new project
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_project'])) {
    
    $newProject = [
        'id' => 'p' . (count($_SESSION['projects']) + 1),
        'title' => $_POST['project-title'] ?? 'Untitled Project',
        'contactId' => $_POST['project-client'] ?? '',
        'status' => 'New',
        'value' => $_POST['project-value'] ?? 0,
        'date' => $_POST['project-date'] ?? date('Y-m-d'),
        'description' => 'No description provided.',
        'files' => [],
    ];
    $_SESSION['projects'][] = $newProject;
    header('Location: projects.php');
    exit;
}

// NEW: Logic to handle STATUS updates
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['project_id']) && isset($_POST['new_status'])) {
    $projectIdToUpdate = $_POST['project_id'];
    $newStatus = $_POST['new_status'];

    // Find and update the project in the session
    foreach ($_SESSION['projects'] as &$project) {
        if ($project['id'] === $projectIdToUpdate) {
            $project['status'] = $newStatus;
            break; // Stop the loop once found
        }
    }
    unset($project); // Unset the reference

    header('Location: projects.php');
    exit;
}

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
                <?php foreach ($_SESSION['projects'] as $project): ?>
                <tr class="border-b dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-700">
                    <td class="p-3 font-medium"><?php echo htmlspecialchars($project['title']); ?></td>
                    <td class="p-3"><?php echo htmlspecialchars(getContactNameById($_SESSION['contacts'], $project['contactId'])); ?></td>
                    
                    <td class="p-3">
                        <form method="POST" action="projects.php">
                            <input type="hidden" name="project_id" value="<?php echo htmlspecialchars($project['id']); ?>">
                            <select name="new_status" class="block w-full bg-gray-100 dark:bg-gray-700 border-gray-300 dark:border-gray-600 rounded-md shadow-sm p-2 text-sm" onchange="this.form.submit()">
                                <?php 
                                $statuses = ['New', 'Quote Sent', 'In Progress', 'Completed'];
                                foreach ($statuses as $status): 
                                ?>
                                    <option value="<?php echo $status; ?>" <?php if ($project['status'] === $status) echo 'selected'; ?>>
                                        <?php echo $status; ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </form>
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
            <button id="close-modal-btn" class="text-gray-500 hover:text-gray-800 dark:hover:text-gray-300 text-2xl">&times;</button>
        </div>
        
        <form id="add-project-form" class="space-y-4" method="POST" action="projects.php">
            <div>
                <label for="project-title" class="block text-sm font-medium">Project Title</label>
                <input type="text" id="project-title" name="project-title" required class="mt-1 block w-full bg-gray-100 dark:bg-gray-700 border-gray-300 dark:border-gray-600 rounded-md shadow-sm p-2">
            </div>
            <div>
                <label for="project-client" class="block text-sm font-medium">Client</label>
                <select id="project-client" name="project-client" required class="mt-1 block w-full bg-gray-100 dark:bg-gray-700 border-gray-300 dark:border-gray-600 rounded-md shadow-sm p-2">
                    <option value="">Select a client...</option>
                    <?php foreach ($_SESSION['contacts'] as $contact): ?>
                        <option value="<?php echo $contact['id']; ?>"><?php echo htmlspecialchars($contact['name']); ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div>
                <label for="project-value" class="block text-sm font-medium">Project Value (£)</label>
                <input type="number" id="project-value" name="project-value" required class="mt-1 block w-full bg-gray-100 dark:bg-gray-700 border-gray-300 dark:border-gray-600 rounded-md shadow-sm p-2">
            </div>
            <div>
                <label for="project-date" class="block text-sm font-medium">Due Date</label>
                <input type="date" id="project-date" name="project-date" required class="mt-1 block w-full bg-gray-100 dark:bg-gray-700 border-gray-300 dark:border-gray-600 rounded-md shadow-sm p-2">
            </div>

            <div class="flex justify-end space-x-4 mt-6 border-t dark:border-gray-700 pt-4">
                <button id="cancel-btn" type="button" class="bg-gray-200 dark:bg-gray-600 px-4 py-2 rounded-lg font-semibold hover:bg-gray-300">Cancel</button>
                <button name="add_project" type="submit" class="bg-[var(--primary-color)] text-white px-4 py-2 rounded-lg font-semibold hover:opacity-90">Save Project</button>
            </div>
        </form>
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

<?php require_once 'footer.php'; ?>