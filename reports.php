<?php
$pageTitle = 'Reports'; // Set the title for this page
require_once 'header.php'; // Include the header
?>

<div class="flex justify-between items-center mb-6">
    <h1 class="text-3xl font-bold">Reports & Analytics</h1>
    <div class="flex items-center space-x-2">
        <label for="date-range" class="text-sm font-medium">Date Range:</label>
        <select id="date-range" name="date-range" class="bg-white dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm p-2 text-sm">
            <option>Last 30 Days</option>
            <option>Last 3 Months</option>
            <option>Last 12 Months</option>
            <option>All Time</option>
        </select>
    </div>
</div>

<div class="grid grid-cols-1 lg:grid-cols-2 gap-8">

    <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-md">
        <h2 class="text-xl font-bold mb-4">Revenue Over Time</h2>
        <div class="bg-gray-200 dark:bg-gray-700 rounded-lg h-64 flex items-center justify-center">
            <p class="text-gray-500">[Bar Chart Placeholder]</p>
        </div>
        <p class="mt-4 text-sm text-gray-600 dark:text-gray-400">A visual representation of monthly invoiced amounts, showing financial trends.</p>
    </div>

    <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-md">
        <h2 class="text-xl font-bold mb-4">Project Status</h2>
        <div class="bg-gray-200 dark:bg-gray-700 rounded-lg h-64 flex items-center justify-center">
            <p class="text-gray-500">[Pie Chart Placeholder]</p>
        </div>
        <p class="mt-4 text-sm text-gray-600 dark:text-gray-400">A breakdown of all projects by their current status (e.g., In Progress, Completed, Quote Sent).</p>
    </div>

    <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-md">
        <h2 class="text-xl font-bold mb-4">Top Clients by Value</h2>
        <div class="bg-gray-200 dark:bg-gray-700 rounded-lg h-64 flex items-center justify-center">
            <p class="text-gray-500">[Horizontal Bar Chart Placeholder]</p>
        </div>
        <p class="mt-4 text-sm text-gray-600 dark:text-gray-400">Identifies the most valuable clients based on total invoiced amounts.</p>
    </div>

    <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-md">
        <h2 class="text-xl font-bold mb-4">Profitability Analysis</h2>
        <div class="bg-gray-200 dark:bg-gray-700 rounded-lg h-64 flex items-center justify-center">
            <p class="text-gray-500">[Data Table Placeholder]</p>
        </div>
        <p class="mt-4 text-sm text-gray-600 dark:text-gray-400">Compares project revenue against costs to determine net profitability per project.</p>
    </div>

</div>

<?php require_once 'footer.php'; // Include the footer ?>