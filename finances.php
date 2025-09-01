<?php
$pageTitle = 'Finances'; // Set the title for this page
require_once 'header.php'; // Include the header

// Calculate financial stats from mock data
$totalInvoiced = 0;
$totalPaid = 2500; // Mocked as paid
$totalOutstanding = 0;

foreach ($mockProjects as $project) {
    $totalInvoiced += $project['value'];
}
$totalOutstanding = $totalInvoiced - $totalPaid;

?>

<div class="flex justify-between items-center mb-6">
    <h1 class="text-3xl font-bold">Finances</h1>
    <button class="bg-[var(--primary-color)] text-white px-4 py-2 rounded-lg font-semibold hover:opacity-90">
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
                    <th class="p-3">Date</th>
                    <th class="p-3">Project / Invoice</th>
                    <th class="p-3">Client</th>
                    <th class="p-3">Amount</th>
                    <th class="p-3">Status</th>
                </tr>
            </thead>
            <tbody>
                <tr class="border-b dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-700">
                    <td class="p-3 text-gray-500">25 Aug 2025</td>
                    <td class="p-3 font-medium">Invoice #001</td>
                    <td class="p-3"><?php echo htmlspecialchars(getContactNameById($mockContacts, 'c1')); ?></td>
                    <td class="p-3">£<?php echo number_format($totalPaid, 2); ?></td>
                    <td class="p-3">
                        <span class="px-2 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800">
                            Paid
                        </span>
                    </td>
                </tr>
                <tr class="border-b dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-700">
                    <td class="p-3 text-gray-500"><?php echo date("d M Y", strtotime($mockProjects[1]['date'])); ?></td>
                    <td class="p-3 font-medium"><?php echo htmlspecialchars($mockProjects[1]['title']); ?></td>
                    <td class="p-3"><?php echo htmlspecialchars(getContactNameById($mockContacts, $mockProjects[1]['contactId'])); ?></td>
                    <td class="p-3">£<?php echo number_format($mockProjects[1]['value'], 2); ?></td>
                    <td class="p-3">
                        <span class="px-2 py-1 text-xs font-semibold rounded-full bg-red-100 text-red-800">
                            Outstanding
                        </span>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<?php require_once 'footer.php'; // Include the footer ?>