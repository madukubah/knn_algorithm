
var xmlHttp= createXmlHttpRequestObject();

function createXmlHttpRequestObject(){
	var xmlHttp;

	if(window.ActiveXObject){//BROWSER LAMA
		try{
			xmlHttp=new ActiveXObject('Microsoft.XMLHTTP');	
		}catch(e){
			xmlHttp= false;
		}
	}else{//BROWSER BARU	
		try{
			xmlHttp=new XMLHttpRequest();	
		}catch(e){
			xmlHttp= false;
		}
	}

	if(!xmlHttp){
		alert("tidak dapat membuat hoss");
	}else{
		return xmlHttp;
	}
}

function loadDocument( path, id ){
    console.log( "load doucument api = "+ path );
    if(xmlHttp.readyState==0 || xmlHttp.readyState==4 ){

		xmlHttp.open("GET", path+"/api/document?id="+id, true);
		xmlHttp.onreadystatechange= handleServerResponse;
		xmlHttp.send(null)
	}else{
		setTimeout('loadDocument()', 1000);
	}
}

function handleServerResponse(){
	if (xmlHttp.readyState==4) {
		//console.log("ababa");
		if(xmlHttp.status==200){
			console.log("bbbb");
			xmlResponse= xmlHttp.responseText;
			//xmlDocumentElement= xmlResponse.documentElement;
			//message= xmlDocumentElement.firstChild.data;
            console.log( xmlResponse );
			// document.getElementById("underInput").innerHTML= '<span style="color:blue">'+xmlResponse+'</span>';
		}else
			alert('something went wrong!!');
	}else{

	}
}