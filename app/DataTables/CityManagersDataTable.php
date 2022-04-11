<?php

namespace App\DataTables;

use App\Models\Admin;
use App\Models\City;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class CityManagersDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->addColumn('action', 'dashboard.cityManager.action');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\DataTables\CityManagersDataTable $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Admin $model)
    {
        $model= Admin::role('City Manager')->with('city');
        return $this->applyScopes($model);
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
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

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            Column::make('id'),
            Column::make('name'),
            Column::make('email'),
            Column::make('city.name')->title('city name'),

            // Column::computed('action')
            //       ->exportable(false)
            //       ->printable(false)
            //       ->width(100)
            //       ->addClass('text-center'),
            
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'CityManagers_' . date('YmdHis');
    }
}
