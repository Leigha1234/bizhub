<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Handle ADDING a new post
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['schedule_post'])) {
    $platformIcon = '';
    switch ($_POST['post-platform']) {
        case 'Blog': $platformIcon = '📝'; break;
        case 'Instagram': $platformIcon = '📸'; break;
        case 'Video': $platformIcon = '📹'; break;
    }

    $newPost = [
        'date' => $_POST['post-date'] ?? date('Y-m-d'),
        'platform' => $_POST['post-platform'] ?? 'General',
        'idea' => $platformIcon . ' ' . ($_POST['post-platform']) . ': "' . ($_POST['post-idea'] ?? 'New Post') . '"',
    ];
    $_SESSION['contentPlanner'][] = $newPost;
    // Sort posts by date
    usort($_SESSION['contentPlanner'], fn($a, $b) => strcmp($a['date'], $b['date']));
    header('Location: marketing.php');
    exit;
}

$pageTitle = 'Marketing';
require_once 'header.php';
?>

<div class="flex justify-between items-center mb-6">
    <h1 class="text-3xl font-bold">Marketing & Content</h1>
    <button id="schedule-post-btn" class="bg-[var(--primary-color)] text-white px-4 py-2 rounded-lg font-semibold hover:opacity-90">
        Schedule New Post
    </button>
</div>

<div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

    <div class="lg:col-span-2 space-y-8">
        <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-md">
            <h2 class="text-xl font-bold mb-4">Connect Your Accounts</h2>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                <div class="flex flex-col items-center p-4 border dark:border-gray-700 rounded-lg">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/a/a5/Instagram_icon.png" class="h-10 w-10">
                    <span class="mt-2 text-sm font-medium">Instagram</span>
                    <button id="connect-instagram-btn" class="connect-btn mt-2 text-xs text-[var(--primary-color)] font-semibold">Connect</button>
                </div>
                <div class="flex flex-col items-center p-4 border dark:border-gray-700 rounded-lg">
                    <img src="https://upload.wikimedia.org/wikipedia/en/thumb/0/04/Facebook_f_logo_%282021%29.svg/2048px-Facebook_f_logo_%282021%29.svg.png" class="h-10 w-10">
                    <span class="mt-2 text-sm font-medium">Facebook</span>
                    <button id="connect-facebook-btn" class="connect-btn mt-2 text-xs text-[var(--primary-color)] font-semibold">Connect</button>
                </div>
            </div>
        </div>
        <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-md">
            <h2 class="text-xl font-bold mb-4">Performance Analytics</h2>
            <div class="bg-gray-50 dark:bg-gray-700 rounded-lg h-72 p-4 flex items-end gap-4">
                 <div class="flex-1 h-1/4 bg-pink-300 dark:bg-pink-600 rounded-t-md" title="Week 1"></div>
                <div class="flex-1 h-1/2 bg-pink-400 dark:bg-pink-500 rounded-t-md" title="Week 2"></div>
                <div class="flex-1 h-3/4 bg-pink-500 dark:bg-pink-400 rounded-t-md" title="Week 3"></div>
                <div class="flex-1 h-full bg-pink-400 dark:bg-pink-500 rounded-t-md" title="Week 4"></div>
            </div>
        </div>
    </div>

    <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-md">
        <h2 class="text-xl font-bold mb-4">Content Planner</h2>
        <div class="space-y-4">
            <?php foreach ($_SESSION['contentPlanner'] as $post): ?>
            <div class="p-4 bg-gray-50 dark:bg-gray-700 rounded-lg">
                <p class="text-sm font-bold"><?php echo date("l, M j, Y", strtotime($post['date'])); ?></p>
                <p class="text-xs text-gray-500 dark:text-gray-400 mt-1"><?php echo htmlspecialchars($post['idea']); ?></p>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>

<div id="schedule-modal" class="fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center hidden">
    <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-xl w-full max-w-lg">
        <div class="flex justify-between items-center border-b dark:border-gray-700 pb-3 mb-4">
            <h2 class="text-xl font-bold">Schedule New Post</h2>
            <button id="close-modal-btn" class="text-gray-500 hover:text-gray-800 dark:hover:text-gray-300 text-2xl">&times;</button>
        </div>
        <form id="schedule-post-form" class="space-y-4" method="POST" action="marketing.php">
            <div>
                <label for="post-idea" class="block text-sm font-medium">Content / Idea</label>
                <input type="text" id="post-idea" name="post-idea" placeholder="e.g., Behind the scenes photoshoot" required class="mt-1 block w-full bg-gray-100 dark:bg-gray-700 rounded-md p-2">
            </div>
            <div>
                <label for="post-platform" class="block text-sm font-medium">Platform</label>
                <select id="post-platform" name="post-platform" required class="mt-1 block w-full bg-gray-100 dark:bg-gray-700 rounded-md p-2">
                    <option>Blog</option>
                    <option>Instagram</option>
                    <option>Video</option>
                </select>
            </div>
            <div>
                <label for="post-date" class="block text-sm font-medium">Schedule Date</label>
                <input type="date" id="post-date" name="post-date" required class="mt-1 block w-full bg-gray-100 dark:bg-gray-700 rounded-md p-2">
            </div>
            <div class="flex justify-end space-x-4 mt-6 border-t dark:border-gray-700 pt-4">
                <button id="cancel-btn" type="button" class="bg-gray-200 dark:bg-gray-600 px-4 py-2 rounded-lg font-semibold hover:bg-gray-300">Cancel</button>
                <button name="schedule_post" type="submit" class="bg-[var(--primary-color)] text-white px-4 py-2 rounded-lg font-semibold hover:opacity-90">Schedule</button>
            </div>
        </form>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const scheduleBtn = document.getElementById('schedule-post-btn');
    const modal = document.getElementById('schedule-modal');
    const closeBtn = document.getElementById('close-modal-btn');
    const cancelBtn = document.getElementById('cancel-btn');
    if (scheduleBtn) {
        const openModal = () => modal.classList.remove('hidden');
        const closeModal = () => modal.classList.add('hidden');
        scheduleBtn.addEventListener('click', openModal);
        closeBtn.addEventListener('click', closeModal);
        cancelBtn.addEventListener('click', closeModal);
    }

    const connectBtns = document.querySelectorAll('.connect-btn');
    connectBtns.forEach(btn => {
        btn.addEventListener('click', () => {
            alert('Connecting to this platform is a feature coming soon!');
        });
    });
});
</script>

<?php require_once 'footer.php'; ?>