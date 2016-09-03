
   var refreshId = setInterval(function() {
      $("#articlegift").load('http://localhost/Laravel/resources/views/ajax/ajaxdon.php?randval='+ Math.random());
      $("#articlesale").load('http://localhost/Laravel/resources/views/ajax/ajaxvente.php?randval='+ Math.random());
      $("#articleswap").load('http://localhost/Laravel/resources/views/ajax/ajaxtroc.php?randval='+ Math.random());
      $("#articlelocation").load('http://localhost/Laravel/resources/views/ajax/ajaxlocation.php?randval='+ Math.random());
   }, 3000);


function request(oSelect) {
        var value = oSelect.options[oSelect.selectedIndex].value;
        var xhr   = getXMLHttpRequest();
        
        xhr.onreadystatechange = function() {
            if (xhr.readyState == 4 && (xhr.status == 200 || xhr.status == 0)) {
                readData(xhr.responseXML);
            }
        };
        xhr.open("POST", "http://localhost/Laravel/resources/views/departement.php", true);
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