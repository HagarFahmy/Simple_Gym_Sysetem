<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\DataTables\Services\DataTable;

class CommonController extends Controller
{
    protected string $module;
    protected string $permissionGroup;
    protected DataTable $modelDatatable;

    public function __construct()
    {
        $this->middleware('permission:list_' . $this->module.',admin')->only('index');
        $this->middleware('permission:create_' . $this->module.',admin')->only('create');
        $this->middleware('permission:update_' . $this->module.',admin')->only('edit');
        $this->middleware('permission:delete_' . $this->module.',admin')->only('destroy');
    }

    public function index()
    {
        return $this->modelDatatable->render('dashboard.shared.datatable', with(['permissionGroup' => $this->permissionGroup, 'module' => $this->module]));
    }
}
