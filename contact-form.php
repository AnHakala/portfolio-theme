<?php /* Template Name: Contact Form */ ?>
<div id="contact-form-container">
		<form id="contact-form"  method="post" action="">
			<ul id="contact-list">
				<fieldset id="contact-information">
					<li class="contact-half-width">
						<label class="contact-label" for="contact-name">Name:</label>
						<input class="contact-box required" type="text" name="contact-name" id="contact-name" /> 
					</li>
					<li class="contact-half-width">
						<label class="contact-label" for="contact-email">Email:</label>
						<input class="contact-box" type="text" name="contact-email" id="contact-email" /> 
					</li>
				</fieldset>
				<fieldset id="contact-comments">
					<li class="contact-full-width">
						<label class="contact-label" for="comments-text">Message:</label>
						<textarea class="contact-text-box" name="comments" id="comments-text" rows="20" cols="30" class="required requiredField"></textarea>
					</li>
				</fieldset>
				<fieldset id="contact-submit">
					<li class="contact-full-width">
						<input id="submit-button" type="submit" value="Submit">
					</li>
				</fieldset>
			</ul>
			<input type="hidden" name="submitted" id="submitted" value="true" />
		</form>
</div>