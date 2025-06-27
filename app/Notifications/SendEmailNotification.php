<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class SendEmailNotification extends Notification
{
    use Queueable;
    public $contact;
    /**
     * Create a new notification instance.
     */
    public function __construct($contact)
    {
        $this->contact = $contact;
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
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('Phản hồi từ HOTELBOOKING - ' . $this->contact->email)
            ->greeting('Xin chào ' . $this->contact->name . ',')
            ->line('Cảm ơn bạn đã liên hệ với HOTELBOOKING.')
            ->line('Dưới đây là phản hồi của chúng tôi:')
            ->line($this->contact->reply_message)
            ->line('Trân trọng,')
            ->salutation('Đội ngũ HOTELBOOKING');
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
