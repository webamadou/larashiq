<?php

namespace App\Http\Livewire;

use App\Models\Post;
use App\Models\PostCategory;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use Mediconesystems\LivewireDatatables\NumberColumn;

class DatatableOfPosts extends LivewireDatatable
{
    public $model = Post::class;
    public $exportable = true;

    public function builder()
    {
        return Post::with('category');
    }

    public function columns()
    {
        return [
            NumberColumn::name('id')
                ->sortBy('id')
                ->searchable()
                ->label('Id'),

            Column::name('name')
                ->sortBy('name')
                ->searchable()
                ->label('Titre'),

            /*Column::callback('id', fn ($id) => $this->pageImage($id))
                ->searchable()
                ->label('Image')
                ->sortBy('name'),*/

            Column::callback('category.name', fn ($category) => $category)
                ->filterable(PostCategory::pluck('name', 'id'))
                ->label('Category'),

            DateColumn::name('created_at')
                ->filterable()
                ->label('Enregistrer le')
                ->sortBy('created_at'),

            Column::callback(['id', 'name'], function ($id, $name) {
                $showLink = route('bo.posts.show', $id);
                $editLink = route('bo.posts.edit', $id);
                $deleteLink = route('bo.posts.destroy', $id);
                $deleteMessage = "Veuillez confirmer la suppression de l'article {$name}";

                return view(
                    'layouts.partial.datatable-actions.table-actions',
                    compact(
                        'id',
                        'name',
                        'showLink',
                        'editLink',
                        'deleteLink',
                        'deleteMessage'
                    )
                );
            })
                ->unsortable()
                ->label('Actions')
                ->excludeFromExport()
        ];
    }

    private function pageImage($id)
    {
        $page =  Post::find($id);
        $image = $page->image
            ? '<img class="h-auto ml-5 my-0" width="60"  src="'.asset($page->getDefaultImage()).'">' : '';
        return "{$image}<br>{$page->name}";
    }
}
