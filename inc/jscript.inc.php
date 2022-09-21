 function trim(text)
{
// Erase blank in the most left and most right sections of a string
	var i,j;
	for(i=0; text.charAt(i)==' ' && i<text.length; i++){}
	if(i==text.length) return ''
	for(j=text.length-1; text.charAt(j)==' ' && j>-1; j--){}
	return text.substring(i,j+1);
}

function isBlank(obj,message)
{
//Check whether the Object Value is blank
//If blank, show alert message
	if(trim(obj.value) == ''){
		if(trim(message) != ''){
			obj.focus();
			alert(message);
		}
		return true;
	} else {
		return false;
	}
}

function numberOnly(event)
{
	var isIE = (navigator.appName.indexOf('Internet Explorer')>-1);
	var isNS = (navigator.appName.indexOf('Netscape')>-1);
	var _ret = true;
	if(isIE)
	{
		if(event.keyCode<46 || event.keyCode>57 && event.keyCode!=8 && event.keyCode!=0)
		{
			_ret = false;
		}
	}

	if(isNS)
	{
		if((event.which<46 || event.which>57) && event.which!=8 && event.which!=0)
		{
			_ret = false;
		}
	}

	return (_ret); 
}

function isEmailAddressValid(emailAddr){
	//Check whether an email address expression is valid
	var re = new RegExp();
	re = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/;
	if (!re.test(emailAddr)) {return false;}
	else {return true;}
}

function openWin(url, height, width)
{
  win = window.open(url,
  	'new_window','height='+height+',width='+width+',left=0,top=0,menubar=no,'+
  	'status=yes,toolbar=no,scrollbars=yes,resizable=no,titlebar=no');
  win.focus();
  return;
}

function showPopDialog(modal,url)
{
    document.getElementById('pop_frame').src = url;
    $("#pop_overlay").show();
    $("#pop_dialog").fadeIn(300);

    if (modal)
    {
        $("#pop_overlay").unbind("click");
    }
    else
    {
        $("#pop_overlay").click(function (e)
        {
            hidePopDialog();
        });
    }
}

function hidePopDialog()
{
    $("#pop_overlay").hide();
    $("#pop_dialog").fadeOut(300);
}

function insertTableRow(tbl)
{
    var tblBody = tbl.tBodies[0];
    newRow = tblBody.rows[1].cloneNode(true);
    newRow.style.display = '';
    //tblBody.appendChild(newRow);
    tblBody.insertBefore(newRow, tblBody.rows[tblBody.rows.length-1]);
}

function deleteTableRow(tbl,row)
{
    if(tbl.rows.length>3)
    {
	    var i = row.parentNode.parentNode.rowIndex;
	    tbl.deleteRow(i);
		}
}

function addThousandSep(value,decimalPlaces) 
{
  retval = value + '';
  retval = retval.split(',').join('');
  if(!isNaN(retval) && trim(retval)!='') {
    x = retval.split('.');
    x1 = x[0];
    x2 = x.length > 1 ? '.' + x[1] : '';
    var rgx = /(\d+)(\d{3})/;
    while (rgx.test(x1)) {
      x1 = x1.replace(rgx, '$1' + ',' + '$2');
    }
    retval = x1 + x2;
    if(retval.indexOf('.')==-1) {
      if(decimalPlaces==null)
      {
        retval += '.00';
      }else{
        if(decimalPlaces>0)
        {
          retval += '.';
        }
        for(i=0;i<decimalPlaces;i++)
        {
          retval += '0';
        }
      }
    }
    else {
      var arr=retval.split(".");
      for(var i=arr[1].length;i<decimalPlaces;i++){
        retval += '0';
      }
    }
  }
  return retval;
}

function addThousandSepToObj(obj,decimalPlaces)
{
	if(arguments.length==1) decimalPlaces=2;
	obj.value = addThousandSep(obj.value,decimalPlaces);
}

function clearThousandSep(value) 
{
  retval = value + '';
  retval = retval.split(',').join('');
  return retval;
}

function clearThousandSepToObj(obj)
{
	obj.value = clearThousandSep(obj.value);
	obj.select();
}