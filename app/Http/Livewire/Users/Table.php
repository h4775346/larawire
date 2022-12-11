<?php

namespace App\Http\Livewire\Users;

use App\Models\User;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Columns\ButtonGroupColumn;
use Rappasoft\LaravelLivewireTables\Views\Columns\LinkColumn;

class Table extends DataTableComponent
{

    public array $bulkActions = [
        'delete' => 'Delete',
    ];

    protected $listeners = ['reload'];
    protected $model = User::class;


    public function configure(): void
    {
        can_or_abort("users.index");
        $this->bulkActions['delete'] = __("Delete");
        $this->setPrimaryKey('id');
        $this->setTableWrapperAttributes([
            'style' => 'overflow-y: auto;'
        ]);
        /*            ->setTrAttributes(function ($row) {
                    return ['wire:click.stop' => '$emit("toggleSelect",' . $row->id . ')', 'class' => 'cursor-pointer hover:bg-gray-200'];
                });*/
    }

    public function columns(): array
    {
        return [
            Column::make('id')->hideIf(true),
            Column::make(__('Profile Photo'), 'profile_photo_path')->format(
                fn($value, $row, Column $column) => '<img class="w-10 h-10 rounded-full" src="' . $row->profile_photo_url . '" />'
            )->html(),
            Column::make(__("Name"),'name')
                ->format(fn($value, $row, Column $column) => '<a class="font-medium text-blue-600 dark:text-yellow-400 hover:underline cursor-pointer" wire:click.prevent="$emit(`show`,' . $row->id . ')">' . $value . '</a>')->html()
                ->sortable()->searchable(),
            Column::make(__('Email'),'email')->sortable()->searchable(),

            Column::make(__("Role"), 'name')->format(
                fn($value, User $row, Column $column) => $row->roles()->get()->map(fn($role) => $role->name)->join(' , ')
            )->html(),
            ButtonGroupColumn::make(__("Actions"))
                ->attributes(function ($row) {
                    return [
                        'class' => 'space-x-2',
                    ];
                })
                ->buttons([

                    LinkColumn::make(__("View"))
                        ->title(fn($row) => __('View'))
                        ->location(fn() => null)
                        ->attributes(function ($row) {
                            return [
                                'class' => 'py-1 px-5 mx-2 mb-2 text-sm font-medium text-gray-900 focus:outline-none bg-gray-200 rounded-lg border border-gray-200 hover:bg-gray-300  focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-700',
                                'wire:click.prevent' => '$emit(`show`,' . $row->id . ')'
                            ];
                        }),

                    LinkColumn::make(__('Edit'))
                        ->title(fn($row) => __('Edit'))
                        ->location(fn() => null)
                        ->attributes(function ($row) {
                            return [
                                'class' => 'text-white bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-1 mx-2 mb-2 dark:bg-gray-900 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700',
                                'wire:click.prevent' => '$emit(`edit`,' . $row->id . ')'
                            ];
                        }),

                    LinkColumn::make(__('Delete'))
                        ->title(fn($row) => __('Delete'))
                        ->location(fn() => null)
                        ->attributes(function ($row) {
                            return [
                                'class' => 'focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-1 mx-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900',
                                'wire:click.prevent' => '$emit(`delete`,' . json_encode([$row->id]) . ')'
                            ];
                        }),
                ]),
        ];
    }

    public function reload()
    {
        $this->reset();
    }

    public function delete()
    {
        can_or_abort("users.delete");
        $this->emitUp('delete', $this->getSelected());
    }


}
