<?php

namespace App\Filament\Pages;

use App\Models\Setting;
use App\Models\Teacher;
use BackedEnum;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Pages\Page;

class Settings extends Page implements HasForms
{
    use InteractsWithForms;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-cog-6-tooth';

    protected string $view = 'filament.pages.settings';

    public ?array $data = [];

    public function mount(): void
    {
        $settings = Setting::all()->pluck('value', 'key')->toArray();
        $this->form->fill($settings);
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Profil Sekolah')
                    ->description('Kelola profil dasar MI Darun Najah')
                    ->schema([
                        TextInput::make('school_name')
                            ->label('Nama Sekolah')
                            ->required(),
                        Textarea::make('school_history')
                            ->label('Sejarah Sekolah')
                            ->rows(5),
                        Textarea::make('school_vision')
                            ->label('Visi Sekolah')
                            ->rows(3),
                        Textarea::make('school_mission')
                            ->label('Misi Sekolah')
                            ->rows(5),
                    ])
                    ->collapsible(),

                Section::make('Sambutan Kepala Sekolah')
                    ->description('Kelola sambutan kepala sekolah di halaman utama')
                    ->schema([
                        TextInput::make('headmaster_name')
                            ->label('Nama Kepala Sekolah'),
                        FileUpload::make('headmaster_photo')
                            ->label('Foto Kepala Sekolah')
                            ->image()
                            ->directory('settings'),
                        RichEditor::make('headmaster_greeting')
                            ->label('Teks Sambutan')
                            ->columnSpanFull(),
                    ])
                    ->collapsible(),

                Section::make('Informasi Kontak & Sosial Media')
                    ->description('Kelola detail kontak sekolah, koordinat peta, dan tautan sosial media')
                    ->schema([
                        TextInput::make('contact_email')
                            ->label('Email')
                            ->email(),
                        TextInput::make('contact_phone')
                            ->label('Nomor Telepon/HP'),
                        Textarea::make('contact_address')
                            ->label('Alamat Lengkap')
                            ->rows(3),
                        Textarea::make('contact_maps_embed')
                            ->label('Kode Embed Google Maps (iframe)')
                            ->helperText('Salin kode HTML <iframe> dari Google Maps Share.')
                            ->rows(3),
                        TextInput::make('contact_facebook')
                            ->label('Facebook URL')
                            ->url(),
                        TextInput::make('contact_instagram')
                            ->label('Instagram URL')
                            ->url(),
                        TextInput::make('contact_youtube')
                            ->label('YouTube URL')
                            ->url(),
                    ])
                    ->columns(2)
                    ->collapsible(),

                Section::make('Running Announcement Bar')
                    ->description('Pengumuman berjalan yang muncul di bagian paling atas website')
                    ->schema([
                        TextInput::make('announcement_bar_text')
                            ->label('Teks Pengumuman'),
                        TextInput::make('announcement_bar_link')
                            ->label('Tautan Pengumuman (Opsional)')
                            ->url(),
                        Toggle::make('announcement_bar_active')
                            ->label('Aktifkan Pengumuman Berjalan'),
                    ])
                    ->collapsible(),

                Section::make('Teacher of the Month')
                    ->description('Pilih guru teladan bulan ini untuk ditampilkan di halaman utama')
                    ->schema([
                        Select::make('teacher_of_the_month_id')
                            ->label('Guru Terpilih')
                            ->options(fn () => Teacher::query()->where('is_active', true)->pluck('name', 'id'))
                            ->placeholder('Pilih Guru...')
                            ->nullable(),
                    ])
                    ->collapsible(),
            ])
            ->statePath('data');
    }

    public function save(): void
    {
        $state = $this->form->getState();

        foreach ($state as $key => $value) {
            Setting::updateOrCreate(
                ['key' => $key],
                [
                    'value' => $value,
                    'type' => $this->getSettingType($key),
                ]
            );
        }

        Notification::make()
            ->title('Pengaturan berhasil disimpan!')
            ->success()
            ->send();
    }

    protected function getSettingType(string $key): string
    {
        if ($key === 'headmaster_photo') {
            return 'image';
        }
        if (in_array($key, ['school_history', 'school_vision', 'school_mission', 'headmaster_greeting', 'contact_address', 'contact_maps_embed'])) {
            return 'textarea';
        }
        if ($key === 'announcement_bar_active') {
            return 'boolean';
        }
        return 'text';
    }
}
