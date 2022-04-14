<?php

namespace App\DataTables;

use App\Models\Admin;
use App\Models\City;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class GymManagersDataTable extends DataTable
{
    
    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->addColumn('action', 'dashboard.cityManager.action');
    }

   
    public function query(Admin $model)
    {
        $model= Admin::role('City Manager')->with('city');
        return $this->applyScopes($model);
    }

   
    public function html()
    {
        return $this->builder()
                    ->setTableId('citymanagersdatatable-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->dom('Bfrtip')
                    ->orderBy(1)
                    ->addAction(['width' => '200px']);
    }

  
    protected function getColumns()
    {
        return [
            Column::make('id'),
            Column::make('name'),
            Column::make('email'),
            // Column::computed('action')
            //       ->exportable(false)
            //       ->printable(false)
            //       ->width(100)
            //       ->addClass('text-center'),
            
        ];
    }

   
    protected function filename()
    {
        return 'CityManagers_' . date('YmdHis');
    }
}
