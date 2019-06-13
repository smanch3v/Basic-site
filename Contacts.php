<?php

$title = "Contacts";

if(isset($_POST['submit'])){
    $to = "svetoslavmanchev@gmail.com"; // my mail
    $from = $_POST['email']; // sender's Email address
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $subject = "Form submission";
    $subject2 = "Copy of your form submission";
    $message = $first_name . " " . $last_name . " wrote the following:" . "\n\n" . $_POST['message'];
    $message2 = "Here is a copy of your message " . $first_name . "\n\n" . $_POST['message'];

    $headers = "From:" . $from;
    $headers2 = "From:" . $to;
    mail($to,$subject,$message,$headers);
    mail($from,$subject2,$message2,$headers2); // sends a copy of the message to the sender
    echo "Mail Sent. Thank you " . $first_name . ", we will contact you shortly.";

    }


$content =
'<div class="form-style-8">
    <h2>Leave us a message!</h2>
    <form>
        <input type="text" name="first_name" placeholder="First Name" />
        <input type="text" name="last_name" placeholder="Last Name" />
        <input type="email" name="email" placeholder="Email" />
        <textarea placeholder="Message" name="message" onkeyup="adjust_textarea(this)"></textarea>
        <input type="button" value="Send Message" />
    </form>
</div>';

include 'template.php';
?>
