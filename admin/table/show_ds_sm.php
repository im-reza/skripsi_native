<?php 
		include '../../connections/connection_db.php';

		if (isset($_POST['no'])) {
			$no=$_POST['no'];
			$query=mysqli_query($con,"select surat_masuk.no_surat,surat_masuk.tgl_surat,surat_masuk.pengirim,surat_masuk.perihal,file.nama_file,file.tgl_masuk,disposisi.catatan,disposisi.tgl, GROUP_CONCAT(penerima SEPARATOR  ' & ') as penerima from disposisi inner join surat_masuk inner join file on surat_masuk.no_surat=disposisi.no_surat and surat_masuk.no_surat=file.no_surat where disposisi.no_surat='$no' GROUP BY disposisi.no_surat; ");
			while ($d=mysqli_fetch_array($query)) {
				
				echo json_encode($d);
			}
			
		}

		?>