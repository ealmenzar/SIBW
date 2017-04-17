<footer>
    <div class="social">
        <ul>
            <li>
                <a href="https://www.facebook.com/">
                    <img src="img/facebook.png">
                </a>
            </li>
            <li>
                <a href="https://www.instagram.com/">
                    <img src="img/instagram.png">
                </a>
            </li>
            <li>
                <a href="https://www.twitter.com/">
                    <img src="img/twitter.png">
                </a>
            </li>
        </ul>
    </div>
    <div id="rights">
        <p>
            &copy Todos los derechos reservados: Marina Estévez Almenzar, Iván Calle Gil
        </p>
        <p>
            Icons from
            <a href="https://thenounproject.com">
                <img src="img/noun.PNG" style="max-width: 4%">
            </a>
        </p>
    </div>
</footer>
<script type="text/javascript">
    function ValidateComment(e,idError,classError){
    <?php 
	$words=getBanWord($link);
	foreach($words as $key => $value){
		$words[$key]="($| )".$value."( |^)";
	}
	echo "var regex=/(".implode($words,"|")."|<[^b].*>|[0-9]{9}|[^\ ]*@[^\ ]*\.[^\ ]+)/i";
	?>;
    if(regex.test(e.value)){
        len=e.value.match(regex)[0].length;
        e.value=e.value.replace(regex,GenerateStars(len));
        AddClass(classError,idError);
    }else{
        RemoveClass(classError,idError);
    }
    
}
 function ClickCommercial(commercial){
    var http = new XMLHttpRequest();
    var url = "webService/saveEstadistics.php";
    var params = "anuncio="+commercial;
    http.open("POST", url, true);
    http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    http.send(params);

 }
</script>