<?php

namespace App\DataTables;

use App\Models\TrainingPackage;
use Ramsey\Uuid\Type\Decimal;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class TrainingPackagesDataTable extends DataTable
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
            ->addColumn('action', 'dashboard.trainingPackages.action');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\TrainingPackage $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(TrainingPackage $model)
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->setTableId('coachesdatatable-table')
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
            Column::make('price')->title('price'),
            Column::make('sessions_number'),
           Column::make('created_at'),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'TrainingPackages_' . date('YmdHis');
    }
}
