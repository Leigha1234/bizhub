<?php
$pageTitle = 'View Document';
require_once 'header.php';

// Get the document index from the URL
$docIndex = $_GET['index'] ?? null;

// Find the document data using our new helper function
$document = getDocumentByIndex($_SESSION['legalDocuments'], $docIndex);

// Find the corresponding template text
$templateText = $defaultTemplates[$document['type']] ?? 'Template content not found.';
?>

<?php if ($document): ?>
    
    <div class="mb-6">
        <a href="legal.php" class="text-[var(--primary-color)] hover:underline">&larr; Back to Legal Hub</a>
        <h1 class="text-3xl font-bold mt-2"><?php echo htmlspecialchars($document['title']); ?></h1>
        <p class="text-gray-500 dark:text-gray-400">Type: <?php echo htmlspecialchars($document['type']); ?></p>
    </div>

    <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-md">
        <h2 class="text-xl font-bold mb-4">Document Content</h2>
        <pre class="whitespace-pre-wrap text-gray-700 dark:text-gray-300 font-sans"><?php echo htmlspecialchars($templateText); ?></pre>
    </div>

<?php else: ?>

    <div class="text-center py-10">
        <h1 class="text-3xl font-bold text-red-500">Document Not Found</h1>
        <p class="mt-4 text-gray-500">The document you are looking for does not exist.</p>
        <a href="legal.php" class="mt-6 inline-block bg-[var(--primary-color)] text-white px-6 py-2 rounded-lg font-semibold hover:opacity-90">
            Return to Legal Hub
        </a>
    </div>

<?php endif; ?>

<?php require_once 'footer.php'; ?>