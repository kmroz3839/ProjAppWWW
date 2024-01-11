<?php
function PokazKontakt(){
    echo '
    <div>
        <form method="post" name="ContactForm" enctype="multipart/form-data" action="'.$_SERVER['REQUEST_URI'].'">
            Temat: <input type="text" name="temat" value=""></input>
            <br>
            Nadawca: <input type="text" name="email" value=""></input>
            <br>
            Treść:
            <br>
            <textarea name="tresc">
            </textarea>
            <br>
            <input type="submit" name="mail_send" value="Wyślij" />
        </form>
    </div>
    ';
}
function WyslijMailKontakt($odbiorca){
    if (empty($_POST['temat']) || empty($_POST['tresc']) || empty($_POST['email'])){
        echo '[nie_wypelniles_pola]';
    } else {
        $mail['subject'] = $_POST['temat'];
        $mail['body'] = $_POST['tresc'];
        $mail['sender'] = $_POST['email'];
        $mail['recipient'] = $odbiorca;

        $header  = 'From: Formularz kontaktowy <'.$mail['sender'].'>\n';
        $header .= 'MIME-Version: 1.0\nContent-Type: text/plain; charset=utf-8\nContent-Transfer-Encoding: utf-8\n';
        $header .= 'X-Sender <'.$mail['sender'].'>\n';
        $header .= 'X-Mailer: PRapWWW mail 1.2\n';
        $header .= 'X-Priority: 3\n';
        $header .= 'Return-Path: <'.$mail['sender'].'>\n';

        mail($mail['recipient'], $mail['subject'], $mail['body'], $header);

        echo '[wiadomosc_wyslana]';
    }
}
function PrzypomnijHaslo($odbiorca){
        $mail['subject'] = 'Przypomnienie hasła';
        $mail['body'] = 'Hasło do admina to "admin".';
        $mail['sender'] = '127.0.0.1';
        $mail['recipient'] = $odbiorca;

        $header  = 'From: Formularz kontaktowy <'.$mail['sender'].'>\n';
        $header .= 'MIME-Version: 1.0\nContent-Type: text/plain; charset=utf-8\nContent-Transfer-Encoding: utf-8\n';
        $header .= 'X-Sender <'.$mail['sender'].'>\n';
        $header .= 'X-Mailer: PRapWWW mail 1.2\n';
        $header .= 'X-Priority: 3\n';
        $header .= 'Return-Path: <'.$mail['sender'].'>\n';

}

?>

<html>
    <head>
    </head>
    <body>
        <h1>Formularz kontaktowy</h1>
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (!empty($_POST['temat']) && !empty($_POST['tresc']) && !empty($_POST['email'])){
                WyslijMailKontakt("kamil.mroz.3839@gmail.com");
            }
        }
        PokazKontakt();
        ?>
    </body>
</html>