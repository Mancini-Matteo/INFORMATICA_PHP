
<html>
    <head>
        <title>TavolaPitagorica</title>
    </head>
    <body>
        <h1>Tavola pitagorica</h1>
        <table class="tabella" border="1" cellspacing="2" cellpadding="3" align="center">
		<?php
			$limite = 10;
			$limite2 = 10;
			for ($riga=1; $riga<=$limite; $riga++){
				echo "<tr>";
				for ($colonna=1; $colonna<=$limite2;$colonna++ ){
					$valore = $riga * $colonna;
					echo "<td align=\"center\">"; echo $valore; echo "</td>";}
			echo "</tr>";}
		?>
		</table>
    </body>
</html>