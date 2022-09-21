<?php
	function process_colname()
	{
		global $i,$pos,$arcolname,$colname,$coltype,$colattr;
		$pos = strpos($arcolname[$i],'|');
		if($pos === false)
		{
			$colname = $arcolname[$i];
			$coltype = "text";
		}else{
			$colname = substr($arcolname[$i],0,$pos);
			$coltype = substr($arcolname[$i],$pos+1);
			$pos = strpos($coltype,'|');
			if($pos !== false)
			{
				$temp = $coltype;
				$coltype = substr($temp,0,$pos);
				$colattr = substr($temp,$pos+1);
			}
		}
	}
	
	if(!isset($list_sess_id))
	{
		$list_sess_id = "";
	}
	if(!isset($allow_addnew))
	{
		$allow_addnew = true;
	}
	if(!isset($allow_logout))
	{
		$allow_logout = true;
	}	
	if(!isset($allow_menu))
	{
		$allow_menu = true;
	}	
	if(!isset($allow_edit))
	{
		$allow_edit = true;
	}
	if(!isset($allow_delete))
	{
		$allow_delete = true;
	}

	if(!isset($popup_mode))
	{
		$popup_mode = false;
	}
	if($popup_mode)
	{
		$listformbase_sess_prefix = "popup";
	}

	$colcount = count($arcolname) + 1;

	if(isset($_REQUEST["pgret"]))
	{
		$pageno = 	$_SESSION[$listformbase_sess_prefix."listpageno".$list_sess_id];
		$ordercol = $_SESSION[$listformbase_sess_prefix."listorder".$list_sess_id];
		$filtercol = $_SESSION[$listformbase_sess_prefix."listfiltercol".$list_sess_id];
		$filtertext = $_SESSION[$listformbase_sess_prefix."listfiltertext".$list_sess_id];
	}else{
		$pageno = $_REQUEST["hidPage"];
		$ordercol = $_REQUEST["hidOrder"];
		$filtercol = $_REQUEST["cboFilter"];
		$filtertext = $_REQUEST["txtFilter"];
		$filtertext2 = $_REQUEST["txtFilter2"];
	}

	if(!isset($listformbase_sess_prefix))
	{
		$listformbase_sess_prefix = "";
	}
