<?php

namespace App\DataTables;

use App\Models\Admin;
use App\Models\Gym;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;
use Illuminate\Support\Facades\Auth;


class GymManagersDataTable extends DataTable
{
    
    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->addColumn('action', 'dashboard.gymManager.action');
    }

   
    public function query(Admin $model)
    {
        if(auth()->user()->hasRole('Super Admin')) {
            $model= Admin::role('gym Manager')->with('gym');
            return $this->applyScopes($model);
        }
         else if(auth()->user()->hasRole('City Manager')) {

            $model= Admin::role('gym Manager')->with('gym')->whereIn('gym_id', Gym::where('city_manager_id', Auth::id())->get()->pluck('id'));
            return $this->applyScopes($model);        }


    }

   
    public function html()
    {
        return $this->builder()
                    ->setTableId('gymmanagersdatatable-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->dom('Bfrtip')
                    ->orderBy(1)
                    ->addAction(['width' => '250px']);
    }

  
    protected function getColumns()
    {
        return [
            Column::make('id'),
            Column::make('name'),
            Column::make('email'),
            Column::make('gym.name')->title('gym name'),
            
            
        ];
    }

   
    protected function filename()
    {
        return 'CityManagers_' . date('YmdHis');
    }
}
