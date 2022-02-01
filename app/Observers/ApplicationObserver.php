<?php

namespace App\Observers;
use App;
use App\Application;
use Mail;
use App\Mail\MailLayoutButton;
use App\Mail\MailLayoutNotification;

class ApplicationObserver
{
    /**
     * Listen to the User created event.
     *
     * @param  User $user
     * @return void
     */


    public function created(Application $application)
    {
        if (App::environment('production')) {
            Mail::to($application->user->email)->send(new MailLayoutButton('[Shift APPens] We have received your application!', 'Shift APPens 2018 Application' ,'Hello, Shifter! We received your Shift APPens 2018’s application with success! The analysis stage has begun so you can receive your answer anytime now. Do you think you can do even better? You can still improve your application.', route('applications.edit', ['application' => $application->id]), 'Edit Application'));
        } else if (App::environment('staging', 'local')) {
            Mail::to('franciscojrsantos1997@gmail.com')->send(new MailLayoutButton('[Shift APPens] We have received your application!', 'Shift APPens 2018 Application' ,'Hello, Shifter! We received your Shift APPens 2018’s application with success! The analysis stage has begun so you can receive your answer anytime now. Do you think you can do even better? You can still improve your application.', route('applications.edit', ['application' => $application->id]), 'Edit Application'));
        }

    }


    public function updated(Application $application)
    {
        if ($application->isAccepted == true) {
            if (App::environment('production')) {
                Mail::to($application->user->email)->send(new MailLayoutNotification('[Shift APPens] Accepted Application', 'Shift APPens 2018 Application','Dear Shifter! </p> <br /> <p>You were one of the chosen to join us at the 5th edition of Shift APPens! Follow these next steps to complete your application.</p> <br /> <p>The payment of your registration,10€, could be done in one of two ways:</p> <ul> <li><p>Bank transfer, to the account with the following data:</p> </li> <ul> <li><p>IBAN: PT50 0045 3030 40223802816 18</p> </li> <li><p>NAME: jeKnowledge Associação</p> </li> </ul> <li><p>Presential payment: at Núcleo de Estudantes de Informática (room C4.3, 4th floor, in Informatics Engineering Department)</p> </li> </ul> <br /> <p>If you chose the bank transfer, you should send your payment receipt to <a href="mailto:geral@shiftappens.com" >geral@shiftappens.com</a> in order to check your payment. The email subject should be: “Pagamento de Inscrição - [full name]”.</p> <br /> <p>You have until 23h59 on April 15 to conclude this process. If you don’t do that, your place will be attributed to other candidate.</p> <p>We are waiting for you at 2pm on April 20, at Pavilhão Multidesportos Mário Mexia, in Coimbra, for the most crazy hackathon in Portugal! </p> <p>If you’ve got any questions, contact us via email. We will respond it right away! </p> <p>Come shift with us!</p>'));
            } else if (App::environment('staging', 'local')) {
                Mail::to('franciscojrsantos1997@gmail.com')->send(new MailLayoutNotification('[Shift APPens] Accepeted Application', 'Shift APPens 2018 Application','Dear Shifter! </p> <br /> <p>You were one of the chosen to join us at the 5th edition of Shift APPens! Follow these next steps to complete your application.</p> <br /> <p>The payment of your registration,10€, could be done in one of two ways:</p> <ul> <li><p>Bank transfer, to the account with the following data:</p> </li> <ul> <li><p>IBAN: PT50 0045 3030 40223802816 18</p> </li> <li><p>NAME: jeKnowledge Associação</p> </li> </ul> <li><p>Presential payment: at Núcleo de Estudantes de Informática (room C4.3, 4th floor, in Informatics Engineering Department)</p> </li> </ul> <br /> <p>If you chose the bank transfer, you should send your payment receipt to <a href="mailto:geral@shiftappens.com" >geral@shiftappens.com</a> in order to check your payment. The email subject should be: “Pagamento de Inscrição - [full name]”.</p> <br /> <p>You have until 23h59 on April 15 to conclude this process. If you don’t do that, your place will be attributed to other candidate.</p> <p>We are waiting for you at 2pm on April 20, at Pavilhão Multidesportos Mário Mexia, in Coimbra, for the most crazy hackathon in Portugal! </p> <p>If you’ve got any questions, contact us via email. We will respond it right away! </p> <p>Come shift with us!</p>'));
            }
        }

    }


}
