<?php

namespace App\Filament\Resources\Schedules\Schemas;

use App\Models\Program;
use App\Models\Teacher;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\TimePicker;
use Filament\Schemas\Schema;

class ScheduleForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('program_id')
                    ->label('Programa')
                    ->placeholder('Hili programa')
                    ->options(Program::query()->pluck('program_name', 'id')),
                
                Select::make('teacher_id')
                    ->label('Formador')
                    ->placeholder('Hili formador')
                    ->options(Teacher::query()->pluck('full_name', 'id')),
                
                Select::make('day_of_week')
                    ->label('Data Semana')
                    ->placeholder('Hili data semana')
                    ->options([
                        'Monday' => 'Segunda',
                        'Tuesday' => 'Terça',
                        'Wednesday' => 'Quarta',
                        'Thursday' => 'Quinta',
                        'Friday' => 'Sexta',
                        'Saturday' => 'Sábado',
                        'Sunday' => 'Domingo',
                    ]),
                
                TimePicker::make('start_time')
                    ->label('Oras Hahu')
                    ->withoutSeconds(),
                
                TimePicker::make('end_time')
                    ->label('Oras Remata')
                    ->withoutSeconds(),
                
                DatePicker::make('start_date')
                ->format('d-m-y')
                    ->label('Data Hahu'),
                
                DatePicker::make('end_date')
                    ->format('d-m-y')
                    ->label('Data Ramata'),
                
                TextInput::make('quota')
                    ->label('Quota'),
                
                Select::make('status')
                    ->placeholder('Hili Observasaun')
                    ->options([
                        'active' => 'Active',
                        'full' => 'Full',
                        'closed' => 'Closed',
                    ])
                    ->label('Observasaun'),
            ]);
    }
}
