<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../vendor/autoload.php';

class Mail {
  public function sendAccountCreated($toArray, $newAccountInfo) {
    $mail = $this->mailFactory();

    foreach ($toArray as $to) {
      $mail->addAddress($to);
    }

    $mail->Subject = "Nuovo utente Climber's Soul";
    $mail->Body = "Ciao, qualcuno si e' appena registrato su Climber's Soul con queste info:<br><br>" . $newAccountInfo . "<br><br>E' possibile verificare l'utente dalla pagina di gestione utenti <a href=\"https://caiarosio.it/climberssoul/#/users\">https://caiarosio.it/climberssoul/#/users</a><br><br>--<br>Lo Staff di Climber's Soul";
    $mail->AltBody = "Ciao, qualcuno si e' appena registrato su Climber's Soul con queste info:\r\n\r\n" . $newAccountInfo . "\r\n\r\nE' possibile verificare l'utente dalla pagina di gestione utenti https://caiarosio.it/climberssoul/#/users\r\n\r\n--\r\nLo Staff di Climber's Soul";

    $this->realSend($mail);
  }

  public function sendAccountVerified($to) {
    $mail = $this->mailFactory();

    $mail->addAddress($to);

    // L'allegato funziona solo in prod
    if (is_file('../../assets/regolamento.pdf')) {
      $mail->addAttachment('../../assets/regolamento.pdf', 'ClimbersSoul-Regolamento.pdf');
    }

    $mail->Subject = "Benvenuto in Climber's Soul";
    $mail->Body = "Ciao e benvenuto in Climber's Soul<br><br>Il tuo account è stato attivato e ora puoi inserire le tue prenotazioni sul sito:<br><a href=\"https://caiarosio.it/climberssoul\">https://caiarosio.it/climberssoul/</a><br><br>Ricordati di leggere il regolamento, che trovi anche in allegato, e di portarne una copia firmata la prima volte che verrai a trovarci<br><br><br>A presto e buona arrampicata!<br>--<br>Lo Staff di Climber's Soul";
    $mail->AltBody = "Ciao e benvenuto in Climber's Soul\r\n\r\nIl tuo account è stato attivato e ora puoi inserire le tue prenotazioni sul sito:\r\nhttps://caiarosio.it/climberssoul/\r\n\r\nRicordati di leggere il regolamento, che trovi anche in allegato, e di portarne una copia firmata la prima volte che verrai a trovarci\r\n\r\n\r\nA presto e buona arrampicata!\r\n--\r\nLo Staff di Climber's Soul";

    $this->realSend($mail);
  }

  private function mailFactory() {
    require 'include/config.php';

    $mail = new PHPMailer(true);
    $mail->isSMTP();
    $mail->Host = $mailServer;
    $mail->Port = $mailPort;
    $mail->SMTPAuth = $mailAuth;
    if ($mailAuth) {
      $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
      $mail->Username = $mailUsername;
      $mail->Password = $mailPassword;
    }
    $mail->setFrom($mailUsername, $mailName);
    $mail->addCC($mailUsername);
    $mail->isHTML(true);
    return $mail;
  }

  private function realSend($mail) {
    try {
      $mail->send();
      error_log('Message has been sent', 0);
    } catch (Exception $e) {
      error_log("##################################################", 0);
      error_log("# Message could not be sent. Mailer Error: {$mail->ErrorInfo}", 0);
      error_log("##################################################", 0);
    }
  }
}
