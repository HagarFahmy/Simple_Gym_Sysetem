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
            ->addColumn('action', 'dashboard.coach.action');
    }

   
    public function query(Coach $model)
    {
        // $model= Admin::role('City Manager')->with('city');
        // return $this->applyScopes($model);
        
        $model = Coach::with(['gym']);
       
        return $this->applyScopes($model);
        
      // return $model->newQuery();
    }

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

    // ->columns([
    //     {data: 'id', name: 'posts.id'},
    //      {data: 'name', name: 'users.name'},
    //     ])

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [

            
            // Column::make('id'),
            // Column::make('name'),
            // Column::make('gym_id'),
            // Column::computed('action')
            //       ->exportable(false)
            //       ->printable(false)
            //       ->width(150)
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
        return 'Coaches_' . date('YmdHis');
    }
}
