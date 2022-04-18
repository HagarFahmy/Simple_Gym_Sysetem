<?php

namespace App\DataTables;

use App\Models\Revenue;
use App\Models\Gym;
use App\Models\Admin;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;
use Illuminate\Support\Facades\Auth;

class RevenueDataTable extends DataTable
{

    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->editColumn('amount_paid', function (Revenue $revenue){
                return $revenue->amount_paid/100 . '$';
            });
    }

    public function query(Revenue $model)
    {
        if (auth()->user()->hasRole('Super Admin')) {
            return $model->with('user', 'gym', 'training_packages', 'gym.city');
        }

        if (auth()->user()->hasRole('City Manager')) {
            return $model->with('user', 'gym', 'training_packages')->whereIn('gym_id', Gym::where('city_manager_id', Auth::id())->get()->pluck('id'));
        }

        if (auth()->user()->hasRole('Gym Manager')) {
            return $model->with('user', 'gym', 'training_packages')->where('gym_id', Admin::where('id', Auth::user()->id)->get()->first()->gym_id);
        }
    }

    public function html()
    {
        return $this->builder()
            ->setTableId('revenuedatatable-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->dom('Bfrtip');
        //->orderBy(1);

    }

    protected function getColumns()
    {
        $columns = [
            Column::make('id'),
            Column::make('user.name')->title('user name'),
            Column::make('user.email')->title('user email'),
            Column::make('training_packages.name')->title('training package name'),
            Column::make('amount_paid')->title('amount paid'),
        ];

        if (auth()->user()->hasRole('Super Admin')) {
            $columns[] = Column::make('gym.city.name')->title('city');
            $columns[] = Column::make('gym.name')->title('gym');
        }

        if (auth()->user()->hasRole('City Manager')) {
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
