<?php
ob_start();?>

<div class="contact-content">
	 <div class="container">
		     <div class="contact-info">
			 <h2>CONTACT</h2>
			 <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Contrary to popular belief.</p>
		     </div>
			 <div class="contact-details">				 
			 <form>
				 <input type="text" placeholder="Nom" required/>
				 <input type="text" placeholder="Email" required/>
				 <input type="text" placeholder="Téléphone" required/>
				 <input type="text" placeholder="Ville" required/>
				 <textarea placeholder="Message"></textarea>
				 <input type="submit" value="ENVOYER"/>
			 </form>
		  </div>
		  <div class="contact-details">
			  <div class="col-md-6 contact-map">
				 <h4>NOUS TROUVER</h4>
				 <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d803187.8113675824!2d-120.11910914056458!3d38.15292455846902!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x808fb9fe5f285e3d%3A0x8b5109a227086f55!2sCalifornia%2C+USA!5e0!3m2!1sen!2sin!4v1423829283333" frameborder="0" style="border:0"></iframe>
			  </div>
			  <div class="col-md-6 company_address">		 
					<h4>ME CONTACTER</h4>
					<p>5 av de la Fine Plume</p>
					<p>94160 Issy-les-Feuillets</p>
					<p>FRANCE</p>
					<p>Téléphone :(+33) 43 94 38 57</p>
					<p>Fax : (+33) 43 94 38 58</p>
					<p>Email: <a href="mailto:jean.forteroche@ecrivain.fr">jean.forteroche@ecrivain.fr</a></p>
					<p>Suivez-moi : <a href="#">Facebook</a>, <a href="#">Twitter</a></p>
			 </div>
			  <div class="clearfix"></div>
	     </div>		 


			 </div>
	 </div>
</div>

<?php
$contentBody = ob_get_clean();?>