<?php

namespace App\DataTables;

use App\Models\TrainingSession;
use App\Models\Gym;
use App\Models\Admin;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;
use Illuminate\Support\Facades\Auth;
class TrainingSessionDataTable extends DataTable
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
            ->addColumn('action', 'dashboard.trainingSession.action');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\TrainingSessionDataTable $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(TrainingSession $model)
    {
        if(auth()->user()->hasRole('Super Admin')) {
            return $model->with('gym');
        }
         else if(auth()->user()->hasRole('City Manager')) {
            return $model->with('gym')->whereIn('gym_id', Gym::where('city_manager_id', Auth::id())->get()->pluck('id'));
        } else if(auth()->user()->hasRole('Gym Manager')) {
            return $model->with('gym')->where('gym_id', Admin::where('id', Auth::user()->id)->get()->first()->gym_id);
        }
        
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
                    ->setTableId('trainingsessiondatatable-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->dom('Bfrtip')
                    ->addAction(['width' => '200px'])
                    ->orderBy(1);
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
            Column::make('starts_at'),
            Column::make('finishes_at'),
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
        return 'TrainingSession_' . date('YmdHis');
    }
}
