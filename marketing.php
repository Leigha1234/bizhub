<?php
$pageTitle = 'Marketing'; // Set the title for this page
require_once 'header.php'; // Include the header
?>

<div class="flex justify-between items-center mb-6">
    <h1 class="text-3xl font-bold">Marketing & Content</h1>
    <button class="bg-[var(--primary-color)] text-white px-4 py-2 rounded-lg font-semibold hover:opacity-90">
        Schedule New Post
    </button>
</div>

<div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

    <div class="lg:col-span-2 space-y-8">
        
        <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-md">
            <h2 class="text-xl font-bold mb-4">Connect Your Accounts</h2>
            <p class="text-sm text-gray-600 dark:text-gray-400 mb-6">Link your social media profiles to view analytics and schedule posts directly from Biz-Hub.</p>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                <div class="flex flex-col items-center p-4 border dark:border-gray-700 rounded-lg">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/a/a5/Instagram_icon.png" alt="Instagram Logo" class="h-10 w-10">
                    <span class="mt-2 text-sm font-medium">Instagram</span>
                    <button class="mt-2 text-xs text-[var(--primary-color)] font-semibold">Connect</button>
                </div>
                <div class="flex flex-col items-center p-4 border dark:border-gray-700 rounded-lg">
                    <img src="https://upload.wikimedia.org/wikipedia/en/thumb/0/04/Facebook_f_logo_%282021%29.svg/2048px-Facebook_f_logo_%282021%29.svg.png" alt="Facebook Logo" class="h-10 w-10">
                    <span class="mt-2 text-sm font-medium">Facebook</span>
                    <button class="mt-2 text-xs text-[var(--primary-color)] font-semibold">Connect</button>
                </div>
                <div class="flex flex-col items-center p-4 border dark:border-gray-700 rounded-lg">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/0/09/YouTube_full-color_icon_%282017%29.svg/1024px-YouTube_full-color_icon_%282017%29.svg.png" alt="YouTube Logo" class="h-10 w-10">
                    <span class="mt-2 text-sm font-medium">YouTube</span>
                    <button class="mt-2 text-xs text-gray-400 font-semibold cursor-not-allowed">Coming Soon</button>
                </div>
                <div class="flex flex-col items-center p-4 border dark:border-gray-700 rounded-lg">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/e/e9/Linkedin_icon.svg/2048px-Linkedin_icon.svg.png" alt="LinkedIn Logo" class="h-10 w-10">
                    <span class="mt-2 text-sm font-medium">LinkedIn</span>
                    <button class="mt-2 text-xs text-gray-400 font-semibold cursor-not-allowed">Coming Soon</button>
                </div>
            </div>
        </div>

        <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-md">
            <h2 class="text-xl font-bold mb-4">Performance Analytics</h2>
            <div class="bg-gray-200 dark:bg-gray-700 rounded-lg h-72 flex items-center justify-center">
                <p class="text-gray-500">[Follower Growth & Engagement Chart Placeholder]</p>
            </div>
        </div>

    </div>

    <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-md">
        <h2 class="text-xl font-bold mb-4">Content Planner</h2>
        <div class="space-y-4">
            <div class="p-4 bg-gray-50 dark:bg-gray-700 rounded-lg">
                <p class="text-sm font-bold">Monday, Sep 1, 2025</p>
                <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">📝 Blog Post: "Fall Fashion Trends"</p>
            </div>
            <div class="p-4 bg-gray-50 dark:bg-gray-700 rounded-lg">
                <p class="text-sm font-bold">Wednesday, Sep 3, 2025</p>
                <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">📸 Instagram Post: "Behind the Scenes"</p>
            </div>
            <div class="p-4 bg-gray-50 dark:bg-gray-700 rounded-lg">
                <p class="text-sm font-bold">Friday, Sep 5, 2025</p>
                <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">📹 Video: "Client Project Showcase"</p>
            </div>
            <div class="p-4 border-2 border-dashed dark:border-gray-600 rounded-lg text-center">
                <p class="text-sm text-gray-500 dark:text-gray-400">Plan your next content idea...</p>
            </div>
        </div>
    </div>

</div>

<?php require_once 'footer.php'; // Include the footer ?>