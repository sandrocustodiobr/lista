/**
* display content using a basic HTML replacement
*/
function displayContents(id,txt) {
    var el = document.getElementById(id); 
    el.innerHTML = txt; //display output in DOM
    console.log("displayContents");
}

/**
* add a content
*/
function addContents(id,txt) {
    var el = document.getElementById(id); 
    el.insertAdjacentHTML("beforeend",txt);
    console.log("addContents");
}

/**
* display content using a basic HTML replacement
*/
function FazerCopiaLista() {
    var cont = 0;
    var corFonte = monta_cor_css(10, 99);
    //displayContents("lista_final",'<h2>LISTA FINAL</h2>');
    displayContents("lista_final",'');
    //'<div style="font-color:' + corFonte + ';">'
    $("input:checkbox[name=lista]:checked").each(function () {
        cont++;
        addContents("lista_final",document.getElementById(this.id+"inputA").value+" = "+document.getElementById(this.id+"inputB").value+"<br>");
        //addContents("lista_final",this.value+document.getElementById(this.id+"input").value+"<br>");
        //alert(this.id+"inputA");
        //alert(this.id+"inputB");
    });
    
    console.log("FazerCopiaLista "+cont);
    //addContents("lista_final","</div>");
    Checados();
}

/**
* Ativa/desativa readolny em cada input. (EM DESENVOLVIMENTO)
*/
function Checados() {
    var cont = 0;
    $("input:checkbox[name=lista]").each(function () {
        cont++;
        var ativo = document.getElementById(this.id).checked;
        if (typeof ativo !== 'undefined') {
            // Agora nós sabemos que a var está definida, então podemos prosseguir.
            //console.log(ativo);
            if (ativo == true) {
                document.getElementById(this.id+'inputA').style.backgroundColor = 'cyan';
                document.getElementById(this.id+'inputB').style.backgroundColor = 'cyan';
            } else {
                document.getElementById(this.id+'inputA').style.backgroundColor = '#FFFACD';
                document.getElementById(this.id+'inputB').style.backgroundColor = '#FFFACD';
            }
        } else {
            ativo = '(vazio)';
        }
    });
    
    //console.log("FazerCopiaLista "+cont+" "+ativo);
    //addContents("lista_final","</div>");
}

function Copiar() {
    var texto = document.getElementById('lista_final').innerText;
    console.log(texto);
    //texto.select();
    navigator.clipboard.writeText(texto);
    //alert('Texto copiado: '+texto);
}

// MONTA COR ALEATÓRIA PARA O CSS
function monta_cor_css(minimo, maximo) {
    var diferenca = maximo - minimo;
    var parte1 = parseInt(Math.random()*diferenca);
    var parte2 = parseInt(Math.random()*diferenca);
    var parte3 = parseInt(Math.random()*diferenca);
    if (+parte1 > 9) { temp1='' } else { temp1 = '0'; }
    if (+parte2 > 9) { temp2='' } else { temp2 = '0'; }
    if (+parte3 > 9) { temp3='' } else { temp3 = '0'; }
    var cor_css = "#" + temp1 + parte1 + temp2 + parte2 + temp3 + parte3;
    //console.log(cor_css);
    return cor_css;
}
