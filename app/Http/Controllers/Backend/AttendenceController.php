<?php

namespace App\Http\Controllers\Backend;
use App\DataTables\AttendanceDataTable;



class AttendenceController extends CommonController
{
    protected string $module = 'attendance';
    protected string $permissionGroup = 'attendance';

    public function __construct(AttendanceDataTable $modelDatatable)
    {
        $this->modelDatatable = $modelDatatable;
    }
}