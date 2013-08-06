
<?php foreach ($datalist as $annonce): ?>
    
        <table width="640" border="0" cellpadding="0" cellspacing="0" style="font-size:13px;">
                          <tr>
                            <td width="7" rowspan="5" valign="top" style="background-color:#FFF">&nbsp;</td>
                            <td height="33" colspan="4" style="background-color:#FFF">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style=" color: #009edb; "><?php echo $annonce->designation; ?></span>  <span style="color: #85b801;">[<?php echo $annonce->pays; ?>]</span></a></h3></td>
                            <td width="7" rowspan="5" valign="top" style="background-color:#FFF"></td>
                          </tr>
                          <tr>
                            <td width="126" rowspan="3" style="background-color:#FFF;"><a href="<?php echo _BASE_URI_.$annonce->libelle.'/'.$annonce->link_rewrite.'.html';?>"><img alt="Image" src="<?php echo _UPLOAD_DIR_.'Annonce/meduim'.$annonce->url;  ?>" width="100"/></a></td>
                            <td height="55" colspan="3" style="text-align: justify; background-color:#FFF; color:#535353;"> <?php echo $annonce->texte; ?>
                            </td>
                          </tr>
                          <tr>
                            <td width="110" height="16" style="background-color:#FFF">&nbsp;</td>
                            <td colspan="2" style="background-color:#FFF; font-size:14px" align="right">
                              <span style="color:#03aadd;">Prix :</span> <span style="color:#e2001a;"><?php echo $annonce->prixTotal;?> FCFA</span>                            </td>
                          </tr>
                          <tr>
                            <td height="15" colspan="3" style="background-color:#FFF"><span style="color:#009edb">Publié le: </span><?php echo $annonce->dateDebut; ?> &nbsp;&nbsp;&nbsp; <span style="color:#009edb">Expire: </span><?php echo $annonce->dateexp; ?></td>
                          </tr>
                          <tr>
                            <td height="15" colspan="4" style="background-color:#FFF">&nbsp;</td>
                          </tr>
                          <tr>
                            <td width="7" height="33">&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td width="84">&nbsp;</td>
                            <td width="306" align="right" valign="top">
      
                                            <span style="background-color:#85b801; padding:6px;">
                                                >><a href="<?php echo _BASE_URI_.$annonce->libelle.'/'.$annonce->link_rewrite.'.html';?>" target="_blank" style="text-decoration:none; font-size:12px; color:#FFF;">Voir détail de l'annonce</a>
                                            </span>
                            </td>
                            <td width="7">&nbsp;</td>
                          </tr>
                        </table>

                    </td>
                    <td>&nbsp;</td>
                  </tr>
                  <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td colspan="6">
                    <table width="640" border="0" style="background-color:#FFF">
  <tr>
    <td width="634">Ils nous font confaince</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
</table>
<?php endforeach; ?>

