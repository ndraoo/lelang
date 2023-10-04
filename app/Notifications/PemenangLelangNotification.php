<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class PemenangLelangNotification extends Notification
{
    use Queueable;
    public $idLelang;
    /**
     * Create a new notification instance.
     */
    public function __construct($idLelang)
    {
        $this->idLelang = $idLelang;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
        ->line('Anda adalah pemenang dalam lelang.')
        ->action('Lihat Detail', route('masyarakat.lelang', $this->idLelang));
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
