<td>
	<?php
	if ($row['status'] == true) {
	?>
		//echo 'Check Here';

		<h2 class="StepTitle">Urine Test</h2>

		<p class="links cl-effect-1">
			<a href="user-urine-test.php">
				Check Update
			</a>
		</p>
	<?php
	} else {
		echo 'Not Available';
	}
	?>
</td>