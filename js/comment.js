function Toggle(classToggle,id){
	var classcontent = document.getElementById(id).className;
	var classes = classcontent.split(" ");
	if((index=classes.indexOf(classToggle))==-1){
		document.getElementById(id).className+= " "+classToggle;
	}else{
		document.getElementById(id).className=classcontent.replace(classToggle,'');
	}
}

function RemoveClass(id,classRemoved){
	var classcontent = document.getElementById(id).className;
	var classes = classcontent.split(" ");
	document.getElementById(id).className=classcontent.replace(classRemoved,'');
}

function AddClass(id,classAdded){
	console.log(id);
	var classcontent = document.getElementById(id).className;
	var classes = classcontent.split(" ");
	if((index=classes.indexOf(classAdded))==-1){
		document.getElementById(id).className+= " "+classAdded;
	}
}

function GenerateStars(n){
	var str="";
	for (var i = 0; i < n; i++) {
		str+="*";
	}
	return str;
}

function AddZero(i) {
    if (i < 10) {
        i = "0" + i;
    }
    return i;
}

function GetToday(){
	var date = new Date();
	return AddZero(date.getDate())+"/"+AddZero((date.getMonth()+1))+"/"+date.getFullYear();
}

function GetNow(){
	var date = new Date();
	return AddZero(date.getHours())+":"+AddZero(date.getMinutes());
	
}

function ValidateAuthor(e,idError,classError){
	var regex=/(admin|moderator|moderador)/i;
	if(regex.test(e.value)){
		len=e.value.match(regex)[0].length;
		e.value=e.value.replace(regex,GenerateStars(len));
		AddClass(classError,idError);
	}else{
		RemoveClass(classError,idError);
	}
}
function ValidateEmail(e, idError, classError){
	var regex=/[^\ ]*@[^\ ]*\.[^\ ]+)/i;
	if(regex.test(e.value)){
		RemoveClass(classError,idError);
	}else{
		len=e.value.match(regex)[0].length;
		AddClass(classError,idError);
	}
}
function ValidateComment(e,idError,classError){
	var regex=/(tonto|idiota|cateto|inutil|inútil|Donald Trump|[0-9]{9}|[^\ ]*@[^\ ]*\.[^\ ]+)/i;
	if(regex.test(e.value)){
		len=e.value.match(regex)[0].length;
		e.value=e.value.replace(regex,GenerateStars(len));
		AddClass(classError,idError);
	}else{
		RemoveClass(classError,idError);
	}
}
function SubmitComment(idAuthor,idEmail,idComment,idlistComment){
	var authorContent=document.getElementById(idAuthor).value;
	var commentContent=document.getElementById(idComment).value;
	document.getElementById(idlistComment).innerHTML+="<li><b>Autor:</b> "+authorContent+"<br><b>Fecha:</b> "+GetToday()+" <b>Hora:</b> "+GetNow()+"<br><p>"+commentContent+"</p></li>";
	document.getElementById(idAuthor).value="";
	document.getElementById(idEmail).value="";
	document.getElementById(idComment).value="";
}