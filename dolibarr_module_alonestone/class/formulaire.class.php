<?php

class Formulaire  {

	static function get(&$contact) {

		$res = "";

		if (isset($_POST['envoyer']))
		{

			$subject = $_POST['objet'];
			$message = $_POST['contenu'];

			$headers  = 'MIME-Version: 1.0' . "\r\n";
			$headers .= 'Content-type: text/html; charset=UTF8' . "\r\n";
			$headers .= 'To: '. $contact->user_login .' <' . $contact->email . '>\r\n';
			$headers .= 'From: Test Test <test@test.fr>';

			mail($contact->email, $subject, $message, $headers);

			setEventMessage('Element simple sauvegardé');
			//$res .= '<p>Envoi effectué</p>';
		}


		//if ( $contact->no_email = 0 &&  $contact->email <> "")
		//{


			$res .= '<form enctype="multipart/form-data" action="" method="POST">';
				$res .= '<table>';
					//Destinataire
					/*
					echo '<tr>';
						echo '<th>';
							echo '<p>Destinataire</p>';
						echo '</th>';
						echo '<td>';
							echo '<input type="text" class="flat" name="destinataire">';
						echo '</td>';
					echo '</tr>';
					*/
					//Objet
					$res .= '<tr>';
						$res .= '<th>';
							$res .= '<p>Objet</p>';
						$res .= '</th>';
						$res .= '<td>';
							$res .= '<input type="text" class="flat" name="objet" style="width:700px;">';
						$res .= '</td>';
					$res .= '</tr>';
					//message
					$res .= '<tr>';
						$res .= '<th>';
							$res .= '<p>Message</p>';
						$res .= '</th>';
						$res .= '<td>';
							$res .= '<input type="text" name="contenu" class="flat" style="width:700px; height:400px;"></textarea>';
						$res .= '</td>';
					$res .= '</tr>';
				$res .= '</table>';
				$res .= '<input type="submit" name="envoyer" class="button" value="Envoyer" class="boutonEnvoyerMail">';
			$res .= '</form>';
		//}
		//else{
		//		$res .= '<p>Ce contact ne veux pas recevoir de mail ou n\'a pas d\'adresse e-mail.</p>';

		//}

		return $res;


	}

}

