<?php

namespace App\Livewire;

use Filament\Forms\Components\Actions\Action;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Filament\Support\Enums\ActionSize;
use Livewire\Component;

class TestComponent extends Component implements HasForms
{
    public ?array $data;

    use InteractsWithForms;

    public function form(Form $form): Form
    {
        return $form->schema([
            TextInput::make('quantity')
                ->hiddenLabel()
                ->numeric()
                ->required()
                ->minValue(1)
                ->step(1)
                ->default(1)
                ->suffixAction(
                    Action::make('AddToCart')
                        ->icon('heroicon-m-pencil-square')
                        ->button()
                        ->size(ActionSize::Large)
                        ->action(function() {
                            $this->addToCart();
                        })
                )
        ]);
    }

    public function render()
    {
        return view('livewire.test-component');
    }
}
