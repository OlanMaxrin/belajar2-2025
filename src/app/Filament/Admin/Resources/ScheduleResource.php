<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\ScheduleResource\Pages;
use App\Filament\Admin\Resources\ScheduleResource\RelationManagers;
use App\Models\Schedule;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ScheduleResource extends Resource
{
    protected static ?string $model = Schedule::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('competition')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('home_club_id')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('away_club_id')
                    ->required()
                    ->numeric(),
                Forms\Components\DatePicker::make('match_date')
                    ->required(),
                Forms\Components\TextInput::make('kick_off')
                    ->required(),
                Forms\Components\TextInput::make('stadium')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('match_round')
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('competition')
                    ->searchable(),
                Tables\Columns\TextColumn::make('home_club_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('away_club_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('match_date')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('kick_off'),
                Tables\Columns\TextColumn::make('stadium')
                    ->searchable(),
                Tables\Columns\TextColumn::make('match_round')
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
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
            'index' => Pages\ListSchedules::route('/'),
            'create' => Pages\CreateSchedule::route('/create'),
            'edit' => Pages\EditSchedule::route('/{record}/edit'),
        ];
    }
}
