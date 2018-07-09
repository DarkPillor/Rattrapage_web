<?php
namespace App\Mail;
use App\Photo;
use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
class AvertissementNuisanceImageEmail extends Mailable
{
    use Queueable, SerializesModels;
    public $image;
    public $id_utilisateur;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Photo $image, $id_utilisateur)
    {
        //
        $this->id_utilisateur = $id_utilisateur;
        $this->image = $image;
    }
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $email = User::select('email')
            ->where('id', \Auth::user()->id)
            ->first();
        return $this->from($email)
            ->view('emails.avertissementImage')
            ->with(compact('image'));
    }
}
