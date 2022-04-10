<?php

namespace App\DataTables;

use App\Models\Gym;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class GymsDataTable extends DataTable
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
            ->addColumn('action', 'dashboard.gyms.action');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Gyms $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Gym $model)
    {
        return $model->with('city_manager');
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
                    ->setTableId('gymsdatatable-table')
                    ->columns($this->getColumns())
                    ->addAction(['width' => '200px'])
                    ->minifiedAjax()
                    ->dom('Bfrtip')
                    ->orderBy(1);
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        $columns = [
            Column::make('name'),
            Column::make('cover_image'),
            Column::make('created_at'),
        ];

        if(auth()->user()->hasRole('Super Admin')) {
            $columns[] = Column::make('city_manager.name')->title('Gym Manager');
        }
        return $columns;
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Gyms_' . date('YmdHis');
    }
}
