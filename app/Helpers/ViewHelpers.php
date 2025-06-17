<?php

// namespace App\Helpers;

// class ViewHelpers
// {
//     public static function sortLink($label, $column, $currentSortBy, $currentSortDir)
//     {
//         $newSortDir = ($currentSortBy === $column && $currentSortDir === 'asc') ? 'desc' : 'asc';

//         $url = request()->fullUrlWithQuery([
//             'sort_by' => $column,
//             'sort_dir' => $newSortDir,
//         ]);

//         $arrow = '';
//         if ($currentSortBy === $column) {
//             $arrow = $currentSortDir === 'asc' ? '↑' : '↓';
//         }

//         return '<a href="' . $url . '" class="text-blue-600 underline">' . $label . ' ' . $arrow . '</a>';
//     }
// }
