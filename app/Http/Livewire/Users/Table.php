<?php

namespace App\Http\Livewire\Users;

use App\Models\User;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

class Table extends DataTableComponent
{

    public array $bulkActions = [
        'delete' => 'Delete',
    ];

    protected $listeners = ['reload'];
    protected $model = User::class;



    public function configure(): void
    {
        $this->setPrimaryKey('id');
        $this->setTableWrapperAttributes([
            'style'=>'overflow-y: auto;'
        ]);
/*            ->setTrAttributes(function ($row) {
            return ['wire:click.stop' => '$emit("toggleSelect",' . $row->id . ')', 'class' => 'cursor-pointer hover:bg-gray-200'];
        });*/
    }

    public function columns(): array
    {
        return [
            Column::make('id')->hideIf(true),
            Column::make('Profile', 'profile_photo_path')->format(
                fn($value, $row, Column $column) => '<img class="w-10 h-10 rounded-full" src="' . $row->profile_photo_url . '" />'
            )->html(),
            Column::make('name')
                ->format(fn($value, $row, Column $column) => '<a class="font-medium text-blue-600 dark:text-yellow-400 hover:underline cursor-pointer" wire:click.prevent="$emit(`show`,' . $row->id . ')">' . $value . '</a>')->html()
                ->sortable()->searchable(),
            Column::make('email')->sortable()->searchable(),

            Column::make('Role','name')->format(
                fn($value, User $row, Column $column) => $row->roles()->get()->map(fn($role)=>$role->name)->join(' , ')
            )->html(),
        ];
    }

    public function reload()
    {
        $this->reset();
    }

    public function delete()
    {
        $this->emitUp('delete', $this->getSelected());
    }


}
