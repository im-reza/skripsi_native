<?php 
		include '../connections/connection_db.php';

		if (isset($_POST['no'])) {
			$no=$_POST['no'];
			$query=mysqli_query($con,"select * from surat_masuk inner join file on surat_masuk.no_surat=file.no_surat where surat_masuk.id_sm='$no' ");
			while ($d=mysqli_fetch_array($query)) {
				echo json_encode($d);
			}
			
		}

		?>