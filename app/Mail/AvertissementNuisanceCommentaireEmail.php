<?php

namespace App\Mail;


use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

use App\Commentaire;

class AvertissementNuisanceCommentaireEmail extends Mailable
{
  use Queueable, SerializesModels;
 public $commentaire;
 public $id_utilisateur;
 /**
  * Create a new message instance.
  *
  * @return void
  */
 public function __construct(Commentaire $commentaire, $id_utilisateur)
 {
     //
     $this->id_utilisateur = $id_utilisateur;
     $this->commentaire = $commentaire;
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
         ->view('emails.avertissementCommentaire')
         ->with(compact('commentaire'));
 }
}
