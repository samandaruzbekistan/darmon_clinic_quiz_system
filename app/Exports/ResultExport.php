<?php

namespace App\Exports;

use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Facades\Excel;

class ResultExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function __construct(int $id)
    {
        $this->id = $id;
    }

    public function collection()
    {
        $results = DB::table('exam_results')
            ->where('subject_id', $this->id)
            ->orderBy('prosent', 'desc')
            ->get(['fullname', 'subject_name', 'created_at', 'prosent']);
        return collect($results);
    }
}
