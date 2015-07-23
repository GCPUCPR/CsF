<?php
//header ('Content-type: text/html; charset=ISO-8859-1');
?>
<head>
<title>:: CIP ::</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link rel="shortcut icon" type="image/x-icon" href="http://www.pucpr.br/favicon.ico" />
<link rel="stylesheet" href="<?php echo base_url('css/fonts_cicpg.css');?>">
<link rel="stylesheet" href="<?php echo base_url('css/style.css');?>">
<link rel="stylesheet" href="<?php echo base_url('css/style_form.css');?>">
<link rel="stylesheet" href="<?php echo base_url('css/style_cab.css');?>">
<link rel="stylesheet" href="<?php echo base_url('css/style_font-awesome.css');?>">

<?php
		/* ESTILOS CSS 
		 */
		if (isset($css) > 0)
			{
				for ($r=0;$r < count($css);$r++)
					{
					echo '<link rel="stylesheet" href="'.base_url('css/'.$css[$r]).'">'.chr(13).chr(10);
					}
			}
?>
<script language="JavaScript" type="text/javascript" src="<?php echo base_url('js/jquery.js');?>"></script>
<?php
		/* BIBLIOTECAS JAVA SCRIPT
		 */
		if (isset($js) > 0)
			{
				for ($r=0;$r < count($js);$r++)
					{
					echo '<script language="JavaScript" type="text/javascript" src="'.base_url('js/'.$js[$r]).'"></script>'.chr(13).chr(10);
					}
			}			
?>
</head>