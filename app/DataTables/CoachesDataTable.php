<?php

namespace App\DataTables;


use App\Models\Coach;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class CoachesDataTable extends DataTable
{

    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->addColumn('action', 'dashboard.coach.action')
            ;
    }


    public function query(Coach $model)
    {

        return $model->with('gym');

    }

    public function html()
    {
        return $this->builder()
                    ->setTableId('trainingpackagesdatatable-table')
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
            //Column::make('gym_id'),
            Column::make('gym.name')->title('Gym Name'),


        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Coaches_' . date('YmdHis');
    }
}
