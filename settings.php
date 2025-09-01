<?php
$pageTitle = 'Settings'; // Set the title for this page
require_once 'header.php'; // Include the header
?>

<div class="flex justify-between items-center mb-6">
    <h1 class="text-3xl font-bold">Settings</h1>
</div>

<div class="bg-white dark:bg-gray-800 rounded-lg shadow-md">
    <div class="border-b border-gray-200 dark:border-gray-700">
        <nav class="-mb-px flex space-x-8" aria-label="Tabs" id="settings-tabs">
            <a href="#profile" class="whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm text-[var(--primary-color)] border-[var(--primary-color)]">
                Profile
            </a>
            <a href="#billing" class="whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm text-gray-500 hover:text-gray-700 dark:hover:text-gray-300 hover:border-gray-300 dark:hover:border-gray-600 border-transparent">
                Billing
            </a>
            <a href="#appearance" class="whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm text-gray-500 hover:text-gray-700 dark:hover:text-gray-300 hover:border-gray-300 dark:hover:border-gray-600 border-transparent">
                Appearance
            </a>
        </nav>
    </div>

    <div class="p-6">
        <div id="profile-panel" class="tab-panel">
            <form class="space-y-6">
                <h3 class="text-lg font-medium leading-6">Public Profile</h3>
                <p class="text-sm text-gray-500">This information will be displayed on your public-facing profile.</p>
                <div>
                    <label for="name" class="block text-sm font-medium">Full Name</label>
                    <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($userProfileDetails['name']); ?>" class="mt-1 block w-full lg:w-1/2 bg-gray-100 dark:bg-gray-700 border-gray-300 dark:border-gray-600 rounded-md shadow-sm p-2">
                </div>
                <div>
                    <label for="bio" class="block text-sm font-medium">Bio</label>
                    <textarea id="bio" name="bio" rows="4" class="mt-1 block w-full lg:w-1/2 bg-gray-100 dark:bg-gray-700 border-gray-300 dark:border-gray-600 rounded-md shadow-sm p-2"><?php echo htmlspecialchars($userProfileDetails['bio']); ?></textarea>
                </div>
                <div>
                    <button type="submit" class="w-full sm:w-auto bg-[var(--primary-color)] text-white px-6 py-2 rounded-lg font-semibold hover:opacity-90">Save Profile</button>
                </div>
            </form>
        </div>

        <div id="billing-panel" class="tab-panel hidden">
             <form class="space-y-6">
                <h3 class="text-lg font-medium leading-6">Billing Information</h3>
                <p class="text-sm text-gray-500">This bank account will be used for payouts and displayed on invoices.</p>
                <div>
                    <label for="bankName" class="block text-sm font-medium">Bank Name</label>
                    <input type="text" id="bankName" value="<?php echo htmlspecialchars($billingDetails['bankName']); ?>" class="mt-1 block w-full lg:w-1/2 bg-gray-100 dark:bg-gray-700 border-gray-300 dark:border-gray-600 rounded-md shadow-sm p-2">
                </div>
                <div>
                    <label for="accountHolder" class="block text-sm font-medium">Account Holder</label>
                    <input type="text" id="accountHolder" value="<?php echo htmlspecialchars($billingDetails['accountHolder']); ?>" class="mt-1 block w-full lg:w-1/2 bg-gray-100 dark:bg-gray-700 border-gray-300 dark:border-gray-600 rounded-md shadow-sm p-2">
                </div>
                <div>
                    <label for="accountNumber" class="block text-sm font-medium">Account Number</label>
                    <input type="text" id="accountNumber" value="<?php echo htmlspecialchars($billingDetails['accountNumber']); ?>" class="mt-1 block w-full lg:w-1/2 bg-gray-100 dark:bg-gray-700 border-gray-300 dark:border-gray-600 rounded-md shadow-sm p-2">
                </div>
                <div>
                    <label for="sortCode" class="block text-sm font-medium">Sort Code</label>
                    <input type="text" id="sortCode" value="<?php echo htmlspecialchars($billingDetails['sortCode']); ?>" class="mt-1 block w-full lg:w-1/2 bg-gray-100 dark:bg-gray-700 border-gray-300 dark:border-gray-600 rounded-md shadow-sm p-2">
                </div>
                 <div>
                    <button type="submit" class="w-full sm:w-auto bg-[var(--primary-color)] text-white px-6 py-2 rounded-lg font-semibold hover:opacity-90">Save Billing Info</button>
                </div>
            </form>
        </div>

        <div id="appearance-panel" class="tab-panel hidden">
            <form class="space-y-6">
                <h3 class="text-lg font-medium leading-6">Appearance</h3>
                <p class="text-sm text-gray-500">Customize the look and feel of your Biz-Hub.</p>
                <div>
                    <label for="primary-color" class="block text-sm font-medium">Primary Brand Color</label>
                    <div class="mt-1 flex items-center space-x-2">
                        <input type="color" id="primary-color" name="primary-color" value="#4f46e5" class="h-10 w-10 rounded-md">
                        <input type="text" value="#4F46E5" class="block w-40 bg-gray-100 dark:bg-gray-700 border-gray-300 dark:border-gray-600 rounded-md shadow-sm p-2">
                    </div>
                </div>
                 <div>
                    <button type="submit" class="w-full sm:w-auto bg-[var(--primary-color)] text-white px-6 py-2 rounded-lg font-semibold hover:opacity-90">Save Appearance</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    // Simple script for tab functionality
    document.addEventListener('DOMContentLoaded', () => {
        const tabs = document.querySelectorAll('#settings-tabs a');
        const panels = document.querySelectorAll('.tab-panel');

        tabs.forEach(tab => {
            tab.addEventListener('click', (e) => {
                e.preventDefault();

                // Deactivate all tabs and panels
                tabs.forEach(item => {
                    item.classList.remove('text-[var(--primary-color)]', 'border-[var(--primary-color)]');
                    item.classList.add('text-gray-500', 'border-transparent');
                });
                panels.forEach(panel => {
                    panel.classList.add('hidden');
                });

                // Activate the clicked tab
                tab.classList.add('text-[var(--primary-color)]', 'border-[var(--primary-color)]');
                tab.classList.remove('text-gray-500', 'border-transparent');

                // Activate the corresponding panel
                const targetPanelId = tab.getAttribute('href').substring(1) + '-panel';
                const targetPanel = document.getElementById(targetPanelId);
                if (targetPanel) {
                    targetPanel.classList.remove('hidden');
                }
            });
        });
    });
</script>

<?php require_once 'footer.php'; // Include the footer ?>