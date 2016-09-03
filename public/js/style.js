
        function request(oSelect) {
            var value = oSelect.options[oSelect.selectedIndex].value;
            var xhr   = getXMLHttpRequest();
            
            xhr.onreadystatechange = function() {
                if (xhr.readyState == 4 && (xhr.status == 200 || xhr.status == 0)) {
                    readData(xhr.responseXML);
                }
            };
            xhr.open("POST", "http://localhost/Master/app/views/departement.php", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.send("localisation=" + value);
        }

        function readData(oData) {
            var nodes   = oData.getElementsByTagName("item");
            var oSelect = document.getElementById("dep");
            var oOption, oInner;
            
            oSelect.innerHTML = "";
            for (var i=0, c=nodes.length; i<c; i++) {
                oOption = document.createElement("option");
                oInner  = document.createTextNode(nodes[i].getAttribute("name"));
                oOption.value = nodes[i].getAttribute("id");
                
                oOption.appendChild(oInner);
                oSelect.appendChild(oOption);
            }
        }

function getXMLHttpRequest() {
    var xhr = null;
    
    if (window.XMLHttpRequest || window.ActiveXObject) {
        if (window.ActiveXObject) {
            try {
                xhr = new ActiveXObject("Msxml2.XMLHTTP");
            } catch(e) {
                xhr = new ActiveXObject("Microsoft.XMLHTTP");
            }
        } else {
            xhr = new XMLHttpRequest(); 
        }
    } else {
        alert("Votre navigateur ne supporte pas l'objet XMLHTTPRequest...");
        return null;
    }
    
    return xhr;
}

function show(target)
{
        document.getElementById(target).style.display = 'block';
}

function hide(target)
{
        document.getElementById(target).style.display = 'none';
}

function surligne(champ, erreur)
{
   if(erreur)
      champ.style.backgroundColor = "#fba";
   else
      champ.style.backgroundColor = "";
}

var regex = /^[a-zèéçàù]+$/;
var regextrajet = /^[a-zèéçàù-]+$/;
var regextitle = /^[a-zA-Z èéçàù]+$/;
var regexcontent = /^[a-zA-Z0-9 èéçàù.;:?!-,@]+$/;
var regexpass = /^[a-zA-Z0-9 èéçàù.;:?!-,@]+$/;
var regexprice = /^[0-9]+$/;

function verif(target){
     var aRetourner = false;
              
            if(target.value.length < 4 || target.value.length > 20)
            {
                surligne(target,true);
                document.getElementById("pseudoerror").style.display = 'block';
                document.getElementById('pseudoerror').innerHTML = "Veuillez respectez la taille indiquée ";
            }
            else if(!regex.test(target.value))
            {
                surligne(target,true);
                document.getElementById("pseudoerror").style.display = 'block';
                document.getElementById('pseudoerror').innerHTML = "Majuscules/caractères spéciaux interdit ";
            }
            else
            {
                surligne(target,false);
                document.getElementById("pseudoerror").style.display = 'none';
                aRetourner= true;
            }
        return aRetourner;
}

function verifname(target){
              
            if(target.value.length < 4 || target.value.length > 20)
            {
                surligne(target,true);
                document.getElementById("namerror").style.display = 'block';
                document.getElementById('namerror').innerHTML = "Veuillez respectez la taille indiquée ";
                return false;
            }
            else if(!regex.test(target.value))
            {
                surligne(target,true);
                document.getElementById("namerror").style.display = 'block';
                document.getElementById('namerror').innerHTML = "Majuscules/caractères spéciaux interdit ";
                return false;
            }
            else
            {
                surligne(target,false);
                document.getElementById("namerror").style.display = 'none';
                return true;
            }
}

function veriflname(target){
              
            if(target.value.length < 4 || target.value.length > 20)
            {
                surligne(target,true);
                document.getElementById("lnamerror").style.display = 'block';
                document.getElementById('lnamerror').innerHTML = "Veuillez respectez la taille indiquée ";
                return false;
            }
            else if(!regex.test(target.value))
            {
                surligne(target,true);
                document.getElementById("lnamerror").style.display = 'block';
                document.getElementById('lnamerror').innerHTML = "Majuscules/caractères spéciaux interdit ";
                return false;
            }
            else
            {
                surligne(target,false);
                document.getElementById("lnamerror").style.display = 'none';
                return true;
            }
}

function verifpass(target){
              
            if(target.value.length < 4 || target.value.length > 20)
            {
                surligne(target,true);
                document.getElementById("passerror").style.display = 'block';
                document.getElementById('passerror').innerHTML = "Veuillez respectez la taille indiquée ";
                return false;
            }
            else if(!regexpass.test(target.value))
            {
                surligne(target,true);
                document.getElementById("passerror").style.display = 'block';
                document.getElementById('passerror').innerHTML = "Ce caractère n'est pas autorisé ";
                return false;
            }

            else
            {
                surligne(target,false);
                document.getElementById("passerror").style.display = 'none';
                return true;
            }
}

function verifpass2(target){
              
            if(document.getElementById("pwd").value != document.getElementById("verifpwd").value )
            {
                surligne(target,true);
                document.getElementById("passerror2").style.display = 'block';
                document.getElementById('passerror2').innerHTML = "Vos mots de passe sont différents !";
                return false;
            }
            else
            {
                surligne(target,false);
                document.getElementById("passerror2").style.display = 'none';
                return true;
            }
}

function verifmail(target){
           var regex = /^[a-zA-Z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$/;
           if(!regex.test(target.value))
           {
                surligne(target, true);
                document.getElementById("mailerror").style.display = 'block';
                document.getElementById('mailerror').innerHTML = "Veuillez entrez une adresse mail valide";
                return false;
           }
           else
           {
              surligne(target, false);
              document.getElementById("mailerror").style.display = 'none';
              return true;
           }
}

function verifbirthdate(target){
              
            if(document.getElementById("birthdate").value == "jj/mm/aaaa" || document.getElementById("birthdate").value.length > 10)
            {
                surligne(target,true);
                document.getElementById("birthdaterror").style.display = 'block';
                document.getElementById('birthdaterror').innerHTML = "Cette date n'est pas au bon format";
                return false;
            }
            else
            {
                surligne(target,false);
                document.getElementById("birthdaterror").style.display = 'none';
                return true;
            }
}

function veriftitle(target){
              
            if(target.value.length < 2 || target.value.length > 50)
            {
                surligne(target,true);
                document.getElementById("titlerror").style.display = 'block';
                document.getElementById('titlerror').innerHTML = "Veuillez respectez la taille indiquée ";
                return false;
            }
            else if(!regextitle.test(target.value))
            {
                surligne(target,true);
                document.getElementById("titlerror").style.display = 'block';
                document.getElementById('titlerror').innerHTML = "Majuscules/caractères spéciaux interdit";
                return false;
            }
            else
            {
                surligne(target,false);
                document.getElementById("titlerror").style.display = 'none';
                return true;
            }
}

function verifcontent(target){
              
            if(target.value.length < 10 || target.value.length > 1000)
            {
                surligne(target,true);
                document.getElementById("contenterror").style.display = 'block';
                document.getElementById('contenterror').innerHTML = "Veuillez respectez la taille indiquée ";
                return false;
            }
            else if(!regexcontent.test(target.value))
            {
                surligne(target,true);
                document.getElementById("contenterror").style.display = 'block';
                document.getElementById('contenterror').innerHTML = "Majuscules/caractères spéciaux interdit";
                return false;
            }
            else
            {
                surligne(target,false);
                document.getElementById("contenterror").style.display = 'none';
                return true;
            }
}

function verifprice(target){
              
            if(target.value.length < 1)
            {
                surligne(target,true);
                document.getElementById("pricerror").style.display = 'block';
                document.getElementById('pricerror').innerHTML = "Veuillez indiquer un prix ";
                return false;
            }
            else if(!regexprice.test(target.value))
            {
                surligne(target,true);
                document.getElementById("pricerror").style.display = 'block';
                document.getElementById('pricerror').innerHTML = "Seul les nombres sont autorisés";
                return false;
            }
            else
            {
                surligne(target,false);
                document.getElementById("pricerror").style.display = 'none';
                return true;
            }
}

function verifitem(target){
              
            if(target.value.length < 2 || target.value.length > 50)
            {
                surligne(target,true);
                document.getElementById("itemerror").style.display = 'block';
                document.getElementById('itemerror').innerHTML = "Veuillez respecter la taille indiqué ";
                return false;
            }
            else if(!regextitle.test(target.value))
            {
                surligne(target,true);
                document.getElementById("itemerror").style.display = 'block';
                document.getElementById('itemerror').innerHTML = "Majuscules/caractères spéciaux interdit";
                return false;
            }
            else
            {
                surligne(target,false);
                document.getElementById("itemerror").style.display = 'none';
                return true;
            }
}

function verifcheck(target){

    if(target.checked == true){
       document.getElementById("dend").style.display = 'block';
    }else{
        document.getElementById("dend").style.display = 'none';
    }
}

function intermediaire(target){

    if(target.checked == true){
       document.getElementById("trajet_inter").style.display = 'block';
    }else{
        document.getElementById("trajet_inter").style.display = 'none';
    }
}

function intermediairetwo(target){

    if(target.checked == true){
       document.getElementById("trajet_inter2").style.display = 'block';
    }else{
        document.getElementById("trajet_inter2").style.display = 'none';
    }
}

function verifstart(target){
     var aRetourner = false;
              
            if(target.value.length < 4 || target.value.length > 20)
            {
                surligne(target,true);
                document.getElementById("starterror").style.display = 'block';
                document.getElementById('starterror').innerHTML = "Veuillez respectez la taille indiquée ";
            }
            else if(!regextrajet.test(target.value))
            {
                surligne(target,true);
                document.getElementById("starterror").style.display = 'block';
                document.getElementById('starterror').innerHTML = "Majuscules/caractères spéciaux interdit ";
            }
            else
            {
                surligne(target,false);
                document.getElementById("starterror").style.display = 'none';
                aRetourner= true;
            }
        return aRetourner;
}

function verifend(target){
     var aRetourner = false;
              
            if(target.value.length < 4 || target.value.length > 20)
            {
                surligne(target,true);
                document.getElementById("enderror").style.display = 'block';
                document.getElementById('enderror').innerHTML = "Veuillez respectez la taille indiquée ";
            }
            else if(!regextrajet.test(target.value))
            {
                surligne(target,true);
                document.getElementById("enderror").style.display = 'block';
                document.getElementById('enderror').innerHTML = "Majuscules/caractères spéciaux interdit ";
            }
            else
            {
                surligne(target,false);
                document.getElementById("enderror").style.display = 'none';
                aRetourner= true;
            }
        return aRetourner;
}

function updatepassword(target){
    if(target.active == true){
       document.getElementById("updatepassword").style.display = 'none';
       //alert('lol');
    }else{
        document.getElementById("updatepassword").style.display = 'none';
        document.getElementById("uppassword").style.display = 'block';
        //alert('lol');
    }
}

function updatemail(target){
    if(target.clik == true){
       document.getElementById("updatemail").style.display = 'none';
       //alert('lol');
    }else{
        document.getElementById("updatemail").style.display = 'none';
        document.getElementById("upmail").style.display = 'block';
        //alert('lol');
    }
}