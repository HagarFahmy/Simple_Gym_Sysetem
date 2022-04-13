<?php

namespace App\Http\Controllers\Backend;
use App\DataTables\RevenueDataTable;



class RevenueController extends CommonController
{
    protected string $module = 'revenue';
    protected string $permissionGroup = 'revenue';

    public function __construct(RevenueDataTable $modelDatatable)
    {
        $this->modelDatatable = $modelDatatable;
    }
}