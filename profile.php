<?php
$pageTitle = 'My Profile'; // Set the title for this page
require_once 'header.php'; // Include the header
?>

<div class="flex justify-between items-center mb-6">
    <h1 class="text-3xl font-bold">My Profile</h1>
</div>

<div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

    <div class="lg:col-span-1">
        <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-md text-center">
            <img class="w-32 h-32 rounded-full mx-auto mb-4" src="<?php echo htmlspecialchars($userProfileDetails['avatar']); ?>" alt="User Avatar">
            <h2 class="text-2xl font-bold"><?php echo htmlspecialchars($userProfileDetails['name']); ?></h2>
            <p class="text-gray-500 dark:text-gray-400"><?php echo htmlspecialchars($userProfileDetails['role']); ?></p>
            <p class="mt-4 text-sm text-gray-600 dark:text-gray-300">
                <?php echo htmlspecialchars($userProfileDetails['bio']); ?>
            </p>
            
            <div class="mt-6 flex justify-center space-x-4">
                <a href="<?php echo htmlspecialchars($userProfileDetails['socials']['instagram']); ?>" target="_blank" class="text-gray-400 hover:text-[var(--primary-color)]">
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.85s-.011 3.584-.069 4.85c-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07s-3.584-.012-4.85-.07c-3.252-.148-4.771-1.691-4.919-4.919-.058-1.265-.069-1.645-.069-4.85s.011-3.584.069-4.85c.149-3.225 1.664-4.771 4.919-4.919C8.416 2.175 8.796 2.163 12 2.163zm0 1.441c-3.171 0-3.535.012-4.764.069-2.734.124-3.958 1.344-4.082 4.082-.057 1.23-.068 1.594-.068 4.764s.011 3.535.068 4.764c.124 2.734 1.348 3.958 4.082 4.082 1.23.057 1.594.068 4.764.068s3.535-.011 4.764-.068c2.734-.124 3.958-1.348 4.082-4.082.057-1.23.068-1.594.068-4.764s-.011-3.535-.068-4.764c-.124-2.734-1.348-3.958-4.082-4.082-1.229-.057-1.593-.069-4.764-.069zM12 8.118c-2.143 0-3.882 1.739-3.882 3.882s1.739 3.882 3.882 3.882 3.882-1.739 3.882-3.882-1.739-3.882-3.882-3.882zm0 6.323c-1.35 0-2.441-1.091-2.441-2.441s1.091-2.441 2.441-2.441 2.441 1.091 2.441 2.441-1.091 2.441-2.441 2.441zm4.846-6.423c-.71 0-1.284.574-1.284 1.284s.574 1.284 1.284 1.284 1.284-.574 1.284-1.284-.574-1.284-1.284-1.284z"></path></svg>
                </a>
                </div>
        </div>
    </div>

    <div class="lg:col-span-2">
        <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-md">
            <h2 class="text-xl font-bold mb-4">Edit Profile Information</h2>
            <form class="space-y-6">
                <div>
                    <label for="name" class="block text-sm font-medium">Full Name</label>
                    <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($userProfileDetails['name']); ?>" class="mt-1 block w-full bg-gray-100 dark:bg-gray-700 border-gray-300 dark:border-gray-600 rounded-md shadow-sm p-2">
                </div>
                 <div>
                    <label for="role" class="block text-sm font-medium">Role / Title</label>
                    <input type="text" id="role" name="role" value="<?php echo htmlspecialchars($userProfileDetails['role']); ?>" class="mt-1 block w-full bg-gray-100 dark:bg-gray-700 border-gray-300 dark:border-gray-600 rounded-md shadow-sm p-2">
                </div>
                <div>
                    <label for="bio" class="block text-sm font-medium">Bio</label>
                    <textarea id="bio" name="bio" rows="4" class="mt-1 block w-full bg-gray-100 dark:bg-gray-700 border-gray-300 dark:border-gray-600 rounded-md shadow-sm p-2"><?php echo htmlspecialchars($userProfileDetails['bio']); ?></textarea>
                </div>
                <div>
                    <button type="submit" class="w-full sm:w-auto bg-[var(--primary-color)] text-white px-6 py-2 rounded-lg font-semibold hover:opacity-90">
                        Save Changes
                    </button>
                </div>
            </form>
        </div>
    </div>

</div>

<?php require_once 'footer.php'; // Include the footer ?>