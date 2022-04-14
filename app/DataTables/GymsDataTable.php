<?php

namespace App\DataTables;
use App\Models\Gym;
use Carbon\Carbon;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;
use Illuminate\Support\Facades\Auth;

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
            ->addColumn('action', 'dashboard.gyms.action')
            ->editColumn('created_at', function($record) {
                $date = new Carbon($record->created_at);
                return $date->format('d-m-Y');
            });
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Gyms $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Gym $model)
    {
    
        if(auth()->user()->hasRole('Super Admin')) {
            return $model->with('city','city_manager');
        }

        if(auth()->user()->hasRole('City Manager')) {
            return $model->with('city')->where('city_manager_id', Auth::id());
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
            $columns[] = Column::make('city_manager.name')->title('city Manager');
            $columns[] = Column::make('city.name')->title('city');
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
