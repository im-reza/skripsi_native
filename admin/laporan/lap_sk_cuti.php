<?php include_once '../../assets/kop_surat.php'; include '../../connections/connection_db.php';?>
<?php  
$id=$_GET['id'];
$sql=mysqli_query($con,"SELECT * from surat_keluar where no_surat='$id'");
while ($data=mysqli_fetch_array($sql)) {
	$tgl_surat=$data['tanggal'];
	?>
	<div class="row">
		<div class="col-md-2">
		</div>
		<div class="col-md-7">
		</div>
		<div class="col-md-3" style="">
			Banjarmasin , <?php echo date("d M Y",strtotime($tgl_surat)) ?>
			<br>
			<br>
			Kepada Yth,
			<br>
			<br>
			<b><?php echo $data['penerima']; ?></b>
			di- <b>Banjarmasin</b>
		</div>
	</div>
	<br>
	<div class="row">
		<div class="col-md-12">
			<center>
				<u><h3>SURAT PERMOHONAN CUTI TAHUNAN</h3></u>
				Nomor : <?php echo $data['no_surat']; ?>
			</center>
		</div>
	</div>
	<br>
	<br>
	<div class="col-md-12" style="margin-top: 5px;">
		<?php echo $data['isi']; ?>
	</div>
	<div class="row">
		<div class="col-md-6"></div>
		<div class="col-md-2"></div>
		<div class="col-md-4" style="text-align: center; font-size: 14px;font-family: sans-serif;">
			<b>
				<p style="margin-bottom: 60px;">Hormat saya,</p>
				<p><u><?php echo $data['pembuat']; ?></u><br>NIP. 19660601 198602 1 009</p>
			</b>
		</div>
	<?php } ?>
</div>
<center>
	<table cellspacing="0" class="MsoTableGrid" style="border-collapse:collapse; border:none; margin-left:17px; width:15.0cm">
		<tbody>
			<tr>
				<td rowspan="2" style="border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:1px solid black; height:111px; vertical-align:top; width:269px">
					<p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-size:9.0pt"><span style="font-family:&quot;Times New Roman&quot;,&quot;serif&quot;"><span style="color:black">CATATAN PEJABAT KEPEGAWAIAN</span></span></span></span></span></p>

				</td>
				<td style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:1px solid black; height:111px; vertical-align:top; width:298px">
					<p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-size:9.0pt"><span style="font-family:&quot;Times New Roman&quot;,&quot;serif&quot;"><span style="color:black">CATATAN/PERTIMBANGAN ATASAN LANGSUNG</span></span></span></span></span></p>

					<p>&nbsp; &nbsp;</p>

					<p style="text-align:center"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><u><span style="font-size:9.0pt"><span style="font-family:&quot;Times New Roman&quot;,&quot;serif&quot;"><span style="color:black">Drs. Dolly Syahbana, MM</span></span></span></u></span></span></p>

					<p style="text-align:center"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-size:9.0pt"><span style="font-family:&quot;Times New Roman&quot;,&quot;serif&quot;"><span style="color:black">NIP. 19660601 19860 21 009</span></span></span></span></span></p>

					<p style="text-align:center"></p>
				</td>
			</tr>
			<tr>
				<td style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; height:118px; vertical-align:top; width:298px">
					<p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-size:9.0pt"><span style="font-family:&quot;Times New Roman&quot;,&quot;serif&quot;"><span style="color:black">KEPUTUSAN PEJABAT YANG BERWENANG MEMBERIKAN CUTI</span></span></span></span></span></p>

					<p>&nbsp; &nbsp;</p>

					<p style="text-align:center"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><u><span style="font-size:9.0pt"><span style="font-family:&quot;Times New Roman&quot;,&quot;serif&quot;"><span style="color:black">Drs. Faisal Anshory</span></span></span></u></span></span></p>

					<p style="text-align:center"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-size:9.0pt"><span style="font-family:&quot;Times New Roman&quot;,&quot;serif&quot;"><span style="color:black">NIP. 19660601 19860 21 009</span></span></span></span></span></p>
				</td>
			</tr>
		</tbody>
	</table>

</center>
</div>
<script src="../../assets/jquery/dist/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
</body>
</html>