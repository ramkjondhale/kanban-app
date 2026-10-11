<?php

namespace App\Support;

class DummyData
{
    public static function projects(): array
    {
        return [
            [
                'id' => 1,
                'name' => 'Catalyst eBMR',
                'manager' => 'Amit Patil',
                'tasks' => 8,
                'progress' => 60,
                'due_date' => '2026-12-15'
            ],
            [
                'id' => 2,
                'name' => 'HR Portal',
                'manager' => 'Sneha Joshi',
                'tasks' => 5,
                'progress' => 25,
                'due_date' => '2027-01-20'
            ],
            [
                'id' => 3,
                'name' => 'Inventory App',
                'manager' => 'Amit Patil',
                'tasks' => 3,
                'progress' => 90,
                'due_date' => '2026-11-05'
            ],
        ];
    }

    public static function tasks(): array
    {
        return [
            [
                'id' => 1,
                'project_id' => 1,
                'title' => 'Build login page',
                'description' => 'Login with email and password, including validation.',
                'status' => 'todo',
                'priority' => 'high',
                'assignee' => 'Rahul',
                'due_date' => '2026-10-20',
                'tags' => ['Backend', 'Auth']
            ],
            [
                'id' => 2,
                'project_id' => 1,
                'title' => 'Batch record table',
                'description' => 'Show all batch details in a table.',
                'status' => 'todo',
                'priority' => 'medium',
                'assignee' => 'Priya',
                'due_date' => '2026-10-25',
                'tags' => ['UI']
            ],
            [
                'id' => 3,
                'project_id' => 1,
                'title' => 'PDF report export',
                'description' => 'Allow downloading the batch report as a PDF.',
                'status' => 'in_progress',
                'priority' => 'high',
                'assignee' => 'Rahul',
                'due_date' => '2026-10-18',
                'tags' => ['Backend']
            ],
            [
                'id' => 4,
                'project_id' => 1,
                'title' => 'Dashboard charts',
                'description' => 'Monthly production charts.',
                'status' => 'in_progress',
                'priority' => 'low',
                'assignee' => 'Kiran',
                'due_date' => '2026-10-30',
                'tags' => ['UI', 'Chart']
            ],
            [
                'id' => 5,
                'project_id' => 1,
                'title' => 'User role column',
                'description' => 'Add a role column to the users table.',
                'status' => 'in_review',
                'priority' => 'medium',
                'assignee' => 'Priya',
                'due_date' => '2026-10-12',
                'tags' => ['Database']
            ],
            [
                'id' => 6,
                'project_id' => 1,
                'title' => 'Project setup',
                'description' => 'Laravel + AdminLTE setup.',
                'status' => 'approved',
                'priority' => 'low',
                'assignee' => 'Kiran',
                'due_date' => '2026-10-05',
                'tags' => ['Setup']
            ],
            [
                'id' => 7,
                'project_id' => 2,
                'title' => 'Employee list',
                'description' => 'List of all employees.',
                'status' => 'todo',
                'priority' => 'medium',
                'assignee' => 'Rahul',
                'due_date' => '2026-11-02',
                'tags' => ['UI']
            ],
        ];
    }

    public static function find(array $items, int $id): ?array
    {
        foreach ($items as $item) {
            if ($item['id'] === $id) {
                return $item;
            }
        }
        return null;
    }
}
