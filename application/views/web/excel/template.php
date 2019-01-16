<!DOCTYPE html>
<html>
<head>
	<title>Export Excel</title>
	<?php 
		$title = isset($title) ? $title : 'Binmaley Infirmary';
		header("Content-Type: application/xls");    
		header("Content-Disposition: attachment; filename=".$title.".xls");  
		header("Pragma: no-cache"); 
		header("Expires: 0");
	?>
</head>
<body>
	<div>
		
	</div>
	<table border="1px" cellspacing = 0>
			<tr rowspan=3 style="text-align: center">
				<td  colspan="<?=isset($header) ? count($header) : '6'?>">
					<div style="text-align:center">
						<img height="200px" src="<?=base_url()?>assets/images/logo_excel.png"></td>
					</div>
				</td>
			</tr>
			<tr>
				<td colspan="<?=isset($header) ? count($header) : '6'?>">&nbsp</td>
			</tr>
			<tr>
				<td colspan="<?=isset($header) ? count($header) : '6'?>">&nbsp</td>
			</tr>
			<tr>
				<td colspan="<?=isset($header) ? count($header) : '6'?>">&nbsp</td>
			</tr>
		<?php if(!empty($header)):?>
			<tr style="font-weight: bold;font-size: 20px;text-align: center">
				<?php foreach ($header as $head):?>
					<td style=" background: #d6cdcd;"><?=$head == 'pat_id' ? 'Patient ID' : ucfirst(join(' ',explode('_',$head)))?></td>
				<?php endforeach;?>
			</tr>
		<?php else:?>
			<tr><td colspan="6"></td></tr>
		<?php endif;?>
		<?php if(!empty($value)):?>
		<?php foreach ($value as $val):?>
			<tr>
					<?php for($i=0;$i< count($header); $i++):?>
						<td><?=$val[$header[$i]]?></td>
					<?php endfor;?>
			</tr>
		<?php endforeach;?>
		<?php else:?>
			<tr><td colspan="6">No data</td></tr>
		<?php endif;?>
	</table>
</body>
</html>