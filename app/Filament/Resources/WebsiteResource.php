<?php

namespace App\Filament\Resources;

use App\Filament\Resources\WebsiteResource\Pages;
use App\Filament\Resources\WebsiteResource\RelationManagers;
use App\Models\Website;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class WebsiteResource extends Resource
{
    protected static ?string $model = Website::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('ss')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('css')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('score'),
                Forms\Components\Toggle::make('visible')
                    ->required(),
                Forms\Components\Select::make('user_id')
                    ->relationship('user', 'name')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime(),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime(),
                Tables\Columns\TextColumn::make('score'),
                Tables\Columns\IconColumn::make('visible')
                    ->boolean(),
                Tables\Columns\TextColumn::make('user.name'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
                //Tables\Actions\Action::make('delete')
                //    ->url(fn (Website $record): string => route('websites.destroy', ['website' => $record]))
                //    ->color('danger')
                //    ->icon('heroicon-o-trash')
                Tables\Actions\Action::make('website')
                    ->url(fn (Website $record): string => route('websites.show', ['website' => $record]))
                    ->openUrlInNewTab(),
                Tables\Actions\Action::make('ss')
                    ->url(fn (Website $record): string => "/storage/$record->ss")
                    ->openUrlInNewTab()
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }
    
    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageWebsites::route('/'),
        ];
    }    
}
