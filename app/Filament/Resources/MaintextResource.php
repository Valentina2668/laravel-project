<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MaintextResource\Pages;
use App\Filament\Resources\MaintextResource\RelationManagers;
use App\Models\Maintext;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Columns\TextColumn;

class MaintextResource extends Resource
{
    protected static ?string $model = Maintext::class;
    protected static ?string $pluralModelLabel = 'Статьи';

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name'),
                TextInput::make('url'),
                Textarea::make('body'),
                // RichEditor::make('body'),
                Select::make('status')
                    ->options([
                        'name' => 'Name',
                        'reviewing' => 'Reviewing',
                        'published' => 'Published',
                    ]),
                Select::make('status')
                    ->options([
                        'name' => 'Name',
                        'reviewing' => 'Reviewing',
                        'published' => 'Published',
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id'),
                TextColumn::make('name')->searchable(),
                TextColumn::make('url')
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListMaintexts::route('/'),
            'create' => Pages\CreateMaintext::route('/create'),
            'edit' => Pages\EditMaintext::route('/{record}/edit'),
        ];
    }
}
