<?php
// data.php

// Detailed user profile for the "My Profile" page
$userProfileDetails = [
    'name' => 'Leigha Smith',
    'avatar' => 'https://i.pravatar.cc/150?u=leigha', // A placeholder avatar image
    'role' => 'Creative Professional',
    'bio' => 'Creative professional specializing in digital content creation and brand partnerships. Passionate about sustainable fashion and building authentic brand relationships.',
    'socials' => [
        'instagram' => 'https://instagram.com/leigha_creative',
        'tiktok' => 'https://tiktok.com/@leigha.smith',
        'linkedin' => 'https://linkedin.com/in/leigha-smith-biz',
    ],
];

// Navigation items for the sidebar
$navItems = [
    'index.php' => ['label' => 'Dashboard', 'icon' => 'HomeIcon'],
    'projects.php' => ['label' => 'Projects', 'icon' => 'BriefcaseIcon'],
    'contacts.php' => ['label' => 'Contacts', 'icon' => 'UsersIcon'],
    'finances.php' => ['label' => 'Finances', 'icon' => 'DollarSignIcon'],
    'reports.php' => ['label' => 'Reports', 'icon' => 'BarChart4Icon'],
    'marketing.php' => ['label' => 'Marketing', 'icon' => 'SparklesIcon'],
    'legal.php' => ['label' => 'Legal Hub', 'icon' => 'BookOpenIcon'],
    'profile.php' => ['label' => 'My Profile', 'icon' => 'UserIcon'],
    'settings.php' => ['label' => 'Settings', 'icon' => 'SettingsIcon'],
];

// Data for the dashboard statistics cards
$dashboardStats = [
    ['label' => 'Total Projects', 'value' => '2'],
    ['label' => 'New Enquiries', 'value' => '1'],
    ['label' => 'Contacts', 'value' => '2'],
    ['label' => 'Revenue (YTD)', 'value' => '£7,800'],
];

// Mock data for contacts
$mockContacts = [
    ['id' => 'c1', 'name' => 'Alex Johnson', 'email' => 'alex@brandco.com', 'company' => 'BrandCo Inc.'],
    ['id' => 'c2', 'name' => 'Sarah Miller', 'email' => 'sarah@globalads.net', 'company' => 'Global Ad Agency'],
];

// Mock data for projects
$mockProjects = [
    [
        'id' => 'p1', 'title' => 'Spring Lookbook', 'contactId' => 'c1', 'status' => 'In Progress',
        'value' => 3000, 'currency' => 'GBP', 'date' => '2025-09-15',
    ],
    [
        'id' => 'p2', 'title' => 'Website Redesign', 'contactId' => 'c2', 'status' => 'Quote Sent',
        'value' => 4800, 'currency' => 'GBP', 'date' => '2025-08-22',
    ],
];

// Mock data for the legal hub
$legalDocuments = [
    ['title' => 'Collaboration Agreement - BrandCo', 'type' => 'Agreement', 'date' => '2025-08-15'],
    ['title' => 'Media Release Form - Spring Lookbook', 'type' => 'Form', 'date' => '2025-08-20'],
    ['title' => 'Privacy Policy (Website)', 'type' => 'Policy', 'date' => '2025-07-01'],
];

// Mock data for the settings page
$billingDetails = [
    'bankName' => 'HSBC',
    'accountHolder' => 'Leigha Smith',
    'accountNumber' => '**** **** **** 5678',
    'sortCode' => '11-22-33',
];

// Helper function to find a contact's name by their ID
function getContactNameById($contacts, $id) {
    foreach ($contacts as $contact) {
        if ($contact['id'] === $id) {
            return $contact['name'];
        }
    }
    return 'Unknown';
}

// Helper function to find a project by its ID
function getProjectById($projects, $id) {
    foreach ($projects as $project) {
        if ($project['id'] === $id) {
            return $project;
        }
    }
    return null; // Return null if no project is found
}

// Helper function to get SVG icon code
function getIcon($name) {
    $icons = [
        'HomeIcon' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m3 9 9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></svg>',
        'UsersIcon' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M22 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>',
        'BriefcaseIcon' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M16 20V4a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"/><rect width="20" height="14" x="2" y="6" rx="2"/><path d="M10 12h4"/></svg>',
        'DollarSignIcon' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="12" x2="12" y1="2" y2="22"/><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"/></svg>',
        'SettingsIcon' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12.22 2h-.44a2 2 0 0 0-2 2v.18a2 2 0 0 1-1 1.73l-.43.25a2 2 0 0 1-2 0l-.15-.08a2 2 0 0 0-2.73.73l-.22.39a2 2 0 0 0 .73 2.73l.15.08a2 2 0 0 1 1 1.73v.53a2 2 0 0 1-1 1.74l-.15.09a2 2 0 0 0-.73 2.73l.22.39a2 2 0 0 0 2.73.73l.15-.08a2 2 0 0 1 2-1.73l.43-.25a2 2 0 0 1 2 0l.15.08a2 2 0 0 0 2.73-.73l.22-.39a2 2 0 0 0-.73-2.73l-.15-.08a2 2 0 0 1-1-1.74v-.53a2 2 0 0 1 1-1.74l.15-.09a2 2 0 0 0 .73-2.73l-.22-.39a2 2 0 0 0-2.73-.73l-.15.08a2 2 0 0 1-2-1.73V2.22z"/><circle cx="12" cy="12" r="3"/></svg>',
        'UserIcon' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>',
        'BookOpenIcon' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"/><path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"/></svg>',
        'SparklesIcon' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m12 3-1.5 3L7 7.5l3 1.5L11.5 12l1.5-3L16 7.5l-3-1.5z"/><path d="M3 12.5 4.5 14l1.5 3 1.5-3L9 14l-1.5-1.5L6 11z"/><path d="m15 12.5 1.5 1.5 1.5 3 1.5-3 1.5-1.5-1.5-1.5L18 11z"/></svg>',
        'BarChart4Icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 3v18h18"/><path d="M18 17V9"/><path d="M13 17V5"/><path d="M8 17v-3"/></svg>',
    ];
    return $icons[$name] ?? '';
}
?>