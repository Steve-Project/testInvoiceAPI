<?php

namespace App\Helpers;

use Illuminate\Pagination\LengthAwarePaginator;

class PaginatorHelper
{
    public function getPaginatorDetail(LengthAwarePaginator $list): array
    {
        return [
            'total' => $list->total(),
            'current_page' => $list->currentPage(),
            'per_page' => $list->perPage(),
            'last_page' => $list->lastPage(),
            'next_page_url' => $list->nextPageUrl(),
            'prev_page_url' => $list->previousPageUrl()
        ];
    }
}
