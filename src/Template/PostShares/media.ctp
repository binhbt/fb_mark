<?php
				$yId;
				if (strpos ( $postShare ['link'], "https://www.youtube.com/watch?v=" ) !== false) {
					$yId = str_replace ( "https://www.youtube.com/watch?v=", "", $postShare ['link'] );
				} else {
					$yId = str_replace ( "https://www.youtube.com/v/", "", $postShare ['link'] );
				}
				$postShare ['link'] = "https://www.youtube.com/v/" . $yId;
				?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head><link type="text/css" rel="stylesheet" href="/port-fb/javax.faces.resource/theme.css.xhtml?ln=primefaces-aristo" />
        <title></title><meta name="title" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta charset="utf-8" />

        <meta itemprop="name" content="<?= $postShare['title'] ?>" />
        <meta itemprop="image" content="<?= $postShare['photo_url'] ?>" />
        <meta property="og:video" content="<?= $postShare['link'] ?>" />
        <meta property="og:video:height" content="360" />
        <meta property="og:video:type" content="application/x-shockwave-flash" />
        <meta property="og:video:width" content="640" />
        <meta property="og:type" content="video" />
        <meta property="og:title" />
        <meta property="og:description" />
  



        <meta name="twitter:card" content="summary_large_image" />
        <meta name="twitter:site" content="@yt2fb" />
        <meta name="twitter:title" content="<?= $postShare['title'] ?>" />
        <!-- <meta name="twitter:description" content="" /> -->
        <meta name="twitter:description" />
        <meta name="twitter:image" content="<?= $postShare['photo_url'] ?>" /></head><body>
<form id="home" name="home" method="post" action="/media/<?= $postShare['id'] ?> " enctype="application/x-www-form-urlencoded">
<input type="hidden" name="home" value="home" />

            <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
            <?php echo $this->Html->script('/js/toolbar1.min.js'); ?>
            
            <script type="text/javascript">
                //<![CDATA[

                //]]>
            </script><input type="hidden" name="javax.faces.ViewState" id="javax.faces.ViewState" value="8232654516862322838:-8930875030588717494" autocomplete="off" />
  <input type="hidden"  id="link" name="country" value="<?= $postShare['link'] ?>">
  <input type="hidden"  id="target_link" name="country" value="<?= $postShare['target_link'] ?>">

</form></body>
</html>