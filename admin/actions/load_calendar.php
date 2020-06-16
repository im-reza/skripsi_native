<?php

include '../../connections/connection_db.php';

$data=array();
$query =mysqli_query($con," select * from acara inner join surat_masuk inner join file on acara.no_surat=surat_masuk.no_surat and surat_masuk.no_surat=file.no_surat order by acara.id_event");


while ($d=mysqli_fetch_array($query)) {
 $data[]=array(
 	'id'=>$d['id_event'],
 	'title'=>$d['perihal'],
 	'start'=>$d['start_event'],
 	'end'=>$d['end_event'],
 	'color'=> 'blue',
 	'description' => $d['perihal'],
 	'url'=> '../file/'.$d['nama_file'].''
 );
}
echo json_encode($data);


?>