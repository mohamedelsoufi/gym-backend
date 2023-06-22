<?php
return [
    "roles" => [
        "roles" => ["read", "create", "update", "delete"],
        "admins" => ["read", "create", "update", "delete", "updateProfile"],
        "sliders" => ["read", "create", "update", "delete"],
        "features" => ["read", "create", "update", "delete"],
        "gym_classes" => ["read", "create", "update", "delete"],
        "days" => ["read", "create", "update", "delete"],
        "class_schedules" => ["read", "create", "update", "delete"],
        "branch_points" => ["read", "create", "update", "delete"],
        "branches" => ["read", "create", "update", "delete","edit_nile"],
        "categories" => ["read", "create", "update", "delete"],
        "products" => ["read", "create", "update", "delete"],
        "projects" => ["read", "create", "update", "delete"],
        "services" => ["read", "create", "update", "delete"],
        "teams" => ["read", "create", "update", "delete",'edit_our_trainers'],
        "galleries" => ["read", "create", "update", "delete",'edit_our_gallery'],
        "testimonials" => ["read", "create", "update", "delete"],
        "partners" => ["read", "create", "update", "delete"],
        "portfolios" => ["read", "create", "update", "delete"],
        "blog" => ["read", "create", "update", "delete"],
        "faqs" => ["read", "create", "update", "delete"],
        "pages" => ["read", "create", "update"],
        "contacts" => ["read", "create", "update", "delete"],
        "settings" => ["read", "update"],
    ],
];
