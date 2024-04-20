<?php

namespace App\DataTables;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Illuminate\Support\Carbon;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class UsersDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     * @return \Yajra\DataTables\EloquentDataTable
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('action', function ($user){
                $editLink = route('bo.users.edit', $user->id);
                $showLink = route('bo.users.show', $user->id);
                $deleteLink = route('bo.users.destroy', $user->id);
                $deleteMessage = "Veuillez confirmer la suppression du profil  {$user->fullName}";

                return view(
                    'layouts.partial.datatable-actions.table-actions',
                    compact('editLink', 'showLink', 'deleteLink', 'deleteMessage')
                )->render();
            })
            ->addColumn('updated_at', fn ($user) => Carbon::parse($user->updated_at)->format('d-m-Y H:i:s'))
            ->addColumn('role', fn ($user) => $user->roles->pluck("name")->implode(","))
            ->setRowId('id');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\User $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(User $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('users-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->dom('Bfrtip')
                    ->orderBy(1)
                    ->selectStyleSingle()
                    ->buttons([
                        Button::make('add'),
                        Button::make('excel'),
                        // Button::make('csv'),
                        // Button::make('pdf'),
                        //Button::make('print'),
                        Button::make('reset'),
                        //Button::make('reload')
                    ])
                    ->parameters([
                        'pageLength' => 30,
                        'itemsPerPage', [10, 25, 50, 100]
                    ])
                    ->language([
                        'sEmptyTable'   => __('datatable.sEmptyTable'),
                        'sInfo'         => __('datatable.sInfo'),
                        'sSearch'       => __('datatable.sSearch'),
                        'sReset'        => __('datatable.sReset'),
                        "oPaginate"     => [
                            "sFirst"    => __('datatable.sFirst'),
                            "sLast"     => __('datatable.sLast'),
                            "sNext"     => __('datatable.sNext'),
                            "sPrevious" => __('datatable.sPrevious'),
                        ],
                    ]);
    }

    /**
     * Get the dataTable columns definition.
     *
     * @return array
     */
    public function getColumns(): array
    {
        return [
            Column::make('id'),
            Column::make('name')->title('Nom'),
            Column::make('email')->title('Email'),
            Column::make('role')->title('Roles'),
            Column::make('updated_at')->title('Dernier update'),
            Column::computed('action')
                ->title('Actions')
                ->exportable(false)
                ->printable(false)
                ->width(60)
                ->addClass('text-center'),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename(): string
    {
        return 'Users_' . date('YmdHis');
    }
}
