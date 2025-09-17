<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Handle ADDING a new invoice
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_invoice'])) {
    $projectId = $_POST['invoice-project'];
    $project = getProjectById($_SESSION['projects'], $projectId);

    $newInvoice = [
        'id' => 'inv' . (count($_SESSION['invoices']) + 1),
        'projectId' => $projectId,
        'contactId' => $project['contactId'] ?? '',
        'amount' => $_POST['invoice-amount'] ?? 0,
        'dueDate' => $_POST['invoice-due-date'] ?? date('Y-m-d'),
        'status' => $_POST['invoice-status'] ?? 'Draft',
    ];
    $_SESSION['invoices'][] = $newInvoice;
    header('Location: finances.php');
    exit;
}

$pageTitle = 'Finances';
require_once 'header.php';

// Calculate financial stats from session data
$totalInvoiced = 0;
$totalPaid = 0;
foreach ($_SESSION['invoices'] as $invoice) {
    if ($invoice['status'] !== 'Draft') {
        $totalInvoiced += $invoice['amount'];
    }
    if ($invoice['status'] === 'Paid') {
        $totalPaid += $invoice['amount'];
    }
}
$totalOutstanding = $totalInvoiced - $totalPaid;
?>

<div class="flex justify-between items-center mb-6">
    <h1 class="text-3xl font-bold">Finances</h1>
    <button id="add-invoice-btn" class="bg-[var(--primary-color)] text-white px-4 py-2 rounded-lg font-semibold hover:opacity-90">
        Create New Invoice
    </button>
</div>

<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
    <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-md">
        <h2 class="text-gray-500 dark:text-gray-400 text-sm font-medium">Total Invoiced</h2>
        <p class="text-3xl font-bold mt-2 text-blue-500">£<?php echo number_format($totalInvoiced, 2); ?></p>
    </div>
    <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-md">
        <h2 class="text-gray-500 dark:text-gray-400 text-sm font-medium">Paid</h2>
        <p class="text-3xl font-bold mt-2 text-green-500">£<?php echo number_format($totalPaid, 2); ?></p>
    </div>
    <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-md">
        <h2 class="text-gray-500 dark:text-gray-400 text-sm font-medium">Outstanding</h2>
        <p class="text-3xl font-bold mt-2 text-red-500">£<?php echo number_format($totalOutstanding, 2); ?></p>
    </div>
</div>

<div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-md">
    <h2 class="text-xl font-bold mb-4">Transaction History</h2>
    <div class="overflow-x-auto">
        <table class="w-full text-left">
            <thead class="border-b dark:border-gray-700">
                <tr>
                    <th class="p-3">Due Date</th>
                    <th class="p-3">Invoice / Project</th>
                    <th class="p-3">Client</th>
                    <th class="p-3">Amount</th>
                    <th class="p-3">Status</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($_SESSION['invoices'] as $invoice): ?>
                <tr class="border-b dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-700">
                    <td class="p-3 text-gray-500"><?php echo date("d M Y", strtotime($invoice['dueDate'])); ?></td>
                    <td class="p-3 font-medium"><?php echo htmlspecialchars(getProjectTitleById($_SESSION['projects'], $invoice['projectId'])); ?></td>
                    <td class="p-3"><?php echo htmlspecialchars(getContactNameById($_SESSION['contacts'], $invoice['contactId'])); ?></td>
                    <td class="p-3">£<?php echo number_format($invoice['amount'], 2); ?></td>
                    <td class="p-3">
                        <?php 
                        $statusClass = 'bg-gray-100 text-gray-800';
                        if ($invoice['status'] === 'Paid') $statusClass = 'bg-green-100 text-green-800';
                        if ($invoice['status'] === 'Outstanding') $statusClass = 'bg-red-100 text-red-800';
                        ?>
                        <span class="px-2 py-1 text-xs font-semibold rounded-full <?php echo $statusClass; ?>">
                            <?php echo htmlspecialchars($invoice['status']); ?>
                        </span>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<div id="invoice-modal" class="fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center hidden">
    <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-xl w-full max-w-lg">
        <div class="flex justify-between items-center border-b dark:border-gray-700 pb-3 mb-4">
            <h2 class="text-xl font-bold">Create New Invoice</h2>
            <button id="close-modal-btn" class="text-gray-500 hover:text-gray-800 dark:hover:text-gray-300 text-2xl">&times;</button>
        </div>
        
        <form id="add-invoice-form" class="space-y-4" method="POST" action="finances.php">
            <div>
                <label for="invoice-project" class="block text-sm font-medium">Select Project</label>
                <select id="invoice-project" name="invoice-project" required class="mt-1 block w-full bg-gray-100 dark:bg-gray-700 border-gray-300 dark:border-gray-600 rounded-md shadow-sm p-2">
                    <option value="">Choose a project...</option>
                    <?php foreach ($_SESSION['projects'] as $project): ?>
                        <option value="<?php echo $project['id']; ?>"><?php echo htmlspecialchars($project['title']); ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div>
                <label for="invoice-amount" class="block text-sm font-medium">Amount (£)</label>
                <input type="number" id="invoice-amount" name="invoice-amount" required class="mt-1 block w-full bg-gray-100 dark:bg-gray-700 border-gray-300 dark:border-gray-600 rounded-md shadow-sm p-2">
            </div>
            <div>
                <label for="invoice-due-date" class="block text-sm font-medium">Due Date</label>
                <input type="date" id="invoice-due-date" name="invoice-due-date" required class="mt-1 block w-full bg-gray-100 dark:bg-gray-700 border-gray-300 dark:border-gray-600 rounded-md shadow-sm p-2">
            </div>
             <div>
                <label for="invoice-status" class="block text-sm font-medium">Status</label>
                <select id="invoice-status" name="invoice-status" required class="mt-1 block w-full bg-gray-100 dark:bg-gray-700 border-gray-300 dark:border-gray-600 rounded-md shadow-sm p-2">
                    <option>Draft</option>
                    <option>Outstanding</option>
                    <option>Paid</option>
                </select>
            </div>
            <div class="flex justify-end space-x-4 mt-6 border-t dark:border-gray-700 pt-4">
                <button id="cancel-btn" type="button" class="bg-gray-200 dark:bg-gray-600 px-4 py-2 rounded-lg font-semibold hover:bg-gray-300">Cancel</button>
                <button name="add_invoice" type="submit" class="bg-[var(--primary-color)] text-white px-4 py-2 rounded-lg font-semibold hover:opacity-90">Save Invoice</button>
            </div>
        </form>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const addBtn = document.getElementById('add-invoice-btn');
    const modal = document.getElementById('invoice-modal');
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