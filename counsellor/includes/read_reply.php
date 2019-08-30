<section class="col m4 offset-m4">
	<h4 class="center-align">Your Message(s)</h4>
	<div class="card">
		<div class="card-content" style="height: 300px;overflow-y: scroll;">
			<?php  
				$sql = mysqli_query($dbc, "SELECT * FROM messages WHERE ((receiver='$counsellor_id' AND sender='$_GET[sender]') OR (receiver='$_GET[sender]' AND sender='$counsellor_id'))");
				
				if (mysqli_num_rows($sql) > 0) {
					while($r = mysqli_fetch_array($sql)){		
			?>
			<div class="card darken-2 " style="padding: 5px">
				<span style="display: inline;" class="chip <?php echo ($r[sender] === $counsellor_id) ? 'orange': 'blue'; ?>"><?php echo ($r["sender"] === $counsellor_id) ? "Me": "student"; ?></span>
				<p><?php echo $r["content"]; ?></p>
			</div>
			<?php } }?>	
		</div>
		<div class="card-action">
			<form>
				<div class="input-field">
          <textarea id="message" class="materialize-textarea validate" name="message"></textarea>
          <label for="message" required>message:</label>
        </div>
        <br>
        <button class="btn waves-effect hoverable waves-light block orange lighten-2" type="submit" name="send">Send Message
        </button>
			</form>
		</div>
	</div>
</section>