?>
	<script language="javascript">
	function changeSortOrder(orderCol)
	{
		document.frm.hidOrder.value = orderCol;
		document.frm.submit();
	}
	
	function applyFilter()
	{
		document.frm.submit();
	}
	
	function releaseFilter()
	{
		document.frm.cboFilter.selectedIndex = 0;
		document.frm.txtFilter.value = '';
		document.frm.submit();
	}
	
	function gotoPage(pageNo)
	{
		document.frm.hidPage.value = pageNo;
		document.frm.submit();
	}
	
	function setListSelection()
	{
		try
		{
			for(i=1;i<document.frm.chkSelect.length;i++)
			{
				document.frm.chkSelect[i].checked = document.frm.chkSelectAll.checked;
			}
		}catch(e)
		{
		}
	}
	
	<?php
	if($allow_delete)
	{
	?>

	function delSelectedRows()
	{
		try
		{
			var anyRowChecked = false;
			for(i=1;i<document.frm.chkSelect.length;i++)
			{
				if(document.frm.chkSelect[i].checked)
				{
					anyRowChecked = true;
					break;
				}
			}
			if(!anyRowChecked)
			{
				alert('Please select at least one item');
				return;
			}
	
			if(confirm('Are you sure you want to delete selected items?'))
			{
				document.frm.hidIDs.value = '';
				for(i=1;i<document.frm.chkSelect.length;i++)
				{
					if(document.frm.chkSelect[i].checked)
					{
						if(document.frm.hidIDs.value!='')
						{
							document.frm.hidIDs.value += ',';
						}
						document.frm.hidIDs.value += '\'' + document.frm.chkSelect[i].value + '\'';
					}
				}
				document.frm.act.value = 'del';
				document.frm.action = '<?=$listactionpage?>';
				document.frm.submit();
			}
		}catch(e)
		{
		}
	}

	<?php
	}
	?>
	</script>
	<table cellpadding="0" cellspacing="0" width="100%"   height="30px">
	<tr>
		<td class="tablecoltitle"  style="background:slateblue"><?=$listtitle?></td>
		<td class="tablecoltitle" align="right"  style="background:slateblue">
			<?php
				if($allow_logout)
				{
					echo '<a href="'.$listlogoutpage.'"  style="background:slateblue">Logout</a>';
				}
			?>
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<?php
				if($allow_menu)
				{
					echo '<a href="'.$listmenupage.'"  style="background:slateblue">To Menu</a>';
				}
			?>
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<?php
				if($allow_addnew)
				{
					echo '<a href="'.$listeditpage.'"  style="background:slateblue">Add New</a>';
				}
			?>
			&nbsp;
			<?php
				if($popup_mode)
				{
					echo '<a href="javascript:parent.hidePopDialog();">Close</a>';
				}
			?>
		</td>
	</tr>
	</table>
	<table cellpadding="0" cellspacing="0" width="100%" height="30px">
	<tr>
		<td colspan="<?=$colcount?>">
			<input type="hidden" name="act">
			<input type="hidden" name="hidIDs">
			<input type="hidden" name="hidOrder">
			<input type="hidden" name="hidPage" value="<?=$pageno?>">
			<input type="hidden" name="hidFirstShown" value="1">
			<?php
			if($allow_delete)
			{
			?>
			<input type="hidden" name="chkSelect" value="">
			<?php
			}
			?>
			<table cellpadding="0" cellspacing="0" width="100%" height="40px">
			<tr>
				<td class="tablecolcaption">Filter By&nbsp;&nbsp;&nbsp;&nbsp;</td>
				<td class="tablecoldetail">
					<select name="cboFilter" class="inputtext">
					<?php
					for($i=0;$i<count($arfiltercolname);$i++)
					{
						echo '<option value="'.$arfiltercolname[$i].'"';
						if(strtolower($arfiltercolname[$i])==strtolower($filtercol))
						{
							echo ' selected';
						}
						echo '>'.$arfiltercolcaption[$i].'</option>';
					}
					?>
					</select>
					<input type="text" name="txtFilter" class="inputtext" size="30" value="<?=$filtertext?>">
					&nbsp;&nbsp;&nbsp;&nbsp; Gedung : 
					<input type="text" name="txtFilter2" class="inputtext" size="30" value="<?=$filtertext2?>">
					&nbsp;&nbsp;&nbsp;&nbsp;
					<input type="button" value="Apply" class="button" onClick="applyFilter();">&nbsp;<input type="button" class="button" value="Release" onClick="releaseFilter();">
				</td>
				<td class="tablecoldetail"><img src="images/spacer.gif" width="25" height="25" align="absmiddle"></td>
		    </tr>
		    </tr>
			</table>
		</td>
	</tr>
	</table>
	<table cellpadding="2" cellspacing="0" width="100%">
	<tr>
