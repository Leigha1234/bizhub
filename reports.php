<?php
$pageTitle = 'Reports'; // Set the title for this page
require_once 'header.php'; // Include the header
?>

<div class="flex justify-between items-center mb-6">
    <h1 class="text-3xl font-bold">Reports & Analytics</h1>
</div>

<div class="grid grid-cols-1 lg:grid-cols-2 gap-8">

    <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-md">
        <h2 class="text-xl font-bold mb-4">Revenue Over Time (Last 6 Months)</h2>
        <div class="bg-gray-50 dark:bg-gray-700 rounded-lg h-64 p-4 flex items-end gap-4">
            <div class="flex-1 h-1/3 bg-blue-300 dark:bg-blue-600 rounded-t-md" title="Mar: £1,200"></div>
            <div class="flex-1 h-1/2 bg-blue-400 dark:bg-blue-500 rounded-t-md" title="Apr: £2,100"></div>
            <div class="flex-1 h-3/4 bg-blue-500 dark:bg-blue-400 rounded-t-md" title="May: £3,500"></div>
            <div class="flex-1 h-2/3 bg-blue-400 dark:bg-blue-500 rounded-t-md" title="Jun: £2,800"></div>
            <div class="flex-1 h-full bg-blue-500 dark:bg-blue-400 rounded-t-md" title="Jul: £4,800"></div>
            <div class="flex-1 h-5/6 bg-blue-300 dark:bg-blue-600 rounded-t-md" title="Aug: £4,100"></div>
        </div>
    </div>

    <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-md">
        <h2 class="text-xl font-bold mb-4">Project Status</h2>
        <div class="h-64 flex items-center justify-center">
            <svg class="w-48 h-48" viewBox="0 0 36 36">
                <circle cx="18" cy="18" r="15.915" fill="none" stroke="#e6e6e6" stroke-width="3"></circle>
                <circle cx="18" cy="18" r="15.915" fill="none" stroke="#3b82f6" stroke-width="3" stroke-dasharray="50 50" stroke-dashoffset="0"></circle> <circle cx="18" cy="18" r="15.915" fill="none" stroke="#f59e0b" stroke-width="3" stroke-dasharray="25 75" stroke-dashoffset="-50"></circle> <circle cx="18" cy="18" r="15.915" fill="none" stroke="#10b981" stroke-width="3" stroke-dasharray="25 75" stroke-dashoffset="-75"></circle> </svg>
        </div>
        <div class="flex justify-center gap-4 text-sm">
            <span class="flex items-center"><span class="w-3 h-3 rounded-full bg-blue-500 mr-2"></span>In Progress</span>
            <span class="flex items-center"><span class="w-3 h-3 rounded-full bg-yellow-500 mr-2"></span>Quote Sent</span>
            <span class="flex items-center"><span class="w-3 h-3 rounded-full bg-green-500 mr-2"></span>Completed</span>
        </div>
    </div>

</div>