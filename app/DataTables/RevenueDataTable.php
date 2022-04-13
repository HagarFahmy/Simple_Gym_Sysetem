<?php

namespace App\DataTables;
use App\Models\Revenue;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class RevenueDataTable extends DataTable
{

    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query);
    }

    public function query(Revenue $model)
    {
        return $model->with('user','gym','package','gym.city');
         
    }

    public function html()
    {
        return $this->builder()
                    ->setTableId('revenuedatatable-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->dom('Bfrtip')
                    ->orderBy(1);
                    
    }

    protected function getColumns()
    {

        // return [

        //     Column::make('id'),          
        
        // ];
        $columns = [
            Column::make('id'),
            Column::make('user.name')->title('user name'),
            Column::make('user.email')->title('user email'),
            Column::make('package.name')->title('training package name'),
            Column::make('amount_paid')->title('amount paid'),
         ];

        if(auth()->user()->hasRole('Super Admin')) {
            $columns[] = Column::make('gym.city.name')->title('city');
            $columns[] = Column::make('gym.name')->title('gym');
        }

        if(auth()->user()->hasRole('City Manager')) {
            $columns[] = Column::make('gym.name')->title('gym');

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
        return 'revenue_' . date('YmdHis');
    }
}