<?php
	$sql_filter = "";
	if($filtertext!="")
	{
	 if($filtertext2=="")
	  {
 	    if (substr($filtercol,0,3) == "tgl")
	     {
	      $filter11 = substr($filtertext,0,2);     
	      $filter22 = substr($filtertext,3,2);     
	      $filter33 = substr($filtertext,6,4);     
	      $filtertext = $filter33."-".$filter22."-".$filter11;  
    	  $sql_filter = $filtercol." LIKE '%".$filtertext."%' ";
	     } else {
    	  $sql_filter = $filtercol." LIKE '%".$filtertext."%' ";
	     } 
	  } else {
 	    if (substr($filtercol,0,3) == "tgl")
	     {
	      $filter11 = substr($filtertext,0,2);     
	      $filter22 = substr($filtertext,3,2);     
	      $filter33 = substr($filtertext,6,4);     
	      $filtertext = $filter33."-".$filter22."-".$filter11;  
    	  $sql_filter = $filtercol." LIKE '%".$filtertext."%' "." and gedung LIKE '%".$filtertext2."%' ";
	     } else {
    	  $sql_filter = $filtercol." LIKE '%".$filtertext."%' "." and gedung LIKE '%".$filtertext2."%' ";
	     } 
  
	  }  
	}
	if($sql_filter!="")
	{
		if(substr_count(strtolower($sql),"where")==0){
			$sql .= " WHERE ".$sql_filter;
		}else{
			$sql .= " AND ".$sql_filter;
		}
	}

	$_SESSION[$listformbase_sess_prefix."listfiltercol".$list_sess_id] = $filtercol;
	$_SESSION[$listformbase_sess_prefix."listfiltertext".$list_sess_id] = $filtertext;

	$sql_order = "";
	if($ordercol!="")
	{
			$pos = strpos($ordercol,'|');
			if(!($pos === false))
			{
				$ordercol = substr($ordercol,0,$pos);
			}

			$sql_order = $ordercol;


			if($_SESSION[$listformbase_sess_prefix."listorder".$list_sess_id]==$ordercol)
			{
				if(!isset($_REQUEST["pgret"]))
				{
					$_SESSION[$listformbase_sess_prefix."listorderascending".$list_sess_id] = !$_SESSION[$listformbase_sess_prefix."listorderascending".$list_sess_id];
				}
				if(!$_SESSION[$listformbase_sess_prefix."listorderascending".$list_sess_id]) $sql_order .= " DESC";
			}else{
				$_SESSION[$listformbase_sess_prefix."listorderascending".$list_sess_id] = true;
			}
			$_SESSION[$listformbase_sess_prefix."listorder".$list_sess_id] = $ordercol;
	}else{
		if(!isset($_REQUEST["hidFirstShown"]))
		{
			$_SESSION[$listformbase_sess_prefix."listorder".$list_sess_id] = $initsortcol;
			$_SESSION[$listformbase_sess_prefix."listorderascending".$list_sess_id] = $initsortcolascending;
		}
		$sql_order = "`".$_SESSION[$listformbase_sess_prefix."listorder".$list_sess_id]."`";
		if(!$_SESSION[$listformbase_sess_prefix."listorderascending".$list_sess_id]) $sql_order .= " DESC";
	}
	

	if($sql_order!="")
	{
		$sql .= " ORDER BY ".$sql_order;
	}

	$rowcount = $mainlib->countrows($sql,$mainlib->ocn);
	if(($rowcount % LIST_PAGE_SIZE)==0)
	{
		$pagecount = intval($rowcount/LIST_PAGE_SIZE);
	}else{
		$pagecount = intval($rowcount/LIST_PAGE_SIZE)+1;
	}

	if($pagecount<=0) $pagecount=1;
	if($pageno<=0) $pageno=1;
	if($pageno>$pagecount) $pageno=$pagecount;

	$_SESSION[$listformbase_sess_prefix."listpageno".$list_sess_id] = $pageno;

	$sql .= " LIMIT ".($pageno-1)*LIST_PAGE_SIZE.",".LIST_PAGE_SIZE;
		
	echo '<tr>';
	for($i=0;$i<count($arcolname);$i++)
	{
		process_colname();
		
		echo '<td class="tablecolsubtitle"';
		if(isset($arcolwidth))
		{
			echo ' width="'.$arcolwidth[$i].'"';
		}
		if($coltype=="number")
		{
			echo ' align="right"';
		}
		echo '>';
		echo '<a href="JavaScript:changeSortOrder(\''.$colname.'\');">'.$arcolcaption[$i].'</a> ';
		if($_SESSION[$listformbase_sess_prefix."listorder".$list_sess_id]==$colname)
		{
			if($_SESSION[$listformbase_sess_prefix."listorderascending".$list_sess_id])
			{
				echo '<img src="images/sort_asc.gif" align="absmiddle">';
			}else{
				echo '<img src="images/sort_desc.gif" align="absmiddle">';
			}
		}
		echo '</td>';
	}
	echo '<td class="tablecolsubtitle" width="5%" align="right">';
	if($allow_delete)
	{
		echo '<input type="checkbox" name="chkSelectAll" onclick="setListSelection();">';
	}
	echo '</td>';
	echo '</tr>';

	$rs = $mainlib->dbquery($sql,$mainlib->ocn);
	$resultfound = false;
	if($rowcount==0)
	{
		echo '<tr><td class="tablecoldetail" colspan='.($colcount-1).'>No entries were found</td><td class="tablecoldetail"><img src="images/spacer.gif" width="20" height="20" align="absmiddle"></td></tr>';
	}
	while($row = $mainlib->dbfetcharray($rs))
	{
		$resultfound = true;
		echo '<tr>';
		for($i=0;$i<count($arcolname);$i++)
		{
			process_colname();
						
			$coltext = "";
			switch($coltype)
			{
				case "text":
					$coltext = $row[$colname];
					break;
				case "number":
					$coltext = number_format($row[$colname],$colattr);
					break;
				case "timestamp":
					if($row[$colname]!=0)
					{
						$coltext = date(DATETIME_FORMAT,$row[$colname]);
					}else{
						$coltext = "";
					}
					break;
				case "date2":
					if($row[$colname]!=0)
					{
						$coltext = date(DATE_FORMAT_ID,strtotime($row[$colname]));
					}else{
						$coltext = "";
					}
					break;
				case "date":
					if($row[$colname]!=0)
					{
						$coltext = date(DATE_FORMAT,strtotime($row[$colname]));
					}else{
						$coltext = "";
					}
					break;
				case "datetime":
					$coltext = date(DATETIME_FORMAT,strtotime($row[$colname]));
					break;
				case "link":
					if(strpos($colattr,';') !== false)
					{
						list($linkurl,$linktitle) = explode(";",$colattr);
					}else{
						$linkurl = $colattr;
						$linktitle = '';
					}
					preg_match_all("/{[a-zA-Z0-9_]+}/", $linkurl, $matches, PREG_SET_ORDER);
					foreach($matches as $match)
					{
						$linkurlcolname = str_replace("}","",str_replace("{","",$match[0]));
						$linkurl = str_replace($match[0],$row[$linkurlcolname],$linkurl);
					}
					$coltext = '<a href="'.$linkurl.'" title="'.$linktitle.'">'.$row[$colname].'</a>';
					break;
			}
			
			echo '<td class="tablecoldetail" ';
			if($coltype=="number")
			{
				echo 'align=right';
			}
			echo '>'.$coltext.'&nbsp;</td>';
		}
		echo '<td class="tablecoldetail" width="5%" align="right" valign="absmiddle"><table cellpadding="0" cellspacing="0" height="30px"><tr>';
		if($allow_edit)
		{
		    if(strlen($idcol2)>1)
		    {
  			   echo '<td><a href="'.$listeditpage.'?id='.urlencode($row[$idcol]).';'.urlencode($row[$idcol2]).';'.urlencode($row[$idcol3]).';'.urlencode($row[$idcol4]).'" title="edit"><img src="images/edit.gif" border=0 align="absmiddle"></a></td>';
            } else {
			   echo '<td><a href="'.$listeditpage.'?id='.urlencode($row[$idcol]).'" title="edit"><img src="images/edit.gif" border=0 align="absmiddle"></a></td>';
            }  
		}
		if($allow_delete)
		{
			echo '<td><input type="checkbox" name="chkSelect" value="'.$row[$idcol].'"></td>';
		}
		echo '</tr></table></td>';
		echo '</tr>';
	}
	mysql_free_result($rs);

	if($allow_delete)
	{
?>
	<tr>
		<td colspan="<?=$colcount?>" align="right" class="tablecoldetail2">
			<input type="button" value="Delete Selected Items" class="button" style="width:160" onclick="JavaScript:delSelectedRows();">&nbsp;<img src="images/arrowup.gif" border="0" align="absmiddle">&nbsp;&nbsp;&nbsp;
		</td>
	</tr>
<?php
	}
?>
	</table>
	<table cellpadding="2" cellspacing="0" width="100%" height="40px">
	<tr>
		<td width="85%" class="tablecolsubtitle">&nbsp;</td>
		<td class="tablecolsubtitle">
			<a href="JavaScript:gotoPage(<?=$pageno-1?>);" title="Previous"><img src="images/arrow_left.gif" border="0" align="absmiddle"></a>&nbsp;
		</td>
		<td class="tablecolsubtitle" align="center">
			Page&nbsp;<input type="text" class="inputtext" name="txtPage" value="<?=$pageno?>" size="5" onkeypress="if(event.keyCode==13) gotoPage(document.frm.txtPage.value);">&nbsp;of&nbsp;<?=$pagecount?>
		</td>
		<td class="tablecolsubtitle">
			&nbsp;<a href="JavaScript:gotoPage(<?=$pageno+1?>);" title="Next"><img src="images/arrow_right.gif" border="0" align="absmiddle"></a>&nbsp;
		</td>
	</tr> 
	</table>