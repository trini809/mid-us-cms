<table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td align="right">
        <?php
		// static link
		$base = db_query ("select * from ".$dbext."parent_menu where menugroup = '2' and active = '1' order by listorder asc") or db_die();
			$bnum = num_row($base);
				if ($bnum) {
					while ($bres = fetch_array($base)) {
					echo "<a href=\"".$bres['url'].$ext."\" target=\"_self\">".$bres['name']."</a>&nbsp;|&nbsp;";
					}
				}
		?>
        &nbsp;</td>
  </tr>
    </table>