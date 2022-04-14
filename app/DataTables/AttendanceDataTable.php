<?php

namespace App\DataTables;

use App\Models\Attendance;
use App\Models\Gym;
use App\Models\Admin;
use App\Models\TrainingSession;

use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;
use Illuminate\Support\Facades\Auth;


class AttendanceDataTable extends DataTable
{

    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query);
    }

    public function query(Attendance $model)
    {
        return $model->with('user','training_session' ,'training_session.gym' , 'training_session.gym.city');
    }

    public function html()
    {
        return $this->builder()
                    ->setTableId('atendancedatatable-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->dom('Bfrtip')
                    ->orderBy(1);
                    
    }

    protected function getColumns()
    {
        $columns = [
            Column::make('id'),
            Column::make('user.name')->title('user name'),
            Column::make('user.email')->title('user email'),
            Column::make('training_session.name')->title('training session name'),
            Column::make('training_session.starts_at')->title('training session date/time'),
        ];

        if(auth()->user()->hasRole('Super Admin')) {
            $columns[] = Column::make('training_session.gym.city.name')->title('city');
            $columns[] = Column::make('training_session.gym.name')->title('gym');
        }

        if(auth()->user()->hasRole('City Manager')) {
            $columns[] = Column::make('training_session.gym.name')->title('gym');

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
        return 'Cities_' . date('YmdHis');
    }
}
